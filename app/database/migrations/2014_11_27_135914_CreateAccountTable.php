<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('accounts', function(Blueprint $table) {
			$table->increments('id');
			$table->string('username', 30)->unique('UU_Accounts_Username');
			$table->string('hash', 128);
			$table->string('salt', 32);
			$table->string('email', 128)->unique('UU_Accounts_Email');
			$table->string('validation', 32)->nullable();
			$table->string('cookie', 32)->nullable()->index('IX_Accounts_Cookie');
			$table->rememberToken();
			$table->timestamps();
		});
/*
CREATE TABLE IF NOT EXISTS `gf_users` (
  `user_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_username` varchar(30) NOT NULL,
  `user_hash` varchar(128) NOT NULL COMMENT 'Hash with Sha512',
  `user_salt` varchar(32) NOT NULL,
  `user_email` varchar(255) NOT NULL COMMENT '[64][@][190]',
  `user_datecreation` datetime NOT NULL,
  `user_validationcode` varchar(32) DEFAULT NULL COMMENT 'Validation code (md5)',
  `user_cookie_id` varchar(32) DEFAULT NULL COMMENT 'Cookie id (md5)',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `UU_Users_Username` (`user_username`),
  UNIQUE KEY `UU_Users_Email` (`user_email`),
  KEY `IX_Users_Cookie_Id` (`user_cookie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 
*/
		/*for ($i=0; $i < 10; $i++) { 
			Post::create([
				'name' => "test-$i",
				'slug' => "test-$i",
				'content' => 'lorem ipsum'
				]);
		}*/


	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('accounts');
	}

}
