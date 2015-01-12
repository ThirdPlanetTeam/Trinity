<?php

class HomeController extends BaseController {

	public function index() {
		$this->nest('home');
	}

	public function play() {
		return Redirect::action('HomeController@index')->with(['status' => 'play']);
	}

	public function join() {
		return Redirect::action('HomeController@index')->with(['status' => 'join']);
	}

	public function showemail($hash) {
		$mail = EmailStorage::where('hash', $hash)->firstOrFail();
		return View::make($this->getTheme().'.emails.html', ['title' => $mail->title, 'hash' => $mail->hash, 'content' => $mail->message]);
	}
}