@component('mail::message')
# Order confirmation

Your order has been successfully placed
@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
