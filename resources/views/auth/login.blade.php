@extends('layouts.header')

@section('content')
<div class="container" style="margin-top: 40px;">
    <div class="row">
        <div class="col-sm-12 col-md-4">
            <div class="worldadsth-login-form">
                <h3>โปรดป้อนรหัสผ่าน</h3>
                <p>ลงชื่อเข้าใช้งานด้วยบัญชีที่ท่านได้สร้างไว้ หรือ ลงชื่อเข้าใช้งานผ่าน facebook.com</p>
                <form role="form" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="control-label">E-Mail Address</label>

                        <div>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="control-label">Password</label>

                        <div>
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-primary">
                                Login
                            </button>

                            <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                Forgot Your Password?
                            </a>
                        </div>
                    </div>

                    <p>หรือ</p>

                    <div class="form-group">
                        <div>
                            <a class="btn btn-primary" disabled="disabled">
                                <i class="fa fa-facebook" aria-hidden="true"></i> Login with Facebook
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-12 col-md-8">
            <div class="worldadsth-login-img"></div>
        </div>
    </div>

    <hr style="border: 1px solid #000;">

    <footer>
        <p>worldadsth.com all right reserved.</p>
    </footer>
</div>
@endsection
