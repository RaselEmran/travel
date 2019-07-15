@component('mail::message')
<p>Hello Sir {{$user->name}}</p>
 {!! $messege !!}

@component('mail::button', ['url' => $url])
Checkout
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
