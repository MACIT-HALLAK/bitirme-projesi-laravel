<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->integer("pageCount");
            $table->string('coverImage')->nullable();
            $table->string('language');
            $table->string('category');
            $table->string('level');
            $table->text("desc");
            $table->text("content");
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
        Schema::dropIfExists('add_books');
    }
};
