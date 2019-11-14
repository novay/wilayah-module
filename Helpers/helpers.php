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