<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Quan trắc - Cảnh báo - Dự báo TNN</title>
    <meta content="Admin Dashboard" name="description"/>
    <meta content="ThemeDesign" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <link href="{{ asset('components/morris/morris.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/easyui.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/ol.css') }}" rel="stylesheet" type="text/css">
    <!-- Bootstrap 4.1.0 -->
    <link href="{{ asset('components/bootstrap4/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('components/upcube/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('components/upcube/css/adminstyle.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">


    <script src="{{ asset('components/jquery-easyui/jquery.min.js') }}"></script>

    <script src="{{ asset('components/jquery-easyui/jquery.easyui.min.js') }}"></script>
    <script src="{{ asset('components/ol/build/ol.js') }}"></script>
    @yield('css')
</head>
<body>
<div class="wrapper-page">
    <div class="card">
        <div class="card-body">
            <h3 class="text-center mt-0 m-b-15">
                <a href="{{ route('home') }}" class="logo"><img src="{{ asset('images/nawapi.png') }}" alt="logo"
                                                                height="112"></a>
            </h3>
            <h4 class="text-muted text-center font-18"><b>Sign In</b></h4>
            <div class="p-3">
                <form class="form-horizontal m-t-20" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group row">
                        <div class="col-12">
                            <input id="email" type="email"
                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                   value="{{ old('email') }}" placeholder="{{ __('E-Mail Address') }}" required
                                   autofocus>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12">
                            <input id="password" type="password"
                                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                   name="password" placeholder="{{ __('Password') }}" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox"
                                       name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label">{{ __('Remember Me') }}</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row text-center m-t-20">
                        <div class="col-12">
                            <button type="submit" class="btn btn-info btn-block waves-effect waves-light">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </div>
                    <div class="form-group m-t-10 mb-0 row">
                        <div class="col-sm-7 m-t-20">
                            <a href="{{ route('password.request') }}" class="text-muted"><i
                                        class="fa fa-lock"></i> {{ __('Forgot Your Password?') }}</a>
                        </div>
                        <div class="col-sm-5 m-t-20">
                            <a href="{{ route('register') }}" class="text-muted"><i class="fa fa-user-circle"></i>
                                Create an account</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- jQuery 3.1.1 -->
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}
{{--<script src="{{ asset('components/upcube/ajs/jquery.min.js') }}"></script>--}}
<script src="{{ asset('components/upcube/ajs/popper.min.js') }}"></script>
<script src="{{ asset('components/bootstrap4/js/bootstrap.js') }}"></script>
<script src="{{ asset('components/upcube/ajs/modernizr.min.js') }}"></script>
<script src="{{ asset('components/upcube/ajs/detect.js') }}"></script>
<script src="{{ asset('components/upcube/ajs/fastclick.js') }}"></script>
<script src="{{ asset('components/upcube/ajs/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('components/upcube/ajs/jquery.blockUI.js') }}"></script>
<script src="{{ asset('components/upcube/ajs/waves.js') }}"></script>
<script src="{{ asset('components/upcube/ajs/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('components/upcube/ajs/jquery.scrollTo.min.js') }}"></script>
<script src="{{ asset('js/raphael.js') }}"></script>
<script src="{{ asset('components/morris/morris.js') }}"></script>
<script src="{{ asset('components/tinymce/js/tinymce/tinymce.js') }}"></script>
<script src="{{ asset('js/wisadmin.js') }}"></script>
<script src="{{ asset('components/upcube/ajs/app.js') }}"></script>
@yield('scripts')
</body>
</html>