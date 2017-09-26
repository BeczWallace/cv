<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Section;

class FreelanceSeeder extends Seeder
{

    public function run()
    {
        //DB::table('sections')->delete();

        // FreelanceSeeder
        Section::create(array(
                'user_id' => 1,
                'section_id' => 'callToAction',
                'header' => 'I\'m currently available for freelance work.',
                'sub' => 'HIRE ME'
            ));

    }
}
