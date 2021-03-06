<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class homepage_section extends Model
{
    protected $guarded =[];
    public function product_list()
        {
            return $this->hasMany('App\Models\homepage_product_list','homepage_section_id','id')->where('status',1)->where('delete_status',0)->where('status',1);
        }

}
