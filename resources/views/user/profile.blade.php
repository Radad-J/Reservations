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
                                    <p>{{$user->role->display_name}}</p> <i
                                        class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
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
                                                @if(is_null($user->settings))
                                                    <h3>bla bla</h3>
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
                                                    Unavailable
                                                @endif
                                            </h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Updated at</p>
                                            @if(!is_null($user->updated_at))
                                                <h6 class="text-muted f-w-400">{{$user->updated_at->toDayDateTimeString()}}
                                                    @else
                                                        Unavailable
                                                    @endif
                                                </h6>
                                        </div>
                                    </div>
                                    <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Reservations</h6>
                                    @if($user->representation->count() > 0)
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">My reservations</p>
                                            <h6 class="text-muted f-w-400">{{$user->representation->count()}}</h6>
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
