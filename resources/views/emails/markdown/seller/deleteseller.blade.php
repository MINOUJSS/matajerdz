@component('mail::message')
# تم حذف حسابك
@component('mail::panel')
<h1>مرحباً {{$seller->name}}</h1>
<p>لقد تم حذف حسابك كبائع من منصتنا لإنتهاكك شروط إستخدام المنصة.</p>
@endcomponent

@endcomponent