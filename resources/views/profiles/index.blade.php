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

            <form method="post" action="{{ route('profile.store') }}">
                @csrf
                <div class="form-group">
                    <label for="school">Школа:</label>
                    <input type="text" class="form-control" name="school" value="{{ $profile->school }}" />
                </div>

                <div class="form-group">
                    <label for="graduation_year">Год окончания:</label>
                    <input type="text" class="form-control" name="graduation_year" value="{{ $profile->graduation_year }}" />
                </div>

                <div class="form-group">
                    <label for="citizenship">Гражданство:</label>
                    <input type="text" class="form-control" name="citizenship" value="{{ $profile->citizenship }}" />
                </div>
                <div class="form-group">
                    <label for="city">Город:</label>
                    <input type="text" class="form-control" name="city" value="{{ $profile->city }}" />
                </div>
                <div class="form-group">
                    <label for="address">Адрес:</label>
                    <input type="text" class="form-control" name="address" value="{{ $profile->address }}" />
                </div>
                <button type="submit" class="btn btn-primary">Сохранить</button>
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
