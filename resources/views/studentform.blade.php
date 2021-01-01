<!doctype html>
<html lang="en">
	<head>
		<style>
		table {
		font-family: arial, sans-serif;
		border-collapse: collapse;
		width: 100%;
		}
		td, th {
		border: 1px solid #dddddd;
		text-align: left;
		padding: 15px;
		}
		tr:nth-child(even) {
		background-color: #dddddd;
		}
		</style>
		@foreach ($array as $element)
			{{-- expr --}}
		@endforeach
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<title>Laravel AJAX</title>
	</head>
	<body>
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="http://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<center><h1>Laravel Crud AJAX</h1></center>
		<!-- Start Add Data Model -->
		<!--  -->
		<div class="modal fade" id="studentmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form id="studentadd">
						<div class="modal-body">
							@csrf()
							
							<div class="form-group row">
								<label for="fname" class="col-sm-2 col-form-label">First Name</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="fname" placeholder="First Name">
								</div>
							</div>
							<div class="form-group row">
								<label for="lname" class="col-sm-2 col-form-label">Last Name</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="lname" placeholder="Last Name">
								</div>
							</div>
							<div class="form-group row">
								<label for="course" class="col-sm-2 col-form-label">Course</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="course" placeholder="Course">
								</div>
							</div>
							<div class="form-group row">
								<label for="section" class="col-sm-2 col-form-label">Section</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="section" placeholder="Section">
								</div>
							</div>
							
							
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Save Data</button>
						</div>
					</form>
					
				</div>
			</div>
		</div>
		<!-- Button trigger modal -->
		<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studentmodel" style="margin-left: 90%;">
		Add Student
		</button> -->
		<!-- End Model -->
		<!-- Add Data AJAX -->
		<!--  -->
		<script type="text/javascript">
			$(document).ready(function(){
				$('#studentadd').on('submit',function(e) {
					e.preventDefault();
					$.ajax({
						method: "POST",
						url: "addstudents",
						data:$('#studentadd').serialize(),
						success:function(response) {
							console.log(response);
							// $('#studentmodel').hide();
							alert("Data Saved");
							$('#studentmodel').hide();
						},
						error:function(error) {
							console.log(error)
							alert("Data Not Saved");
						}
					});
				});
			});
		</script>
		<!-- End Add Data AJAX -->
		<!-- View Data -->
		<!--  -->
		<br><br>
		<label style="font-size:18px;margin-left: 30px;">Search</label>
		<input type="text" name="" id="myInput" onkeyup="myFunction()" placeholder="Search By FName" style="width:300px;height: 35px;margin-bottom:20px;margin-left:20px;margin-right: 33%">
		<a href="email"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#" style="">
			Send Mail
		</button></a>
		<a href="excel"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#" style="">
			Export To Excel
		</button></a>
		<a href="pdf"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#" style="">
			Export To PDF
		</button></a>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studentmodel" style="margin-left: 0%;">
		Add Student
		</button>
		<table id="myTable" name="myTable">
			<tr>
				<th>ID</th>
				<th>FName</th>
				<th>LName</th>
				<th>Course</th>
				<th>Section</th>
				<th>Action</th>
				<!-- <th>View</th>
				<th>Edit</th>
				<th>Delete</th> -->
			</tr>
			
			@foreach($all_listing as $listing)
			<tr>
				<td><span>{{$listing->id}}</span></td>
				<td><span>{{$listing->fname}}</span></td>
				<td><span>{{$listing->lname}}</span></td>
				<td><span>{{$listing->course}}</span></td>
				<td><span>{{$listing->section}}</span></td>
				<!-- <td><a href="#" class="viewbtn" style="background-color:green;padding: 10px;color:white">View</a></td>
				<td><a href="#" class="editbtn" style="background-color:#007bff;padding: 10px;color:white">Edit</a></td>
				<td><a href="delete_click/{{$listing->id}}" style="background-color:red;padding: 10px;color:white">Delete</a></td> -->
				<td>
					<a href="#" class="viewbtn" style="background-color:green;padding: 10px;color:white">View</a>
					<a href="#" class="editbtn" style="background-color:#007bff;padding: 10px;color:white">Edit</a>
					<a href="delete_click/{{$listing->id}}" style="background-color:red;padding: 10px;color:white">Delete</a>
				</td>
				<tr>
					
					@endforeach
					
				</table>
				<!-- sEARCH cODE for Table -->
				<script>
				function myFunction() {
				// Declare variables
				var input, filter, table, tr, td, i, txtValue;
				input = document.getElementById("myInput");
				filter = input.value.toUpperCase();
				table = document.getElementById("myTable");
				tr = table.getElementsByTagName("tr");
				// Loop through all table rows, and hide those who don't match the search query
				for (i = 0; i < tr.length; i++) {
				td = tr[i].getElementsByTagName("td")[1];
				if (td) {
				txtValue = td.textContent || td.innerText;
				if (txtValue.toUpperCase().indexOf(filter) > -1) {
				tr[i].style.display = "";
				} else {
				tr[i].style.display = "none";
				}
				}
				}
				}
				</script>
				<!-- End View -->
				<!--  -->
				<!--  -->
				<!-- Edit Data -->
				
				<!-- Start Edit Data Model -->
				<div class="modal fade" id="editstudentmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Edit Student</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form id="studentedit">
								<div class="modal-body">
									@csrf()
									{{method_field('PUT')}}
									<input type="hidden" name="id" id="id">
									<div class="form-group row">
										<label for="fname" class="col-sm-2 col-form-label">First Name</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="fname" id="fname"  placeholder="First Name">
										</div>
									</div>
									<div class="form-group row">
										<label for="lname" class="col-sm-2 col-form-label">Last Name</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name" >
										</div>
									</div>
									<div class="form-group row">
										<label for="course" class="col-sm-2 col-form-label">Course</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="course" id="course" placeholder="Course" >
										</div>
									</div>
									<div class="form-group row">
										<label for="section" class="col-sm-2 col-form-label">Section</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="section" id="section" placeholder="Section" >
										</div>
									</div>
									
									
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary">Update Data</button>
								</div>
							</form>
							
						</div>
					</div>
				</div>
				<!-- Button trigger modal -->
				<!--  -->
				<!-- End Edit Data -->
				<!-- Edit Data AJAX -->
				<!--  -->
				<script>
					$(document).ready(function() {
						$('.editbtn').on('click',function(){
						$('#editstudentmodel').modal('show');
						$tr=$(this).closest('tr');
						var data=$tr.children("td").map(function(){
							return $(this).text();
						}).get();
						console.log(data);
						$('#id').val(data[0]);
						$('#fname').val(data[1]);
						$('#lname').val(data[2]);
						$('#course').val(data[3]);
						$('#section').val(data[4]);
					});
						$('#studentedit').on('submit',function(e){
							e.preventDefault();
								var id=$('#id').val();
							// dd($id);
							$.ajax({
						method: "PUT",
						url: "updatedata/"+id,
						data:$('#studentedit').serialize(),
						success:function(response) {
							console.log(response);
							// $('#studentmodel').hide();
							alert("Update Data");
							// $('#studentmodel').hide();
						},
						error:function(error) {
							console.log(error)
							alert("Data Not Update");
						}
					});
						});
					});
					
				</script>
				<!-- Show Selected Data -->
				<!--  -->
				
				<!-- Start Add Data Model -->
				<div class="modal fade" id="viewstudentmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel" style="margin-left: 35%;">View Student</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div style="width: 220px;margin-left:30px;margin-bottom: 20px;">
								<h5>ID:</h5>
								<input type="text" id="view_id" disabled>
								<h5>First Name:</h5>
								<input type="text" id="view_fname" disabled>
								<h5>Last Name:</h5>
								<input type="text" id="view_lname" disabled>
								<h5>Course:</h5>
								<input type="text" id="view_course" disabled>
								<h5>Section:</h5>
								<input type="text" id="view_section" disabled>
							</div>
						</div>
					</div>
				</div>
				<!-- Button trigger modal -->
				<!--  -->
				<!-- End Show Selected Data  -->
				<script>
					$(document).ready(function() {
						$('.viewbtn').on('click',function(){
						$('#viewstudentmodel').modal('show');
						$tr=$(this).closest('tr');
						var data=$tr.children("td").map(function(){
							return $(this).text();
						}).get();
						console.log(data);
						$('#view_id').val(data[0]);
						$('#view_fname').val(data[1]);
						$('#view_lname').val(data[2]);
						$('#view_course').val(data[3]);
						$('#view_section').val(data[4]);
					});
					});
					
				</script>
				
			</body>
		</html>