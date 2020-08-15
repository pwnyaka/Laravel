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
                            <h3>{{ $item['title'] }}</h3>
                            <p>...</p>
                            @if (!$item['isPrivate'])
                            <p><a href="{{ route('News.one', $item['id']) }}" class="btn btn-primary" role="button">Подробнее</a></p>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                Нет новостей
            @endforelse

        </div>
{{--        <div class="row justify-content-left">--}}
{{--            <div class="col-md-8">--}}
{{--                <h2>Новости</h2>--}}

{{--                @forelse($news as $item)--}}
{{--                    <h2>{{ $item['title'] }}</h2>--}}
{{--                    @if (!$item['isPrivate'])--}}
{{--                        <a href="{{ route('News.one', $item['id']) }}">Подробнее...</a><br>--}}
{{--                    @endif--}}
{{--                @empty--}}
{{--                    Нет новостей--}}
{{--                @endforelse--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>








@endsection


