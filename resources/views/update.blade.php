
@extends('layout')


@section('content')



<meta name="csrf-token" content="{{ csrf_token() }}">

      <div class="container">
        @foreach($posts as $post)
       <form method="post" action="{{action('ContactController@update', $post->id) }}" data-toogle="validator">
        @csrf
        @method('PUT')
         <div class="form-group">
         <input type="hidden" name="id" id="id">
           <label for="exampleInputEmail1">Name:</label>
           <input type="text" class="form-control" name="name" value="{{$post->name}}" id="title" placeholder="Name" required="" autofocus="">
         </div>
         <div class="form-group">
           <label for="exampleInputEmail1">Email: </label>
           <input type="text" class="form-control" name="email" value="{{$post->email}}" id="author" placeholder="Email" required="" autofocus="">
         </div>
         <div class="form-group">
           <label for="exampleInputEmail1">Phone: </label>
           <input type="text" class="form-control" name="phone" value="{{$post->phone}}" id="author" placeholder="phone" required="" autofocus="">
         </div>  
         <div class="form-group">
           <label for="exampleInputEmail1">Address: </label>
           <textarea class="form-control" row='3' name="address" value="" id="details" required>
            {{$post->address}}
           </textarea>
         </div>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       <a href=""><button type="submit" class="btn btn-primary" id="insertbutton">Submit </button> </a>
      </div>
      </form>
      @endforeach
</div>

<!--SIngle data show are here-->
















@endsection



