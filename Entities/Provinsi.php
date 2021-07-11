<?php

namespace Modules\Wilayah\Entities;

use Modules\Wilayah\Entities\BaseModel as Model;

class Provinsi extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'provinsi';

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
     * Define a one-to-many relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kota()
    {
        return $this->hasMany('Modules\Wilayah\Entities\Kota', 'provinsi_id');
    }

    /**
     * Define a has-many-through relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function kecamatan()
    {
        return $this->hasManyThrough('Modules\Wilayah\Entities\Kecamatan', 'Modules\Wilayah\Entities\Kota');
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
            $logo_path = url($folder.$logo_name);

            return $logo_path;
        endif;
    }
}
