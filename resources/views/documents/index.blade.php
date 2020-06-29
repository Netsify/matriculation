@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                @include('layouts.menu')
            </div>

            <div class="col-md-9">
                <div class="card border-info">
                    <div class="card-header border-info">
                        <div class="d-flex align-items-center justify-content-center">
                            Отправка документов
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('documents.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            @foreach($documentTypes as $documentType)
                                <div class="card mb-3 border-info">
                                    <div class="card-header align-content-center">
                                        {{ $documentType->title }}
                                    </div>
                                    <div class="card-body d-flex justify-content-between">
                                        <input type="file" name="{{ "{$documentType->slug}{$documentType->id}" }}">
                                        @php
                                            $documentInfo = $document->getDocumentInfo($documentType->id)
                                        @endphp
{{--                                        {{ $documentInfo ?--}}
{{--                                        "{$documentInfo['name']} загружен {$documentInfo['created_at']->format('j M H:i')}" :--}}
{{--                                        'Документ отсутствует' }}--}}
                                        @if($documentInfo)
                                            <strong>{{ "{$documentInfo['name']} загружен
                                                        {$documentInfo['created_at']->format('j M H:i')}" }}</strong>
                                        @else
                                            Документ отсутствует
                                        @endif
                                    </div>
                                </div>
                            @endforeach

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Отправить</button>
                            </div>
                        </form>
                    </div>

                    <div class="col-sm-8 offset-sm-2">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger d-flex align-items-center justify-content-center mb-2">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif

                        <div class="col-sm-12">
                            @if(session()->get('message'))
                                <div class="alert alert-success d-flex align-items-center justify-content-center mb-2">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
