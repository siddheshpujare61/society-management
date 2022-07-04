@extends('layouts.default')
@section('styles')
    <link rel="preload stylesheet" href="{{ asset('web/css/slick.min.css') }}" as="style" type="text/css">
    <link rel="preload stylesheet" href="{{ asset('web/css/home.css') }}" as="style" type="text/css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sem-ui/semantic.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/sem-ui/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sem-ui/default.css') }}">
    <style type="text/css">
        .p-viewer {
            z-index: 9999;
            position: absolute;
            top: 55%;
            right: 10px;
            display: none;
        }

        .fa-eye {
            color: #ccc;
        }
    </style>
@endsection
@section('content')
<div class="ui attached txt-algn mar-bot-30px pad-25px">
    <div class="ui column grid ecc-log-holder">
        <div class="column no-pad-mob">
            <div class="ui grid no-mar stackable segment pad-20px">
                <div class="sixteen wide column login">
                    <form class="ui form error" method="POST" action="#" id="login-form">
                        {{ csrf_field() }}
                         @if (session('password_login_success'))
                            <div class="ui green message mar-top-20px width100 pad-10px">
                                {{ Session::get('password_login_success') }}
                            </div>
                        @endif
                        @if ($errors->has('email'))
                            <div class="ui red message mar-top-20px">
                                <?php if($errors->first('email') == 'These credentials do not match our records.'){ echo 'Email or password incorrect. Please try again.'; }else{ echo $errors->first('email'); } ?>
                            </div>
                        @endif
                        @if ($errors->has('password'))
                            <div class="ui red message mar-top-20px">
                                <?php if($errors->first('password') == 'These credentials do not match our records.'){ echo 'Email or password incorrect. Please try again.'; }else{ echo $errors->first('password'); } ?>
                            </div>
                        @endif
                        <h1 class="ui dividing header pad-bot-10px no-mar-top">Login</h1>
                        @if (session('email_verified'))
                            <div class="ui green message mar-top-20px">
                                {{ Session::get('email_verified') }}
                            </div>
                        @endif
                        <div class="field">
                            <label>Email</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" >
                        </div>
                        <div class="field">
                            <label>Password</label>
                            <input id="password" type="password" name="password">
                            <span class="p-viewer">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="fields">
                            <div class="eight field txt-algn-lt">
                                <a href="#">Forgot Password?</a>
                            </div>
                            <div class="eight field txt-algn-rt">
                                <div class="ui checkbox">
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label>Remember me.</label>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                         <div class="ui error message"></div>
                        <button class="fluid ecc-green ui big button mar-top-30px"  type="submit" id="btnLogin">Login</button>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/sem-ui/jquery.min.js') }}"></script>
<script src="{{ asset('js/sem-ui/semantic.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".p-viewer").show();
    });
    $('#login-form')
    .form({
        on: 'change',
        
        fields: {            
            email: {                
                rules: [{
                    type: 'empty',
                    prompt: 'Login email can not be empty'
                },
                {
                    type: 'email',
                    prompt: 'Invalid email provided'
                }]
            },
            password: {                
                rules: [{
                    type: 'empty',
                    prompt: 'Password can not be empty'
                }]
            }
        }
    });

    $('#btnLogin').click(function() {
        $('#login-form').form('validate form');
    });
    $(".p-viewer").click(function(){
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    })
</script>
@endsection