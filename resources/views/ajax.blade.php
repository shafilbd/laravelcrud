<!DOCTYPE html>
<html>
<head>
	<title></title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


	

</head>
<body>

	<div class="container">
		
		<h1 class="display">Ajax Crud Operation</h1>




<!-- Button trigger modal -->
<!-- <button type="button" id="save" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add Data
</button>

<button type="button" id="update" class="btn btn-info" data-toggle="modal" data-target="#Updatemodal">
  Update
</button>

<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#DeleteModal">
  Delete
</button> -->

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
           			<input type="text" class="form-control" name="name" id="name" placeholder="Name" required="" autofocus="">
         		</div>
	         	<div class="form-group">
	           		<label for="exampleInputEmail1">Email: </label>
	           		<input type="text" class="form-control" name="email" id="email" placeholder="Email" required="" autofocus="">
	         	</div>
	         	<div class="form-group">
	           		<label for="exampleInputEmail1">Phone: </label>
	           		<input type="text" class="form-control" name="phone" id="phone" placeholder="phone" required="" autofocus="">
	         	</div>  
	         	<div class="form-group">
	           		<label for="exampleInputEmail1">Address: </label>
	           		<textarea class="form-control" row='3' name="address" id="address" required>
	            
	           		</textarea>
	         	</div>

	         	<input type="submit" name="action_button" id="action_button" class="btn btn-info" value="Add">

	         </form>
	     </div>
	 </div>
	</div>
	    






<div class="modal fade" id="Updatemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form id="sample_form">
    			<span id="form-result"></span>
        			@csrf
        		<div class="form-group">
        			<input type="hidden" class="id" name="id" id="hidden_id">

           			<label for="exampleInputEmail1">Name:</label>
           			<input type="text" class="form-control" name="name" id="name" placeholder="Name" required="" autofocus="">
         		</div>
	         	<div class="form-group">
	           		<label for="exampleInputEmail1">Email: </label>
	           		<input type="text" class="form-control" name="email" id="email" placeholder="Email" required="" autofocus="">
	         	</div>
	         	<div class="form-group">
	           		<label for="exampleInputEmail1">Phone: </label>
	           		<input type="text" class="form-control" name="phone" id="phone" placeholder="phone" required="" autofocus="">
	         	</div>  
	         	<div class="form-group">
	           		<label for="exampleInputEmail1">Address: </label>
	           		<textarea class="form-control" row='3' name="address" id="address" required>
	            
	           		</textarea>
	         	</div>

	         	

	        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="action_button" class="btn btn-danger">Okay</button>
      </div>
  </form>
    </div>
  </div>
</div>



<div id="confirmModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            	<form method="post">
            		<!-- action="{{action('CrudController@destroy')}}" -->
            		@csrf
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Confirmation</h2>
            </div>
            <div class="modal-body">
                <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
            </div>
            <div class="modal-footer">
            	<input type="hidden" class="id" name="id"  id="hidden_id">
             <button type="submit" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
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





<script>
	
	/*$('#DataTable').DataTable();
	$('#save').show();
	$('#update').hide();
	$('.myid').hide();
*/
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('mate[name="csrf_token"]').attr('content')
		}
	});



	function viewData(){
		$.ajax({
			type: 'GET',
			dataType: 'json',
			url: '/ajax',
			success: function(response){
				var rows = "";
				$.each(response, function(key, value){
					rows = rows + "<tr>";
					rows = rows + "<td>"+value.id+"</td>";
					rows = rows + "<td>"+value.name+"</td>";
					rows = rows + "<td>"+value.email+"</td>";
					rows = rows + "<td>"+value.phone+"</td>";
					rows = rows + "<td>"+value.address+"</td>";
					rows = rows + "<td>";

					
					rows = rows +"<button type='button' class='edit' id='"+value.id+"' data-toggle='modal' data-target='#Updatemodal' class='btn btn-info'>Update</button>";

					rows = rows +"<button type='button' id='"+value.id+"' data-toggle='modal' data-target='#confirmModal' class='btn btn-danger' >Delete</button>";

					rows = rows +"</td></tr>";
				});
				$('tbody').html(rows);

			}
		})

	}

	viewData();

	/*function addData() {
		var name= $('#name').val();
		var email = $('#email').val();
		var phone = $('#phone').val();
		var address = $('#address').val();
		$.ajax({
			type: 'POST',
			dataType: 'json',
			data: {name:name, email:email, phone:phone, address:address},
			url: '/ajax',	
			success: function(response){
				viewData();
				clearData();
				$('#save').show();	
			
			}
		})

		
	}*/


	/*>>>>Insert data start>>>>>>>>*/


	$('#sample_form').on('submit', function(event){
		event.preventDefault();
		if($('#action_button').val() == 'Add')  {
			$.ajax({
				url: "{{ route('ajax.store') }}",
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				dataType: "json",
				success: function(data)
				{
					var html = '';
					if (data.errors) 
					{
						html = '<div class="alert alert-danger">';
						for(var count=0; count < data.errors.lenght; count++)
						{
							html += '<p>'+ data.errors[count]+'</p>';
						}
						html +='</div>';
					}
					if (data.success) 
					{
						html= '<div class="alert alert-success">'+ data.success +'</div>';
						$('#sample_form')[0].reset();
						window.location.reload();
					}
					$('#form-result').html(html);
				}

			})
		}
	});

	/*>>>>Insert data end>>>>>>>>*/


	/*>>>>Update data start>>>>>>>>*/
/*
	$(document).on('click', '#update', function(){
		var id = $(this).attr('id');
		$('#form-result').html('');
		$.ajax({
			url: "/ajax/"+id,
			dataType: "json",
			success: function(html){
				$('#name').val(html.name);
				$('#email').val(html.email);
				$('#phone').val(html.phone);
				$('#address').val(html.address);
				$('#hidden_id').val(html.id);
				$('#modal-title').text("Edit New Record");
				$('#action_button').val("Edit");
				$('#Updatemodal').modal('show');	
			}
		})
	});

	var user_id;
	/*var funla = viewData();*/

	$(document).on('click', '#delete', function(){
		viewData();
		 user_id = $('.edit').attr('id');
		$('#confirmModal').modal('show');
	});
*/
/*url/{id}*/

/*
	$('#ok_button').click(function(){
	url = $form.attr('action');
		$.ajax({
			url: "ajax/destroy/",
			data: user_id,
			beforeSend: function(){
				$('#ok_button').text('Deleting..........');
			},
			success: function(data){
				viewData();
				setTimeout(function(){
					$('#confirmModal').modal('hide');
					window.location.reload();
				})
			}
		})
	});*/





/*
	function clearData(){
		$('#id').val('');
		$('#name').val('');
		$('#phone').val('');
		$('#address').val('');
		

	}

	function editData(id,name,email,phone,address){
		$('#id').val(id);
		$('#name').val(name);
		$('#email').val(email);
		$('#phone').val(phone);
		$('#address').val(address);
		$('#updateData').show();



	}
	function updateData(){
		var id= $('#id').val();
		var name= $('#name').val();
		var email = $('#email').val();
		var phone = $('#phone').val();
		var address = $('#address').val();
		$.ajax({
			type:"PUT",
			dataType: "json",
			data:{name:name, email:email, phone:phone, address:address},
			url: '/ajax',	
			success: function(response){
				viewData();
				clearData();
				$('#updateData').hide();
			}

		})
	}
	function deleteData(id){
		$.ajax({
			type: 'DELETE',
			dataType: 'json',
			url: '/ajax/'+id,
			success: function(response){
				viewData();

			}
		})

	}*/




</script>







</body>
</html>