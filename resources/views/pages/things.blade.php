@extends('layout')

@section('title')
    Вещи
@endsection

@section('content')
<h1 class="main__title">Все вещи</h1>

@auth('web')
    <div class="main__controls">
        <a href="views.add-thing" class="main__add-thing">Добавить вещь</a>
    </div>
@endauth

@csrf

<form action="{{route('create-thing')}}" class="main__add-item add-item" method="post">
    @csrf
    <label class="add-item__label">
        <input name="name" type="text" class="add-item__input">
        <span class="add-item__description">Название вещи</span>
    </label>
    <label class="add-item__label">
        <textarea name="description" class="add-item__input"></textarea>
        <span class="add-item__description">Описание вещи</span>
    </label>
    <label class="add-item__label">
        <input name="wrnt" type="date" class="add-item__input">
        <span class="add-item__description">Дата хранения</span>
    </label>
    <button type="submit" class="add-item__submit">Добавить</button>
</form>

<ul class="main__list">
    @foreach ($things as $thing)
        <li class="main__thing.thing">
            <h2 class="thing__name">{{ $thing -> name }}</h2>
            <p class="thing__description">{{ $thing -> description }}</p>
            @auth('web')
            <a href="{{url('/things/edit', $thing -> id)}}" class="thing__edit">Изменить</a>
            <a href="{{url('/things/send', $thing -> id)}}" class="thing__edit">Передать</a>
            <a href="{{url('/things/delete', $thing -> id)}}" class="thing__delete">Удалить</a>
            @endauth
        </li>
    @endforeach
</ul>

{{ $things -> links() }}
@endsection
