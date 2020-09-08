<ul class="navbar-nav mr-auto">
    <li class="nav-item"><a class="nav-link" href="{{ route('Home') }}">Главная</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('Admin.news.index') }}">Админка</a></li>
    <li class="nav-item">
        <div class="dropdown">
            <a class="nav-link dropdown-toggle {{ request()->routeIs('Admin.news.index')?'active':'' }}" href="{{ route('Admin.news.index') }}">Управление новостями</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('Admin.news.create') }}">Создать новость</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <div class="dropdown">
            <a class="nav-link dropdown-toggle {{ request()->routeIs('Admin.categories.index')?'active':'' }}" href="{{ route('Admin.categories.index') }}">Управление категориями</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('Admin.categories.create') }}">Создать категорию</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <div class="dropdown">
            <a class="nav-link dropdown-toggle {{ request()->routeIs('Admin.users.index')?'active':'' }}" href="{{ route('Admin.users.index') }}">Управление пользователями</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('Admin.users.create') }}">Добавить пользователя</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <div class="dropdown">
            <a class="nav-link dropdown-toggle {{ request()->routeIs('Admin.resources.index')?'active':'' }}" href="{{ route('Admin.resources.index') }}">Управление ресурсами</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('Admin.resources.create') }}">Добавить ресурс</a>
            </div>
        </div>
    </li>
    <li class="nav-item"><a class="nav-link" href="{{ route('Admin.parser') }}">Парсер</a></li>
</ul>


