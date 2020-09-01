@extends('layouts.main')

@section('title', 'Создание пользователя')

@section ('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">@if (!$user->id) Добавление @else Изменение @endif пользователя </div>

                    <div class="card-body">
                        <form method="POST" action="@if (!$user->id){{ route('Admin.users.store') }}@else{{ route('Admin.users.update', $user) }}@endif">
                            @csrf
                            @if($user->id) @method('PUT') @endif

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Имя пользователя</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @if($errors->has('name')) is-invalid @endif" name="name" value="{{ old('name') ?? $user->name }}" autofocus>
                                    @if($errors->has('name'))
                                        @foreach($errors->get('name') as $error)
                                            <div class="invalid-feedback">{{ $error }}</div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email адрес</label>
                                <div class="col-md-6">
                                    <input id="email" class="form-control @if($errors->has('email')) is-invalid @endif" name="email" value="{{ old('email') ?? $user->email }}">
                                    @if($errors->has('email'))
                                        @foreach($errors->get('email') as $error)
                                            <div class="invalid-feedback">{{ $error }}</div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">@if ($user->id)Новый пароль @else Пароль @endif</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @if($errors->has('password')) is-invalid @endif" name="password">
                                    @if($errors->has('password'))
                                        @foreach($errors->get('password') as $error)
                                            <div class="invalid-feedback">{{ $error }}</div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Подтверждение пароля</label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control @if($errors->has('password_confirmation')) is-invalid @endif" name="password_confirmation">
                                    @if($errors->has('password_confirmation'))
                                        @foreach($errors->get('password_confirmation') as $error)
                                            <div class="invalid-feedback">{{ $error }}</div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        @if ($user->id) Изменить @else Добавить @endifпользователя
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection