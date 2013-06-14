<?php

class SuppliermastersController extends BaseController {

    /**
     * Suppliermaster Repository
     *
     * @var Suppliermaster
     */
    protected $suppliermaster;

    public function __construct(Suppliermaster $suppliermaster)
    {
        $this->suppliermaster = $suppliermaster;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $suppliermasters = $this->suppliermaster->all();

        return View::make('suppliermasters.index', compact('suppliermasters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('suppliermasters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Suppliermaster::$rules);

        if ($validation->passes())
        {
            $this->suppliermaster->create($input);

            return Redirect::route('suppliermasters.index');
        }

        return Redirect::route('suppliermasters.create')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $suppliermaster = $this->suppliermaster->findOrFail($id);

        return View::make('suppliermasters.show', compact('suppliermaster'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $suppliermaster = $this->suppliermaster->find($id);

        if (is_null($suppliermaster))
        {
            return Redirect::route('suppliermasters.index');
        }

        return View::make('suppliermasters.edit', compact('suppliermaster'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $input = array_except(Input::all(), '_method');
        $validation = Validator::make($input, Suppliermaster::$rules);

        if ($validation->passes())
        {
            $suppliermaster = $this->suppliermaster->find($id);
            $suppliermaster->update($input);

            return Redirect::route('suppliermasters.show', $id);
        }

        return Redirect::route('suppliermasters.edit', $id)
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->suppliermaster->find($id)->delete();

        return Redirect::route('suppliermasters.index');
    }

}