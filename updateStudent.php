<?php

include 'crud.php';

$crud = new query();
$id = $crud->get_safe_str($_POST['id']);
$name = $crud->get_safe_str($_POST['name']);
$age = $crud->get_safe_str($_POST['age']);
$father_name = $crud->get_safe_str($_POST['father_name']);
$mother_name = $crud->get_safe_str($_POST['mother_name']);
$address = $crud->get_safe_str($_POST['address']);
$district = $crud->get_safe_str($_POST['district']);
$thana = $crud->get_safe_str($_POST['thana']);
$postoffice = $crud->get_safe_str($_POST['postoffice']);
$zipcode = $crud->get_safe_str($_POST['zipcode']);

$update = array(
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

if ($_FILES['image'] && $_FILES['image']['name']) {

    $student = $crud->getData('students', '*', array('id' => $id));
    unlink('uploads/'.$student[0]['image']);
    $image = $_FILES['image'];
    $imageName = time() . '.' . pathinfo($image['name'], PATHINFO_EXTENSION);
    $imageDirectory = "uploads/" . $imageName;
    move_uploaded_file($image['tmp_name'], $imageDirectory);
    $imageup = array('image' => $imageName);
    $update = array_merge($update, $imageup);
}

$crud->updateData('students', $update, 'id', $id);
header("Location: /editStudent.php?id=$id");
