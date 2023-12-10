@extends('layouts.app')
@section('title', __('user.upcoming_birthday'))
@section('content')
    <div class="card text-center">
        <div class="card-header text-left">
            <h3 class="card-title">{{ __('birthday.upcoming') }}</h3>
        </div>
        <table class="table table-condensed">
            <thead>
                <tr>
                    <td>#</td>
                    <td class="text-left">{{ __('user.name') }}</td>
                    <td>{{ __('birthday.birthday') }}</td>
                    <td>{{ __('user.age') }}</td>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @forelse($users as $key => $user)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td class="text-left">{{ link_to_route('users.show', $user->name, $user->user_id) }}</td>
                        <td>
                            {{ $user->birthday->format('j M') }}
                            ({{ __('birthday.remaining', ['count' => $user->birthday_remaining]) }})
                        </td>
                        <td>{{ __('birthday.age_years', ['age' => $user->age]) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">{{ __('birthday.no_upcoming', ['days' => 60]) }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
