<?php

class SalesController extends BaseController {

    /**
     * Sale Repository
     *
     * @var Sale
     */
    protected $sale;

    public function __construct(Sale $sale)
    {
        $this->sale = $sale;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $sales = $this->sale->all();

        return View::make('sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('sales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Sale::$rules);

        if ($validation->passes())
        {
            $this->sale->create($input);

            return Redirect::route('sales.index');
        }

        return Redirect::route('sales.create')
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
        $sale = $this->sale->findOrFail($id);

        return View::make('sales.show', compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $sale = $this->sale->find($id);

        if (is_null($sale))
        {
            return Redirect::route('sales.index');
        }

        return View::make('sales.edit', compact('sale'));
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
        $validation = Validator::make($input, Sale::$rules);

        if ($validation->passes())
        {
            $sale = $this->sale->find($id);
            $sale->update($input);

            return Redirect::route('sales.show', $id);
        }

        return Redirect::route('sales.edit', $id)
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
        $this->sale->find($id)->delete();

        return Redirect::route('sales.index');
    }

}