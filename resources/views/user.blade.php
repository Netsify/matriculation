@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($users as $user)

                    <div class="card">
                        <div class="card-header" align="center">
                            {{ $user->name }}
                        </div>

                        <div class="card-body">

                            <div class="card">
                                <div class="card-body">
                                    <div class="card-text">
                                        {{ $user->email }}
                                        <br>
                                        {{ $user->profile->school }}
                                        <br>
                                        {{ $user->profile->citizenship }}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <br>

                @endforeach
            </div>
        </div>
    </div>
@endsection
