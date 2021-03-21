@extends('layouts.app')

@section('title', 'Liste des shows')

@section('content')
    <h1>Liste des {{ $resource }}</h1>

    <ul>
        @foreach($shows as $show)
            <li>
                {{ $show->title }}
                @if($show->bookable)
                    <span>{{ $show->price }} €</span>
                @endif

                @if($show->representations()->count()==1)
                    - <span>1 représentation</span>
                @elseif($show->representations()->count()>1)
                    - <span>{{ $show->representations()->count() }} représentations</span>
                @else
                    - <em>aucune représentation</em>
                @endif
            </li>
        @endforeach
    </ul>
@endsection
