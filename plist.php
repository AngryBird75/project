
<!DOCTYPE html>
<html>

<head>

 <title>Table layout</title>

 <link rel="stylesheet" href="dlist.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
   <a href="">GO BACK</a>
  <div class="filter">
  <form class="example" action="patientsearch.php" style="margin:auto;max-width:300px">
  <input type="text" placeholder="Search the Patient ID " name="Search">
   <button type="submit" name="search"><i class="fa fa-search"></i></button>
</form>
 </div>
 <table >
		<thead>
			<tr>
			
		  <tr>
		  <th >Patient ID</th>
			<th>UserName</th>
			<th >Password</th>
			<th >Gender</th>
			<th >Email</th>
			<th >Contact</th>
		  </tr>
		</thead>
		<tbody>
		  <?php 
			$con=mysqli_connect("localhost","root","","tm");
			global $con;
			$query = "select * from patient";
			$result = mysqli_query($con,$query);
			while ($row = mysqli_fetch_array($result)){

			  $pid = $row['p-id'];
			  $username = $row['Username'];
			  $gender = $row['gender'];
			  $email = $row['Email'];
			  $contact = $row['Phone'];
			  $password = $row['Pasword'];
			  
			  echo "<tr>
				<td>$pid</td>
				<td>$username</td>
				<td>$password</td>
				<td>$gender</td>
				<td>$email</td>
				<td>$contact</td>
			  </tr>";
			}

		  ?>
		</tbody>
	  </table>
		</div>

 </body>

</html>