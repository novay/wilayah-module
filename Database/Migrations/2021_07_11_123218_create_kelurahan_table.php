<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKelurahanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wil_kelurahan', function (Blueprint $table) {
            $table->char('id', 10);
            $table->primary('id');

            $table->string('nama', 255);
            $table->text('meta')->nullable();

            $table->char('kecamatan_id', 7);
            $table->foreign('kecamatan_id')
                ->references('id')
                ->on('wil_kecamatan')
                ->onUpdate('cascade')->onDelete('restrict');

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
        Schema::dropIfExists('wil_kelurahan');
    }
}
