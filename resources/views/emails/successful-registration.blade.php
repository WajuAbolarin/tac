@component('mail::message')

@component('mail::panel')

{{$message}}


Registration Dues: **{{ $isPaid ? 'PAID' : 'UNPAID' }}**

Registration Number: **{{ $reg_no }}**

@component('mail::button', ['url' => 'https://tacnabujametro.org'])
Visit Site
@endcomponent

@endcomponent

@endcomponent
