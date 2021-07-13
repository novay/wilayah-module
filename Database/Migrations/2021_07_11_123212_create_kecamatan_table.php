<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKecamatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wil_kecamatan', function (Blueprint $table) {
            $table->char('id', 7);
            $table->primary('id');

            $table->string('nama', 255);
            $table->text('meta')->nullable();

            $table->char('kota_id', 4);
            $table->foreign('kota_id')
                ->references('id')
                ->on('wil_kota')
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
        Schema::dropIfExists('wil_kecamatan');
    }
}
