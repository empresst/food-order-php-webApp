<?php include('partials/menu.php'); ?>

	<div class="main">
		<div class="wrapper">
			<h1>Dashboard</h1>

			<br/> 

			<?php
				if(isset($_SESSION['add'])){
				echo $_SESSION['add'];
				unset($_SESSION['add']); //removing system message
			}
			?>

			<br/> <br/> 

			<a href="add-admin.php" class="btn-primary"> add admin</a>

			<br/> <br/> <br/>

			<table class="tbl-full">
				<tr>
					<th>S.N.</th>
					<th>Full Name</th>
					<th>Username</th>
					<th>Actions</th>
				</tr>

				<?php
					$sql = "SELECT * FROM tbl_admin";
					$res = mysqli_query($conn, $sql);

					if($res == TRUE)
					{
						$count = mysqli_num_rows($res);

						$sn = 1;//serial no
						if($count > 0)
						{
							while($rows = mysqli_fetch_assoc($res))
							{
								$id = $rows['id'];
								$fullname = $rows['fullname'];
								$username = $rows['username'];

								?>

								<tr>
									<td><?php echo $sn++; ?></td>
									<td><?php echo $fullname; ?></td>
									<td><?php echo $username; ?></td>
									<td>
										<a href="#" class="btn-secondary">update admin</a>
										<a href="#" class="btn-danger">Delete admin</a>
									</td>
								</tr>

								<?php

							}
						}
						else 
						{

						}
					}
				?>

			</table>

				<div class="clearfix"></div>
		</div>
	</div>

<?php include('partials/footer.php') ?>