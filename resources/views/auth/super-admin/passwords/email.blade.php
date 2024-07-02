@extends('auth.super-admin.login_template') 
@section('content')
<div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url({{asset('admins/'.$template)}}/assets/images/big/auth-bg.jpg) no-repeat center center;">
    <div class="auth-box">
        <div id="loginform">
            <!-- Form -->
            <div class="row">
                <div class="col-12">
                    <div id="">
                        <div class="logo">
                            <span class="db"><img src="{{asset('admins/'.$template)}}/assets/images/logo-icon.png" alt="logo" /></span>
                            <h5 class="font-medium m-b-20">إستعادة كلمة المرور</h5>
                            <span>أدخل بريدك الإلكتروني وسيتم إرسال التعليمات إليك!</span>
                        </div>
                        <div class="row m-t-20">
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif
                            <!-- Form -->
                            <form class="col-12" method="POST" action="{{ route('super-admin.password.email') }}">
                                @csrf
                                <!-- email -->
                                <div class="form-group row">
                                    <div class="col-12">
                                        <input class="form-control form-control-lg @error('email') is-invalid @enderror" type="email" placeholder="البريد الإلكتروني" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- pwd -->
                                <div class="row m-t-20">
                                    <div class="col-12">
                                        <button class="btn btn-block btn-lg btn-danger" type="submit" name="action">إرسال</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection