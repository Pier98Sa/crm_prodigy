<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('business_name', 255);
            $table->string('address', 200);
            $table->string('city', 100);
            $table->string('postal_code', 5);
            $table->string('email', 255);
            $table->string('phone_number', 15);
            $table->string('vat_number', 11);
            $table->string('iban', 27);
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
        Schema::dropIfExists('clients');
    }
}
