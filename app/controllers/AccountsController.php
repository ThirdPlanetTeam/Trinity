<?php

class AccountsController extends BaseController {

	/*public $rules = [
			'username' => 'required|min:4|max:30|unique:accounts',
			'password' => 'required|min:8|confirmed',
			'email' => 'required|email|max:128|confirmed|unique:accounts'
		];*/

	public function login() {

		JavaScript::addScript('form');
		Css::add('form');

		$this->nest('accounts.login', ['url_redirect' => Session::get('url_redirect')]);
	}

	public function postLogin() {

		$username = mb_strtolower(Input::get('username'));

		$remember = (bool)Input::get('remember-me', false);

		$url_redirect = Input::get('url_redirect');

		$user = Account::where('username', $username)->first();		

		if(is_null($user)) {
			return Redirect::back()->with(['error' => Lang::get('accounts.login.error'), 'url_redirect' => $url_redirect]);
		}

		$password = Input::get('password');
		$jscrypt = Input::get('jscrypt_password');

		if(!empty($jscrypt)) {
			$password = $jscrypt;
		}

		$hash = Account::getHash($password, $user->salt);
		$userhash = $user->getAuthPassword();

		$sess = [];
		$sess['username'] = Session::get('username');
		$sess['hash'] = Session::get('hash');
		$sess['salt'] = Session::get('salt');

		if(Auth::validate(['username' => $username, 'password' => $hash])) {
			// the user exist and has this password
			if (Auth::attempt(['username' => $username, 'password' => $hash, 'validation' => null], $remember))
			{
				$redirect = ($url_redirect == '') ? Redirect::action('HomeController@index') : Redirect::to($url_redirect);

				return $redirect->with(['success' => Lang::get('accounts.login.success')]);
			} else {
				return Redirect::back()->with(['error' => Lang::get('accounts.login.no_active'), 'url_redirect' => $url_redirect]);
			}			
		} else {
			return Redirect::back()->with(['error' => Lang::get('accounts.login.error'), 'url_redirect' => $url_redirect]);
		}

	}

	public function logout() {

		Session::forget('permissions');
		Session::forget('ingame');

		Auth::logout();

		return Redirect::action('HomeController@index');
	}

	public function inscription() {

		JavaScript::addScript('form');

		$account = new Account();
		$this->nest('accounts.inscription', compact('account'));
	}

	public function postInscription() {
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

		$mail = EmailStorage::create([
			'to' => $account->email,
			'title' =>  Lang::get('accounts.welcome_email.subject') 
		]);

		$contentParams = ['username' => $data['username'], 'hash' => $account->validation];
		$contentMsg = Lang::get('accounts.welcome_email.message', $contentParams);

		$mail->message = $contentMsg;

		$mail->save();

		Mail::send([$this->getTheme().'.emails.html', $this->getTheme().'.emails.text'], ['title' => $mail->title, 'content' => $contentMsg, 'hash' => $mail->hash], function($message) use ($account, $mail)
		{
		    $message->to($account->email, $account->username)->subject($mail->title);
		});

		return Redirect::action('HomeController@index', $account->id)
			->with(['success' => Lang::get('accounts.inscription.success', ['email' => $account->email])]);
	}

	/*public function forget() {
		$this->layout->nest('content', 'accounts.forget');		
	}
	public function postForget() {
		$email = Input::get('email');

		$user = Account::where('email', $email)->first();	

		Password::remind(Input::only('email'), function($message)
		{
		    $message->subject('Password Reminder');
		});

	}*/

	public function validation() {
		$this->nest('accounts.validation');	
	}
	public function postValidation() {

		$username = Input::get('username');
		$code = Input::get('code');

		$user = Account::where('username', $username)->first();		

		if(is_null($user)) {
			return Redirect::back()->with(['error' => Lang::get('accounts.validation.error')]);
		}

		if($user->validation == $code && $user->validation != null) {
			$user->validation = null;
			$user->save();

			return Redirect::action('HomeController@index')->with(['success' => Lang::get('accounts.validation.success')]);

		} else {
			return Redirect::back()->with(['error' => Lang::get('accounts.validation.error')]);
		}
	}

}