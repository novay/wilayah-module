<?php

/* 
 * Author : Noviyanto Rahmadi 
 * E-mail : me@novay.web.id
 * Copyright 2018 Borneo Teknomedia 
 */

namespace Modules\Wilayah\Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class FillKelurahanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        $csv = new CsvtoArray();
        $resourceFiles = File::allFiles(__DIR__.'/../../Resources/csv/kelurahan');
        foreach ($resourceFiles as $file) {
            $header = ['id', 'kecamatan_id', 'nama', 'lat', 'long'];
            $data = $csv->csv_to_array($file->getRealPath(), $header);
            $data = array_map(function ($arr) use ($now) {
                $arr['meta'] = json_encode(['lat' => $arr['lat'], 'long' => $arr['long']]);
                unset($arr['lat'], $arr['long']);
                return $arr + ['created_at' => $now, 'updated_at' => $now];
            }, $data);
            $collection = collect($data);
            foreach ($collection->chunk(50) as $chunk) {
                DB::table(config('wilayah.module.table_prefix').'kelurahan')->insert($chunk->toArray());
            }
        }
    }
}
