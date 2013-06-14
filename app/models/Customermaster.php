<?php

class Customermaster extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'customerSTNumber' => 'required'
	);
}