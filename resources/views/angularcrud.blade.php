<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>

  

</head>
<body ng-app="myApp">

  <div class="container" ng-controller="ContactCtrl">
    
    <h1 class="display">Ajax Crud Operation</h1>





<!-- Modal -->
  <div class="rows">
    <div class="col-sm-6">
        <div class="modal-body">
        <form id="sample_form">
          <span id="form-result"></span>
              @csrf
            <div class="form-group">
              <input type="hidden" name="id" id="id">

                <label for="exampleInputEmail1">Name:</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Name" required="" autofocus="" ng-model="Contact.name">
                @{{Contact.name}}
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

            <input type="submit" name="action_button" id="action_button" class="btn btn-info" value="Add">

           </form>
       </div>
   </div>
  </div>
      



  <div class="col-sm-6">

    <table class="table" id="DataTable">
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
          
        </tbody>
    </table>
  
  </div>
  </div>

  </div>


<script src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script type="">
  
  var myApp= angular.module("myApp",[])
  myApp.controller("ContactCtrl", function($scope, $http){
    $scope.Contact = {name: null, email: null, phone: null, address: null};
    $scope.isInsert = true;
  })





</script>






</body>
</html>