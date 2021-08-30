<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\sub_category;
use App\Models\product;
use App\Models\user;
use App\Models\role;
use Hash;
use DB;
use DataTables;
use Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //

    public function permission ()
    {

        $user_id = Auth::guard('admin')->user()->id;
        $user_role = Auth::guard('admin')->user()->role;
        $role_id = DB::table('roles')->where('name',$user_role)->first()->id;
        $role_permission = DB::table('role_permisiions')->where('role_id',$role_id)->pluck('content_name')->toArray();
        return $role_permission;

    }

    public function show_all_user()
    {
        $datas = user::where('role','<>','customer')->where('role','<>','courier_man')->get();
        $i=1;
        foreach($datas as $data)
        {
            $data['sl_no'] = $i++;
        }
        return view('admin.user.all',['datas'=>$datas]);


    }

    public function add_user_ui()
    {
        $datas = role::get();
        return view('admin.user.add',compact('datas'));
    }
    public function add_user(Request $request)
    {
    //     $validator = Validator::make($request->all(), [
    //         'mobile_number' => ['required', 'regex:/01[13-9]\d{8}$/'],
    //      ]);
    // if($validator->fails())
    // {
    //     return redirect()->back()->with('errors',collect($validator->errors()->all()));
    // }
        $user = new user();
        $user->name = $request->name;
        $user->contact_no = $request->contact_no;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;;
        $user->save();


        return redirect()->route('show-all-user')->with('success','User Added Successfully');


    }
    public function update_user_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => ['required','confirmed'],
         ]);

    if($validator->fails())
    {
        return redirect()->back()->with('errors',collect($validator->errors()->all()));
    }

    user::where('id',$request->id)->update(['password'=>Hash::make($request->password)]);
    return redirect()
            ->route('show-all-user')
            ->with('success', "Data Updated Successfully");

    }
    public function reset_user_password_ui($id)
    {
        return view('admin.user.reset_password',compact('id'));
    }

    public function user_active_status(Request $request)
    {
        $id = $request->id;
        $status =user::where('id', $id)->first()->status;
        if ($status == 1)
        {
            user::where('id', $id)->update(['status' => 0]);
        }
        else
        {
            user::where('id', $id)->update(['status' => 1]);
        }
    }
    public function edit_user_content_ui(Request $request)
    {
        $id = $request->id;
        $data = user::where('id',$id)->first();
        $datas = role::get();
        return view('admin.user.edit',['data'=>$data,'datas'=>$datas]);

    }

    public function update_user_content(Request $request)
    {
        $id = $request->id;
      //  file_put_contents('test.txt',$request->name." ".$request->contact_no." ".$request->email." ".$request->role);

        user::where('id', $id)->update(['name' => $request->name,'contact_no'=>$request->contact_no,'email'=>$request->email,'role'=>$request->role]);

        return redirect()
            ->route('show-all-user')
            ->with('success', "Data Updated Successfully");
    }


    public function user_content_delete(Request $request)
    {
        $id = $request->id;
        user::where('id', $id)->update(['delete_status'=>1]);

    }
}
