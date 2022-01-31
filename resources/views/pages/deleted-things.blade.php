@extends('layout')

@section('title')
    Вещи
@endsection

@section('content')
<h1 class="main__title">Удаленные вещи</h1>

<ul class="main__list">
    @foreach ($things as $thing)
        <li class="main__thing.thing">
            <h2 class="thing__name">{{ $thing -> name }}</h2>
            <p class="thing__description">{{ $thing -> description }}</p>
            @if(($thing -> restoration) == '0')
            <a href="{{url('/deleted-things/restore', $thing -> id)}}" class="thing__edit">Восстановить</a>
            @endif
        </li>
    @endforeach
</ul>

{{ $things -> links() }}
@endsection
