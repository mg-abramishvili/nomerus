@component('mail::message')
# Новая заявка с сайта Номерус.РФ

Имя:<br>{{ $name }}
<br><br>

Телефон:<br>{{ $tel }}
<br><br>

Город:<br>{{ $city }}

@endcomponent