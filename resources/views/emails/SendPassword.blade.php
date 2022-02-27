@component('mail::message')
# Introduction

this is your password for bms <h3>{{$password}}</h3>

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
