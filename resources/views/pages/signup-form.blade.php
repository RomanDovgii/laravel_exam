@extends('layout')

@section('title')
    Авторизация
@endsection

@section('content')
<h1 class="main__title"></h1>

<form action="{{route('showSignup')}}" class="main__login login" method="post">
    @csrf
    <label class="login__label">
        <input name="name" type="name" class="login__input" placeholder="Иванов Иван Иванович">
        <span class="login__description">Ваше имя</span>
    </label>
    <label class="login__label">
        <input name="email" type="email" class="login__input" placeholder="example@gmail.com">
        <span class="login__description">Ваш email</span>
    </label>
    <label class="login__label">
        <input name="password" type="password" class="login__input" placeholder="Ваш пароль">
        <span class="login__description">Пароль</span>
    </label>
    <label class="login__label">
        <input name="password_confirmation" type="password" class="login__input" placeholder="Повторите пароль">
        <span class="login__description">Ваш пароль</span>
    </label>
    <button type="submit" class="login__button">Зарегистрироваться</button>
</form>
@endsection
