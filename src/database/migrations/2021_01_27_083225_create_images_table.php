<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id');
            $table->string('file_name', 100);
            $table->string('file_path', 200);
            $table->timestamps();
            $table->foreign('post_id')->references('id')->on('posts');
        });
	if (Schema::hasTable('images')) {
	   // 
	}

	if (Schema::hasColumn('file_name', 'file_path')) {
	   // 
	}
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
