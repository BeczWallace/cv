<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        Model::unguard();

        $this->call('UserTableSeeder');
        $this->command->info('User table seeded!');

        $this->call('OfferTableSeeder');
        $this->command->info('Offer table seeded!');

        $this->call('ClientTableSeeder');
        $this->command->info('Client table seeded!');

        $this->call('EducationTableSeeder');
        $this->command->info('Education table seeded!');

        $this->call('WorkTableSeeder');
        $this->command->info('Work table seeded!');

        $this->call('SocialProfileTableSeeder');
        $this->command->info('SocialProfile table seeded!');

        $this->call('CategoryTableSeeder');
        $this->command->info('Category table seeded!');

        $this->call('SkillTableSeeder');
        $this->command->info('Skill table seeded!');

        $this->call('ProjectTableSeeder');
        $this->command->info('Project table seeded!');

        $this->call('TestimonialTableSeeder');
        $this->command->info('Testimonial table seeded!');

        $this->call('AwardTableSeeder');
        $this->command->info('Award table seeded!');

        $this->call('SectionTableSeeder');
        $this->command->info('Section table seeded!');

        $this->call('CoverTableSeeder');
        $this->command->info('Cover table seeded!');

        $this->call('IconTableSeeder');
        $this->command->info('Icon table seeded!');

        $this->call('SectionControlsTableSeeder');
        $this->command->info('SectionControls table seeded!');

        $this->call('PhilosophySeeder');
        $this->command->info('Philosophy seeded!');

        $this->call('FreelanceSeeder');
        $this->command->info('Freelance seeded!');
    }
}
