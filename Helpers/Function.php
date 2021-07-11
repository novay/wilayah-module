<?php 

if(!function_exists('provinsi')) {
    function provinsi() {
        return new \Modules\Wilayah\Entities\Provinsi;
    }
}

if(!function_exists('kota')) {
    function kota() {
        return new \Modules\Wilayah\Entities\Kota;
    }
}

if(!function_exists('kecamatan')) {
    function kecamatan() {
        return new \Modules\Wilayah\Entities\Kecamatan;
    }
}

if(!function_exists('kelurahan')) {
    function kelurahan() {
        return new \Modules\Wilayah\Entities\Kelurahan;
    }
}

if(!function_exists('logo')) {
    function logo($id) {
        if(checkFile("https://cdn.btekno.id/assets/logo/$id.png")):
            $ext = '.png';
        endif;
        if(checkFile("https://cdn.btekno.id/assets/logo/$id.jpg")):
            $ext = '.jpg';
        endif;
        if(checkFile("https://cdn.btekno.id/assets/logo/$id.jpeg")):
            $ext = '.jpeg';
        endif;
        if(checkFile("https://cdn.btekno.id/assets/logo/$id.gif")):
            $ext = '.gif';
        endif;

        return 'https://cdn.btekno.id/assets/logo/' . $id . $ext;
    }
}

if(!function_exists('checkFile')) {
    function checkFile($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);

        curl_setopt($ch, CURLOPT_NOBODY, 1);
        curl_setopt($ch, CURLOPT_FAILONERROR, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($ch);
        curl_close($ch);

        return $result !== FALSE;
    }
}