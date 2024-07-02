@extends('store.layouts.'.$template.'.app')
@section('header')
    @include('store.layouts.'.$template.'.master.header.main')
@endsection
<h1>مرحبا بالعالم</h1>
@section('footer')
@include('store.layouts.'.$template.'.master.footer.main')
@endsection
@section('jsfiles')
@include('store.layouts.'.$template.'.master.footer.jsfiles') 
@endsection