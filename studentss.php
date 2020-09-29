<?php require_once "app/autoload.php" ?>
<?php


/**
 * Destroy user data
 */


if (isset($_GET['delete_id'])){
    $delete_id = $_GET['delete_id'];
    $delete_photo = $_GET['photo'];

    $sql = "DELETE FROM students WHERE id='$delete_id'";
    $data = $connection -> query($sql);

    unlink('photo/students_photo/' . $delete_photo );

    header("location:studentss.php");
}


/**
 * Active user
 */

  if (isset($_GET['active_id'])) {
      $active_id = $_GET['active_id'];

      $sql = "UPDATE students SET status ='active' WHERE id='$active_id'";
      $data = $connection -> query($sql);

      header("location:studentss.php");
  }



/**
 * Inactive user
 */
  if (isset($_GET['inactive_id'])) {
      $inactive_id = $_GET['inactive_id'];

      $sql = "UPDATE students SET status ='inactive' WHERE id='$inactive_id'";
      $data = $connection -> query($sql);

      header("location:studentss.php");
  }



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/fonts/font-awesome/css/all.css">
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

                    $i = 1;

                    while ( $student = $data -> fetch_assoc() ) :


                    ?>
						<tr>
							<td><?php echo $i; $i++; ?></td>
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

                                <?php if ($student['status'] == 'inactive') : ?>
                                    <a class="btn btn-sm btn-success" href="?active_id=<?php echo $student['id']; ?>"><i class="far fa-thumbs-up"></i></a>
                                <?php elseif ($student['status'] == 'active') : ?>
                                    <a class="btn btn-sm btn-danger" href="?inactive_id=<?php echo $student['id']; ?>"><i class="far fa-thumbs-down"></i></a>
                                <?php endif; ?>

								<a class="btn btn-sm btn-info" href="profile.php?student_id=<?php echo $student['id']; ?>"><i class="fas fa-eye"></i></a>
								<a class="btn btn-sm btn-warning" href="edit.php?edit_id=<?php echo $student['id']; ?>"><i class="far fa-edit"></i></a>
								<a id="delete_btn" class="btn btn-sm btn-danger" href="?delete_id=<?php echo $student['id']; ?>&photo=<?php echo $student['photo']; ?>"><i class="fas fa-trash-alt"></i></a>
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
    <script>
        $('a#delete_btn').click(function () {
           let conf = confirm('Are you sure ?');

            if (conf == true){
                return true;
            }else {
                return false;
            }
        });
    </script>
</body>
</html>