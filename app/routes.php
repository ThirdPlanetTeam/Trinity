<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*****************
 *  Web resources
 *****************/
JavaScript::addScript('main');
Css::add('libs/bootstrap');
Css::add('template');
Css::add('style');

/*****************
 *  Theme
 *****************/
if (file_exists($theme_routes = base_path().'/public/themes/'.Config::get('game.theme').'/routes.php'))
{
    include $theme_routes;
}

/*****************
 * REST-o-routes
 *****************/

Route::resource('admin/accounts', 'AccountsAdminController');


/*****************
 * Admin routes
 *****************/

Route::get('admin/accounts/{accounts}/permission/{id}', ['uses' => 'AclAdminController@perm', 'as' => 'admin.accounts.perm.edit']);
Route::post('admin/accounts/{accounts}/permission/{id}', ['uses' => 'AclAdminController@postPerm']);
Route::delete('admin/accounts/{accounts}/permission/{id}', ['uses' => 'AclAdminController@deletePerm', 'as' => 'admin.accounts.perm.destroy']);

Route::resource('admin/emails', 'EMailsController', ['only' => ['index', 'show']]);

/*************************
 * No game-related routes
 *************************/

Route::get('/', ['uses' => 'HomeController@index']);
Route::get('/join', ['uses' => 'HomeController@join', 'before' => 'notingame']);
Route::get('/play', ['uses' => 'HomeController@play', 'before' => 'ingame']);


Route::get('/login', ['uses' => 'AccountsController@login', 'as' => 'accounts.login']);
Route::post('/login', ['uses' => 'AccountsController@postLogin']);

Route::controller('/login/forget', 'RemindersController', ['getRemind' => 'accounts.forget', 'getReset' => 'accounts.pwdreset']);

Route::get('/logout', ['uses' => 'AccountsController@logout', 'as' => 'accounts.logout', 'before' => 'logged']);

Route::get('/inscription', ['uses' => 'AccountsController@inscription', 'as' => 'accounts.inscription']);
Route::post('/inscription', ['uses' => 'AccountsController@postInscription', 'as' => 'accounts.store']);

Route::get('/inscription/validation', ['uses' => 'AccountsController@validation', 'as' => 'accounts.validation']);
Route::post('/inscription/validation', ['uses' => 'AccountsController@postValidation']);

Route::get('email/{id}', ['uses' => 'HomeController@showemail', 'as' => 'home.email']);

/*****************
 * Menu
 *****************/

menu_helper('main', function($menu){

  $menu->add('Accueil');

  if (Acl::isAdmin()) {
        $menu->add('Admin');

        $menu->admin->add('Comptes', ['route' => 'admin.accounts.index']);
        $menu->admin->add('EMails',  ['route' => 'admin.emails.index']);

    }

});

if (Auth::check())
{
    menu_helper('loginNav', function($menu){

    $user = Auth::user()->username;
    $usergrp = strtolower($user);

    $menu->add($user);

    $menu->$usergrp->add(Lang::get('accounts.manage.title'), '#');
    $menu->$usergrp->add(Lang::get('accounts.login.logout'), ['route' => 'accounts.logout']);
    });
} else {
	menu_helper('loginNav', function($menu){
    $menu->add(Lang::get('accounts.login.title'), ['route' => 'accounts.login']);
		$menu->add(Lang::get('accounts.inscription.title'), ['route' => 'accounts.inscription']);
	});
}

require_once app_path().'/game.php';
