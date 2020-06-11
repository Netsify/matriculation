@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">

            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center d-flex justify-content-between">
                        Объявления
                        @if(Auth::user()->accessAdvertOperations())
                            <a href="{{ route('adverts.create') }}" class="btn btn-primary">Новое объявление</a>
                        @endif
                    </div>
                </div>

                <div class="card-body">

                    @foreach($adverts as $advert)

                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    <a href="{{ route('adverts.show', $advert->id)}}"><h2> {{ $advert->title }} </h2></a>
                                </div>
                                <div class="card-text">
                                    {!! $advert->body !!}
                                </div>
                                <div align="right">
                                    {{ $advert->updated_at }}
                                </div>
                            </div>
                        </div>
                        <br/>

                        @if(Auth::user()->accessAdvertOperations())
                            <div class="d-flex justify-content-between">
                                <div>
                                    <a style="margin: 19px;" href="{{ route('adverts.edit', $advert->id)}}" class="btn btn-primary">Редактировать</a>
                                </div>

                                <div>
                                    <form style="margin: 19px;" action="{{ route('adverts.destroy', $advert->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit" onclick="return confirm('Вы уверены?')">Удалить</button>
                                    </form>
                                </div>
                            </div>
                        @endif

                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
