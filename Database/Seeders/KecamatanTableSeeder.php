<?php

namespace Modules\Wilayah\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KecamatanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = \Carbon\Carbon::now();

        $csv = new CsvtoArray();
        $file = __DIR__ . '/../../Resources/assets/csv/kecamatan.csv';

        $header = ['id', 'kota_id', 'nama', 'lat', 'long'];
        $data = $csv->csv_to_array($file, $header);
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
            DB::table('wil_kecamatan')->insert($chunk->toArray());
        endforeach;
    }
}
