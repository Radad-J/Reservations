@extends('layouts.app')

@section('content')
    <h1>Welcome page</h1>

    <h4>List of our shows</h4>

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Place</th>
            <th scope="col">Price</th>
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
@endsection
