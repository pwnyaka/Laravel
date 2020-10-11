@extends('layouts.main')

@section('title')
    @parent Вход
@endsection

@section ('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <h2>Обнаружено совпадение email</h2>
            Возможно Вы ранее выполняли вход через другую социальную сеть, с логином {{ $user->email }} хотели бы Вы связать аккаунты?
            <a href="" class="btn btn-danger">Нет</a>
            <a href="{{ route('binding', $user->email) }}" class="btn btn-success">Да</a>

    </div>

@endsection