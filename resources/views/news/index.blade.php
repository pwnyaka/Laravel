@extends('layouts.main')

@section('title')
    @parent Новости
@endsection

@section('menu')
    @include('menu')
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-left">
            @forelse($news as $item)
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <div class="caption">
                            <h5 class="news-title">{{ $item->title }}</h5>
                            <a href="{{ route('News.one', $item) }}"><img class="news-img__mini" src="{{ $item->image ?? asset('storage/images/default.jpg') }}" alt=""></a>
                            @if (!$item->isPrivate)
                            <p><a href="{{ route('News.one', $item) }}" class="btn btn-primary" role="button">Подробнее</a></p>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                Нет новостей
            @endforelse
        </div>
        {{ $news->links() }}
    </div>
@endsection


