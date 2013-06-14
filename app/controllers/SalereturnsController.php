<?php

class SalereturnsController extends BaseController {

    /**
     * Salereturn Repository
     *
     * @var Salereturn
     */
    protected $salereturn;

    public function __construct(Salereturn $salereturn)
    {
        $this->salereturn = $salereturn;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $salereturns = $this->salereturn->all();

        return View::make('salereturns.index', compact('salereturns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('salereturns.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Salereturn::$rules);

        if ($validation->passes())
        {
            $this->salereturn->create($input);

            return Redirect::route('salereturns.index');
        }

        return Redirect::route('salereturns.create')
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
        $salereturn = $this->salereturn->findOrFail($id);

        return View::make('salereturns.show', compact('salereturn'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $salereturn = $this->salereturn->find($id);

        if (is_null($salereturn))
        {
            return Redirect::route('salereturns.index');
        }

        return View::make('salereturns.edit', compact('salereturn'));
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
        $validation = Validator::make($input, Salereturn::$rules);

        if ($validation->passes())
        {
            $salereturn = $this->salereturn->find($id);
            $salereturn->update($input);

            return Redirect::route('salereturns.show', $id);
        }

        return Redirect::route('salereturns.edit', $id)
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
        $this->salereturn->find($id)->delete();

        return Redirect::route('salereturns.index');
    }

}