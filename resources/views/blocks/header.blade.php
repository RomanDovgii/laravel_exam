@section('header')
<header class="header">
    <div class="header__wrapper">
        <a href="" class="header__logo logo">
            <img src="" alt="" class="logo__img">
        </a>
        <nav class="header__navigation navigation">
            <ul class="navigation__list">
                <li class="navigation__item">
                    <a href="{{route('all-things')}}" class="navigation__link">Вещи</a>
                </li>
                <li class="navigation__item">
                    <a href="{{route('all-places')}}" class="navigation__link">Места</a>
                </li>
                @auth('web')
                <li class="navigation__item">
                    <a href="{{route('deleted-all-things')}}" class="navigation__link">Удаленные вещи</a>
                </li>
                @endauth
            </ul>
        </nav>
        @auth('web')
        @endauth
        <div class="header__user user">
            @auth('web')
            <div class="user__data">
                <a href="user.user-page" class="user__name">{{ Auth::user() -> name }}</a>
                <a href="{{route('logout')}}" class="user__exit">Выйти</a>
            </div>
            <a href="user-page" class="user__link">
                <img src="" alt="" class="user__avatar">
            </a>
            @endauth
            @guest('web')
            <ul class="user__actions">
                <li class="user__action">
                    <a href="{{route('showSignin')}}" class="user__action-link">Войти</a>
                </li>
                <li class="user__action">
                    <a href="{{route('showSignup')}}" class="user__action-link">Зарегистрироваться</a>
                </li>
            </ul>
            @endguest
        </div>
    </div>
</header>
