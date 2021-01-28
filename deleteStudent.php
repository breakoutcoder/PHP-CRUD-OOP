<?php
include 'crud.php';

$crud = new query();

$getId = $crud->get_safe_str($_POST['id']);
$id = array('id' => $getId, );
$student = $crud->getData('students', '*', $id);
unlink('uploads/'.$student[0]['image']);
$crud->deleteData('students', $id);

header("Location: /index.php");