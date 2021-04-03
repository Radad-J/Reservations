@extends('layouts.app')

@section('title', 'Liste des shows')

@section('content')
    <div class="row pt-5">
        @foreach($shows as $show)
            <div class="card border-secondary d-flex mx-auto mb-3" style="max-width: 20rem;">
                <div>
                    @if($show->poster_url)
                        <img class="text-center" src="{{ asset('/images/'.$show->poster_url) }}"
                             alt="{{ $show->title }}" width="260" height="380">
                    @else
                        <canvas width="200" height="400" style="border:1px solid #000000;"></canvas>
                    @endif
                </div>
                <div class="card-header">
                    <h5>{{ $show->title }}</h5>
                </div>
                <div class="card-body">
                    <h4 class="card-title">
                        @if(!is_null($show->bookable))
                            <span>{{ $show->price }} €</span>
                        @endif
                    </h4>
                    <p class="card-text">
                        @if($show->representations()->count()==1)
                            - <span>1 représentation</span>
                        @elseif($show->representations()->count()>1)
                            - <span>{{ $show->representations()->count() }} représentations</span>
                        @else
                            - <em>Aucune représentation</em>
                        @endif
                    </p>
                    <a href="{{ route('show.show', $show->id) }}" target="_blank" type="button"
                       class="btn btn-reserver-archive btn-outline-primary">Réserver</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
