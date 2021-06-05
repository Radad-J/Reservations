@extends('layouts.app')

@section('title', 'Fiche d\'un spectacle')

@section('content')
    <article>

        <h1>{{ $show->title }}</h1>

        @if($show->poster_url)
            <p><img src="{{ asset('/storage/'. $show->poster_url) }}" alt="{{ $show->title }}" width="200"></p>
        @else
            <canvas width="200" height="100" style="border:1px solid #000000;"></canvas>
        @endif

        @if($show->description)
            <p><strong>Description :</strong> {{ $show->description }}</p>
        @endif

        @if($show->location)
            <p><strong>Theatre :</strong> {{ $show->location->designation }}</p>
        @endif

        <p><strong>Price :</strong> {{ $show->price }} €</p>

        <h4>Representations</h4>
        @if($show->representations->count()>=1)
            <ul>
                @foreach ($show->representations as $representation)
                    <li>{{ $representation->when }}</li>
                @endforeach
            </ul>
        @else
            <p>No representation</p>
        @endif

        <h4>Artists</h4>
        <p>
            @foreach ($collaborateurs['auteur'] as $auteur)
                {{ $auteur->firstname }}
                {{ $auteur->lastname }}
                @if($loop->iteration === $loop->count-1) et
                @elseif(!$loop->last), @endif
            @endforeach
        </p>

        <h4>Directors</h4>
        <p>
            @foreach ($collaborateurs['scénographe'] as $scenographe)
                {{ $scenographe->firstname }}
                {{ $scenographe->lastname }}
                @if($loop->iteration === $loop->count-1) and
                @elseif(!$loop->last), @endif
            @endforeach
        </p>

        <h4>Distribution</h4>
        <p>
            @foreach ($collaborateurs['comédien'] as $comedien)
                {{ $comedien->firstname }}
                {{ $comedien->lastname }}
                @if($loop->iteration === $loop->count-1) and
                @elseif(!$loop->last), @endif
            @endforeach
        </p>

        <h2 class="mt-2 font-weight-500">Buy your ticket now !</h2>
        @if($show->bookable && $show->representations->count() > 0)
            <form action="{{ route('cart.store') }}" method="post">
                @csrf
                <input type="hidden" name="show_id" value="{{ $show->id }}">

                <!-- Theatre -->
                <div class="mb-2">
                    <h5 class="font-weight-bold">Theatre</h5>
                    <p> {{ $show->location->designation }}</p>
                </div>

                <!-- Representation select -->
                <div class="mb-2">
                    <h5 class="font-weight-bold">
                        <label for="representation_id">Select a representation</label>
                    </h5>

                    <select name="representation_id" id="representation_id">
                        @foreach($show->representations as $representation)
                            <option value="{{ $representation->id }}">{{ $representation->when }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Quantity -->
                <div class="mb-2">
                    <h5 class="font-weight-bold">
                        <label for="order_quantity">Enter the amount of seats desired</label>
                    </h5>

                    <input type="number" max="30" min="1" value="1" name="order_quantity" id="order_quantity">
                    <span> seat(s)</span>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-outline-success mb-5 mt-2">Book your order</button>
            </form>
        @else
            <p>This show is not bookable at this moment.</p>
        @endif
    </article>
@endsection
