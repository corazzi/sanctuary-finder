<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanctuariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanctuaries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description');
            $table->string('address');
            $table->string('town');
            $table->string('postcode');
            $table->decimal('lat', 10, 7)->nullable();
            $table->decimal('lng', 10, 7)->nullable();
            $table->json('opening_times')->nullable();
            $table->text('donation_details')->nullable();
            $table->string('contact_information');
            $table->json('social_media');
            $table->boolean('volunteering')->nullable();
            $table->boolean('open_for_intake')->nullable();
            $table->boolean('vegan')->nullable();
            $table->timestamps();
        });
    }
}
