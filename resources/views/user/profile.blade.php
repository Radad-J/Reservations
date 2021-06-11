@extends('layouts.app')

@section('title', 'Fiche d\'un type')

@section('content')
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-xl-12 col-md-12">
                    <div class="card user-card-full">
                        <div class="row m-l-0 m-r-0">
                            <div class="col-sm-4 bg-c-lite-green user-profile">
                                <div class="card-block text-center text-white">
                                    <div class="m-b-25"><img
                                            src="@if( !filter_var(Auth::user()->avatar, FILTER_VALIDATE_URL)){{ Voyager::image( Auth::user()->avatar ) }}@else{{ Auth::user()->avatar }}@endif"
                                            style="width:100px" class="img-radius" alt="User-Profile-Image"></div>
                                    <h6 class="f-w-600">{{ucFirst($user->name)}}</h6>

                                    <p>{{$user->role->display_name}}</p>
                                    <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                    <a style="background: rgba( 255, 255, 255, 0.55 );
backdrop-filter: blur( 6.5px );
-webkit-backdrop-filter: blur( 6.5px );
border-radius: 10px;
border: 1px solid rgba( 255, 255, 255, 0.18 );" href="{{route('user.modify', Auth::id())}}" class="btn">Modify my profile</a>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="card-block">
                                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Email</p>
                                            <h6 class="text-muted f-w-400">{{$user->email}}</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Language</p>
                                            <h6 class="text-muted f-w-400">
                                                @if(!$user->settings->has('locale'))
                                                    Unspecified
                                                @else
                                                    {{ ucFirst(json_decode($user->settings)->{'locale'}) }}
                                                @endif
                                            </h6>
                                        </div>
                                    </div>
                                    <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">More</h6>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Created at</p>
                                            <h6 class="text-muted f-w-400">
                                                @if(!is_null($user->created_at))
                                                    {{$user->created_at->toDayDateTimeString()}}
                                                @else
                                                    Unspecified
                                                @endif
                                            </h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Updated at</p>
                                            <h6 class="text-muted f-w-400">
                                                @if(!is_null($user->updated_at))
                                                    {{$user->updated_at->toDayDateTimeString()}}
                                                @else
                                                    Unspecified
                                                @endif
                                            </h6>
                                        </div>
                                    </div>
                                    <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Reservations</h6>
                                    @if($user->representation->count() > 0)
                                        <div class="row">
                                            <div>
                                                <p class="m-b-10 f-w-600">My reservations</p>
                                                <table>
                                                    <thead>
                                                    <tr>
                                                        <th>Show</th>
                                                        <th>Location</th>
                                                        <th>When</th>
                                                        <th>Seat</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($bookings as $booking)
                                                        <tr>
                                                            <td>{{ $booking->representation->show->title }}</td>
                                                            <td>{{ $booking->representation->location->address }} at {{ $booking->representation->location->locality->postal_code }} 
                                                            {{ $booking->representation->location->locality->locality }}</td>
                                                            <td>{{ $booking->representation->when }}</td>
                                                            <td>{{ $booking->places }}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    @else
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">You have no reservations yet.</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
