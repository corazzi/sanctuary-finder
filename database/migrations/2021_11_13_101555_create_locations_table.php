<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('centre_id');
            $table->string('address_line_1');
            $table->string('address_line_2')->nullable();
            $table->string('postcode', 8);
            $table->decimal('latitude', 9, 6);
            $table->decimal('longitude', 9, 6);
            $table->string('town');
            $table->boolean('hide_address')->default(0);
            $table->string('telephone')->nullable();
            $table->text('opening_times_info')->nullable();
            $table->json('opening_times')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('centre_id')
                ->references('id')
                ->on('centres')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
