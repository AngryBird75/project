<!DOCTYPE html>
<html>

<head>

 <title>Table layout</title>

 <link rel="stylesheet" href="dlist.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
<div class="filter">

 <table >
		<thead>
			<tr>
			

		  <tr>
		  <th >DOCTOR ID</th>
          <th>Full Name</th>
			<th>UserName</th>
			<th >Password</th>
			<th >Gender</th>
			<th >Email</th>
			<th >Contact</th>
            <th>Specialization</th>
            <th>Education</th>
            <th>Fees</th>
		  </tr>
		</thead>
		<tbody>
		  <?php 
			$con=mysqli_connect("localhost","root","","tm");
			global $con;
			$query = "select * from doctor where gender ='on'";
			$result = mysqli_query($con,$query);
			while ($row = mysqli_fetch_array($result)){


			  $did = $row['d-id'];
			  $username = $row['UserName'];
			//   $gender = $row['Gender'];
			  $email = $row['Email'];
			  $contact = $row['Phone'];
			  $password = $row['Pasword'];
			   $s = $row['Specialization'];
			   $ed= $row['Education'];
			   $f= $row['Doc-Fee'];
			   $d= $row['FullName'];
			   
			
			  echo "<tr>
				<td>$did</td>
				<td>$d</td>
				<td>$username</td>
				<td>$password</td>
				<td>Female</td>
				<td>$email</td>
				<td>$contact</td>
				<td>$s</td>
				<td>$ed</td>
				<td>$f</td>
			  </tr>";
			}

		  ?>
		</tbody>
	  </table>

        </div>
	  <button  ><a href="ad.php">GO BACK </a><button>
 </body>

</html>