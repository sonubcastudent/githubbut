<?php

// DATABASE CONNECTION
$conn = mysqli_connect("sql100.ezyro.com","ezyro_41719560","012c79eb6bc517","ezyro_41719560_register");

if(!$conn){
    die("Connection failed");
}

// GET DATA
$name = $_POST['name'];
$father = $_POST['father'];
$mother = $_POST['mother'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$address = $_POST['address'];
$blood = $_POST['blood'];
$dept = $_POST['dept'];

// checkbox array to string
$course = implode(",", $_POST['course']);

// FILE UPLOAD
$filename = $_FILES['photo']['name'];
$tempname = $_FILES['photo']['tmp_name'];

$folder = "uploads/".$filename;

// make sure folder exists
if(!is_dir("uploads")){
    mkdir("uploads",0777,true);
}

move_uploaded_file($tempname, $folder);

// INSERT QUERY
$sql = "INSERT INTO students 
(name,father_name,mother_name,phone,email,gender,dob,address,blood_group,department,course,photo)
VALUES 
('$name','$father','$mother','$phone','$email','$gender','$dob','$address','$blood','$dept','$course','$filename')";

if(mysqli_query($conn,$sql)){
    echo "Registration Successful";
} else {
    echo "Error: ".mysqli_error($conn);
}

?>