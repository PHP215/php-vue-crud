@component('mail::message')
# Order confirmation

Your order has been successfully placed
{{-- {{$details['title']}}
{{$details['body']}} --}}
@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
