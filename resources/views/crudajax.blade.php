<!DOCTYPE html>
<html ng-app="myApp">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>

  <div class="container" ng-controller="ContactCtrl">
    <h1 class="display">Ajax Crud Operation</h1>
  
<div class="col-md-12">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add Data
</button>


    
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">

         <form id="postdata" method="post" data-toogle="validator">
          @csrf 
           <div class="form-group">
           <input type="hidden" name="id" id="id">
             <label for="exampleInputEmail1">Name:</label>
             <input type="text" class="form-control" name="name" id="title" placeholder="Name" required="" autofocus="" ng-model="Contact.name">
             @{{Contact.name}}
           </div>
           <div class="form-group">
             <label for="exampleInputEmail1">Email: </label>
             <input type="text" class="form-control" name="email" id="author" placeholder="Email" required="" autofocus="" ng-model="Contact.email">
           </div>
           <div class="form-group">
             <label for="exampleInputEmail1">Phone: </label>
             <input type="text" class="form-control" name="phone" id="author" placeholder="phone" required="" autofocus="" ng-model="Contact.phone">
           </div>  
           <div class="form-group">
             <label for="exampleInputEmail1">Address: </label>
             <textarea class="form-control" row='3' name="address" id="details" ng-model="Contact.address" required>
              
             </textarea>
           </div>  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" id="insertbutton"> Add data</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- -----Add Data End----- -->


<!-- -----Data Updated start----- -->

<div class="modal fade" id="UpdateModal" tabindex="-1" role="dialog" aria-labelledby="UpdateModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Data</h5>
        
      </div>
      <div class="modal-body">

         <form id="editdata" method="post" data-toogle="validator">
          @csrf
          {{method_field('PUT')}} 
           <div class="form-group">
           <input type="hidden" name="id" id="id">
             <label for="exampleInputEmail1">Name:</label>
             <input type="text" class="form-control" name="name" id="name" placeholder="Name" required="" autofocus="" ng-model="Contact.name">
             
           </div>
           <div class="form-group">
             <label for="exampleInputEmail1">Email: </label>
             <input type="text" class="form-control" name="email" id="email" placeholder="Email" required="" autofocus="" ng-model="Contact.email">
           </div>
           <div class="form-group">
             <label for="exampleInputEmail1">Phone: </label>
             <input type="text" class="form-control" name="phone" id="phone" placeholder="phone" required="" autofocus="" ng-model="Contact.phone">
           </div>  
           <div class="form-group">
             <label for="exampleInputEmail1">Address: </label>
             <textarea class="form-control" row='3' name="address" id="address" ng-model="Contact.address" required>
              
             </textarea>
           </div>  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" id="insertbutton"> Update</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>




<!-- -----Data Updated End------->

<!-- -----Delete modal start-------->

<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="deleteId">
      <div class="modal-body">
        @csrf
          {{method_field('delete')}}
        <input type="hidden" name="id" id="delete_id">
        Are you Sure to Detete <input type="text" name="name" id="delete_name" disabled>?

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Delete</button>
      </div>
      </form>
    </div>
  </div>
</div>



<div class="container">
<!-- -------Delete modal End-------- -->
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
            
                <a href="{{ action('ContactController@show', $contact->id) }}" class="btn btn-info">show</a>
                <button type="button" class="btn btn-info editbtn" data-toggle="modal" data-target="#UpdateModal">
                    Update
                </button>
<!-- <a href="{{ action('ContactController@edit', $contact->id) }}" data-toggle="modal" data-target="#exampleModal" class="btn btn-info">edit</a> --> 
                <!-- <a href="/delete/{{$contact->id}}" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete</a> -->

                <button type="submit" class="btn btn-danger deletebtn" data-toggle="modal" data-target="#DeleteModal">
                  Delete
                </button>
              <!-- <button type="submit" class="btn btn-danger">Delete</button> -->
            

          </td>
      </tr>
      @endforeach
    
  </tbody>
</table>


</div>

</div>



<script type="text/javascript">
    
  var myApp= angular.module("myApp", [])
  myApp.controller("ContactCtrl", function($scope, $http){
    $scope.Contact={name: null, email:null, phone: null};
    $scope.isInsert = true;


    $scope.init = function(){
      $http.get('/')
        .success(function(data){
          console.log(data);
          $scope.data= data;
        })

    };
  })


</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



<script type="text/javascript">
  $(document).ready(function(){
    $('.editbtn').on('click', function(){
        $('#UpdateModal').modal('show');
      $tr = $(this).closest('tr');
      var data = $tr.children("td").map(function(){
        return $(this).text();
      }).get();

      console.log(data);
      $('#id').val(data[0]);
      $('#name').val(data[1]);
      $('#email').val(data[2]);
      $('#phone').val(data[3]);
      $('#address').val(data[4]);
    });


  $('#editdata').on('submit', function(e){
    e.preventDefault();

    var id = $('#id').val();

    $.ajax({
        type: "POST",
        url: "/studentupdate/"+id,
        data: $('#editdata').serialize(),
        success: function(response){
          console.log(response);
          window.location.reload(true);
          alert("Data successfully Updated")

        }, error: function(error){
          alert("Data not Updated");
        }



    });
  });
  });


  $('.deletebtn').on('click', function(){

    $('#DeleteModal').modal('show');

    $tr = $(this).closest('tr');
    var data = $tr.children("td").map(function(){
      return $(this).text();
    }).get();
    console.log(data);

    $('#delete_id').val(data[0]);
    $('#delete_name').val(data[1]);

  });

  $('#deleteId').on('submit', function(e){
      e.preventDefault();

      var id = $('#delete_id').val();

      $.ajax({
          type: "POST",
          url: "/studentdelete/"+id,
          data: $('#deleteId').serialize(),
          success: function(response){
            console.log(response);
            $('#DeleteModal').modal('hide');
            window.location.reload(true);
            alert("Data deleted");

          },error: function(error){
            
            window.location.reload(true);
            alert("Data deleted");

          }
      });

  });






</script>



<script type="text/javascript">
  $(document).ready(function(){
      $('#postdata').on('submit', function(e){
          $.ajax({
            type:"POST",
            url: "/studentadd",
            data: $("#postdata").serialize(),
            success: function(response){
              window.location.reload(true);
              alert("Data saved");
            },
            error: function(error){
              console.log(error)
              alert("Data not saved");
            }

          })
      });

  });



</script>








</body>
</html>