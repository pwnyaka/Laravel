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
                        <h1>Управление категориями</h1>
                        @forelse($categories as $item)
                            <h2>{{ $item->title }}</h2>
                            <a href="{{ route('Admin.categories.edit', $item) }}" class="btn btn-success">
                                Edit
                            </a>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{ $item->id }}">
                                Delete
                            </a>
                            <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Внимание</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Вы собираетесь удалить категорию новостей {{ $item->title }}, так же будут удалены все новости этой категории
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                                            <form action="{{ route('Admin.categories.destroy', $item) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" class="btn btn-danger" value="Удалить">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @empty
                            Нет категорий
                        @endforelse
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection