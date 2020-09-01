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
                        <h1>Управление пользователями</h1>
                        @forelse($users as $item)
                            <h2>{{ $item->name }}</h2>
                            <span>Status: <span id="userStatus" data-id="{{ $item->id }}">@if($item->is_admin) admin @else user @endif</span></span>
                            <div class="admin-buttons">
                                <a href="{{ route('Admin.users.edit', $item) }}" class="btn btn-success">
                                    Edit
                                </a>
                                <button id="toggleStatus" data-id="{{ $item->id }}" class="btn btn-warning">Change status</button>
                                <form action="{{ route('Admin.users.destroy', $item) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </form>
                            </div>
                            <hr>
                        @empty
                            Нет пользователей
                        @endforelse
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection