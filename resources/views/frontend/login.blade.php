@extends('frontend.layout.app2')
@section('page_css')


<style>

    .form-control{
        font-size:16px;
    }


  .tab_li
{
   display:block;
   float:left;
   width:200px; /* adjust */
   height:50px; /* adjust */
   padding: 5px; /*adjust*/
}

  .tab-group {
    justify-content: center;
  display: flex;
  list-style:none;
  padding:0;
  margin:0 0 -8px 0;
  }

  .tab.active a {
    background:#3FC979;
    padding: 15px;
    color:white;
  }
}



.tab-content > div:last-child {
  display:none;
}

</style>
@endsection

@section('main_content')
<main class="no-main">
    <div class="ps-breadcrumb">
        <div class="container">
            <ul class="ps-breadcrumb__list">
                <li class="active"><a href="index.html">Home</a></li>
                <li><a href="javascript:void(0);">My Account</a></li>
            </ul>
        </div>
    </div>
    <section class="section--login">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="login__box" style="max-width: 500px">
                        <ul class="tab-group">
                            <li class="tab active tab_li"><a href="#login">Login</a></li>
                            <li class="tab tab_li"><a href="#registration">Registration</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="login">
                                <div class="login__content">
                                    <div class="login__label">Login to your account.</div>
                                    <div class="input-group">
                                        <input class="form-control" type="number" placeholder="Mobile Number">
                                    </div>
                                    <div class="input-group group-password">
                                        <input class="form-control" type="password" placeholder="Password">
                                        <div class="input-group-append">
                                            <button class="btn forgot-pass" type="button">Forgot Password?</button>
                                        </div>
                                    </div>
                                    <div class="input-group form-check">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">Remember me</label>
                                    </div>
                                    <button class="btn btn-login" type="submit">Login</button>
                                    <div class="login__conect">
                                        <hr>
                                        <p>Or login with</p>
                                        <hr>
                                    </div>
                                    <button class="btn btn-social btn-facebook"> <i class="fa fa-facebook-f"></i>Login with Facebook</button>
                                    <button class="btn btn-social btn-google"> <i class="fa fa-google-plus"></i>Login with Google</button>
                                </div>
                            </div>

                            <div id="registration">

                                <div class="login__content">
                                    <div class="login__label">Register to your account.</div>
                                    <div class="input-group">
                                        <input class="form-control" type="email" placeholder="Email">
                                    </div>

                                    <div class="input-group">
                                        <input class="form-control" type="email" placeholder="Phone Number">
                                    </div>

                                    <div class="input-group group-password">
                                        <input class="form-control" type="password" placeholder="Password">

                                    </div>

                                    <div class="input-group group-password">
                                        <input class="form-control" type="password" placeholder="Re type Password">

                                    </div>

                                    <button class="btn btn-login" type="submit">Register</button>


                                </div>

                            </div>



                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
</main>
@endsection

@section('page_js')
<script>
$('.tab a').on('click', function (e) {

  e.preventDefault();

  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');

  target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();

  $(target).fadeIn(600);

});
</script>

@endsection
