<?php

class Purchasereturndetail extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'defectiveNumber' => 'required'
	);
}