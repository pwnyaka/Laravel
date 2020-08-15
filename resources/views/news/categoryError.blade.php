@extends ("layouts.main")

@section('title')
    @parent Ошибка
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <h2>Такой категории новостей не существует!</h2>
    </div>
@endsection