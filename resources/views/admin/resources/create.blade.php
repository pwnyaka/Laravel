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
                              action="@if (!$rsc->id){{ route('Admin.resources.store') }}@else{{ route('Admin.resources.update', $rsc) }}@endif"
                              method="post">
                            @csrf

                            @if($rsc->id) @method('PUT') @endif

                            <div class="form-group">
                                <label for="newsTitle">Resource URL</label>
                                <input type="text" name="title" id="newsTitle"
                                       class="form-control @if($errors->has('title')) is-invalid @endif"
                                       value="{{ old('title') ?? $rsc->title }}">
                                @if($errors->has('title'))
                                    @foreach($errors->get('title') as $error)
                                        <div class="invalid-feedback">{{ $error }}</div>
                                    @endforeach
                                @endif
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-outline-primary"
                                       value="@if ($rsc->id) Изменить @elseДобавить ресурс@endif">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection