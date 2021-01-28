<?php

include 'crud.php';

$crud = new query();
$name = $crud->get_safe_str($_POST['name']);
$age = $crud->get_safe_str($_POST['age']);
$father_name = $crud->get_safe_str($_POST['father_name']);
$mother_name = $crud->get_safe_str($_POST['mother_name']);
$address = $crud->get_safe_str($_POST['address']);
$district = $crud->get_safe_str($_POST['district']);
$thana = $crud->get_safe_str($_POST['thana']);
$postoffice = $crud->get_safe_str($_POST['postoffice']);
$zipcode = $crud->get_safe_str($_POST['zipcode']);


$image = $_FILES['image'];
$imageName = time() . '.' . pathinfo($image['name'], PATHINFO_EXTENSION);
$imageDirectory = "uploads/" . $imageName;
move_uploaded_file($image['tmp_name'], $imageDirectory);

$insert = array(
    'image' => $imageName,
    'name' => $name,
    'age' => $age,
    'father_name' => $father_name,
    'mother_name' => $mother_name,
    'address' => $address,
    'district' => $district, 
    'thana' => $thana,
    'postoffice' => $postoffice,
    'zipcode' => $zipcode,
);

$crud->insertData('students', $insert);

header("Location: /addStudent.php");
