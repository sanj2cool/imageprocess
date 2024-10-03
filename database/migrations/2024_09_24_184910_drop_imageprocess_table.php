<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropImageprocessTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('imageprocess');
    }

    public function down()
    {
        // You can create the table again in case you need to roll back the migration.
        Schema::create('imageprocess', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('sno');
            $table->string('google_img');
            $table->string('input');
            $table->string('label_person');
            $table->date('update_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->integer('total_time');
            $table->string('ready_qa')->default('No');
            $table->string('blurred')->default('No');
            $table->string('pixelation')->default('No');
            $table->string('washed_out_images')->default('No');
            $table->string('too_dark')->default('No');
            $table->string('flash_reflection_on_skin')->default('No');
            $table->string('flash_reflection_on_lenses')->default('No');
            $table->string('inkmarked_creased')->default('No');
            $table->string('front_view')->default('No');
            $table->string('side_view')->default('No');
            $table->string('varied_background')->default('No');
            $table->string('photo_of_people')->default('No');
            $table->string('not_photo_of_people')->default('No');
            $table->string('dark_glasses')->default('No');
            $table->string('frames_covering_eyes')->default('No');
            $table->string('frames_too_heavy')->default('No');
            $table->string('hair_across_eyes')->default('No');
            $table->string('wearing_hat_cap')->default('No');
            $table->string('veil_scarf_over_face')->default('No');
            $table->string('shadow_behind_the_head_portrait')->default('No');
            $table->string('eyes_closed')->default('No');
            $table->string('looking_away')->default('No');
            $table->string('mouth_open')->default('No');
            $table->string('red_eyes')->default('No');
            $table->string('unnatural_skintone')->default('No');
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }
}
