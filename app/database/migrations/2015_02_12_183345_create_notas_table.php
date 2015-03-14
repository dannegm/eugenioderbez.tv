<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notas', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->string('title', 140);
			$table->integer('cover')->reference('id')->on('pictures');
			$table->integer('author')->reference('id')->on('users');
			$table->integer('category')->reference('id')->on('categories');
			$table->string('description', 512);
			$table->text('content');
			$table->string('tags', 256);
			$table->string('fuente', 256);
			$table->integer('comments');
			$table->integer('views');
			$table->tinyInteger('status');
			$table->integer('likes');
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
		Schema::drop('notas');
	}

}
