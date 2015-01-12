<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAclTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('acl', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('accounts_id')->unsigned();
			$table->foreign('accounts_id')
				->references('id')
				->on('accounts')
				->onDelete('cascade');
			$table->string('permission', 16);	
			$table->string('option', 64)->nullable();	
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('acl');
	}

}
