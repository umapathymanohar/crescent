<?php

class Suppliermaster extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'supplierSTNumber' => 'required'
	);
}