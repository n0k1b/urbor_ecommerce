<?php
  $with_domain_status = 0;
  $user_id = auth()->user()->id;
  $user_role = auth()->user()->role;
  $role_id = DB::table('roles')->where('name',$user_role)->first()->id;
  $role_permission = DB::table('role_permisiions')->where('role_id',$role_id)->pluck('content_name')->toArray();
 // file_put_contents('role.txt',json_encode($role_permission));


?>

<div class="dlabnav">


            <div class="dlabnav-scroll">
                <ul class="metismenu" id="menu">
                    @if(in_array('dashboard_view',$role_permission))
                <li><a class="ai-icon" href="{{url('admin')}}" aria-expanded="false">
                        <i class="la la-bar-chart"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>
                @endif

                   @if($with_domain_status ==1)
					<li><a class="ai-icon" href="{{ route('show-all-domain') }}" aria-expanded="false">
							<i class="la la-bar-chart"></i>
							<span class="nav-text">Domain</span>
						</a>
					</li>
					<li><a class="ai-icon" href="{{ route('show-all-category-with-domain') }}" aria-expanded="false">
						<i class="la la-list"></i>
						<span class="nav-text">Category</span>
					</a>
				</li>
				@else
                @if(in_array('category_view',$role_permission))
					<li><a class="ai-icon" href="{{ route('show-all-category') }}" aria-expanded="false">
							<i class="la la-list"></i>
							<span class="nav-text">Category</span>
						</a>
					</li>
                    @endif
				@endif

                @if(in_array('sub_category_view',$role_permission))

					<li><a class="ai-icon" href="{{ route('show-all-sub-category') }}" aria-expanded="false">
							<i class="la la-list-alt"></i>
							<span class="nav-text">Sub Category</span>
						</a>
					</li>
                    @endif


					{{-- <li>
						<a class="ai-icon" href="{{ route('show-all-brand') }}" aria-expanded="false">
						<i class="la la-calendar"></i>
						<span class="nav-text">Brand</span>
						</a>
					</li> --}}

                    @if(in_array('product_view',$role_permission))
					<li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
						<i class="la la-dropbox"></i>
						<span class="nav-text">Product</span>
					</a>
					<ul aria-expanded="false">
						<li><a href="{{ route('show-all-product-field')}}">Product Field</a></li>
						<li><a href="{{ route('get_all_product')}}">All Products</a></li>
                        <li><a href="{{ route('add-product')}}">Add Product</a></li>

					</ul>
				</li>
                @endif


                @if(in_array('product_view',$role_permission))
                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-dropbox"></i>
                    <span class="nav-text">Purchase</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('show-all-purchase')}}">All Purchase</a></li>
                    <li><a href="{{ route('add-purchase')}}">Add Purchase</a></li>

                </ul>
            </li>
            @endif
                @if(in_array('homepage_content_view',$role_permission))
					<li><a class="ai-icon" href="{{ route('show-all-homepage_section') }}" aria-expanded="false">
							<i class="la la-home"></i>
							<span class="nav-text">Homepage Content</span>
						</a>
                    </li>
                    @endif
                    @if(in_array('banner_view',$role_permission))
                    <li><a class="ai-icon" href="{{ route('show-all-banner') }}" aria-expanded="false">
                        <i class="la la-image"></i>
                        <span class="nav-text">Banner</span>
                    </a>
                     </li>
                     @endif

                 	<li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
						<i class="la la-shopping-cart"></i>
						<span class="nav-text">Order</span>
					    </a>
                        <ul aria-expanded="false">
                            @if(in_array('new_order_view',$role_permission))
                            <li><a href="{{ route('new-order')}}">New Order</a></li>
                            @endif
                            @if(in_array('all_order_view',$role_permission))
                            <li><a href="{{ route('all-order')}}">All Order</a></li>
                            @endif

                        </ul>
			    	</li>
                    @if(in_array('courier_man_view',$role_permission))
                    <li><a class="ai-icon" href="{{ route('show-all-courier') }}" aria-expanded="false">
                        <i class="la la-motorcycle"></i>
                        <span class="nav-text">Courier Man</span>
                          </a>
                      </li>
                      @endif

                      @if(in_array('area_view',$role_permission))
                    <li><a class="ai-icon" href="{{ route('show-all-area') }}" aria-expanded="false">
                        <i class="la la-area-chart"></i>
                        <span class="nav-text">Area</span>
                    </a>
                 </li>
                 @endif

                 @if(in_array('warehouse_view',$role_permission))
                 <li><a class="ai-icon" href="{{ route('show-all-warehouse') }}" aria-expanded="false">
                    <i class="la la-bank"></i>
                    <span class="nav-text">Warehouse</span>
                </a>
                </li>
                @endif

                <li><a class="ai-icon" href="{{ route('show-all-deposit') }}" aria-expanded="false">
                    <i class="la la-bank"></i>
                    <span class="nav-text">Deposit</span>
                </a>
                </li>


                <li><a class="ai-icon" href="{{ route('show-all-expense') }}" aria-expanded="false">
                    <i class="la la-bank"></i>
                    <span class="nav-text">Expense</span>
                </a>
                </li>




                @if($user_role == 'Admin' || $user_role =='admin')

                  <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="la la-gear"></i>
                    <span class="nav-text">Settings</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('show-all-role')}}">Role</a></li>
                        <li><a href="{{ route('show-all-user')}}">User</a></li>
                        <li><a href="{{ route('show-all-company-info')}}">Company Information</a></li>
                        <li><a href="{{ route('show-all-terms')}}">Terms and Condition</a></li>
                        <li><a href="{{ route('show-all-delivery-charge')}}">Delivery Charge</a></li>




                    </ul>
                </li>
                @endif



				</ul>
            </div>
        </div>
