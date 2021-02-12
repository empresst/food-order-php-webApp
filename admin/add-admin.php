<?php include('partials/menu.php'); ?>

<div class="main">
	<div class="wrapper">
		<h1> Add admin</h1>

			<br/> <br/>
			
			<?php
				if(isset($_SESSION['add'])){
				echo $_SESSION['add'];
				unset($_SESSION['add']); //removing system message
			}
			?>

			<br/> <br/>

		<form action="" method="POST">
			
			<table class="tbl-30">
				<tr>
					<td> Full Name: </td>
					<td><input type="text" name="fullname" placeholder="Enter your name"> </td>
				</tr>

				<tr>
					<td> Username: </td>
					<td><input type="text" name="username" placeholder="Enter your username"> </td>
				</tr>

				<tr>
					<td> Password: </td>
					<td><input type="password" name="password" placeholder="Enter your password"> </td>
				</tr>

				<tr>
					<td colspan="2"><input type="submit" name="submit" value="Add Admin" class="btn-secondary"> </td>
				</tr>
			</table>
		</form>

	</div>
</div>

<?php include('partials/footer.php'); ?>

<?php
// Process the value from form and save it in database

//check whether the submit button in clicked or not

if(isset($_POST['submit'])){

	//1. get data from form
	$fullname = $_POST['fullname'];
	$username = $_POST['username'];
    $password = md5($_POST['password']);

	//2.sql query to save data into database
	$sql = "Insert into tbl_admin SET
	 fullname = '$fullname' ,
	 username = '$username' ,
	 password ='$password'
	";
	
	//3.Executing Query and saving data into database
    $res = mysqli_query($conn, $sql) or die(mysqli_error());

	//4.check whether the data is inserted(query is executed) or not and display appropriate message
	if($res == TRUE){
		//echo "data inserted";
		$_SESSION['add'] = "Admin Added Successfully";
		header("location:".SITEURL.'admin/manage-admin.php');
	}
	else{
		//echo "failed to insert";
		$_SESSION['add'] = "Failed to add";
		header("location:".SITEURL.'admin/add-admin.php');
	}
}

?>