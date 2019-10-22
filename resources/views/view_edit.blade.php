@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-body">
        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif
        <form role="form" method="post"  action="{{route('movies.update', $data->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="usr">Name Movies:</label>
                <input type="text" class="form-control" id="name" value="{{ $data->name_movie }}" name="name_movie">
            </div>
            <div class="form-group">
                <label for="usr">Movies Deskripsi:</label>
                <input type="text" class="form-control" id="desc" value="{{ $data->desc }}" name="desc">
            </div>
            <div class="form-group d-flex flex-column">
                <label  for="picture">Choose file picture</label>
                <input type="file" name="image">
                <img src="{{ URL::to('/') }}/images/{{ $data->image }}" class="img-thumbnail" width="100" />
                    <input type="hidden" name="hidden_image" value="{{ $data->image }}" />
            </div>
            <p></p>
            <div class="form-group">
            
                <button type="submit" class="btn btn-primary">Update</button>
                <!-- <a href="{{route('movies.index')}}" class="btn btn-danger">Check List Movie</a> -->
                
            </div>
        </form>
    </div>
</div>

@endsection