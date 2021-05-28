
@extends('layouts.app')

@section('title', 'Fiche d\'un type')

@section('content')
<div class="card border-primary mt-3 mb-3 mx-auto" style="min-width: 20rem;">
    <div class="card-body">
        <h4 class="card-title">{{ ucfirst($user->firstname) }} {{ ucfirst($user->lastname) }}</h4>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">E-mail</th>
                    <th scope="col">Login</th>
                    <th scope="col">Firstname</th>
                    <th scope="col">Lastname</th>
                </tr>
            </thead>
            <tbody>
                <tr class="table-active">
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->login }}</td>
                    <td>{{ $user->firstname }}</td>
                    <td>{{ $user->lastname }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
