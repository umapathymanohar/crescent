<?php

class Salereturn extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'returnDate' => 'required'
	);
}