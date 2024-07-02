 @extends('auth.super-admin.login_template') 
 @section('js')
 {!! NoCaptcha::renderJs() !!}
 @endsection 
 @section('content')
 <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url({{asset('admins/'.$template)}}/assets/images/big/auth-bg.jpg) no-repeat center center;">
            <div class="auth-box">
                <div id="">
                    <div class="logo">
                        <span class="db"><img src="{{asset('admins/'.$template)}}/assets/images/logo-icon.png" alt="logo" /></span>
                        <h5 class="font-medium m-b-20">تسجيل الدخول</h5>
                    </div>             
                    @if (session('ErrorResponse'))
                    <div class="alert alert-danger">
                        <strong><i class="fas fa-exclamation-triangle"></i> {{session('ErrorResponse')}}</strong>
                    </div>  
                    @endif            
                    <!-- Form -->
                    <div class="row">
                        <div class="col-12">
                            <form class="form-horizontal m-t-20" id="loginform1" action="{{route('supplier.login.submit')}}"method="POST" >            
                                @csrf
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="ti-email"></i></span>
                                    </div>
                                    <input name="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{old('email')}}" placeholder="البريد الإلكتروني" aria-label="Username" aria-describedby="basic-addon1">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="ti-key"></i></span>                                        
                                    </div>
                                    <input name="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="كلمة المرور" aria-label="Password" aria-describedby="basic-addon1">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                {{-- start captch --}}
                                <div class="input-group mb-3">
                                    {!! NoCaptcha::display() !!}
                                    @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block text-danger">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                     @endif
                                </div>
                                {{-- end captch --}}
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="customCheck1">تذكرني</label>
                                            <a href="{{route('supplier.password.request')}}" id="to-recover" class="text-dark float-right"><i class="fa fa-lock m-r-5"></i> نسيت كلمة المرور ؟</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <div class="col-xs-12 p-b-20">
                                        <button class="btn btn-block btn-lg btn-info" type="submit">دخول</button>
                                    </div>
                                </div>
                                {{-- <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                                        <div class="social">
                                            <a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip" title="" data-original-title="Login with Facebook"> <i aria-hidden="true" class="fab  fa-facebook"></i> </a>
                                            <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip" title="" data-original-title="Login with Google"> <i aria-hidden="true" class="fab  fa-google-plus"></i> </a>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="form-group m-b-0 m-t-10">
                                    <div class="col-sm-12 text-center">
                                        ليس لدي حساب <a href="{{route('supplier.register')}}" class="text-info m-l-5"><b>تسجيل</b></a>
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
        
        