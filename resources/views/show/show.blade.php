@extends('layouts.app')

@section('title', 'Fiche d\'un spectacle')

@section('content')
    <article>

        <h1>{{ $show->title }}</h1>

        @if($show->poster_url)
            <p><img src="{{ asset('/storage/'.$show->poster_url) }}" alt="{{ $show->title }}" width="200"></p>
        @else
            <canvas width="200" height="100" style="border:1px solid #000000;"></canvas>
        @endif

        @if($show->description)
            <p><strong>Description :</strong> {{ $show->description }}</p>
        @endif

        @if($show->location)
            <p><strong>Lieu de diffusion :</strong> {{ $show->location->designation }}</p>
        @endif

        <p><strong>Prix :</strong> {{ $show->price }} €</p>

        @if($show->bookable && $show->representations->count() > 0)
            <form action="{{ route('cart.store') }}" method="post">
                @csrf

                <input type="hidden" name="show_id" value="{{ $show->id }}">
                <button type="submit" class="btn btn-outline-success">Réserver une place</button>
            </form>
        @else
            <p><em>Non réservable</em></p>
        @endif

        <h2>Liste des représentations</h2>
        @if($show->representations->count()>=1)
            <ul>
                @foreach ($show->representations as $representation)
                    <li>{{ $representation->when }}</li>
                @endforeach
            </ul>
        @else
            <p>Aucune représentation</p>
        @endif

        <h2>Liste des artistes</h2>
        <p><strong>Auteur:</strong>
            @foreach ($collaborateurs['auteur'] as $auteur)
                {{ $auteur->firstname }}
                {{ $auteur->lastname }}
                @if($loop->iteration == $loop->count-1) et
                @elseif(!$loop->last), @endif
            @endforeach
        </p>

        <p><strong>Metteur en scène:</strong>
            @foreach ($collaborateurs['scénographe'] as $scenographe)
                {{ $scenographe->firstname }}
                {{ $scenographe->lastname }}
                @if($loop->iteration == $loop->count-1) et
                @elseif(!$loop->last), @endif
            @endforeach
        </p>

        <p><strong>Distribution:</strong>
            @foreach ($collaborateurs['comédien'] as $comedien)
                {{ $comedien->firstname }}
                {{ $comedien->lastname }}
                @if($loop->iteration == $loop->count-1) et
                @elseif(!$loop->last), @endif
            @endforeach
        </p>

@endsection
