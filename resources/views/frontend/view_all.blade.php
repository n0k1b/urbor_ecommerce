@extends('frontend.layout.app2')

@section('main_content')
<main class="no-main">


    <section class="section--flashSale">

        <section class="ps-component ps-component--category">
            <div class="container">

                <div class="component__content category_list">

                </div>
            </div>
        </section>


        <div class="container" style="margin-top:20px">



            <div class="flashSale__product" >
                <div class="row m-0" id="product_list">






                </div>
            </div>
            <div class="ps-pagination blog--pagination">
                <ul class="pagination" style="justify-content: center">
                    <li class="chevron"><a href="#"><i class="icon-chevron-left"></i></a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li class="chevron"><a href="#"><i class="icon-chevron-right"></i></a></li>
                </ul>
            </div>
        </div>
    </section>


</main>
@endsection

@section('page_js')
{{-- <script src="{{asset('assets')}}/frontend/js/frontend.js?{{ time() }}"></script> --}}

<script>
   var type= "{{ $type }}";

</script>
<script src="{{asset('assets')}}/frontend/js/view_all.js?{{ time() }}"></script>
@endsection
