<?php

class DatabaseTest extends TestCase {

	public function setUp() {
		parent::setUp();
		Artisan::call('migrate');
	}

	public function tearDown() {
		parent::tearDown();
		Artisan::call('migrate:reset');
	}	

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testBasicExample()
	{

		$this->assertNull(Account::find(1));
		$this->assertException(function() { Account::findOrFail(1); });

		$account = Account::create([
			'username' => 'test user', 
			'email' => 'test@email', 
			'hash' => '1234', 
			'validation' => '5678'
		]);

		$this->assertNotNull(Account::find(1));

		$this->assertEquals('test user', Account::find(1)->username);
		$this->assertEquals('test@email', Account::find(1)->email);
		$this->assertNotEquals('1234', Account::find(1)->hash);
		$this->assertNotEmpty(Account::find(1)->salt);

		$hash = Account::getHash('1234', Account::find(1)->salt);

		$this->assertEquals($hash, Account::find(1)->hash);

		$this->assertEquals('5678', Account::find(1)->validation);
	}

}
