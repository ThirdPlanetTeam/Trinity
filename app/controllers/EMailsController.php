<?php

class EMailsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$emails = EmailStorage::paginate(5);
		$this->nest('admin.emails.index', compact('emails'));
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$email = EmailStorage::findOrFail($id);
		$this->nest('admin.emails.view', compact('email'));
	}


}
