@extends('layout')

@section('title')
    Отправить вещь
@endsection

@section('content')
<h1 class="main__title"></h1>

<form action="{{route('sendThing')}}" class="main__send send" method="post">
    @csrf
    <label class="send__label">
        <input name="thing_id" type="text" class="send__input" value="{{$id}}">
        <span class="send__description">id вещи</span>
    </label>
    <label class="send__label">
        <select name="master">
            @foreach ($users as $user)
                <option value="{{$user -> id}}">{{$user -> name}}</option>
            @endforeach
        </select>
    </label>

    <button type="submit">Отправить</button>
</form>
@endsection
