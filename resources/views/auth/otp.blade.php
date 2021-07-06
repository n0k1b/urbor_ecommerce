<!doctype html>
<html lang="en">


<!-- Mirrored from arasari.studio/wp-content/projects/forny/templates/03_login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 Mar 2021 07:05:11 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Authentication forms">
    <meta name="author" content="Arasari Studio">

    <title>GOGO Shop</title>
    <link href="{{asset('assets')}}/auth/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('assets')}}/auth/css/common.css" rel="stylesheet">


<link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&amp;display=swap" rel="stylesheet">
<link href="{{asset('assets')}}/auth/css/theme-03.css?{{ time() }}" rel="stylesheet">

</head>

<body>
    <div class="forny-container">

<div class="forny-inner">
    <div class="forny-form">
        <div class="mb-1 text-center forny-logo">
            <img src="{{ asset('assets')}}/admin/images/logo.png" height="100px" width="100px">
        </div>
        <div class="text-center">
            @if(count($errors)>0)

            @foreach($errors->all() as $error)

               <p class="alert alert-danger" >{{$error}}</p>
            @endforeach
          @endif
   @if(!empty($error))
       <div class="alert alert-danger"> {{ $error }}</div>
      @endif

       @if (Session::has('success'))
                  <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
            <h4>OTP</h4>
            <p class="mb-10">Enter 4 digit otp which has sent to your mobile</p>
        </div>
        <form action="{{ route('submit_otp') }}" method="POST">
            @csrf
    <div class="form-group">

        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 16 24">
                        <g transform="translate(0)">
                            <g transform="translate(5.457 12.224)">
                                <path d="M207.734,276.673a2.543,2.543,0,0,0-1.749,4.389v2.3a1.749,1.749,0,1,0,3.5,0v-2.3a2.543,2.543,0,0,0-1.749-4.389Zm.9,3.5a1.212,1.212,0,0,0-.382.877v2.31a.518.518,0,1,1-1.035,0v-2.31a1.212,1.212,0,0,0-.382-.877,1.3,1.3,0,0,1-.412-.955,1.311,1.311,0,1,1,2.622,0A1.3,1.3,0,0,1,208.633,280.17Z" transform="translate(-205.191 -276.673)"/>
                            </g>
                            <path d="M84.521,9.838H82.933V5.253a4.841,4.841,0,1,0-9.646,0V9.838H71.7a1.666,1.666,0,0,0-1.589,1.73v10.7A1.666,1.666,0,0,0,71.7,24H84.521a1.666,1.666,0,0,0,1.589-1.73v-10.7A1.666,1.666,0,0,0,84.521,9.838ZM74.346,5.253a3.778,3.778,0,1,1,7.528,0V9.838H74.346ZM85.051,22.27h0a.555.555,0,0,1-.53.577H71.7a.555.555,0,0,1-.53-.577v-10.7a.555.555,0,0,1,.53-.577H84.521a.555.555,0,0,1,.53.577Z" transform="translate(-70.11)"/>
                        </g>
                    </svg>
                </span>
            </div>

    <input required  class="form-control" name="otp" type="text" placeholder="OTP">

        </div>
    </div>

    <div>
        <button class="btn btn-primary btn-block" type="submit">Enter</button>
    </div>
     </form>

            <form action="{{ route('send_otp') }}" method="POST">
                @csrf
                <input type="hidden" value="{{$mobile_number}}" name="mobile_number" >
            <div class="text-center mt-10">
                Don't receive otp? <button type="submit" style="border: none;color: #3fc979; font-weight: bold;">Resend it</button>
            </div>
            </form>

    </div>
</div>

    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/demo.js"></script>

</body>


<!-- Mirrored from arasari.studio/wp-content/projects/forny/templates/03_login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 Mar 2021 07:05:15 GMT -->
</html>
