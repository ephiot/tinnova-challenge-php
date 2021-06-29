<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('vehicle');
            $table->string('brand');
            $table->integer('year');
            $table->text('description');
            $table->boolean('sold');
            $table->timestamps();
            $table->softDeletes();
        });

        // Because Laravel doesn't support full text search migration
        DB::statement('ALTER TABLE `vehicles` ADD FULLTEXT INDEX vehicle_search_index (vehicle, brand, year, description, sold, created_at)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehicles', function($table) {
            $table->dropIndex('vehicle_search_index');
        });    
        Schema::dropIfExists('vehicles');
    }
}
