@extends('admins.layouts.'.$template.'.app')
@section('meta')
    <meta name="csrf-token" content="{{csrf_token()}}">
@endsection
@section('title')
    Super Admin | {{$page_title}}
@endsection
@section('page_css')
<link href="{{asset('admins/'.$template)}}/assets/libs/footable/css/footable.core.min.css" rel="stylesheet"> 
<link href="{{asset('admins/'.$template)}}/assets/libs/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet"> 
@endsection
@section('topbar_header')
@include('admins.super-admin.components.general.topbar_header.main')
@endsection
@section('left_sidebar')
@include('admins.super-admin.components.general.left_sidebar.left_sidebar')
@endsection
@section('bread_crumb_and_right_sidebar_toggle')
@include('admins.layouts.defaulte.starte_elements.in_all_pages.bread_crumb')
@endsection
{{-- start dashboard content  --}}
{{-- @section('content')
   @include('admins.super-admin.components.users.tables.model1')
@endsection --}}
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                
                <div class="row">
                    <div class="col-lg-3">
                        <input class="form-control mb-2 " type="text" name="search_string" id="search_user" placeholder="إبحث عن الموظف">
                    </div>                    
                </div>
                <div id="table-data" class="row">
                @include('admins.super-admin.components.users.tables.model1')
                </div>
                
            </div>
        </div>
    </div>
   </div>
@endsection
{{-- end dashboard content  --}}
@section('page_js')
<script sec="{{asset('admins/'.$template)}}/dist/js/sidebarmenu.js"></script>
<script src="{{asset('admins/'.$template)}}/assets/libs/footable/dist/footable.all.min.js"></script>
<script src="{{asset('admins/'.$template)}}/dist/js/pages/tables/footable-init.js"></script>
{{-- <script src="{{asset('admins/'.$template)}}/assets/js/user.js"></script> --}}
<script src="{{asset('admins/'.$template)}}/assets/libs/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="{{asset('admins/'.$template)}}/assets/libs/sweetalert2/sweet-alert.init.js"></script>
@include('admins.super-admin.components.users.tables.users_js')
@include('admins.super-admin.components.general.general_js')
@endsection