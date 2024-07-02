@extends('auth.super-admin.login_template') 
@section('js')
{!! NoCaptcha::renderJs() !!}
@endsection 
@section('content')
<!-- ============================================================== -->
       <!-- Login box.scss -->
       <!-- ============================================================== -->
       <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url({{asset('admins/'.$template)}}/assets/images/background/login-register.jpg) no-repeat center center;">
        <div class="auth-box on-sidebar">
            <div>
                <div class="logo">
                    <span class="db"><img src="{{asset('admins/'.$template)}}/assets/images/logo-icon.png" alt="logo" /></span>
                    <h5 class="font-medium m-b-20">تسجيل حساب شركة شحن</h5>
                </div>
                <!-- Form -->
                <div class="row">
                    <div class="col-12">
                        <form method="POST" class="form-horizontal m-t-20" action="{{ route('company-livereur.register') }}">
                            @csrf
                            <div class="form-group row ">
                                <div class="col-12 ">
                                    <input name="name" class="form-control form-control-lg @error('name') is-invalid @enderror" type="text" value="{{ old('name') }}" placeholder="الإسم" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12 ">
                                    <input name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" type="text" placeholder="البريد الإلكتروني" value="{{ old('email') }}" required autocomplete="email">
                                    
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12 ">
                                    <input class="form-control form-control-lg @error('phone') is-invalid @enderror" type="number" placeholder="رقم هاتف جزائري" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12 ">
                                    <input class="form-control form-control-lg @error('company_name') is-invalid @enderror" type="text" placeholder="إسم شركتك يجب أن يكون فريداً و مميز" name="company_name" value="{{ old('company_name') }}" required autocomplete="company_name">
                                    @error('company_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12 ">
                                    <select class="form-control form-control-lg @error('wilaya') is-invalid @enderror" name="wilaya">
                                        @foreach ($wilayas as $wilaya)
                                        <option value="{{$wilaya->id}}" @if(old('wilaya')==$wilaya->id){{'selected'}}@endif>{{$wilaya->ar_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('wilaya')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12 ">
                                    <input class="form-control form-control-lg @error('password') is-invalid @enderror" type="password" required=" " placeholder="كلمة المرور" name="password" value="{{ old('password') }}" required autocomplete="password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12 ">
                                    <input class="form-control form-control-lg" type="password" placeholder="تأكيد كلمة المرور" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12 ">
                                    <div class="custom-control custom-checkbox">
                                        <input name="terms" type="checkbox" class="custom-control-input " id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">لقد إطلعت على شروط و سياسة الإستخدام و أوافق عليها. <a href="javascript:void(0)">الشروط</a></label>                                       
                                    </div>                                                                                                                                                                                                                                                                       
                                </div>
                                <div class="col-md-12">
                                    @error('terms')
                                    <div class="is-invalid text-danger">                                    
                                            <strong>{{ $message }}</strong>                                     
                                    </div>        
                                        @enderror
                                </div>
                            </div>                            
                            <div class="form-group row">
                            {{-- start captch --}}
                            <div class="col-md-12 input-group mb-3">
                                {!! NoCaptcha::display() !!}
                                @if ($errors->has('g-recaptcha-response'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                </span>
                                 @endif
                                </div>
                            </div>
                            {{-- end captch --}}
                            <div class="form-group text-center ">
                                <div class="col-xs-12 p-b-20 ">
                                    <button class="btn btn-block btn-lg btn-info " type="submit ">تسجيل</button>
                                </div>
                            </div>
                            <div class="form-group m-b-0 m-t-10 ">
                                <div class="col-sm-12 text-center ">
                                    هل تملك حساب على الموقع? <a href="{{route('company-livereur.login')}}" class="text-info m-l-5 "><b>تسجيل الدخول</b></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
       <!-- ============================================================== -->
       <!-- Login box.scss -->
       <!-- ============================================================== -->    
@endsection     
       
       