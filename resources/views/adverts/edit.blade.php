@extends('layouts.app')

@section('content')
    <div class="col-md-3">
        @include('layouts.menu')
    </div>

    <div class="col-md-9">
        <div class="card">
            <form action="{{ route('adverts.update', $advert->id) }}" method="post">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="title">Заголовок:</label>
                    <input type="text" class="form-control" name="title" value="{{ $advert->title }}" />
                </div>

                <div class="form-group">
                    <label for="body">Текст объявления</label>
                    <textarea class="form-control" name="body"> {{ $advert->body }} </textarea>
                </div>

                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
        </div>

        <div class="col-sm-8 offset-sm-2">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <div class="col-sm-12">
            @if(session()->get('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
        </div>
    </div>
@endsection
