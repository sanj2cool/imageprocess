<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToImageprocessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('imageprocess', function (Blueprint $table) {
            $table->string('status')->default('pending'); // Add the status column with default value
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
            $table->dropColumn('status'); // Remove the status column if the migration is rolled back
        });
    }
}
