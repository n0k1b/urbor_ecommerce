<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class package extends Model
{
    protected $guarded =[];
    public function product_list()
        {
            return $this->hasMany('App\Models\package_product','package_id','id')->where('status',1);
        }
}
