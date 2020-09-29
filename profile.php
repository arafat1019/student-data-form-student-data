<?php require_once "app/autoload.php" ?>
<?php


if (isset($_GET['student_id'])){
    $student_id = $_GET['student_id'];

    $sql = "SELECT * FROM students WHERE id='$student_id'";
    $data = $connection -> query($sql);

    $single_student = $data -> fetch_assoc();
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">


    <style>
        .profile img{
            width: 200px;
            height: 200px;
            border: 10px solid #ffffff;
            border-radius: 50%;
            display: block;
            margin: auto;
        }
        .profile h2{
            text-align: center;
            font-weight: bolder;
        }
        .profile h4{
            text-align: center;
            font-weight: bolder;
            font-size: xx-large;

        }
    </style>
</head>
<body>


<br>
<br>
<br>
<br>








	<div class="wrap ">
        <a class="btn btn-sm btn-primary" href="studentss.php">Back</a>
		<div class="card shadow">
			<div class="card-body profile">


                <img class="shadow" src="photo/students_photo/<?php echo $single_student['photo']; ?>" alt="">
                <h2><?php echo $single_student['name']; ?></h2>
                <h4><?php echo $single_student['uname']; ?></h4>
                <table class="table table-striped">
                    <tr>
                        <td>Name</td>
                        <td><?php echo $single_student['name']; ?></td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td><?php echo $single_student['uname']; ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?php echo $single_student['email']; ?></td>
                    </tr>
                    <tr>
                        <td>Cell</td>
                        <td><?php echo $single_student['cell']; ?></td>
                    </tr>
                    <tr>
                        <td>Age</td>
                        <td><?php echo $single_student['age']; ?></td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td><?php echo $single_student['gender']; ?></td>
                    </tr>
                    <tr>
                        <td>Location</td>
                        <td><?php echo $single_student['location']; ?></td>
                    </tr>

                </table>



			</div>
		</div>
	</div>


    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>








	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>