@extends('layouts.main')

@section('title')
    @parent Пользователи
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <h2>Список пользователей</h2>
    </div>
@endsection