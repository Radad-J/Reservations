
@extends('layouts.app')

@section('title', 'Fiche d\'un type')

@section('content')
<div class="card border-primary mt-3 mb-3 mx-auto" style="min-width: 20rem;">
    <div class="card-body">
        <h4 class="card-title">{{ ucfirst($user->firstname) }} {{ ucfirst($user->lastname) }}</h4>
        <tr>{{menu('User')}}</tr>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">E-mail</th>
                    <th scope="col">Name</th>
                    <th scope="col">Last modified: </th>

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
