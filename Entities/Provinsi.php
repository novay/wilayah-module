<?php

/* 
 * Author : Noviyanto Rahmadi 
 * E-mail : me@novay.web.id
 * Copyright 2018 Borneo Teknomedia 
 */

namespace Modules\Wilayah\Entities;

use Modules\Wilayah\Entities\Model;

class Provinsi extends Model
{
	protected $table = 'provinsi';

	protected $casts = [
        'meta' => 'array',
    ];

    public $timestamps = false;

    protected $fillable = [];

    public function kota()
    {
        return $this->hasMany('Modules\Wilayah\Entities\Kota', 'provinsi_id');
    }

    public function kecamatan()
    {
        return $this->hasManyThrough('Modules\Wilayah\Entities\Kecamatan', 'Modules\Wilayah\Entities\Kota');
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
