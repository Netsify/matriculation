@extends('layouts.app')

@section('content')
    <div class="col-md-3">
        @include('layouts.menu')
    </div>

    <div class="col-md-9">
        <div class="card border-info">
            <div class="card-header border-info">
                <div class="d-flex align-items-center justify-content-center">
                    Редактирование анкеты
                </div>
            </div>

            <div class="card-body">
                <form action="{{ route('profiles.update', $profile->id) }}" method="POST">
                    @method('PATCH')
                    @csrf

                    <div class="form-group">
                        <label for="birthday">День рождения:</label>
                        <input type="date" class="form-control" name="birthday" value="{{ $profile->birthday }}" />
                    </div>

                    <div class="form-group">
                        <label>Пол:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="genderM" id="genderM">
                            <label class="form-check-label" for="genderM">М</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="genderW" id="genderW">
                            <label class="form-check-label" for="genderW">Ж</label>
                        </div>
                    </div>
{{--                        <input type="text" class="form-control" name="gender" value="{{ $profile->gender }}" />--}}

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
                        <label for="graduation_year">Дата окончания:</label>
                        <input type="date" class="form-control" name="graduation_date" value="{{ $profile->graduation_date }}" />
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
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
