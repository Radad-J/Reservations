@extends('layouts.app')

@section('title', 'Liste des roles')

@section('content')
    <h1>Liste des {{ $resource }}</h1>

    <table>
        <thead>
        <tr>
            <th>Role</th>
        </tr>
        </thead>
        <tbody>
        @foreach($roles as $role)
            <tr>
                <td>{{ $role->role }}</td>
                <td><td><a href="{{ route('role.show',$role->id) }}">Show</a></td></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
