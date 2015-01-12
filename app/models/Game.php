<?php

class Game extends Eloquent {

	protected $table = 'games';

	protected $guarded = ['id', 'updated_at', 'created_at'];

    public function account()
    {
        return $this->hasMany('Account',  'current_game', 'id');
    }
}