<?php

class Purchasereturn extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'returnDate' => 'required'
	);
}