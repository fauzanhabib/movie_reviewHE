@extends('layouts.app')

@section('content')

<div class="container">
    <div class="content">
        <div class="row">
            <div class="col-md-6">
                <figure class="movie-poster"><img src="{{ URL::to('/') }}/images/{{ $data->image }}" alt="#"></figure>
            </div>
            
        </div> <!-- .row -->
        <p>
        <div class="entry-content">
            <p>{{ $data->desc}} </p>
        </div>
    </div>
    
    <div class="card">
	    <div class="card-body">
	        <div class="row">
        	    <div class="col-md-2">
        	        <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
        	        <p class="text-secondary text-center">15 Minutes Ago</p>
        	    </div>
        	    <div class="col-md-10">
        	        <p>
        	            <a class="float-left" href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong>Maniruzzaman Akash</strong></a>
        	            <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                        <span class="float-right"><i class="text-warning fa fa-star"></i></span>
        	            <span class="float-right"><i class="text-warning fa fa-star"></i></span>
        	            <span class="float-right"><i class="text-warning fa fa-star"></i></span>

        	       </p>
        	       <div class="clearfix"></div>
        	        <p>Lorem Ipsum is simply dummy text of the pr make  but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        	        <p>
        	            <a class="float-right btn btn-outline-primary ml-2"> <i class="fa fa-reply"></i> Reply</a>
        	            <a class="float-right btn text-white btn-danger"> <i class="fa fa-heart"></i> Like</a>
        	       </p>
        	    </div>
	        </div>
	        	<!-- <div class="card card-inner">
            	    <div class="card-body">
            	        <div class="row">
                    	    <div class="col-md-2">
                    	        <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
                    	        <p class="text-secondary text-center">15 Minutes Ago</p>
                    	    </div>
                    	    <div class="col-md-10">
                    	        <p><a href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong>Maniruzzaman Akash</strong></a></p>
                    	        <p>Lorem Ipsum is simply dummy text of the pr make  but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    	        <p>
                    	            <a class="float-right btn btn-outline-primary ml-2">  <i class="fa fa-reply"></i> Reply</a>
                    	            <a class="float-right btn text-white btn-danger"> <i class="fa fa-heart"></i> Like</a>
                    	       </p>
                    	    </div>
            	        </div>
            	    </div>
	            </div> -->
	    </div>
	</div>
	<!-- @yield('comment') -->

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
</div>

@endsection