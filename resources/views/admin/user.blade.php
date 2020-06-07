@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-body">

                        <h3 align="center">Пользователи</h3>

                        <table class="table">
                            <thead>
                            <tr align="center">
                                <th scope="col">id</th>
                                <th scope="col">ИИН</th>
                                <th scope="col">Фамилия</th>
                                <th scope="col">Имя</th>
                                <th scope="col">Отчество</th>
                                <th scope="col">Email</th>
                                <th scope="col">Дата регистрации</th>
                                <th scope="col">Профиль</th>
                                <th scope="col">Аттестат</th>
                                <th scope="col">Удостоверение личности</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr align="center">
                                    <th scope="row">{{$user->id}}</th>
                                    <td>{{$user->IIN}}</td>
                                    <td>{{$user->surname}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->patronymic}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->created_at}}</td>
                                    <td><a href="{{ route('profiles.show', $user->profile->id) }}">Профиль</a></td>
                                    <td>
                                        @foreach($user->document as $document)
                                            <a href="{{ Storage::url($document->path) }}" download="{{ $document->name }}">
                                                {{ $document->documentType->title }}
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
{{--                            {{ $students->links() }}--}}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
