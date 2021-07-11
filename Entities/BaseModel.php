<?php 

namespace Modules\Wilayah\Entities;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    /**
     * Create a new Eloquent model instance.
     *
     * @param  array $attributes
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        
        $this->table = config('wilayah.module.table_prefix').$this->table;
    }
}