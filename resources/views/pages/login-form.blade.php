@extends('layout')

@section('title')
    Логин
@endsection

@section('content')
<h1 class="main__title"></h1>

<form action="{{route('signin')}}" class="main__login login" method="post">
    @csrf
    <label class="login__label">
        <input name="email" type="email" class="login__input" placeholder="example@gmail.com">
        <span class="login__description">Ваш email</span>
    </label>
    <label class="login__label">
        <input name="password" type="password" class="login__input" placeholder="Ваш пароль">
        <span class="login__description">Ваш пароль</span>
    </label>
    <button class="login__button:submit">Войти</button>
</form>
@endsection
