<?php

class PurchasesController extends BaseController {

    /**
     * Purchase Repository
     *
     * @var Purchase
     */
    protected $purchase;

    public function __construct(Purchase $purchase)
    {
        $this->purchase = $purchase;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $purchases = $this->purchase->all();

        return View::make('purchases.index', compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('purchases.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Purchase::$rules);

        if ($validation->passes())
        {
            $this->purchase->create($input);

            return Redirect::route('purchases.index');
        }

        return Redirect::route('purchases.create')
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
        $purchase = $this->purchase->findOrFail($id);

        return View::make('purchases.show', compact('purchase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $purchase = $this->purchase->find($id);

        if (is_null($purchase))
        {
            return Redirect::route('purchases.index');
        }

        return View::make('purchases.edit', compact('purchase'));
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
        $validation = Validator::make($input, Purchase::$rules);

        if ($validation->passes())
        {
            $purchase = $this->purchase->find($id);
            $purchase->update($input);

            return Redirect::route('purchases.show', $id);
        }

        return Redirect::route('purchases.edit', $id)
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
        $this->purchase->find($id)->delete();

        return Redirect::route('purchases.index');
    }

}