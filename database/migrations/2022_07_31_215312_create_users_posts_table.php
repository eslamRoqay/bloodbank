<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersPostsTable extends Migration {

	public function up()
	{
		Schema::create('users_posts', function(Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('post_id')->constrained('posts')->onDelete('cascade');
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('users_posts');
	}
}
