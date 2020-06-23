@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                @include('layouts.menu')
            </div>

            <div class="col-md-9">
                <div class="card border-info mb-5">
                    <div class="card-header border-info">
                        <div class="d-flex align-items-center justify-content-center">
                            {{ $advert->title }}
                        </div>
                    </div>

                    <div class="card-body">
                        {!! $advert->body !!}
                        <div class="float-right">
                            {{ $advert->updated_at->format('j M H:i') }}
                        </div>
                    </div>
                </div>

                @include('comments.index')

                <div class="card border-info mb-5">
                    <div class="card-header border-info">
                        <div class="d-flex align-items-center justify-content-center">
                            Оставьте комментарий
                        </div>
                    </div>

                    <form action="{{ route('comments.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <textarea class="form-control" rows="8" name="body"></textarea>
                            </div>

                            <input type="hidden" name="advert_id" value="{{ $advert->id }}" />
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-primary" type="submit">Сохранить</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
