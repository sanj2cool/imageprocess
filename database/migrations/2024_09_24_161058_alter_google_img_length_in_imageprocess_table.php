<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterGoogleImgLengthInImageprocessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('imageprocess', function (Blueprint $table) {
            // Increase google_img length to 1000 characters
            $table->string('google_img', 2000)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('imageprocess', function (Blueprint $table) {
            // Revert google_img length back to 255 characters
            $table->string('google_img', 255)->change();
        });
    }
}
