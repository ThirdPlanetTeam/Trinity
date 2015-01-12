<?php

Route::resource('admin/teams', 'TeamsAdminController');
Route::resource('admin/games', 'GamesAdminController');

menu_helper("main", function($menu){
	if (Acl::isAdmin()) {
		
	    $menu->admin->add('Equipes', ['route' => 'admin.teams.index']);        
	    $menu->admin->add('Parties', ['route' => 'admin.games.index']);

	}
});