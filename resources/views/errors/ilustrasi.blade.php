<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>

    @include('_partial._header')

</head>

<body class="error-page">
    <main class="main-content  mt-0">
        <section class="my-7">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 my-auto">
                        <h1 class="display-1 text-bolder text-gradient text-danger">Error  @yield('code', __('Oh no'))</h1>
                        <h2> @yield('message')</h2>
                        {{-- <p class="lead">We suggest you to go to the homepage while we solve this issue.</p> --}}
                        {{-- <button type="button" class="btn bg-gradient-dark mt-4">Go to Homepage</button> --}}

                        <a href="{{ app('router')->has('home') ? route('home') : url('/') }}">
                            <button type="button" class="btn bg-gradient-dark mt-4">Go to Homepage</button>
                        </a>
                    </div>
                    <div class="col-lg-6 my-auto position-relative">
                        <img class="w-100 position-relative" src="{{ asset('assets/img/illustrations/error-404.png') }}"
                            alt="404-error">
                    </div>
                </div>
            </div>
        </section>
    </main>


    @include('_partial._assetJs')
</body>

</html>
