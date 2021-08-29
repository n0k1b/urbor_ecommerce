<?php

namespace App\Imports;

use App\Models\product;
use App\Models\category;
use App\Models\sub_category;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ProductImport implements ToModel, WithStartRow
{


    public function startRow(): int
    {
        return 2;
    }
    public function model(array $row)
    {
        $category = category::where('name',$row[0])->first();
        if($category)
        {
            $category_id = $category->id;
        }
        else
        {
            $new_cat = category::create(['name'=>$row[0]]);
            $category_id = $new_cat->id;

        }
        $sub_category = sub_category::where('name',$row[1])->first();
        if($sub_category)
        {
            $sub_category_id = $sub_category->id;
        }
        else{
            $new_sub_cat = sub_category::create(['name'=>$row[0],'category_id'=>$category_id]);
            $sub_category_id = $new_sub_cat->id;
        }



        return new product([
            //
            'category_id'=>$category_id,
            'sub_category_id'=>$sub_category_id,
            'name'=>$row['2'],
            'description'=>$row['3'],
            'thumbnail_image'=>$row['4'],
            'price'=>(int)$row['5'],
            'unit_quantity'=>(int)$row['6'],
            'unit_type'=>$row['7'],
            'net_weight'=>(int)$row['8']

        ]);
    }
}
