<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('emails', function(Blueprint $table) {
			$table->increments('id');
			$table->string('hash', 32)->index('IX_Emails_Hash');
			$table->text('to');
			$table->text('title');
			$table->text('message');
			$table->timestamps();
		});
	}
/*
DROP TABLE IF EXISTS `gf_emails`;
CREATE TABLE IF NOT EXISTS `gf_emails` (
`email_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
`email_hash` varchar(32) NOT NULL,
`email_date_send` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
`email_to` text NOT NULL,
`email_title` text NOT NULL,
`email_message` text NOT NULL,
`email_headers` text NOT NULL,
PRIMARY KEY (`email_id`),
KEY `IX_Emails_Hash` (`email_hash`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;
*/
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('emails');
	}

}
