<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\product;

class ShopController extends Controller
{
    //
    public function get_category()
    {
        $category = category::with('sub_category:id,category_id,name')->where('status',1)->where('delete_status',0)->get();
       // file_put_contents('test.txt',json_encode($category));
        return response($category, 200);
    }
    public function fetch_product(Request $request)
    {
        if($request->type == 'sub')
        {
            $data = product::where('sub_category_id',$request->id)->get();
            return response($data, 200);
        }
        //file_put_contents('test.txt',$request->id."hello");
    }
}
