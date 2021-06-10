@extends('layouts.app')

@section('title', 'Fiche des réservations')

@section('content')
    <h1>Liste de vos réservations</h1>
    @if (sizeof($bookings) > 0)
    <table>
        <thead>
        <tr>
            <th>Nom du spectacle</th>
            <th>Lieu</th>
            <th>Date et heure</th>
            <th>Nombre de place</th>
        </tr>
        </thead>
        <tbody>
        @foreach($bookings as $booking)
            <tr>
                <td>{{ $booking->representation->show->title }}</td>
                <td>{{ $booking->representation->location->address }} à {{ $booking->representation->location->locality->postal_code }} 
                {{ $booking->representation->location->locality->locality }}</td>
                <td>{{ $booking->representation->when }}</td>
                <td>{{ $booking->places }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <p>Vous ne disposez pas de réservations</p>
    @endif
@endsection
