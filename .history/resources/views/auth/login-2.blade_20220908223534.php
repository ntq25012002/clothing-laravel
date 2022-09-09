<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta name="csrf-token" content="{{ csrf_token() }}">

<head>
    <title>Đăng nhập</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body class="img js-fullheight" style="background-image: url({{ asset('dist/img/bg.jpg') }});">
    <section class="ftco-section">
        <div class="container">
            {{-- <div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Đăng nhập</h2>
				</div>
			</div> --}}
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <h3 class="mb-4 text-center">
                            Admin
                        </h3>
                        @if(session('msg_err'))
                            <p class="text-danger text-center"></p>
                        @endif
                        <form method="POST" action="{{ route('post-login') }}" class="signin-form">
                            @csrf
                            <div class="form-group">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus
                                    placeholder="Email" required>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password-field" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password" placeholder="Password" required>

                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password">
                                </span>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-50">
                                    <label class="checkbox-wrap checkbox-primary">Remember Me
                                        <input type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>

                                {{-- <div class="w-50 text-md-right">
                                    <a href="{{ route('password.request') }}" style="color: #fff">Quên mật khẩu ?</a>
                                </div> --}}
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3">Đăng nhập</button>
                            </div>
                        </form>

                        
                        {{-- <p class="w-100 text-center">&mdash; Or Sign In With &mdash;</p>
                        <div class="social d-flex text-center">
                            <a href="#" class="px-2 py-2 mr-md-1 rounded"><span
                                    class="ion-logo-facebook mr-2"></span> Facebook</a>
                            <a href="#" class="px-2 py-2 ml-md-1 rounded"><span
                                    class="ion-logo-twitter mr-2"></span> Twitter</a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('js/login/jquery.min.js') }}"></script>
    <script src="{{ asset('js/login/popper.js') }}"></script>
    <script src="{{ asset('js/login/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/login/main.js') }}"></script>

</body>

</html>
