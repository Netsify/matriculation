@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($users as $user)

                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center d-flex justify-content-between">
                                {{ $user->name }}
                            </div>
                        </div>

                        <div class="card-body">

                            <div class="card">
                                <div class="card-body">
                                    <div class="card-text">
                                        {{ $user->email }}
                                    </div>
                                    <div align="right">
                                        {{ $users->created_at }}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>
@endsection
