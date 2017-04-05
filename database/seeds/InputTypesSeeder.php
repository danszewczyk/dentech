<?php

use Illuminate\Database\Seeder;

class InputTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('input_types')->insert([
            ['name' => 'text'],
            ['name' => 'checkbox'],
            ['name' => 'select'],
            ['name' => 'radio'],
            ['name' => 'select-multiple'],
            ['name' => 'text-long']
        ]);
    }
}
