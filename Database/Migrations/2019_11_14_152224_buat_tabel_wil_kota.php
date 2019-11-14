<?php

/* 
 * Author : Noviyanto Rahmadi 
 * E-mail : me@novay.web.id
 * Copyright 2018 Borneo Teknomedia 
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelWilKota extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('wilayah.module.table_prefix').'kota', function (Blueprint $table) 
        {
            $table->char('id', 4);
            $table->primary('id');

            $table->string('nama', 255);
            $table->text('meta')->nullable();

            $table->char('provinsi_id', 2);
            $table->foreign('provinsi_id')
                ->references('id')
                ->on(config('wilayah.module.table_prefix').'provinsi')
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
        Schema::dropIfExists(config('wilayah.module.table_prefix').'kota');
    }
}
