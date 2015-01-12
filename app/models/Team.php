<?php

class Team extends Eloquent {

	protected $table = 'teams';

	protected $guarded = ['id', 'updated_at', 'created_at'];

	public static $validationRules = [
		'name' => 'required|min:4|max:30'
	];	

    public function account()
    {
        return $this->hasMany('Account',  'current_team', 'id');
      //return $this->hasMany('Acl', 'accounts_id', 'id');
    }
}