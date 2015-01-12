<?php

class AclAdminController extends Controller {

	public function perm($account, $id) {

		$acl = Acl::findOrFail($id);
		return View::make($this->getTheme().'.admin.accounts.editperm')->with('perm', $acl);
		//$this->layout->nest('content', 'admin.accounts.editperm', ['perm' => 'acl']);
	}

	public function newPerm() {
		$acl = new Acl();

		//$acl = 

		$this->nest('admin.accounts.edit', compact('account'));		
	}

	public function postPerm($account, $id) {
		$acl = Acl::findOrFail($id);

		$data = Input::only('permission', 'option');

		if($data['option'] == '') {
			$data['option'] = null;
		}

		$acl->update($data);

		return Redirect::back()->with(['success' => 'ça a marché']);
	}	

	public function deletePerm($account, $id) {
		Acl::destroy($id);
		return Response::json(array('id' => $id))->setCallback(Input::get('callback'));
	}
}