@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @foreach($adverts as $advert)

                <div class="card">
                    <div class="card-header">
                        {{ $advert->title }}
                    </div>

                    <div class="card-body">
                        {{ $advert->body }}
                    </div>
                </div>

                <div class="row">

                    <div>
                        <a style="margin: 19px;" href="{{ route('adverts.create')}}" class="btn btn-primary">Новое объявление</a>
                    </div>

                    <div>
                        <form action="{{ route('adverts.destroy', $advert->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </div>

                </div>

            @endforeach

        </div>
    </div>
</div>
@endsection
