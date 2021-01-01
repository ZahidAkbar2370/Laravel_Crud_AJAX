<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table id="myTable">
	<tr>
		<th>ID</th>
		<th>FName</th>
		<th>LName</th>
		<th>Course</th>
		<th>Section</th>
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
		<tr>
		
		@endforeach
	</table>
<?php
	
	
?>
</body>
</html>


