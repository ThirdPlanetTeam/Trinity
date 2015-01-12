<?php

class AccountsAdminController extends BaseController {

	public function index() {
		$accounts = Account::paginate(5);
		$this->nest('admin.accounts.index', compact('accounts'));
	}

	public function create() {

		JavaScript::addScript('form');

		$account = new Account();
		$this->nest('admin.accounts.edit', compact('account'));
	}

	public function store() {

		$data = Input::all();

		$jscrypt = $data['jscrypt_password'];
		$jscrypt_password_confirmation = $data['jscrypt_password_confirmation'];

		if(!empty($jscrypt)) {
			$data['password'] = $jscrypt;
			$data['password_confirmation'] = $jscrypt_password_confirmation;
		}		

   		$data['validation'] = md5(uniqid(rand(), true));

		$v = Validator::make($data, Account::$validationRules);
		
		if($v->fails() ) {
			return Redirect::back()->withInput()->withErrors($v->errors());
		} else {

			$data['hash'] = $data['password'];

			$account = Account::create($data);
		}

		return Redirect::action('AccountsAdminController@edit', $account->id)
			->with(['success' => 'super']);
	}

	public function show($id) {
		$account = Account::findOrFail($id);

		$this->nest('admin.accounts.view', compact('account'));
	}	

	public function edit($id) {
		JavaScript::addScript('form');
		$account = Account::findOrFail($id);
		$this->nest('admin.accounts.edit', compact('account'));
	}

	public function update($id) {
		$account = Account::findOrFail($id);

		$v = Validator::make(Input::all(), Account::$validationRules);

		if($v->fails() ) {
			return Redirect::back()->withInput()->withErrors($v->errors());
		} else {
			$account->update(Input::all());
		}

		return Redirect::back()->with(['success' => 'ça a marché']);
	}	

	public function destroy($id) {
		Account::destroy($id);
		return Response::json(array('id' => $id))->setCallback(Input::get('callback'));
	}

/* 
ACL
*/

}