<?php

use Illuminate\Database\Seeder;

class OptionChoicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('option_choices')->insert([
        	['name' => 'Yes', 'option_group_id' => 1],
        	['name' => 'No', 'option_group_id' => 1]
        ]);
    }
}
