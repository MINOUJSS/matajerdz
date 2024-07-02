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
@section('content')
dropshiper
@endsection
{{-- end dashboard content  --}}
@section('page_js')
<script sec="{{asset('admins/'.$template)}}/dist/js/sidebarmenu.js"></script>
<script src="{{asset('admins/'.$template)}}/assets/libs/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="{{asset('admins/'.$template)}}/assets/libs/sweetalert2/sweet-alert.init.js"></script>
@include('admins.super-admin.components.general.general_js')
@endsection