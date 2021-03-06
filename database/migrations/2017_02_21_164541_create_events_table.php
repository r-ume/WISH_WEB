<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	    Schema::create('events', function(Blueprint $table)
      {
          $table->increments('id');
          $table->string('title');
          $table->text('description');
          $table->string('image');
          $table->integer('start_at')->unsigned();
          $table->integer('end_at')->unsigned();
          $table->boolean('isAllDay');
          $table->integer('max_people');
          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
	    Schema::drop('events');
	}

}
