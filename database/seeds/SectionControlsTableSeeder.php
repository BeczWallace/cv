<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\SectionControls;

class SectionControlsTableSeeder extends Seeder
{

    public function run()
    {
        //DB::table('skills')->delete();

        // SectionControlsTableSeeder
        SectionControls::create(array(
                'user_id' => 1,
                'section' => 'offers',
                'enabled' => true
            ));

        SectionControls::create(array(
                'user_id' => 1,
                'section' => 'clients',
                'enabled' => true
            ));

        SectionControls::create(array(
                'user_id' => 1,
                'section' => 'education',
                'enabled' => true
            ));

        SectionControls::create(array(
                'user_id' => 1,
                'section' => 'work',
                'enabled' => true
            ));

        SectionControls::create(array(
                'user_id' => 1,
                'section' => 'projects',
                'enabled' => true
            ));

        SectionControls::create(array(
                'user_id' => 1,
                'section' => 'project-categories',
                'enabled' => true
            ));

        SectionControls::create(array(
                'user_id' => 1,
                'section' => 'testimonials',
                'enabled' => true
            ));

        SectionControls::create(array(
                'user_id' => 1,
                'section' => 'awards',
                'enabled' => true
            ));

    }
}
