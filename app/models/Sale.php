<?php

class Sale extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'saleTotalprice' => 'required'
	);
}