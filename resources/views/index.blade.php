@extends ('layouts.main')

@section('title')
    @parentГлавная
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="page-header">
            <h2>Приветствую Вас на демонстрационном новостном портале!</h2>
            <p class="text-md-left">Данный проект выполнен с использованием фреймворка Laravel, исходный код проекта Вы
                можете найти по <a target="_blank" href="https://github.com/pwnyaka/Laravel">ссылке</a>.
            Данные для входа в учетную запись администратора: admin@admin.ru; pass: 123</p>
        </div>
    </div>

@endsection
