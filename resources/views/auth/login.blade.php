@extends('layouts.app')

@section('content')
<div class="login-form padding20 block-shadow">
    <form method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}

        <h1 class="text-light">Login to OneStopClick</h1>
        <hr class="thin"/>
        <br />
        <div class="input-control text full-size form-group{{ $errors->has('email') ? ' has-error' : '' }}" data-role="input">
            <label for="user_login">User email:</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
            <button class="button helper-button clear"><span class="mif-cross"></span></button>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <br />
        <br />
        <br />
        <div class="input-control password full-size form-group{{ $errors->has('password') ? ' has-error' : '' }}" data-role="input">
            <label for="user_password">User password:</label>
            <input id="password" type="password" class="form-control" name="password" required>
            <button class="button helper-button reveal"><span class="mif-looks"></span></button>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <br />
        <br />
        <div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                </label>
            </div>
        </div>
        <div class="form-actions">
            <button type="submit" class="button default">Login</button> 
            <a class="button link" href="{{ route('password.request') }}">
                Forgot Your Password?
            </a>  
            <br />
            <a href="{{ route('provider_redirection', 'facebook') }}" class="button small primary">Facebook Login</a>
            <a href="{{ route('provider_redirection', 'twitter') }}" class="button small info">Twitter Login</a>
            <a href="{{ route('provider_redirection', 'google') }}" class="button small danger">Google Login</a>
        </div>
    </form>
</div>

@endsection
