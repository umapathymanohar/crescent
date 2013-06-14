<?php

class SalereturndetailsController extends BaseController {

    /**
     * Salereturndetail Repository
     *
     * @var Salereturndetail
     */
    protected $salereturndetail;

    public function __construct(Salereturndetail $salereturndetail)
    {
        $this->salereturndetail = $salereturndetail;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $salereturndetails = $this->salereturndetail->all();

        return View::make('salereturndetails.index', compact('salereturndetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('salereturndetails.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Salereturndetail::$rules);

        if ($validation->passes())
        {
            $this->salereturndetail->create($input);

            return Redirect::route('salereturndetails.index');
        }

        return Redirect::route('salereturndetails.create')
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
        $salereturndetail = $this->salereturndetail->findOrFail($id);

        return View::make('salereturndetails.show', compact('salereturndetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $salereturndetail = $this->salereturndetail->find($id);

        if (is_null($salereturndetail))
        {
            return Redirect::route('salereturndetails.index');
        }

        return View::make('salereturndetails.edit', compact('salereturndetail'));
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
        $validation = Validator::make($input, Salereturndetail::$rules);

        if ($validation->passes())
        {
            $salereturndetail = $this->salereturndetail->find($id);
            $salereturndetail->update($input);

            return Redirect::route('salereturndetails.show', $id);
        }

        return Redirect::route('salereturndetails.edit', $id)
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
        $this->salereturndetail->find($id)->delete();

        return Redirect::route('salereturndetails.index');
    }

}