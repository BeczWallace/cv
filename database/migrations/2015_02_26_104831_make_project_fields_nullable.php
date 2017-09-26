<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeProjectFieldsNullable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->date('date_start')->nullablle()->change();
            $table->date('date_end')->nullablle()->change();
            $table->text('img1')->nullablle()->change();
            $table->text('img2')->nullablle()->change();
            $table->text('img3')->nullablle()->change();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->date('date_start')->change();
            $table->date('date_end')->change();
            $table->text('img1')->change();
            $table->text('img2')->change();
            $table->text('img3')->change();
        });
    }
}
