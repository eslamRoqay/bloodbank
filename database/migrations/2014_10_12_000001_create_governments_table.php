<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGovernmentsTable extends Migration {

    public function up()
    {
        Schema::create('governments', function(Blueprint $table) {
            $table->id();
            $table->string('name_ar', 30);
            $table->string('name_en', 30);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('governments');
    }
}
