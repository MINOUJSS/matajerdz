@component('mail::message')
# تم حضر حسابك
@component('mail::panel')
<h1>مرحباً {{$supplier->name}}</h1>
<p>لقد تم حضر حسابك كمورد من منصتنا لإنتهاكك شروط إستخدام المنصة.</p>
@endcomponent

@endcomponent