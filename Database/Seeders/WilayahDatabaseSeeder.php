<?php

namespace Modules\Wilayah\Database\Seeders;

use Illuminate\Database\Seeder;
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

        $this->call(ProvinsiTableSeeder::class);
        $this->call(KotaTableSeeder::class);
        $this->call(KecamatanTableSeeder::class);
        $this->call(KelurahanTableSeeder::class);
    }

    /**
     * Truncate all tables.
     *
     * @return void
     */
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
