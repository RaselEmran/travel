<?php

use App\Admin;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		Admin::create([
			'name' => 'Admin',
			'email' => 'admin@admin.com',
			'password' => bcrypt('123456'),
		]);
	}
}
