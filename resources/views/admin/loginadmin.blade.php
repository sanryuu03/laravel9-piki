<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ $title }}</title>

    <!-- Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{ asset('register/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="{{ asset('register/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <style type="text/css">
        .bg-gradient-primary {
            background-image: linear-gradient(180deg, #4e73df -10%, #fff 100%);
        }

        .card {
            background-color: rgba(255, 255, 255, 0.4);
        }

    </style>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 mx-auto">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login {{ $title }}</h1>
                                        <p class="text-gray-900">Selamat Datang</p>
                                    </div>
                                    @if(session('success'))
                                    <p class="alert alert-success">{{ session('success') }}</p>
                                    @endif
                                    @if(session('loginError'))
                                    <p class="alert alert-danger">{{ session('loginError') }}</p>
                                    @endif
                                    @if($errors->any())
                                    @foreach($errors->all() as $err)
                                    <p class="alert alert-danger">{{ $err }}</p>
                                    @endforeach
                                    @endif
                                    <form action="{{ route('login.action') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label>username <span class="text-danger">*</span></label>
                                            <input class="form-control" type="username" name="username" @error('username') is-invalid @enderror autofocus value="{{ old('username') }}" />
                                            @error('username')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label>Password <span class="text-danger">*</span></label>
                                            <input class="form-control" type="password" name="password" />
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-primary">Login</button>
                                    Lupa Password ? <a class="" href="{{ route('forget.password.get') }}">Reset !</a>
                                        </div>
                                    </form>
                                    <hr>
                                    Belum Punya Akun ? <a class="" href="{{ route('register') }}">Daftar !</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('register/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('register/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('register/vendor/jquery-easing/jquery.easing.min.js') }}"></script>


</body>

</html>
