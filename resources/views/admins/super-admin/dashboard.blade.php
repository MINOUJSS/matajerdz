@extends('admins.layouts.'.$template.'.app')
@section('title')
  Super Admin | {{$page_title}}
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
   {{-- @include('admins.layouts.'.$template.'.elements.dashboard_contents.sales_chart')
   @include('admins.layouts.'.$template.'.elements.dashboard_contents.email_compain_chart')
   @include('admins.layouts.'.$template.'.elements.dashboard_contents.revenue')
   @include('admins.layouts.'.$template.'.elements.dashboard_contents.recent_comment_and_chats') --}}
@endsection
{{-- end dashboard content  --}}
@section('page_js')
@include('admins.super-admin.components.general.general_js')
@endsection