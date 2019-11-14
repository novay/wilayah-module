<?php

namespace Modules\Wilayah\Entities;

class Model extends \Illuminate\Database\Eloquent\Model
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('wilayah.module.table_prefix').$this->table;
    }
}