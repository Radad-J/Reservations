@extends('layouts.app')

@section('title', 'Fiche d\'un artiste')

@section('content')
    <h1>{{ $artist->firstname }} {{ $artist->lastname }}</h1>
@endsection

<nav><a href="{{ route('artist.index') }}">Retour à l'index</a></nav>