<?php

namespace Modules\Wilayah\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class KelurahanTableSeeder extends Seeder
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
        $resourceFiles = File::allFiles(__DIR__.'/../../Resources/assets/csv/kelurahan');
        foreach($resourceFiles as $file):

            $header = ['id', 'kecamatan_id', 'nama', 'lat', 'long'];
            $data = $csv->csv_to_array($file->getRealPath(), $header);
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
                DB::table('wil_kelurahan')->insert($chunk->toArray());
            endforeach;
        endforeach;
    }
}
