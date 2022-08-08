<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationsTable extends Migration
{

    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('name', 30);
            $table->string('age', 2);
            $table->foreignId('blood_id')->constrained('bloods')->onDelete('restrict');
            $table->integer('blood_bags');
            $table->float('longitude');
            $table->float('latitude');
            $table->foreignId('city_id')->constrained('cites')->onDelete('cascade');
            $table->string('mobile', 15);
            $table->longText('note')->nullable();
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::drop('donations');
    }
}
