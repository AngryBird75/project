<!DOCTYPE html>
<html>

<head>

 <title>Table layout</title>

 <link rel="stylesheet" href="dlist.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
<div class="filter">
 <table >
		<thead>
			<tr>
		  <tr>
            <th>ID</th>
		  <th >Patient ID</th>
			<th>UserName</th>
            <th >Contact</th>
			<th >DOCTOR ID</th>
			<th >DOCTOR Name</th>
            <th >Consultancy Fees</th>
                    <th >Appointment Date</th>
                    <th >Appointment Time</th>
                    <th>Appointment Status</th>
			
		  </tr>
		</thead>
		<tbody>
		  <?php 
			

              $con=mysqli_connect("localhost","root","","tm");
              global $con;

              $query = "select * from appointmenttb where userStatus = '0' or doctorStatus = '0' ;";
              $result = mysqli_query($con,$query);
              while ($row = mysqli_fetch_array($result)){
            ?>
                <tr>
                  <td><?php echo $row['ID'];?></td>
                  <td><?php echo $row['p_id'];?></td>
                  <td><?php echo $row['Username'];?></td>
                  <td><?php echo $row['contact'];?></td>
                  <td><?php echo $row['d_id'];?></td>
                  <td><?php echo $row['FullName'];?></td>
                  <td><?php echo $row['docFees'];?></td>
                  <td><?php echo $row['appdate'];?></td>
                  <td><?php echo $row['apptime'];?></td>
                  <td>
              <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
              {
                echo "Active";
              }
              if(($row['userStatus']==0) && ($row['doctorStatus']==1))  
              {
                echo "Cancelled by Patient";
              }

              if(($row['userStatus']==1) && ($row['doctorStatus']==0))  
              {
                echo "Cancelled by Doctor";
              }
                  ?></td>
                </tr>
              <?php } ?>

		</tbody>
	  </table>
		</div>
  <button  ><a href="ad.php">GO BACK </a><button>
 </body>

</html>