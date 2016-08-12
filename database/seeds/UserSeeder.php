<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('uet_users')->insert([
            'name' => 'admin',
            'email' => 'hello@gmail.com',
            'password' => bcrypt('12345'),
            'level'=>'1',
        ]);
    }
}
