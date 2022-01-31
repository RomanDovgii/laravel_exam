@extends('layout')

@section('title')
    Места
@endsection

@section('content')
<h1 class="main__title">Все места</h1>

@auth('web')
    <div class="main__controls">
        <a href="views.add-place" class="main__add-place">Добавить место</a>
    </div>
@endauth

<ul class="main__list">
    @foreach ($places as $place)
        <li class="main__place.place">
            <h2 class="place__name">{{ $place -> name }}</h2>
            <p class="place__description">{{ $place -> description }}</p>
            <a href="" class="place__edit">Изменить</a>
        </li>
    @endforeach
</ul>

{{ $places -> links() }}
@endsection
