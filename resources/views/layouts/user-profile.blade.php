@extends('layouts.app')
@section('content')
    <div class="my-2 d-flex justify-content-between">
        <h2 class="page-header">
            {{ $user->name }} <small>@yield('subtitle')</small>
        </h2>
        @include('users.partials.action-buttons', ['user' => $user])
    </div>
    @yield('user-content')
@endsection
