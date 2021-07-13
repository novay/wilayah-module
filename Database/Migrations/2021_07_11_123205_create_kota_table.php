<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wil_kota', function (Blueprint $table) {
            $table->char('id', 4);
            $table->primary('id');

            $table->string('nama', 255);
            $table->text('meta')->nullable();

            $table->char('provinsi_id', 2);
            $table->foreign('provinsi_id')
                ->references('id')
                ->on('wil_provinsi')
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
        Schema::dropIfExists('wil_kota');
    }
}
