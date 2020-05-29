@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center d-flex justify-content-between">
                        <h4>Объявления</h4>
                        <a href="{{ route('adverts.create') }}" class="btn btn-primary">Новое объявление</a>
                    </div>
                </div>

                <div class="card-body">

                    @foreach($adverts as $advert)

                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title"> {{ $advert->title }} </h2>
                                <p class="card-text"> {{ $advert->body }} </p>
                                <div align="right"> {{ $advert->updated_at }} </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <div>
                                <a style="margin: 19px;" href="{{ route('adverts.edit', $advert->id)}}" class="btn btn-primary">Редактировать</a>
                            </div>

                            <div>
                                <a href="{{ route('adverts.show', $advert->id)}}">Далее</a>
                            </div>

                            <div>
                                <form style="margin: 19px;" action="{{ route('adverts.destroy', $advert->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Удалить</button>
                                </form>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
