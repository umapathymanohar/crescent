<?php

class Purchasedetail extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'price' => 'required'
	);
}