@extends('layouts.app')

@section('content')
    <h1>Modify your profile</h1>
    <!-- Error message -->
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif

    @if (session()->has('back'))
        <div class="alert alert-danger">
            {{ session()->get('back') }} to <a href="{{ route('user.show', Auth::id()) }}">your profile page.</a>
        </div>
    @endif

    <form action="{{ route('user.update', Auth::id()) }}" method="post" autocomplete="off">
    @csrf
    <!-- Name -->
        <label id="name_label" for="name">Name</label>
        <input type="text" name="name" id="name" autocomplete="off" placeholder="{{ Auth::user()->name }}">
        <br>

        <!-- Email -->
        <label for="email">Email</label>
        <input type="email" name="email" id="email" autocomplete="off" placeholder="{{ Auth::user()->email }}">
        <br>

        <!-- Password -->
        <label for="password">Password</label>
        <input type="password" name="password" id="password" autocomplete="off">
        <br>

        <!-- Conf Password -->
        <label for="confPassword">Confirm Password</label>
        <input type="password" name="confPassword" id="confPassword">
        <br>

        <!-- Submit -->
        <button type="submit" name="submit" value="isSent">Send</button>
    </form>
@endsection
