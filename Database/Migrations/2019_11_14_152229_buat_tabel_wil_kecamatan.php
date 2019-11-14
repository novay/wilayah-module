<?php

/* 
 * Author : Noviyanto Rahmadi 
 * E-mail : me@novay.web.id
 * Copyright 2018 Borneo Teknomedia 
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelWilKecamatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('wilayah.module.table_prefix').'kecamatan', function (Blueprint $table) 
        {
            $table->char('id', 7);
            $table->primary('id');

            $table->string('nama', 255);
            $table->text('meta')->nullable();

            $table->char('kota_id', 4);
            $table->foreign('kota_id')
                ->references('id')
                ->on(config('wilayah.module.table_prefix').'kota')
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
        Schema::dropIfExists(config('wilayah.module.table_prefix').'kecamatan');
    }
}
