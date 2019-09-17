
@extends('layout')


@section('content')


@if($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{$message}}</p>

  </div>


@endif



<meta name="csrf-token" content="{{ csrf_token() }}">

	<div class="container">
		<h1 class="display">Ajax Crud Operation</h1>

    <div class="col-md-6 text-left">
      <a onclick="addForm()" class="btn btn-sm btn-info text-white" style="float: right;">Add New</a>

    </div>
	
	<table class="table" id="post-table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">phone</th>
      <th scope="col">address</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
          @foreach($data as $contact)
      <tr>
          <td>{{$contact-> id}}</td>
          <td>{{$contact-> name}}</td>
          <td>{{$contact-> email}}</td>
          <td>{{$contact-> phone}}</td>
          <td>{{$contact-> address}}</td>
          <td>
            <form method="post">
                <a href="{{ action('ContactController@show', $contact->id) }}" class="btn btn-info">show</a>
                <a onclick="addForm()" href="{{ action('ContactController@edit', $contact->id) }}" class="btn btn-info">edit</a> 
                <a href="/delete/{{$contact->id}}" class="btn btn-danger">Delete</a>
              <!-- <button type="submit" class="btn btn-danger">Delete</button> -->
            </form>

          </td>
      </tr>
      @endforeach
    
  </tbody>
</table>

@include('form');

</div>









<script type="">
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('mate[name="csrf_token"]').attr('content')
    }
  });
  var table1 = $('#post-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('all.post') }}",
            columns: [
              {data:'id', name:'id'},
              {data:'name', name:'name'},
              {data:'email', name:'email'},
              {data:'phone', name:'phone'},
              {data:'address', name:'address'}
            ]
          });

     
      function addForm() {
        $('input[name=_method]').val('POST');
        $('#modal-form').modal('show');
        $('#modal-form form')[0].reset();
        $('.modal-title').text('Add Post');
        $('#insertbutton').text('Add Post');
      }

        


            

      

     


  
</script>









