@extends('admins.layouts.'.$template.'.app')
@section('title')
    Local Livereur dashboard
@endsection
@section('topbar_header')
@include('admins.local_livereur.starte_elements.in_all_pages.topbar_header.main')
@endsection
@section('left_sidebar')
@include('admins.layouts.defaulte.elements.header_contents.left_sidebar')
@include('admins.layouts.defaulte.starte_elements.in_all_pages.left_sidebar')
@endsection

{{-- start dashboard content  --}}
@section('content')
   {{-- @include('admins.layouts.'.$template.'.elements.dashboard_contents.sales_chart')
   @include('admins.layouts.'.$template.'.elements.dashboard_contents.email_compain_chart')
   @include('admins.layouts.'.$template.'.elements.dashboard_contents.revenue')
   @include('admins.layouts.'.$template.'.elements.dashboard_contents.recent_comment_and_chats') --}}
@endsection
{{-- end dashboard content  --}}
@section('footer')
    @include('admins.layouts.'.$template.'.inc.footer')
@endsection