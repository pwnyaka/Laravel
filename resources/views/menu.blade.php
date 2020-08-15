<ul class="navbar-nav mr-auto">
    <li class="nav-item"><a class="nav-link" href="{{ route('Home') }}">Главная</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('News.index') }}">Все новости</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('Category.index') }}">Категории новостей</a></li>
    <li class="nav-item">
        <div class="dropdown">
            <a class="nav-link dropdown-toggle" href="{{ route('Admin.index') }}">Админка</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('Admin.users') }}">Пользователи</a>
                <a class="dropdown-item" href="{{ route('Admin.news') }}">Управление новостями</a>
            </div>
        </div>
        </li>
</ul>





