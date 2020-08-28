<ul class="navbar-nav mr-auto">
    <li class="nav-item"><a class="nav-link {{ request()->routeIs('Home')?'active':'' }}" href="{{ route('Home') }}">Главная</a></li>
    <li class="nav-item"><a class="nav-link {{ request()->routeIs('News.index')?'active':'' }}" href="{{ route('News.index') }}">Все новости</a></li>
    <li class="nav-item"><a class="nav-link {{ request()->routeIs('Category.index')?'active':'' }}" href="{{ route('Category.index') }}">Категории новостей</a></li>
    <li class="nav-item">
        <div class="dropdown">
            <a class="nav-link dropdown-toggle {{ request()->routeIs('Admin.news.index')?'active':'' }}" href="{{ route('Admin.news.index') }}">Админка</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('Admin.news.index') }}">Управление новостями</a>
                <a class="dropdown-item" href="{{ route('Admin.categories.index') }}">Управление категориями</a>
            </div>
        </div>
        </li>
</ul>





