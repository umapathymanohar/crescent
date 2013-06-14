<?php

class SaledetailsController extends BaseController {

    /**
     * Saledetail Repository
     *
     * @var Saledetail
     */
    protected $saledetail;

    public function __construct(Saledetail $saledetail)
    {
        $this->saledetail = $saledetail;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $saledetails = $this->saledetail->all();

        return View::make('saledetails.index', compact('saledetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('saledetails.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Saledetail::$rules);

        if ($validation->passes())
        {
            $this->saledetail->create($input);

            return Redirect::route('saledetails.index');
        }

        return Redirect::route('saledetails.create')
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
        $saledetail = $this->saledetail->findOrFail($id);

        return View::make('saledetails.show', compact('saledetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $saledetail = $this->saledetail->find($id);

        if (is_null($saledetail))
        {
            return Redirect::route('saledetails.index');
        }

        return View::make('saledetails.edit', compact('saledetail'));
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
        $validation = Validator::make($input, Saledetail::$rules);

        if ($validation->passes())
        {
            $saledetail = $this->saledetail->find($id);
            $saledetail->update($input);

            return Redirect::route('saledetails.show', $id);
        }

        return Redirect::route('saledetails.edit', $id)
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
        $this->saledetail->find($id)->delete();

        return Redirect::route('saledetails.index');
    }

}