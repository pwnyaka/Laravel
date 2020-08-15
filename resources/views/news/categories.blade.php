@extends('layouts.main')

@section('title')
    @parent Категории
@endsection

@section ('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <h2>Категории новостей</h2>
        @forelse($categories as $category)
            <a href="{{ route('Category.one', $category['slug']) }}">
                <h3>{{ $category['title'] }}</h3>
            </a>
        @empty
            Нет категорий
        @endforelse
    </div>

@endsection
