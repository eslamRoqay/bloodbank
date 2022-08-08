<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_id')->constrained('cites');
             $table->foreignId('blood_id')->constrained('bloods');
            $table->string('fcm_token')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->date('date_of_birth');
            $table->string('phone')->unique();
            $table->string('image')->default('uploads/users/default.png');
            $table->tinyInteger('status')->default('1');
            $table->string('reset_password_code')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
