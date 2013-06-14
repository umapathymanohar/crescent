<?php

class Saledetail extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'price' => 'required'
	);
}