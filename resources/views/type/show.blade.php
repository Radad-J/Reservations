@extends('layouts.app')

@section('title', 'Fiche d\'un type')

@section('content')
    <h1>{{ $type->type }}</h1>

    <nav><a href="{{ route('type.index') }}">Retour à l'index</a></nav>
@endsection
