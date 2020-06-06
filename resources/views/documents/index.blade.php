@extends('layouts.app')

@section('content')

    <div class="container">

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

        <div class="card">
            <div class="card-header" align="center">
                <h3>Загрузка документов</h3>
            </div>

            <div class="card-body">
                <form action="{{ route('documents.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="certificate">Аттестат</label>
                        <input type="file" name="certificate">
                    </div>

                    <div class="form-group">
                        <label for="passport">Удостоверение личности</label>
                        <input type="file" name="passport">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Отправить</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection
