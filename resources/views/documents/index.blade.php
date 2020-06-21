@extends('layouts.app')

@section('content')
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

                    <div class="card mb-2 border-info">
                        <div class="card-header align-content-center">
                            Документ, удостоверяющий личность
                        </div>
                        <div class="card-body">
                            <input type="file" name="pass">
                        </div>
                    </div>

                    <div class="card mb-2 border-info">
                        <div class="card-header align-content-center">
                            Документ об образовании (аттестат)
                        </div>
                        <div class="card-body">
                            <input type="file" name="cert">
                        </div>
                    </div>

                    <div class="card mb-2 border-info">
                        <div class="card-header align-content-center">
                            Медицинская справка № 086-У
                        </div>
                        <div class="card-body">
                            <input type="file" name="med">
                        </div>
                    </div>

                    <div class="card mb-2 border-info">
                        <div class="card-header align-content-center">
                            Фотокарточка размером 3х4
                        </div>
                        <div class="card-body">
                            <input type="file" name="photo">
                        </div>
                    </div>

                    <div class="card mb-2 border-info">
                        <div class="card-header align-content-center">
                            Приписное свидетельство (для юношей)
                        </div>
                        <div class="card-body">
                            <input type="file" name="mil">
                        </div>
                    </div>

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
@endsection
