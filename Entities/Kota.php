<?php

/* 
 * Author : Noviyanto Rahmadi 
 * E-mail : me@novay.web.id
 * Copyright 2018 Borneo Teknomedia 
 */

namespace Modules\Wilayah\Entities;

use Modules\Wilayah\Entities\Model;

class Kota extends Model
{
    protected $table = 'kota';

    protected $casts = [
        'meta' => 'array',
    ];

    public $timestamps = false;
    
    public function provinsi()
    {
        return $this->belongsTo('Modules\Wilayah\Entities\Provinsi', 'provinsi_id');
    }

    public function kecamatan()
    {
        return $this->hasMany('Modules\Wilayah\Entities\Kecamatan', 'kota_id');
    }

    public function kelurahan()
    {
        return $this->hasManyThrough('Modules\Wilayah\Entities\Kelurahan', 'Modules\Wilayah\Entities\Kecamatan');
    }

    public function getNamaProvinsiAttribute()
    {
        return $this->provinsi->nama;
    }

    public function getLogoPathAttribute()
    {
        $folder = 'assets/indonesia-logo/';
        $id = $this->getAttributeValue('id');

        $arr_glob = glob(public_path().'/'.$folder.$id.'.*');
        if (count($arr_glob) == 1) {
            $logo_name = basename($arr_glob[0]);
            $logo_path = url($folder.$logo_name);
            return $logo_path;
        }
    }
}
