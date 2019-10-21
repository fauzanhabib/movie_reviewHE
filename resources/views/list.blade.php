@extends('layouts.app')

@section('content')
<div class="container">
    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
    @endif
    <div align="right">
        <a href="{{ route('home')}}">Add</a>
    </div>
    <table class="table table-bordered table-striped">
        <tr>
            <th width="10%">Image Movie</th>
            <th width="35%">Name Movies</th>
            <th width="35%">Desc </th>
            <th width="30%">Action</th>
        </tr>
            @foreach($data as $row)
        <tr>
            <td><img src="{{ URL::to('/') }}/images/{{ $row->image }}" class="img-thumbnail" width="75" /></td>
            <td>{{ $row->movie_name }}</td>
            <td>{{ $row->desc }}</td>
            <td>
                <a href="{{ route('movies.edit',$row->id)}}" class="btn btn-primary">Edit</a>
                <form action="{{ route('movies.destroy',$row->id)}}" method="post">
                   @csrf
                   @method('DELETE')
                   <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection