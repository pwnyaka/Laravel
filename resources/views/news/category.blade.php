@extends ("layouts.main")

@section('title')
    @parentНовости
@endsection

@section('menu')
    @include('menu')
@endsection
@section('content')
    <div class="container">
        <h2>Новости категории {{ $category }}</h2>
        <div class="row justify-content-left">
            @forelse($news as $item)
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <div class="caption">
                            <h3>{{ $item->title }}</h3>
                            <a href="{{ route('News.one', $item->id) }}"><img class="news-img__mini" src="{{ $item->image ?? asset('storage/default.jpg') }}" alt=""></a>
                            @if (!$item->isPrivate)
                                <p><a href="{{ route('News.one', $item->id) }}" class="btn btn-primary" role="button">Подробнее</a></p>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                Нет новостей
            @endforelse
        </div>
    </div>
@endsection
