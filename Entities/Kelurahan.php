<?php

/* 
 * Author : Noviyanto Rahmadi 
 * E-mail : me@novay.web.id
 * Copyright 2018 Borneo Teknomedia 
 */

namespace Modules\Wilayah\Entities;

use Modules\Wilayah\Entities\Model;

class Kelurahan extends Model
{
    protected $table = 'kelurahan';

    protected $casts = [
        'meta' => 'array',
    ];

    public $timestamps = false;
    
    public function kecamatan()
    {
        return $this->belongsTo('Modules\Wilayah\Entities\Kecamatan', 'kecamatan_id');
    }

    public function getNamaKecamatanAttribute()
    {
        return $this->kecamatan->nama;
    }

    public function getNamaKotaAttribute()
    {
        return $this->kecamatan->kota->nama;
    }

    public function getNamaProvinsiAttribute()
    {
        return $this->kecamatan->kota->provinsi->nama;
    }
}
