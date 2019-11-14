<?php

/* 
 * Author : Noviyanto Rahmadi 
 * E-mail : me@novay.web.id
 * Copyright 2018 Borneo Teknomedia 
 */

namespace Modules\Wilayah\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

use Modules\Wilayah\Entities\Kota;
use Modules\Wilayah\Entities\Kecamatan;
use Modules\Wilayah\Entities\Kelurahan;
use Modules\Wilayah\Entities\Provinsi;

class WilayahDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->reset();

        $this->call(FillProvinsiTableSeeder::class);
        $this->call(FillKotaTableSeeder::class);
        $this->call(FillKecamatanTableSeeder::class);
        $this->call(FillKelurahanTableSeeder::class);
    }

    public function reset()
    {
        Schema::disableForeignKeyConstraints();

        Kelurahan::truncate();
        Kecamatan::truncate();
        Kota::truncate();
        Provinsi::truncate();

        Schema::disableForeignKeyConstraints();
    }
}
