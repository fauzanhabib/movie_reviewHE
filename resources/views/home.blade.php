@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard Movies Review</div>

                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            {{ $message }}
                        </div>
                    @endif
                    <form role="form" method="POST" class="form-horizontal" action="{{route('movies.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="usr">Name Movies:</label>
                            <input type="text" class="form-control" id="name" name="name_movie">
                        </div>
                        <div class="form-group">
                            <label for="usr">Movies Deskripsi:</label>
                            <input type="text" class="form-control" id="desc" name="desc">
                        </div>
                        <div class="form-group d-flex flex-column">
                            <label  for="picture">Choose file picture</label>
                            <input type="file" name="image">
                        </div>
                        <p></p>
                        <div class="form-group">
                        
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{route('movies.index')}}" class="btn btn-danger">Check List Movie</a>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
