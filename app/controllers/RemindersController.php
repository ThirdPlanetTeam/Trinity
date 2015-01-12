<?php

class RemindersController extends BaseController {

	/**
	 * Display the password reminder view.
	 *
	 * @return Response
	 */
	public function getRemind()
	{
		$this->nest('accounts.password.remind');	
		//return View::make('accounts.password.remind');
	}

	/**
	 * Handle a POST request to remind a user of their password.
	 *
	 * @return Response
	 */
	public function postRemind()
	{
		switch ($response = Password::remind(Input::only('email')))
		{
			case Password::INVALID_USER:
				return Redirect::back()->with('error', Lang::get($response));

			case Password::REMINDER_SENT:
				return Redirect::back()->with('status', Lang::get($response));
		}
	}

	/**
	 * Display the password reset view for the given token.
	 *
	 * @param  string  $token
	 * @return Response
	 */
	public function getReset($token = null)
	{
		if (is_null($token)) App::abort(404);

		JavaScript::addScript('form');

		$this->nest('accounts.password.reset', compact('token'));	
		//return View::make('accounts.password.reset')->with('token', $token);
	}

	/**
	 * Handle a POST request to reset a user's password.
	 *
	 * @return Response
	 */
	public function postReset()
	{
		$credentials = Input::only(
			'email', 'password', 'jscrypt_password', 'password_confirmation', 'jscrypt_password_confirmation', 'token'
		);

		if(!empty($credentials['jscrypt_password'])) {
			$credentials['password'] = $credentials['jscrypt_password'];
			$credentials['password_confirmation'] = $credentials['jscrypt_password_confirmation'];
		}	

		$response = Password::reset($credentials, function($user, $password)
		{
			

			$user->password = $password;
			$user->hash = $password;

			$user->save();

		});

		switch ($response)
		{
			case Password::INVALID_PASSWORD:
			case Password::INVALID_TOKEN:
			case Password::INVALID_USER:
				return Redirect::back()->with('error', Lang::get($response));

			case Password::PASSWORD_RESET:
				return Redirect::to('/');
		}
	}

}
