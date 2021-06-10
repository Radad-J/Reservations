@extends('layouts.app')

@section('title', 'Liste des shows')

@section('content')
    <!-- Success notification -->
    @if(session()->has('message'))
        <div class="alert alert-success mt-2">
            {{ session()->get('message') }}
        </div>
    @endif

    <!-- Place added to cart notification -->
    @if(session()->has('success'))
        <div class="alert alert-success mt-2">
            {{ session()->get('success') }}
        </div>
    @endif

    <!-- No more place available notification -->
    @if(session()->has('error'))
        <div class="alert alert-danger mt-2">
            {{ session()->get('error') }}
        </div>
    @endif

    @error("orderType")
    <div class="alert alert-danger">
    Vous devez selectionner une méthode de tri</div>
    @enderror
    <div class="row pt-5">
        <div class="col-lg-8 mx-auto">
            <form action="{{ route('show.search') }}" method="GET" role="search">
                <div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4">
                    <div class="input-group">
                        <input type="text" name="search" placeholder="What are you searching for ?"
                               aria-describedby="button-addon1"
                               class="form-control border-0 bg-light">
                        <div class="input-group-append">
                            <button id="button-addon1" type="submit" class="btn btn-link text-primary"><i
                                    class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row pt-5">
        <div class="col-lg-8 mx-auto">
            <form  action="{{ route('show.order') }}" method="POST">
            @csrf
                <div class="input-group-append">
                    <button class="button" name="field" value="title">Title</button>
                    <button class="button" name="field" value="price">Price</button>
                </div>
                <div>
                    <label for="asc"><i class="fas fa-sort-alpha-up"></i></label>
                    <input class="custombtn1" type="radio" name="orderType" id="asc" value="asc">
                    <label for="desc"><i class="fas fa-sort-alpha-down-alt"></i></label>
                    <input type="radio"  class="custombtn2" name="orderType" id="desc" value="desc">
                </div>
                
            </form>
        </div>
    </div>
    <!--Filtrer-->
    <div class="row pt-5">
        <div class="col-lg-8 mx-auto">
            <form  action="{{ route('show.filter') }}" method="POST">
            @csrf
                <div class="input-group-append">
                    <button class="button" name="filterType" value="bookable"> Bookable now! <i class="fas fa-filter"></i>
                    <button class="button" name="filterType" value="all"> All <i class="fas fa-eye"></i></button>
                </div>
            </form>
        </div>
    </div>

    <div class="row pt-5">
        @if($shows->isNotEmpty())
            @foreach($shows as $show)
                <div class="card border-secondary d-flex mx-auto mb-3" style="max-width: 20rem;">
                    <div>
                        @if($show->poster_url)
                            <img class="text-center" src="{{ asset('/storage/'. $show->poster_url) }}"
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
                            @if ($show->representations()->count() === 1)
                                - <span>1 représentation</span>
                            @elseif ($show->representations()->count() > 1)
                                - <span>{{ $show->representations()->count() }} représentations</span>
                            @else
                                - <em>Aucune représentation</em>
                            @endif
                        </p>
                        <a href="{{ route('show.show', $show->id) }}" type="button"
                           class="btn btn-reserver-archive btn-outline-primary">En savoir plus</a>
                    </div>
                </div>
            @endforeach
        @else
            <h4 class="text-center m-auto">No shows found</h4>
        @endif
        @if(isset($_GET['search']))
            <a href="{{route('show.index')}}"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                Back to shows</a>
        @endif
    </div>
@endsection
