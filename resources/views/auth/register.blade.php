@extends('layouts.header')

@section('content')

<div class="container" style="margin-top: 40px;">
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="worldadsth-register-img"></div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="worldadsth-register-form">
                <h3>สร้างบัญชีใหม่ / Register</h3>
                <p>หากคุณมีบัญชีอยู่แล้ว ให้ใช้อีเมลแอดเดรสในการ<a href="/login">ลงชื่อเข้าใช้งาน</a> หรือสร้างบัญชีใหม่ด้านล่าง หรือสร้างบัญชีใหม่ผ่าน facebook.com ด้านล่างสุด</p>
                <form role="form" method="POST" action="{{ url('/register') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="ontrol-label">ชื่อ</label>

                        <div>
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="control-label">E-Mail Address</label>

                        <div>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

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
                        <label for="password-confirm" class="control-label">Confirm Password</label>

                        <div>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-primary">
                                Register
                            </button>
                        </div>
                    </div>

                    <p>หรือ</p>

                    <div class="form-group">
                        <div>
                            <a class="btn btn-primary" disabled="disabled">
                                <i class="fa fa-facebook" aria-hidden="true"></i> Register with Facebook
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <hr style="border: 1px solid #000;">

    <footer>
        <p>worldadsth.com all right reserved.</p>
    </footer>
</div>
@endsection
