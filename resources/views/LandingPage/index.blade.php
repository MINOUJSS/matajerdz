@extends('LandingPage.layouts.'.$template.'.app')
@section('header')
  @include('LandingPage.layouts.'.$template.'.sections.header')  
@endsection
@section('hero')
  @include('LandingPage.layouts.'.$template.'.sections.hero')  
@endsection
{{-- @section('cliens')
  @include('LandingPage.layouts.'.$template.'.sections.cliens')   
@endsection --}}
@section('about')
  @include('LandingPage.layouts.'.$template.'.sections.about')  
@endsection
@section('why-us')
  @include('LandingPage.layouts.'.$template.'.sections.why-us')  
@endsection
@section('skills')
  @include('LandingPage.layouts.'.$template.'.sections.skills')  
@endsection
@section('services')
  @include('LandingPage.layouts.'.$template.'.sections.services')  
@endsection
@section('cta')
  @include('LandingPage.layouts.'.$template.'.sections.cta')  
@endsection
{{-- @section('portfolio')
  @include('LandingPage.layouts.'.$template.'.sections.portfolio')  
@endsection --}}
{{-- @section('team')
  @include('LandingPage.layouts.'.$template.'.sections.team')  
@endsection --}}
@section('pricing')
  @include('LandingPage.layouts.'.$template.'.sections.pricing')  
@endsection
@section('faq')
  @include('LandingPage.layouts.'.$template.'.sections.faq')  
@endsection
@section('contact')
  @include('LandingPage.layouts.'.$template.'.sections.contact')  
@endsection
@section('footer')
    @include('LandingPage.layouts.'.$template.'.sections.footer')
@endsection
@section('jsfiles')
    @include('LandingPage.layouts.'.$template.'.sections.jsfiles')
@endsection