@extends('layouts.app')

@section('content')
    <div class="col-md-3">
        @include('layouts.menu')
    </div>

    <div class="col-md-9">
        <div class="card border-info">
            <div class="card-header border-info">
                <div class="d-flex align-items-center justify-content-center">
                    Просмотр анкеты
                </div>
            </div>

            <div class="card-body">
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
                    <label for="graduation_inst">Окончил(а) учебное заведение:</label>
                    <input type="text" class="form-control" name="graduation_inst" value="{{ $profile->graduation_inst }}" />
                </div>

                <div class="form-group">
                    <label for="graduation_year">Год окончания:</label>
                    <input type="date" class="form-control" name="graduation_year" value="{{ $profile->graduation_year }}" />
                </div>
            </div>
        </div>
    </div>
@endsection
