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
        Schema::table('imageprocess', function (Blueprint $table) {
            $table->string('qa_person')->nullable();
            $table->date('qa_update_date')->nullable();
            $table->time('qa_start_time')->nullable();
            $table->time('qa_end_time')->nullable();
            $table->integer('qa_total_time')->nullable();
            $table->string('not_humen')->default('No');
            $table->string('no_face')->default('No');
            $table->string('not_portrait')->default('No');
            $table->string('black_white')->default('No');
            $table->string('unvaried_background')->default('No');
            $table->string('background_plain')->default('No');
            $table->string('multiple_people')->default('No');
            $table->string('image_blank')->default('No');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('imageprocess', function (Blueprint $table) {
            //
        });
    }
};
