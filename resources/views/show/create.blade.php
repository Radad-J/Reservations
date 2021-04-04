@extends('layouts.app')
@section('title', 'Add a show')

@section('content')
    <h1>Add a {{ $resource }}</h1>
    <form action="{{ route('show.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <fieldset>
            <!-- Title field -->
            <div class="form-group">
                <label class="col-form-label" for="title">Title of the show</label>
                <input type="text" class="form-control" placeholder="Title of the show" id="title" name="title">
            </div>

            <!-- Location picker -->
            <div class="form-group">
                <label for="location">Select a location</label>
                <select class="form-control" id="location" name="location">
                    <option disabled selected>Choose a location</option>
                    @foreach ($locations as $key => $location)
                        <option value="{{ $key + 1 }}">
                            {{ $location->designation }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Price field -->
            <div class="form-group">
                <label class="col-form-label" for="price">Price</label>
                <input class="form-control" type="text" placeholder="Enter a price" name="price" id="price">
            </div>

            <!-- Description field -->
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="2" placeholder="Enter a description"></textarea>
            </div>

            <!-- Bookable slider -->
            <div class="form-group">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="bookable" name="bookable" checked="">
                    <label class="custom-control-label" for="bookable">Bookable</label>
                </div>
            </div>

            <!-- Image input -->
            <div class="form-group">
                <label for="showImage">Poster</label>
                <input type="file" class="form-control-file" id="showImage" name="showImage" aria-describedby="fileHelp">
                <small id="fileHelp" class="form-text text-muted">Poster should have an extension of .jpg, .jpeg or
                    .png. Max filesize : 4092mb</small>
            </div>
        </fieldset>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
@endsection
