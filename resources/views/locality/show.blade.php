@extends('layouts.app')

@section('title', 'Fiche d\'une localité')

@section('content')
    <h1>{{ $locality->postal_code }} {{ $locality->locality }}</h1>

    <nav><a href="{{ route('locality.index') }}">Retour à l'index</a></nav>
@endsection
