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
                        <p class="card-text"> {{ $advert->body }} </p>
                        <div align="right"> {{ $advert->updated_at }} </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
