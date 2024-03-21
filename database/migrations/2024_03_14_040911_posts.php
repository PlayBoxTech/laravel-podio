<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug', 191)->unique();
            $table->unsignedBigInteger('author_id'); // Define author_id as unsigned integer
            $table->longtext('body');
            $table->timestamps();   // Creates both created_at and updated_at
            //$table->timestamps('updated_at')->nullable();
            $table->boolean('published')->default(true);    // defaults to published
            $table->boolean('post')->default(false);    // defaults to post
            $table->string('mp3url', 100)->nullable()->default(''); // URL to MP3 file
            $table->double('mp3duration', 15, 8)->nullable()->default(0); // duration of MP3 file
            $table->foreign('author_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
