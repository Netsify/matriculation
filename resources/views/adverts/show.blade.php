@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> {{ $advert->title }} </h4>
                    </div>

                    <div class="card-body">
                        <p class="card-text"> {!! $advert->body !!} </p>
                        <div align="right"> {{ $advert->updated_at->format('j M H:i') }} </div>
                    </div>
                </div>

{{--                @include('comments.index')--}}
                @foreach($comments as $comment)
                    <div class="card-body">
                        <textarea class="form-control" rows="8" name="body">{!! $comment->body !!}</textarea>
                    </div>
                @endforeach

                <br>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Оставьте комментарий </h4>
                    </div>

                    <form action="{{ route('comments.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <textarea class="form-control" rows="8" name="body"></textarea>

                            <input type="hidden" name="advert_id" value="{{ $advert->id }}" />
                            <br>
                            <button class="btn btn-primary" type="submit">Отправить</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
