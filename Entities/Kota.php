<?php

namespace Modules\Wilayah\Entities;

use Modules\Wilayah\Entities\BaseModel as Model;

class Kota extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'wil_kota';

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
     * Appending 'nama_provinsi' attribute.
     *
     * @return String
     */
    public function getNamaProvinsiAttribute()
    {
        return $this->provinsi->nama;
    }
    
    /**
     * Define an inverse one-to-one or many relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function provinsi()
    {
        return $this->belongsTo('Modules\Wilayah\Entities\Provinsi', 'provinsi_id');
    }

    /**
     * Define a one-to-many relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kecamatan()
    {
        return $this->hasMany('Modules\Wilayah\Entities\Kecamatan', 'kota_id');
    }

    /**
     * Define a has-many-through relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function kelurahan()
    {
        return $this->hasManyThrough('Modules\Wilayah\Entities\Kelurahan', 'Modules\Wilayah\Entities\Kecamatan');
    }

    /**
     * Appending 'logo_path' attribute.
     *
     * @return String
     */
    public function getLogoPathAttribute()
    {
        $folder = 'assets/indonesia-logo/';
        $id = $this->getAttributeValue('id');

        $arr_glob = glob(public_path() . '/' . $folder . $id . '.*');
        if(count($arr_glob) == 1):
            $logo_name = basename($arr_glob[0]);
            $logo_path = url($folder . $logo_name);

            return $logo_path;
        endif;
    }
}
