@extends('layouts.app')

@section('content')
    <div class="col-md-3">
        @include('layouts.menu')
    </div>

    <div class="col-md-9">
        <div class="card border-info">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-center">
                    Загрузка документов
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('documents.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="pass">Документ, удостоверяющий личность</label>
                        <input type="file" name="pass">
                    </div>

                    <div class="form-group">
                        <label for="cert">Документ об образовании (аттестат)</label>
                        <input type="file" name="cert">
                    </div>

                    <div class="form-group">
                        <label for="med">Медицинская справка № 086-У</label>
                        <input type="file" name="med">
                    </div>

                    <div class="form-group">
                        <label for="photo">Фотокарточка размером 3х4</label>
                        <input type="file" name="photo">
                    </div>

                    <div class="form-group">
                        <label for="mil">Приписное свидетельство (для юношей)</label>
                        <input type="file" name="mil">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Отправить</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-sm-8 offset-sm-2">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br />
            @endif
        </div>
    </div>
@endsection
