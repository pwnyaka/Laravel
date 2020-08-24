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
                        <form enctype="multipart/form-data" action="@if (!$news->id){{ route('Admin.news.store') }}@else{{ route('Admin.news.update', $news) }}@endif" method="post">
                            @csrf

                            @if($news->id) @method('PUT') @endif

                            <div class="form-group">
                                <label for="newsTitle">Заголовок новости</label>
                                <input type="text" name="title" id="newsTitle" class="form-control"
                                       value="{{ $news->title ?? old('title')}}">
                            </div>

                            <div class="form-group">
                                <label for="newsCategory">Категория новости</label>
                                <select name="category_id" id="newsCategory" class="form-control">

                                    @forelse($categories as $item)
                                        <option @if ($item->id == old('category') || $news->category_id == $item->id) selected
                                                @endif value="{{ $item->id }}">{{ $item->title }}</option>
                                    @empty
                                        <option value="0" selected>Нет категории</option>
                                    @endforelse
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="newsText">Текст новости</label>
                                <textarea name="text" id="newsText" class="form-control">{{ $news->text ?? old('text') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="newsImage">Изображение для новости</label>
                                <input type="file" name="image" id="newsImage">
                            </div>

                            <div class="form-check">
                                <input @if ($news->isPrivate == 1 || old('isPrivate') == 1) checked @endif  id="newsPrivate" name="isPrivate"
                                       type="checkbox" value="1" class="form-check-input">
                                <label for="newsPrivate">Приватная</label>

                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-outline-primary" value="@if ($news->id) Изменить @else Добавить новость @endif">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection