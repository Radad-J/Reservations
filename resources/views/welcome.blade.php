@extends('layouts.app')

@section('content')
    <div class="row row-cover">
        <div class="col-12">
            <h1 class="text-center title-welcome">Explore our extensive show collections and find something you
                love.</h1>
        </div>
    </div>
    <div class="row table-row">
        <div class="col-12">
            <h2 class="text-center text-uppercase py-5"><i>Our show collection</i></h2>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Place</th>
                    <th scope="col">Price</th>
                    <th scope="col">Artists</th>
                    <th scope="col">Representations</th>
                    <th scope="col">Bookable</th>
                    <th scope="col">Details</th>
                </tr>
                </thead>
                <tbody>
                @foreach($shows as $show)
                    <tr>
                        <td>{{ $show->title }}</td>
                        <td>{{ $show->location->designation }}</td>
                        <td>{{ $show->price }} €</td>
                        <td>
                            @foreach($show->artistTypes as $artistType)
                                {{ $artistType->artist->firstname }}
                                {{ $artistType->artist->lastname }}
                                @if($loop->iteration === $loop->count-1)
                                    and
                                @elseif(!$loop->last)
                                    ,
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @if(count($show->representations))
                                {{ count($show->representations) }} representation(s) available
                            @else
                                No representation available
                            @endif
                        </td>
                        <td>
                            @if($show->bookable && count($show->representations) > 0)
                                Yes
                            @else
                                No
                            @endif
                        </td>
                        <td><a href="{{ route('show.show', $show->id) }}">More info</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="m-auto">{{ $shows->links() }}</div>
            </div>
        </div>
    </div>
@endsection
