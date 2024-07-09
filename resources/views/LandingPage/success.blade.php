@extends('LandingPage.layouts.'.$template.'.app')
@section('header')
  @include('LandingPage.layouts.'.$template.'.sections.header')  
@endsection
@section('hero')
@include('LandingPage.layouts.'.$template.'.sections.hero')  
@endsection
@section('about')
   {{--  --}}
   <div class="container">
    <div class="row">
        <div class="card mt-5 mb-5">
            <div class="card-header">
              معلومات الدفع
            </div>
            <div class="card-body">
              @if($paiment->status=="paid")
              <h5 class="card-title text-success">لقد تمت عملية الدفع بنجاح</h5>
              <p class="card-text">تم الآن تفعيل حسابك</p>
              <ul class="list-group" dir="ltr">
                @foreach ($paiment as $key=>$value)
                 <li class="list-group-item">{{$key }}:{{ $value}}</li>   
                @endforeach
              </ul>
              @elseif($paiment->status=="pending")
              <h5 class="card-title text-warning">عملية الدفع غير مكتملة</h5>
              <p class="card-text">يمكنك إكمال عملية الدفع من خلال الضغط على الزر أسفله</p>
              <ul class="list-group" dir="ltr">
                @foreach ($paiment as $key=>$value)
                <li class="list-group-item">{{$key }}:{{ $value}}</li>   
                @endforeach
              </ul>
              <a href="{{$paiment->checkout_url}}" class="btn btn-primary">إكمال عملية الدفع</a>
              @else
              <h5 class="card-title text-danger">لقد فشلت عملية الدفع</h5>
              <p class="card-text">لقد تم إلغاء أو إنتهت صلاحية الدفع</p>
              <ul class="list-group" dir="ltr">
                @foreach ($paiment as $key=>$value)
                 <li class="list-group-item">{{$key }}:{{ $value}}</li>   
                @endforeach
              </ul>
              @endif
            </div>
          </div>
    </div>
   </div>
{{--  --}} 
@endsection
@section('footer')
    @include('LandingPage.layouts.'.$template.'.sections.footer')
@endsection
@section('jsfiles')
    @include('LandingPage.layouts.'.$template.'.sections.jsfiles')
@endsection