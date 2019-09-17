

<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
      </div>
      <div class="modal-body">
       <form id="postdata" method="post" action="{{ action('ContactController@store') }}" data-toogle="validator">
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
       <a href=""> <button type="submit" class="btn btn-primary" id="insertbutton"></button> </a>
      </div>
      </form>
    </div>
  </div>
</div>

<!--SIngle data show are here-->
<div class="modal fade" id="single-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel" align="center"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 
      </div>
      <div class="modal-body">
        <ul class="list-group">
      <li class="list-group-item">ID: <span class="text-danger" id="contactid"></span></li>
      <li class="list-group-item">Name: <span class="text-danger" id="fullname"></span> </li>
      <li class="list-group-item">email: <span class="text-danger" id="contactemail"></span></li>
      <li class="list-group-item">phone: <span class="text-danger" id="contactemail"></span></li>
      <li class="list-group-item">address: <span class="text-danger" id="contactnumber"></span></li>
    </ul>
    </div>
  </div>
</div>




<script>

            $(document).ready(function(){
                $("#postdata").submit(function(e){
                    e.preventDefault();
                    $.ajax({
                        type : 'POST',
                        url : '/contact',
                        data : $('#postdata').serialize(),
                        success : function(){
                            window.location.reload(true);
                            alert("hae hoise");
                        }error: function(){
                          alert("na hoy nai");
                        }
                    });
                });

        </script>