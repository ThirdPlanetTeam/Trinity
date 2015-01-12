<?php

class Acl extends Eloquent {

	protected $table = 'acl';

	protected $guarded = ['id', 'updated_at', 'created_at'];

    public function account()
    {
        return $this->belongsTo('Account',  'accounts_id', 'id');
    }

    public function __call($name, $arguments) {

    	if(preg_match('/is([A-Z][a-z]+)/i', $name, $result)) {

    		$tag = strtolower($result[1]);

		    if (!Auth::check()) {
		        return false;
		    } 

		    if (Session::has('permissions')) {
		        $p = Session::get('permissions');
		    } else {
		    	$p = [];
		    }

		    if (isset($p[$name])) {
		        return $p[$name];
		    }		    

		    $perm = Auth::user()->acl()->where('permission', '=', $tag)->first();

		    if($perm == null) {
		    	$p[$name] = false;
		    	Session::put('permissions', $p);
		        return false;
		    }
		    $p[$name] = true;
			Session::put('permissions', $p);
		    return true;
    	} else {
    		parent::__call($name, $arguments);
    	}

    }
}