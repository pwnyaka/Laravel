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
                        <h1>Управление ресурсами</h1>
                        @forelse($resources as $item)
                            <h2>{{ $item->title }}</h2>
                        <div class="admin-buttons">
                            <a href="{{ route('Admin.resources.edit', $item) }}" class="btn btn-success">
                                Edit
                            </a>
                            <form action="{{ route('Admin.resources.destroy', $item) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>
                        </div>
                            <hr>
                        @empty
                            Нет ресурсов
                        @endforelse
                        {{ $resources->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection