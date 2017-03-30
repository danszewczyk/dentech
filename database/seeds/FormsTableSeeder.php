<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Form;

class FormsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Form::create(['name' => 'Medical History', 'slug' => str_slug('Medical History')]);
        Form::create(['name' =>'Contact Information', 'slug' => str_slug('Contact Information')]);

        Model::reguard();

    }
}
