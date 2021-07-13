<?php

namespace Modules\Wilayah\Entities;

use Modules\Wilayah\Entities\BaseModel as Model;

class Kecamatan extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'wil_kecamatan';

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
     * Appending 'nama_kota' attribute.
     *
     * @return String
     */
    public function getNamaKotaAttribute()
    {
        return $this->kota->nama;
    }

    /**
     * Appending 'nama_provinsi' attribute.
     *
     * @return String
     */
    public function getNamaProvinsiAttribute()
    {
        return $this->kota->provinsi->nama;
    }
    
    /**
     * Define an inverse one-to-one or many relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kota()
    {
        return $this->belongsTo('Modules\Wilayah\Entities\Kota', 'kota_id');
    }

    /**
     * Define a one-to-many relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kelurahan()
    {
        return $this->hasMany('Modules\Wilayah\Entities\Kelurahan', 'kecamatan_id');
    }
}
