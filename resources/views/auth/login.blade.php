<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        Kampus Gratis || Login
    </title>

    {{-- Header --}}
    @include('_partial._header')
</head>

<body>

    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-start">
                                    <h4 class="font-weight-bolder">Login</h4>
                                    <p class="mb-0">Masukan email dan password</p>
                                </div>
                                <div class="card-body">
                                    <form role="form" action="/login" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <input name="email" type="email" class="form-control form-control-lg"
                                                placeholder="Email" aria-label="Email">
                                        </div>
                                        <div class="mb-3">
                                            <input name="password" type="password" class="form-control form-control-lg"
                                                placeholder="Password" aria-label="Password">
                                        </div>
                                        {{-- <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="rememberMe">
                                            <label class="form-check-label" for="rememberMe">Remember me</label>
                                        </div> --}}
                                        <div class="text-center">
                                            <button type="submit"
                                                class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Login</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    {{-- <p class="mb-4 text-sm mx-auto">
                                        Don't have an account?
                                        <a href="javascript:;"
                                            class="text-primary text-gradient font-weight-bold">Sign up</a>
                                    </p> --}}
                                </div>
                            </div>
                        </div>
                        <div
                            class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                            <div
                                class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center">
                                <img src="{{ asset('assets/img/shapes/pattern-lines.svg') }}"alt="pattern-lines"
                                    class="position-absolute opacity-4 start-0">
                                <div class="position-relative">
                                    <a href="/dashboard-admin">
                                        <img class="max-width-500 w-30 position-relative z-index-2"
                                            src="{{ asset('assets/img/KGLogo4.png') }}" alt="chat-img">
                                    </a>
                                </div>
                                <h4 class="mt-5 text-white font-weight-bolder">Selamat Datang Di Kampus Gratis</h4>
                                {{-- <p class="text-white">The more effortless the writing looks, the more effort the
                                    writer actually put into the process.</p> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    {{-- Import JS --}}
    @include('_partial._assetJs')

</body>

</html>
