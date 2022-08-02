<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodsTable extends Migration {

    public function up()
    {
        Schema::create('bloods', function(Blueprint $table) {
            $table->id();
            $table->string('blood', 3);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('bloods');
    }
}
