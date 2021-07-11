<?php

namespace Modules\Wilayah\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KotaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = \Carbon\Carbon::now();

        $Csv = new CsvtoArray();
        $file = __DIR__ . '/../../Resources/assets/csv/kota.csv';

        $header = ['id', 'provinsi_id', 'nama', 'lat', 'long'];
        $data = $Csv->csv_to_array($file, $header);
        $data = array_map(function ($arr) use ($now) {
            
            $arr['meta'] = json_encode([
                'lat' => $arr['lat'], 
                'long' => $arr['long']
            ]);
            
            unset($arr['lat'], $arr['long']);

            return $arr + ['created_at' => $now, 'updated_at' => $now];

        }, $data);

        $collection = collect($data);
        foreach($collection->chunk(50) as $chunk):
            DB::table(config('wilayah.module.table_prefix').'kota')->insert($chunk->toArray());
        endforeach;
    }
}
