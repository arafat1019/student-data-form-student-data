<?php require_once "app/autoload.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
	
	

	<div class="wrap-table ">
        <a class="btn btn-sm btn-primary" href="index.php">Add new students</a>
		<div class="card shadow">
			<div class="card-body">
				<h2>All students</h2>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Cell</th>
							<th>Uname</th>
							<th>Age</th>
							<th>Gender</th>
							<th>Shift</th>
							<th>Location</th>
							<th>Photo</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>

                    <?php

                    $data = $connection -> query("SELECT * FROM students");

                    while ( $student = $data -> fetch_assoc() ) :


                    ?>
						<tr>
							<td>1</td>
							<td><?php echo $student['name']; ?></td>
							<td><?php echo $student['email']; ?></td>
							<td><?php echo $student['cell']; ?></td>
							<td><?php echo $student['uname']; ?></td>
							<td><?php echo $student['age']; ?></td>
							<td><?php echo $student['gender']; ?></td>
							<td><?php echo $student['shift']; ?></td>
							<td><?php echo $student['location']; ?></td>
							<td><img src="photo/students_photo/<?php echo $student['photo']; ?>" alt=""></td>
							<td>
								<a class="btn btn-sm btn-info" href="#">View</a>
								<a class="btn btn-sm btn-warning" href="#">Edit</a>
								<a class="btn btn-sm btn-danger" href="#">Delete</a>
							</td>
						</tr>

                    <?php endwhile; ?>


						

					</tbody>
				</table>
			</div>
		</div>
	</div>
	







	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>