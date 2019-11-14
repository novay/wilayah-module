<?php

/* 
 * Author : Noviyanto Rahmadi 
 * E-mail : me@novay.web.id
 * Copyright 2018 Borneo Teknomedia 
 */

namespace Modules\Wilayah\Entities;

use Modules\Wilayah\Entities\Model;

class Kecamatan extends Model
{
    protected $table_prefix;

    protected $table = 'kecamatan';

    protected $casts = [
        'meta' => 'array',
    ];

    public $timestamps = false;
    
    public function kota()
    {
        return $this->belongsTo('Modules\Wilayah\Entities\Kota', 'kota_id');
    }

    public function kelurahan()
    {
        return $this->hasMany('Modules\Wilayah\Entities\Kelurahan', 'kecamatan_id');
    }

    public function getNamaKotaAttribute()
    {
        return $this->kota->nama;
    }

    public function getNamaProvinsiAttribute()
    {
        return $this->kota->provinsi->nama;
    }
}
