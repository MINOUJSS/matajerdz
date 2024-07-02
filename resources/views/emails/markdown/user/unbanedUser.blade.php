@component('mail::message')
# تم تفعيل حسابك
@component('mail::panel')
<h1>مرحباً {{$user->name}}</h1>
<p>لقد تم تفعيل حسابك كموظف في منصتنا يمكنك الآن الإستفادة من جميع مزايا المنصة.</p>
@endcomponent

@endcomponent