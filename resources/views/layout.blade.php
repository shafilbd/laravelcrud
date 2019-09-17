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
	
@yield('content')


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
<!-- 
<script type="text/javascript">
  $(document).ready(function(){
      $('#postdata').on('submit', function(e){
          $.ajax({
            type:"POST",
            url: "/add",
            data: $("#postdata").serialize(),
            success: function(response){
              console.log(response)
              $('#')
            }

          })
      });

  });



</script> -->








</body>
</html>