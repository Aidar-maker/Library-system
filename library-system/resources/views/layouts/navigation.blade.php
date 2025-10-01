<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
    <div class="container">
        <!-- Логотип -->
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="./logo.png" alt="Logo" class="d-inline-block align-text-top me-2">
        </a>

        <!-- Кнопка для мобильных устройств -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Навигационное меню -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Левая часть навигации -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ route('home') }}">{{ __('Главная') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('books*') ? 'active' : '' }}" href="{{ route('books.index') }}">{{ __('Каталог книг') }}</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('profile') ? 'active' : '' }}" href="{{ route('profile.index') }}">{{ __('Личный кабинет') }}</a>
                    </li>
                @endauth
            </ul>

            <!-- Правая часть навигации -->
            <ul class="navbar-nav ms-auto">
                <!-- Аутентификация -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Вход') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                        </li>
                    @endif
                @else
                    <!-- Профиль пользователя -->
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                {{ __('Профиль') }}
                            </a>

                            <!-- Админ-ссылки -->
                            @if(Auth::check() && Auth::user()->is_admin)
                                <div class="dropdown-divider"></div>
                                <h6 class="dropdown-header">Администратор</h6>
                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                    {{ __('Админ-панель') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.books.index') }}">
                                    {{ __('Управление книгами') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.users.index') }}">
                                    {{ __('Управление пользователями') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.reports.index') }}">
                                    {{ __('Отчеты') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.settings.index') }}">
                                    {{ __('Настройки системы') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.loans.create') }}">
                                    {{ __('Выдача книги') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.loans.return.index') }}">
                                    {{ __('Возврат книги') }}
                                </a>
                            @endif

                            <div class="dropdown-divider"></div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                                <button type="submit" class="dropdown-item">{{ __('Выход') }}</button>
                            </form>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Выход') }}
                            </a>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>