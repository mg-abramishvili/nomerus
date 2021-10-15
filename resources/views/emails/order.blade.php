@component('mail::message')
# Новый заказ на сайте Номерус.РФ

Клиент:<br>{{ $client_type }}
<br><br>

@isset($name)
Имя:<br>{{ $name }}
<br><br>
@endisset

Телефон:<br>{{ $tel }}
<br><br>

@isset($email)
E-mail:<br>{{ $email }}
<br><br>
@endisset

@isset($company)
    Компания:<br>{{ $company }}
    <br><br>
@endisset

Заказ:<br>
@foreach($items as $item)
{{ $item->type }}
<br>
@isset($item->komplekt_type)
+ {{ $item->komplekt_type }}
<br>
@endisset
{{ $item->number }}
<br>
{{ $item->price }} руб.
@endforeach
<br><br>

Стоимость:<br>{{ $price }} руб.
<br><br>

@endcomponent