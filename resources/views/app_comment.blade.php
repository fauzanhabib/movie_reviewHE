@extends('review')

@section('comment')

<h2>Form control: textarea</h2>
    <p>The form below contains a textarea for comments:</p>
	<form action="{{route('comment')}}" method="POST" enctype="multipart/form-data">
	@csrf
    <div class="form-group">
      <label for="comment">Comment:</label>
      <input type="hidden" name="id" value="{{ $data->id }}" />
      <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
    </div>
    <button type="submit" id="comment" class="btn btn-primary">Comment</button>
  </form>

@stop