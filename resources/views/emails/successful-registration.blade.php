@component('mail::message')

@component('mail::panel')

{{$message}}


Registration Dues: **{{ $isPaid ? 'PAID' : 'UNPAID' }}**

@component('mail::button', ['url' => 'https://tacnabujametro.org'])
Visit Site
@endcomponent

@endcomponent

@endcomponent
