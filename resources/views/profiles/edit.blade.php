@extends('layouts.app')

@section('content')
    <div class="row">

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

            <h3 align="center">Редактирование анкеты</h3>

            <form method="post" action="{{ route('profiles.update', $profile->id) }}">
                @csrf

                <div class="form-group">
                    <label for="birthday">День рождения:</label>
                    <input type="date" class="form-control" name="birthday" value="{{ $profile->birthday }}" />
                </div>

                <div class="form-group">
                    <label for="gender">Пол:</label>
                    <input type="text" class="form-control" name="gender" value="{{ $profile->gender }}" />
                </div>

                <div class="form-group">
                    <label for="phone">Номер телефона:</label>
                    <input type="number" class="form-control" name="phone" value="{{ $profile->phone }}" />
                </div>

                <div class="form-group">
                    <label for="address">Адрес:</label>
                    <input type="text" class="form-control" name="address" value="{{ $profile->address }}" />
                </div>

                <div class="form-group">
                    <label for="school">Окончил(а) учебное заведение:</label>
                    <input type="text" class="form-control" name="school" value="{{ $profile->school }}" />
                </div>

                <div class="form-group">
                    <label for="graduation_year">Год окончания:</label>
                    <input type="date" class="form-control" name="graduation_year" value="{{ $profile->graduation_year }}" />
                </div>

                <div align="center">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </form>
        </div>

        <div class="col-sm-12">

            @if(session()->get('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
        </div>

    </div>
@endsection
