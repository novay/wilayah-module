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
        if(file_exists(public_path("logo/$id.png"))):
            $ext = '.png';
        endif;
        if(file_exists(public_path("logo/$id.jpg"))):
            $ext = '.jpg';
        endif;
        if(file_exists(public_path("logo/$id.jpeg"))):
            $ext = '.jpeg';
        endif;
        if(file_exists(public_path("logo/$id.gif"))):
            $ext = '.gif';
        endif;

        return asset('logo/' . $id . $ext);
    }
}