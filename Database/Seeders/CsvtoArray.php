<?php 

namespace Modules\Wilayah\Database\Seeders;

class CsvtoArray
{
    public function csv_to_array($filename, $header)
    {
        $delimiter = ',';
        if(!file_exists($filename) || !is_readable($filename)):

            return false;
        endif;

        $data = [];
        if(($handle = fopen($filename, 'r')) !== false):
            while(($row = fgetcsv($handle, 1000, $delimiter)) !== false):
                $data[] = array_combine($header, $row);
            endwhile;

            fclose($handle);
        endif;

        return $data;
    }
}