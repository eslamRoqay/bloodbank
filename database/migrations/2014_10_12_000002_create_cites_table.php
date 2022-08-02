<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitesTable extends Migration {

    public function up()
    {
        Schema::create('cites', function(Blueprint $table) {
            $table->id();
            $table->foreignId('government_id')->constrained('governments')->onDelete('restrict');
            $table->timestamps();
            $table->string('name_ar', 30);
            $table->string('name_en', 30);
        });
    }

    public function down()
    {
        Schema::drop('cites');
    }
}
