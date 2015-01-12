<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Account extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $fillable = ['username', 'email', 'hash', 'validation'];

	protected $hidden = ['hash', 'salt', 'validation', 'cookie'];

	public static $validationRules = [
		'username' => 'required|min:4|max:30|unique:accounts',
		'password' => 'required|min:8|confirmed',
		'email' => 'required|email|max:128|confirmed|unique:accounts'
	];

	public function getPasswordAttribute() {
		return $this->hash;
	}

	public function setHashAttribute($pwd) {

		if(!isset($this->attributes['salt'])) {
			$this->attributes['salt'] = md5(uniqid(rand(), true));
		}

		$salt = $this->attributes['salt'];

		$hash = self::getHash($pwd, $salt);

		Session::put('username', $this->attributes['username']);
		Session::put('salt', $salt);		
		Session::put('hash', $hash);		

		$this->attributes['hash'] = $hash;
	}

	public function setPasswordAttribute($pwd) {
		$this->setHashAttribute($pwd);
	}

	public static function getHash($pwd, $salt) {
		return explode('$', crypt($pwd, '$6$rounds=5000$'.$salt.'$'))[4];
	}

	public function getAuthPassword() {
	    return Hash::make($this->password);
	}

    public function acl()
    {
        return $this->hasMany('Acl', 'accounts_id', 'id');
    }	

    public function game()
    {
    	return $this->belongsTo('Game', 'current_game', 'id');
    }

    public function team()
    {
    	return $this->belongsTo('Team', 'current_team', 'id');
    }    

    public static function isInGame() 
    {

		    if (!Auth::check()) {
		        return false;
		    } 

		    if (Session::has('ingame')) {
		        return Session::get('ingame');
		    }
	    

		    $game = Auth::user()->game();

		    if($game == null) {
		    	Session::put('ingame', false);
		        return false;
		    }
			Session::put('ingame', true);
		    return true;
    }

}
