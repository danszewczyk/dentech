<?php

use Illuminate\Database\Seeder;

class OptionGroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('option_groups')->insert([
        	['name' => 'Yes-No']
        ]);
    }
}
