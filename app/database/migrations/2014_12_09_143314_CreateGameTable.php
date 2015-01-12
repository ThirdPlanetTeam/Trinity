<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::create('games', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->enum('status', ['open', 'in progress', 'over']);
			$table->text('configuration');
			$table->timestamps();
		});

		Schema::create('teams', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->text('description');
			$table->text('configuration');			
			$table->timestamps();
		});		

		Schema::table('accounts', function($table)
		{
			$table->integer('current_game')->nullable()->unsigned()->after('username');
			$table->foreign('current_game')
				->references('id')
				->on('games')
				->onDelete('set null');

			$table->integer('current_team')->nullable()->unsigned()->after('current_game');
			$table->foreign('current_team')
				->references('id')
				->on('teams')
				->onDelete('set null');				
		});

		/*
game:
id
name
date_open
status (open, in progress, over)
configuration


account:
current_game (nullable)
current_team (nullable)
		*/
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('accounts', function($table)
		{
			$table->dropForeign('accounts_current_game_foreign');
			$table->dropForeign('accounts_current_team_foreign');

		    $table->dropColumn('current_game');
		    $table->dropColumn('current_team');
		});		

		Schema::drop('games');
		Schema::drop('teams');
	}

}
