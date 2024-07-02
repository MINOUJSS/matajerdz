@component('mail::message')
# تم حذف حسابك
@component('mail::panel')
<h1>مرحباً {{$supplier->name}}</h1>
<p>لقد تم حذف حسابك كمورد من منصتنا لإنتهاكك شروط إستخدام المنصة.</p>
@endcomponent

@endcomponent