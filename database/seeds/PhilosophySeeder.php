<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Section;

class PhilosophySeeder extends Seeder
{

    public function run()
    {
        //DB::table('sections')->delete();

        // PhilosophySeeder
        Section::create(array(
                'user_id' => 1,
                'section_id' => 'philosophy',
                'header' => 'Alex\'s Philosophy',
                'sub' => ''
            ));

    }
}
