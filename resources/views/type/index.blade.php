@extends('layouts.app')
@section('title', 'Liste des types')
@section('content')
    <h1>Liste des {{ $resource }}</h1>
    <table>
        <thead>
            <tr>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($types as $type)
                <tr>
                    <td>{{ $type->type }}</td>
                    <td><a href="{{ route('type.show',$type->id) }}">Type</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection



