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
                        <form enctype="multipart/form-data"
                              action="@if (!$news->id){{ route('Admin.news.store') }}@else{{ route('Admin.news.update', $news) }}@endif"
                              method="post">
                            @csrf

                            @if($news->id) @method('PUT') @endif

                            <div class="form-group">
                                <label for="newsTitle">Заголовок новости</label>
                                <input type="text" name="title" id="newsTitle"
                                       class="form-control @if($errors->has('title')) is-invalid @endif"
                                       value="{{ old('title') ?? $news->title }}">
                                @if($errors->has('title'))
                                    @foreach($errors->get('title') as $error)
                                        <div class="invalid-feedback">{{ $error }}</div>
                                    @endforeach
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="newsCategory">Категория новости</label>
                                <select name="category_id" id="newsCategory"
                                        class="form-control @if($errors->has('category_id')) is-invalid @endif">

                                    @forelse($categories as $item)
                                        @if(old('category_id'))
                                            <option @if ($item->id == old('category_id')) selected
                                                    @endif value="{{ $item->id }}">{{ $item->title }}</option>
                                        @else
                                            <option @if ($news->category_id == $item->id) selected
                                                    @endif value="{{ $item->id }}">{{ $item->title }}</option>
                                        @endif
                                    @empty
                                        <option value="0" selected>Нет категории</option>
                                    @endforelse
                                </select>
                                @if($errors->has('category_id'))
                                    @foreach($errors->get('category_id') as $error)
                                        <div class="invalid-feedback">{{ $error }}</div>
                                    @endforeach
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="newsText">Текст новости</label>
                                <textarea name="text" id="newsText"
                                          class="form-control @if($errors->has('text')) is-invalid @endif">{!! old('text') ?? $news->text !!}</textarea>
                                @if($errors->has('text'))
                                    @foreach($errors->get('text') as $error)
                                        <div class="invalid-feedback">{{ $error }}</div>
                                    @endforeach
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="newsImage">Изображение для новости</label>
                                <input type="file" name="image" id="newsImage">
                                @if($errors->has('image'))
                                    @foreach($errors->get('image') as $error)
                                        <div class="invalid-feedback">{{ $error }}</div>
                                    @endforeach
                                @endif
                            </div>

                            <div class="form-check">
                                <input @if ($news->isPrivate == 1 || old('isPrivate') == 1) checked
                                       @endif  id="newsPrivate" name="isPrivate"
                                       type="checkbox" value="1"
                                       class="form-check-input @if($errors->has('isPrivate')) is-invalid @endif">
                                <label for="newsPrivate">Приватная</label>
                                @if($errors->has('isPrivate'))
                                    @foreach($errors->get('isPrivate') as $error)
                                        <div class="invalid-feedback">{{ $error }}</div>
                                    @endforeach
                                @endif
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-outline-primary"
                                       value="@if ($news->id) Изменить @elseДобавить новость@endif">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection