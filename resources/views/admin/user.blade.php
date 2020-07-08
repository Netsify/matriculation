@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                @include('layouts.menu')
            </div>

            <div class="col-md-9">
                @foreach($users as $user)
                    <div class="card mb-4">
                        <div class="card-header" align="center">
                            {{ $user->getFullNameLong() }}
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <tr align="center">
                                    <th>id</th>
                                    <td>{{$user->id}}</td>
                                </tr>
                                <tr align="center">
                                    <th>ИИН</th>
                                    <td>{{$user->IIN}}</td>
                                </tr>
                                <tr align="center">
                                    <th>Email</th>
                                    <td>{{$user->email}}</td>
                                </tr>
                                <tr align="center">
                                    <th>Дата регистрации</th>
                                    <td>{{$user->created_at->format('j M H:i')}}</td>
                                </tr>
                                <tr align="center">
                                    <th>Роль</th>
                                    <td>{{$user->role->title}}</td>
                                </tr>
                                <tr align="center">
                                    <th></th>
                                    <td>
                                        @if($user->profile)
                                            <a href="{{ route('profiles.show', $user->profile->id) }}">Профиль</a>
                                        @else
                                            Профиль не создан
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
{{--                                        <td>--}}
{{--                                            @foreach($user->documents as $document)--}}
{{--                                                <a href="{{ Storage::url($document->path) }}" download="{{ $document->name }}">--}}
{{--    --}}{{--                                                {{ $document->documentType->title }}--}}
{{--                                                    {{ $document->name }}--}}
{{--                                                </a>--}}
{{--                                            @endforeach--}}
{{--                                        </td>--}}

{{--                            {{ $students->links() }}--}}
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection
