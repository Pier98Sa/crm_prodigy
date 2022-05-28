<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyInformationsFromTypologyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('informations', function (Blueprint $table) {
            $table->unsignedBigInteger('typology_id')->after('user_id')->nullable();
            $table->foreign('typology_id')->references('id')->on('typologies')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('informations', function (Blueprint $table) {
            $table->dropForeign('informations_typology_id_foreign');
            $table->dropColumn('typology_id');
        });
    }
}
