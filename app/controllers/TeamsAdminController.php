<?php

class TeamsAdminController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$teams = Team::paginate(5);
		$this->nest('admin.teams.index', compact('teams'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$team = new Team();
		$this->nest('admin.teams.edit', compact('team'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::only('name', 'description', 'configuration');

		$v = Validator::make($data, Team::$validationRules);
		
		if($v->fails() ) {
			return Redirect::back()->withInput()->withErrors($v->errors());
		} else {

			$team = Team::create($data);
		}

		return Redirect::action('TeamsAdminController@index')->with(['success' => 'super']);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$team = Team::findOrFail($id);

		$this->nest('admin.teams.view', compact('team'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$team = Team::findOrFail($id);
		$this->nest('admin.teams.edit', compact('team'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$team = Team::findOrFail($id);

		$v = Validator::make(Input::only('name', 'description', 'configuration'), Team::$validationRules);

		if($v->fails() ) {
			return Redirect::back()->withInput()->withErrors($v->errors());
		} else {
			$team->update(Input::only('name', 'description', 'configuration'));
		}

		return Redirect::action('TeamsAdminController@show', $team->id)->with(['success' => 'super']);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Team::destroy($id);
		return Response::json(array('id' => $id))->setCallback(Input::get('callback'));
	}


}


function showvar($var) {
	if(is_object($var)) {
		return get_class($var);
	} else {
		return gettype($var);
	}
}