<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class package_product extends Model
{
    protected $guarded =[];
    public function product()
    {
        return $this->belongsTo('App\Models\product','product_id','id');
    }
    public function homepage_section()
    {
        return $this->belongsTo('App\Models\package','package_id','id');
    }
}
