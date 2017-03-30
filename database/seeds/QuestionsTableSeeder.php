<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Question;
use App\Form;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Question::create(['form_id' => Form::where('name', 'Contact Information')->first()->id, 'question_type_id' => 2, 'name' => 'test', 'text' => 'testing', 'rules' => 'required']);
    }
}
