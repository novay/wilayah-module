<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvinsiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('wilayah.module.table_prefix').'provinsi', function (Blueprint $table) {
            $table->char('id', 2);
            $table->primary('id');

            $table->string('nama', 255);
            $table->text('meta')->nullable();
            
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
        Schema::dropIfExists(config('wilayah.module.table_prefix').'provinsi');
    }
}
