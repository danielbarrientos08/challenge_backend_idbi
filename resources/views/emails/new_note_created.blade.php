@component('mail::message')
# Nueva nota registrada

    Hola {{$user->name}}, Se ha publicado la siguiente nota: "{{$noteTitle}}""  en el grupo "{{$groupName}}"




@endcomponent

Grtacias,<br>

@endcomponent
