@component('mail::message')
# Nueva nota registrada

    Hola {{$user->name}}, Se ha publicado la siguiente nota: "{{$noteTitle}}""  en el grupo "{{$groupName}}"


@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
