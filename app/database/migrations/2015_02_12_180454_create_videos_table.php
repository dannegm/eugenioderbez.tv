<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('videos', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->string('title', 256);
			$table->string('subtitle', 256);
			$table->text('credits');
			$table->char('carnal', 12);
			$table->string('tags', 256);
			$table->char('pic', 12)->references('id')->on('pictures');
			$table->char('youtube', 32);
			$table->char('video', 0);
			$table->integer('author')->references('id')->on('authors');
			$table->integer('category')->references('id')->on('categories');
			$table->tinyInteger('status');
			$table->integer('likes');
			$table->integer('comments');
			$table->integer('views');
			$table->integer('highlight');
			$table->char('type', 7);
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
		Schema::drop('videos');
	}

}
