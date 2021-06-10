@extends('layouts.app')

@section('title', 'Fiche d\'un type')

@section('content')
    <div class="card border-primary mt-3 mb-3 mx-auto" style="min-width: 20rem;">
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif
        <div class="card-body">
            <h4 class="card-title">{{ ucfirst($user->firstname) }} {{ ucfirst($user->lastname) }}</h4>
            <a href="{{ route('user.modify', Auth::id()) }}">Modify my profile</a>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">E-mail</th>
                    <th scope="col">Name</th>
                    <th scope="col">Last modified</th>
                </tr>
                </thead>
                <tbody>
                <tr class="table-active">
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->name }}</td>
                    @if($user->updated_at)
                        <td>{{ $user->updated_at }}</td>
                    @endif
                </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
