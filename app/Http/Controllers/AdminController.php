<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\category;
use App\Models\sub_category;
use App\Models\product;

use App\Models\product_unit;
use App\Models\product_stock;

use App\Models\order;

use App\Models\courier_man;

use App\Models\company_info;
use App\Models\terms_and_condition;
use App\Models\delivery_charge;

use App\Models\deposit;
use App\Models\expense;

use DB;
use DataTables;
use Auth;


class AdminController extends Controller
{

    protected function guard()
{
    return Auth::guard('admin');
}


public function update_unit()
{
    $product = product::get();
    foreach($product as $data)
    {
        $unit_type = product_unit::where('product_id',$data->id)->first()->unit_type;
        $unit_quantity = product_unit::where('product_id',$data->id)->first()->unit_quantity;
        product::where('id',$data->id)->update(['unit_type'=>$unit_type,'unit_quantity'=>$unit_quantity]);
    }
}

public function update_stock()
{
    $product = product::get();
    foreach($product as $data)
    {
        $stock = product_stock::where('product_id',$data->id)->first()->stock_amount;
        product::where('id',$data->id)->update(['stock'=>$stock]);
    }
}

   // public $role_permissions;
    public function permission ()
{

    $user_id = Auth::guard('admin')->user()->id;
    $user_role = Auth::guard('admin')->user()->role;
    $role_id = DB::table('roles')->where('name',$user_role)->first()->id;
    $role_permission = DB::table('role_permisiions')->where('role_id',$role_id)->pluck('content_name')->toArray();
    return $role_permission;

}

    //login startt
    public function login(Request $request)
    {
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {

           // file_put_contents('test2.txt',Auth::guard('admin')->user()->name);
            return redirect('admin');

         }
         else
         {
            return back()->with('error','Email and Password not match');
         }
    }

    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect()->to('admin_login');
    }

    //login end

    //dashboard start
    public function show_dashboard()
    {
        $total_product = product::where('status',1)->get()->count();
        $total_category = category::where('status',1)->get()->count();
        $total_sub_category = sub_category::where('status',1)->get()->count();
        $total_order = order::get()->count();

        $revenue = 10;
        $purchase = 20;
        $expense = 30;
        $return = 25;
        $purchase_return = 10;
        $profit = 10;
        $payment_recieved = [41335.40,0.00,0.00,0.00,0.00,857.00,250.00];
        $payment_sent = [44750.00,0.00,0.00,0.00,0.00,17000.00,0.00];
        $month = ['January','February','March','April','May','November','December'];
        $yearly_sale_amount = [10,20,30,40,50,60,70];
        $yearly_purchase_amount = [10,20,30,40,50,60,70];
        $recent_sale = 10;
        $recent_purchase = 15;
        $recent_quotation = 10;
        $recent_payment = 15;
        $best_selling_qty = 20;
        $yearly_best_selling_qty = 15;
        $yearly_best_selling_price= 10;



     //   return view('admin.dashboard.index',compact('total_product','total_category','total_sub_category','total_order'));
        return view('admin.dashboard.index', compact('total_product','total_category','total_sub_category','total_order','revenue', 'purchase', 'expense', 'return', 'purchase_return', 'profit', 'payment_recieved', 'payment_sent', 'month', 'yearly_sale_amount', 'yearly_purchase_amount', 'recent_sale', 'recent_purchase', 'recent_quotation', 'recent_payment', 'best_selling_qty', 'yearly_best_selling_qty', 'yearly_best_selling_price'));

    }


    //expense start
    public function show_all_expense(Request $request )
      {

        if ($request->ajax()) {
            $data = expense::where('delete_status',0)->get();
            $i=1;
                foreach($data as $datas)
                {

                    $datas['sl_no'] = $i++;
                    $datas['date'] = date("d-m-Y", strtotime($datas->expense_date));

                }

            return Datatables::of($data)
                    ->addIndexColumn()

                    ->addColumn('action', function($data){

                        $permission = $this->permission();
                        $button = '';
                        if(in_array('category_edit',$permission))
                        $button .= ' <a href="edit_expense_content/'.$data->id.'" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>';
                        else
                        $button .= ' <a href="javascript:void(0);" onclick="access_alert()" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>';
                        $button .= '&nbsp;&nbsp;';
                        if(in_array('category_delete',$permission))
                        $button .= ' <a href="javascript:void(0);" class="btn btn-sm btn-danger" onclick="expense_content_delete('.$data->id.')"><i class="la la-trash-o"></i></a>';
                        else
                        $button .= ' <a href="javascript:void(0);" class="btn btn-sm btn-danger" onclick="access_alert()"><i class="la la-trash-o"></i></a>';
                        return $button;
                 })


                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('admin.expense.all');


      }

    //expene end


      //deposit start
      public function show_all_deposit(Request $request )
      {

        if ($request->ajax()) {
            $data = deposit::where('delete_status',0)->get();
            $i=1;
                foreach($data as $datas)
                {

                    $datas['sl_no'] = $i++;
                    $datas['date'] = date("d-m-Y", strtotime($datas->created_at));
                    $datas['deposit_received_by'] = $datas->deposit_received->name;
                    $datas['courier_man'] = $datas->courier->name;

                }

            return Datatables::of($data)
                    ->addIndexColumn()

                    ->addColumn('action', function($data){

                        $permission = $this->permission();
                        $button = '';
                        if(in_array('category_edit',$permission))
                        $button .= ' <a href="edit_deposit_content/'.$data->id.'" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>';
                        else
                        $button .= ' <a href="javascript:void(0);" onclick="access_alert()" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>';
                        $button .= '&nbsp;&nbsp;';
                        if(in_array('category_delete',$permission))
                        $button .= ' <a href="javascript:void(0);" class="btn btn-sm btn-danger" onclick="deposit_content_delete('.$data->id.')"><i class="la la-trash-o"></i></a>';
                        else
                        $button .= ' <a href="javascript:void(0);" class="btn btn-sm btn-danger" onclick="access_alert()"><i class="la la-trash-o"></i></a>';
                        return $button;
                 })


                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('admin.deposit.all');


      }

      public function add_expense_ui()
      {
          $datas = courier_man::get();
          return view('admin.expense.add',compact('datas'));
      }
      public function add_expense(Request $request)
      {


      $request['deposit_received_by'] = Auth::guard('admin')->user()->id;
         deposit::create($request->all());
          return redirect()->route('show-all-deposit')->with('success','deposit Added Successfully');


      }


    //order end
    //company info start
        public function show_all_company_info()
        {
                $data = company_info::first();

                return view('admin.company_info.all',compact('data'));
        }
        public function add_company_info(Request $request)
        {
            company_info::where('id',2)->update($request->except('_token'));
            return redirect()->route('show-all-company-info')->with('success','Information Updated Successfully');
        }
    //company info end

    //terms and condtion start

    public function show_all_terms()
    {
            $data = terms_and_condition::first();
            return view('admin.terms.all',compact('data'));
    }
    public function add_terms(Request $request)
    {
        terms_and_condition::where('id',1)->update($request->except('_token'));
        return redirect()->route('show-all-terms')->with('success','Information Updated Successfully');
    }


    //terms and condition end

    //delivery charge start
    public function show_all_delivery_charge()
    {
            $data = delivery_charge::first();
            return view('admin.delivery_charge.all',compact('data'));
    }
    public function add_delivery_charge(Request $request)
    {
        //delivery_charge::create($request->except('_token'));
       delivery_charge::where('id',1)->update($request->except('_token'));
        return redirect()->route('show-all-delivery-charge')->with('success','Information Updated Successfully');
    }

    //delivery charge end




}
