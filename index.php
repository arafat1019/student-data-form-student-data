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


<br>
<br>
<br>
<br>

   <?php

   /**
    * Add new student form isset
    */

   if ( isset($_POST['add']) ){
       //get value

       $name = $_POST['name'];
       $email = $_POST['email'];
       $cell = $_POST['cell'];
       $uname = $_POST['uname'];
       $age = $_POST['age'];
       if ( isset($_POST['gender']) ){
           $gender = $_POST['gender'];
       }
       $shift = $_POST['shift'];
       $location = $_POST['location'];


       /**
        * PHOTO UPLOAD
        */
       $file_name = $_FILES['photo']['name'];
       $file_tmp_name = $_FILES['photo']['tmp_name'];
       $file_size = $_FILES['photo']['size'];

       $uniqe_file_name = md5(time() . rand() ) . $file_name;


   }

   /**
    * form validation
    */

   if ( empty($name) || empty($email) || empty($cell) || empty($uname) || empty($age) || empty($gender) || empty($shift) || empty($location)  ){
         $mess = validationMsg( 'All fields are required', 'danger');
   }elseif( filter_var($email, FILTER_VALIDATE_EMAIL ) == false ){
       $mess = validationMsg( 'Invalid Email Adress', 'danger');
   }elseif(  $age <=5 || $age >=12 ){
       $mess = validationMsg( 'Your age is not ok for our school', 'warning');
   }else{
       $connection -> query("INSERT INTO students (name, email, cell, uname, age, gender, shift, location,photo) VALUES ('$name','$email','$cell','$uname','$age','$gender','$shift','$location','$uniqe_file_name')");

       move_uploaded_file($file_tmp_name, 'photo/students_photo/' . $uniqe_file_name );

       $mess = validationMsg( 'Data stable', 'success');
   }




   ?>






	<div class="wrap ">
        <a class="btn btn-sm btn-primary" href="studentss.php">All students</a>
		<div class="card shadow">
			<div class="card-body">
				<h2>Add new student</h2>
                <?php

                if (isset($mess)){
                    echo $mess;
                }


                ?>
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Username</label>
						<input name="uname" class="form-control" type="text">
					</div>
                    <div class="form-group">
                        <label for="">Age</label>
                        <input name="age" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <label for="">Gender</label><br>
                        <input name="gender" class="" type="radio" value="male" id="male"><lavel for="male">Male</lavel>
                        <input name="gender" class="" type="radio" value="female" id="female"><lavel for="female">Female</lavel>
                    </div>

                    <div class="form-group">
                        <label for="">Shift</label>
                        <select class="form-control" name="shift" id="">
                            <option value="">--Select--</option>
                            <option value="Day">Day</option>
                            <option value="Evening">Evening</option>

                        </select>
                    </div>


                    <div class="form-group">
                        <label for="">Location</label>
                        <select class="form-control" name="location" id="">
                            <option value="">--Select--</option>
                            <option value="Dhaka">Dhaka</option>
                            <option value="Sylet">Sylet</option>
                            <option value="Rajshahi">Rajshahi</option>
                            <option value="Cittagong">Cittagong</option>
                            <option value="Khulna">Khulna</option>
                            <option value="Barishal">Barishal</option>
                            <option value="Mymensingh">Mymensingh</option>
                            <option value="Rangpur">Rangpur</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Photo</label>
                        <input name="photo" class="form-control-file" type="file">
                    </div>
					<div class="form-group">
						<input name="add" class="btn btn-primary" type="submit" value="Add new student">
					</div>
				</form>
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