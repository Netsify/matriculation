@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

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

            </div>
        </div>
    </div>
@endsection
