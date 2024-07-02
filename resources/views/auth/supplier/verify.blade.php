@extends('auth.super-admin.login_template')  
 @section('content')
 <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url({{asset('admins/'.$template)}}/assets/images/big/auth-bg.jpg) no-repeat center center;">
            <div class="auth-box">
                <div id="">
                    <div class="logo">
                        <span class="db"><img src="{{asset('admins/'.$template)}}/assets/images/logo-icon.png" alt="logo" /></span>
                        <h5 class="font-medium m-b-20">التحقق من البريد الإلكتروني</h5>
                    </div>             
                    @if (session('resent'))
                        <div class="alert alert-success text-center" role="alert">
                            تم إرسال رابط تحقق جديد إلى عنوان بريدك الإلكتروني.
                        </div>
                    @endif    
                    <!-- Form -->
                    <div class="row">
                        <div class="col-12">
                            قبل المتابعة، يرجى التحقق من بريدك الإلكتروني للحصول على رابط التحقق.
                            إذا لم تتلق البريد الإلكتروني,
                            <form class="form-horizontal m-t-20" id="loginform1" method="POST" action="{{ route('supplier.verification.resend') }}" >            
                                @csrf
                                <div class="form-group text-center">
                                    <div class="col-xs-12 p-b-20">
                                        <button class="btn btn-block btn-lg btn-info" type="submit">متابعة</button>
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