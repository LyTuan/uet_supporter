<?php

use Illuminate\Database\Seeder;

class CateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('uet_category')->insert([
            'name' => 'lich hoc va lich thi',
            'parent_id' => '0',   
        ]);
    }
}
