@extends('layouts.main')

@section('title', 'Создание новости')

@section ('menu')
    @include('admin.menu')
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form enctype="multipart/form-data" action="@if (!$category->id){{ route('Admin.categories.store') }}@else{{ route('Admin.categories.update', $category) }}@endif" method="post">
                            @csrf
                            @if ($category->id) @method('PUT') @endif
                            <div class="form-group">
                                <label for="categoryTitle">Название категории</label>
                                <input type="text" name="title" id="categoryTitle" class="form-control"
                                       value="{{ $category->title ?? old('title')}}">
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-outline-primary" value="@if ($category->id) Изменить @else Добавить категорию @endif">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection