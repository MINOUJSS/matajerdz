@component('mail::message')
# تم حذف حسابك
@component('mail::panel')
<h1>مرحباً {{$user->name}}</h1>
<p>لقد تم حذف حسابك كموظف من منصتنا لإنتهاكك شروط إستخدام المنصة.</p>
@endcomponent

@endcomponent