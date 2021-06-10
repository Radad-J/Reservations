@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-10 mt-5 mb-5">
            <h1>Modify your profile</h1>
        </div>

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

        <form class="col-8" action="{{ route('user.update', Auth::id()) }}" method="post" autocomplete="off">
            @csrf
            <div class="form-group row">
                <!-- Name -->
                <label id="name_label" for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input style="border:solid 1px #bbb;border-radius:5px" class="form-control-plaintext pl-2" type="text" name="name" id="name" autocomplete="off"
                           placeholder="{{ Auth::user()->name }}">
                </div>
            </div>
            <div class="form-group row">
                <!-- Email -->
                <label class="col-sm-2 col-form-label" for="email">Email</label>
                <div class="col-sm-10">
                    <input style="border:solid 1px #bbb;border-radius:5px" class="form-control-plaintext pl-2" type="email" name="email" id="email" autocomplete="off"
                           placeholder="{{ Auth::user()->email }}">
                </div>
            </div>

            <div class="form-group row">
                <!-- Password -->
                <label class="form-label col-sm-2" for="password">Password</label>
                <div class="col-sm-10">
                    <input class="form-control" type="password" name="password" id="password" autocomplete="off">
                </div>
            </div>

            <div class="form-group row">
                <!-- Conf Password -->
                <label class="form-label col-sm-2" for="confPassword">Confirm Password</label>
                <div class="col-sm-10">
                    <input class="form-control" type="password" name="confPassword" id="confPassword">
                </div>
            </div>
            <div style="position: relative" class="form-group row">
                <!-- Submit -->
                <div class="col-sm-12">
                    <button style="width:150px;position:absolute;right:1rem;" class="btn btn-primary" type="submit" name="submit" value="isSent">Send</button>
                </div>
            </div>
        </form>
    </div>
@endsection
