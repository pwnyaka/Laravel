@extends('layouts.main')

@section('title')
    @parent Админка
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h1>Управление новостями</h1>
                        @forelse($news as $item)
                            <h2>{{ $item->title }}</h2>
                        <div class="admin-buttons">
                            <a href="{{ route('Admin.news.edit', $item) }}" class="btn btn-success">
                                Edit
                            </a>
                            <form action="{{ route('Admin.news.destroy', $item) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>
                        </div>
                            <hr>
                        @empty
                            Нет новостей
                        @endforelse
                        {{ $news->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection