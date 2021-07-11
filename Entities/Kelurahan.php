<?php

namespace Modules\Wilayah\Entities;

use Modules\Wilayah\Entities\BaseModel as Model;

class Kelurahan extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'kelurahan';

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'meta' => 'array',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Appending 'nama_kecamatan' attribute.
     *
     * @return String
     */
    public function getNamaKecamatanAttribute()
    {
        return $this->kecamatan->nama;
    }

    /**
     * Appending 'nama_kota' attribute.
     *
     * @return String
     */
    public function getNamaKotaAttribute()
    {
        return $this->kecamatan->kota->nama;
    }

    /**
     * Appending 'nama_provinsi' attribute.
     *
     * @return String
     */
    public function getNamaProvinsiAttribute()
    {
        return $this->kecamatan->kota->provinsi->nama;
    }
    
    /**
     * Define an inverse one-to-one or many relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kecamatan()
    {
        return $this->belongsTo('Modules\Wilayah\Entities\Kecamatan', 'kecamatan_id');
    }
}
