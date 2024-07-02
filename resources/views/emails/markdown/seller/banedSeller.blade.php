@component('mail::message')
# تم حضر حسابك
@component('mail::panel')
<h1>مرحباً {{$seller->name}}</h1>
<p>لقد تم حضر حسابك كبائع من منصتنا لإنتهاكك شروط إستخدام المنصة.</p>
@endcomponent

@endcomponent