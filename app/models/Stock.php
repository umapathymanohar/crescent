<?php

class Stock extends Eloquent {
    protected $guarded = array();

    public static $rules = array(
		'date' => 'required'
	);
}