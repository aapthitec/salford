<?php 
	include('db.php');
	if(isset($_GET['id'])){
		$result=mysql_query('DELETE FROM users WHERE u_id="'.$_GET['id'].'"');
		header('location:user.php');
	}else{
		$retval=mysql_query('SELECT * FROM users');
	}	
?>

<html>
	<head>
	<link rel="stylesheet" type="text/css" href="user style.css"></link>
	</head>
		<body id="body">
			<?php include("salford1.php");	?>
			<h2>USER MANAGEMENT</h2>
				<div id="Add">
				<a href="registration.php"><input type="button"value="Add" ></a>
				</div>
			<div id="table">
				<table   cellspacing="0">				
				  <tr>
					<th> Serial.no</td>
					<th id="width">First name</td>
					<th id="width">Last name</td>		
					<th id="width">Email</td>
					<th id="width">Edit/Delete</td>
				  </tr>
				  
				   <?php  while($row=mysql_fetch_array($retval)){ ?>
				  
				  <tr>
					<td> <?php echo $row['u_id'];?></td>
					<td> <?php echo $row['firstname'];?></td>
					<td> <?php echo $row['lastname'];?> </td>		
					<td> <?php echo $row['email'];?></td>
					<td><a href="editprofile.php?id=<?php echo $row['u_id'];?>"><input type="button" value="Edit"/></a>&nbsp &nbsp <input type="button" onclick="deleteUser(<?php echo $row['u_id'];?>)" name="delete" value="Delete"/></td>				  
				 </tr>
				   <?php }?>				   				  
				</table>
			</div>
		</body>
		<footer>  
		<p style="text-align:center;">Copyright @2016	<a href="http://aapthitech.com">Aapthi Technologies,</a>an SBU of Yalavarthi Software Solutions pvt Ltd.</p>
		</footer>
		&nbsp
	</html>
	
<script>
	function deleteUser(userID){
		if (confirm("Are you sure want to delete the user!") == true) {
			window.location = "user.php?id="+userID;
		}
	}
</script>
	