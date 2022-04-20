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
            $table->string('year');
            $table->text('description');
            $table->boolean('sold');
            $table->timestamps();
            $table->softDeletes();
        });

        if (env('DB_CONNECTION') === 'mysql') {
            // Because Laravel doesn't support full text search migration
            DB::statement('ALTER TABLE `vehicles` ADD FULLTEXT INDEX vehicle_search_index (vehicle, brand, year, description)');
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (env('DB_CONNECTION') === 'mysql') {
            Schema::table('vehicles', function ($table) {
                $table->dropIndex('vehicle_search_index');
            });
        }
        Schema::dropIfExists('vehicles');
    }
}
