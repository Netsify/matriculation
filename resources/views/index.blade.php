@extends('layouts.app')

@section('content')
    <div class="col-md-3">
        @include('layouts.menu')
    </div>

    <div class="col-md-9">
        <div class="card border-info">
            <div class="card-header border-info">
                <div class="d-flex align-items-center justify-content-center">
                    Доска объявлений
                </div>
            </div>
            <div class="card-body">
                @foreach($adverts as $advert)
                    <div class="card mb-3 border-secondary">
                        <div class="card-body">
                            <div class="card-title">
                                <a href="{{ route('adverts.show', $advert->id)}}"><h2> {{ $advert->title }} </h2></a>
                            </div>
                            <div class="card-text">
                                {!! $advert->body_sentence !!}
                            </div>
                            <div align="right">
                                {{ $advert->updated_at->format('j M H:i') }}
                            </div>
                            @if(Auth::user()->accessModeration())
                                <div class="d-flex align-items-center justify-content-between">
                                    <a style="margin: 19px;" href="{{ route('adverts.edit', $advert->id) }}" class="btn btn-outline-success">Редактировать</a>

                                    <form style="margin: 19px;" action="{{ route('adverts.destroy', $advert->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger" type="submit" onclick="return confirm('Вы уверены?')">Удалить</button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
