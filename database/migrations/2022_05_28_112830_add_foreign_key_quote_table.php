<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyQuoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Quotes', function (Blueprint $table) {
            $table->unsignedBigInteger('client_id')->nullable()->after('price');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Quotes', function (Blueprint $table) {
            $table->dropForeign('quotes_client_id_foreign');
            $table->dropColumn('client_id');
        });
    }
}
