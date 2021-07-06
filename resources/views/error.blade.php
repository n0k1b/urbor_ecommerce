@extends('frontend.layout.app2')

@section('main_content')
<main class="no-main">
    <section class="section--notfound">
        <div class="container">
            <div class="notfound__content"><img src="{{ asset('assets') }}/frontend/img/pages/page-not-found.png" alt>
                <h1 class="page__title">Oop! Page not found.</h1>
                <p>We can't find the page you're looking for. You can either <span>return to the previous page, visit our home page</span>or search for something else.</p>
            </div>
        </div>
    </section>
</main>
@endsection
