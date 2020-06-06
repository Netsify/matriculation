@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="card">
            <div class="card-header" align="center">
                <h3>Загрузка документов</h3>
            </div>

            <div class="card-body">

                @foreach($documents as $document)
                    <div class="form-group">
                        <a href="{{ $document->path }}" download="{{ $document->name }}">Скачать</a>
                    </div>
                @endforeach

            </div>
        </div>

    </div>

@endsection
