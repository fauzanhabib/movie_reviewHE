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
    @foreach($data_comment as $data)
    <div class="card">
	    <div class="card-body">
	        <div class="row">
        	    <div class="col-md-2">
        	        <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
        	        <p class="text-secondary text-center">15 Minutes Ago</p>
        	    </div>
        	    <div class="col-md-10">
        	        <p>
        	            <a class="float-left" href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong>anonymous</strong></a>
        	            <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                        <span class="float-right"><i class="text-warning fa fa-star"></i></span>
        	            <span class="float-right"><i class="text-warning fa fa-star"></i></span>
        	            <span class="float-right"><i class="text-warning fa fa-star"></i></span>

        	       </p>
        	       <div class="clearfix"></div>
        	        <p>{{$data->desc_comment}}.</p>
        	        <p>
        	            <a class="float-right btn btn-outline-primary ml-2"> <i class="fa fa-reply"></i> Reply</a>
        	            <a class="float-right btn text-white btn-danger"> <i class="fa fa-heart"></i> Like</a>
        	       </p>
        	    </div>
	        </div>
	  
	    </div>
	</div>
	@endforeach
	<!-- @yield('comment') -->

    <p></p>
	<div class="alert alert-success" style="display:none"></div>
	<form enctype="multipart/form-data">
		<div class="form-group">
		<label for="comment">Comment:</label>
		<input type="hidden" id="id" value="{{ $data->id }}" />
		<textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
		</div>
		<button id="ajaxcomment" class="btn btn-primary">Comment</button>
  	</form>
</div>

<script src="http://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous">
</script>
<script>
         jQuery(document).ready(function(){
			
            jQuery('#ajaxcomment').click(function(e){
               e.preventDefault();
               jQuery.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
			  });
			console.log("log 1");
               jQuery.ajax({
                  url: "{{route('comment')}}",
                  method: 'POST',
                  data: {
                     id: jQuery('#id').val(),
                     comment: jQuery('#comment').val(),
                    //  price: jQuery('#price').val()
                  },
                  success: function(result){
					location.reload();
					jQuery('.alert').show();
                     jQuery('.alert').html(result.success);
                  }});
               });
            });
</script>
@endsection