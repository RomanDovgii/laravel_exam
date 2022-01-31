@extends('layout')

@section('title')
    Изменить вещь
@endsection

@section('content')
<h1 class="main__title">Все вещи</h1>

@csrf

<form action="{{route('edit-thing')}}" class="main__add-item add-item" method="post">
    @csrf
    <label class="add-item__label">
        <input name="id" type="text" class="add-item__input" value="{{$thing -> id}}">
        <span class="add-item__description">id вещи</span>
    </label>
    <label class="add-item__label">
        <input name="name" type="text" class="add-item__input" value="{{$thing -> name}}">
        <span class="add-item__description">Название вещи</span>
    </label>
    <label class="add-item__label">
        <textarea name="description" class="add-item__input">{{$thing -> description}}</textarea>
        <span class="add-item__description">Описание вещи</span>
    </label>
    <label class="add-item__label">
        <input name="wrnt" type="date" class="add-item__input" value="{{$thing -> date}}">
        <span class="add-item__description">Дата хранения</span>
    </label>
    <button type="submit" class="add-item__submit">Добавить</button>
</form>
@endsection
