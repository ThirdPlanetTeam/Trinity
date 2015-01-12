<?php

class EmailStorage extends Eloquent {

	protected $table = 'emails';

	protected $guarded = ['id', 'updated_at', 'created_at'];	

	public function __construct(array $attributes = array())
	{
	    $this->setRawAttributes(array(
	      'hash' => md5(uniqid(rand(), true)),
	      'message' => ' '
	    ), true);
	    parent::__construct($attributes);
	}
}