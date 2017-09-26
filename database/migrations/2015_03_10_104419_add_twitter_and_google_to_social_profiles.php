<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTwitterAndGoogleToSocialProfiles extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('social_profiles', function (Blueprint $table) {
            $table->string('twitter')->after('instagram')->nullable();
            $table->string('google_plus')->after('instagram')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('social_profiles', function (Blueprint $table) {
            $table->dropColumn('twitter');
            $table->dropColumn('google_plus');
        });
    }
}
