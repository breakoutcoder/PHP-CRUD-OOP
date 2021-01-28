<?php

include 'crud.php';
$crud = new query();
if ($_GET['id'] && $_GET['id'] != null) {
    $getId = $crud->get_safe_str($_GET['id']);
    $id = array('id' => $getId);
    $student = $crud->getData('students', '*', $id);
    if (!$student) {
        header("Location: /");
    }
} else {
    header("Location: /");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include('css.php') ?>
    <style>
    span{
        font-weight: 700;
    }</style>
</head>

<body>

    <section>
        <div class="container">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                    <?php echo $student[0]['name'] ?>
                    <div class="form-group" style="float: right;">
                    <a href="/editStudent.php?id=<?php echo $getId ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="/" class="btn btn-info btn-sm">View Student List</a>
                    </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                            <p><span>Name: &nbsp;</span> <?php echo $student[0]['name']?></p>
                            <p><span>Age: &nbsp;</span> <?php echo $student[0]['age']?></p>
                            <p><span>Father Name: &nbsp;</span> <?php echo $student[0]['father_name']?></p>
                            <p><span>Mother Name: &nbsp;</span> <?php echo $student[0]['mother_name']?></p>
                            <p><span>Address: &nbsp;</span> <?php echo $student[0]['address']?></p>
                            <p><span>District: &nbsp;</span> <?php echo $student[0]['district']?></p>
                            <p><span>Thana:&nbsp;</span> <?php echo $student[0]['thana']?></p>
                            <p><span>Post Office:&nbsp;</span> <?php echo $student[0]['postoffice']?></p>
                            <p><span>Zip code:&nbsp;</span> <?php echo $student[0]['zipcode']?></p>
                            </div>
                            <div class="col-md-6">
                                <img src="uploads/<?php echo $student[0]['image'] ?>" alt="" style="width: 150px;float: right;margin-right: 110px;border: 4px solid #bfb5b5;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php include('js.php') ?>
</body>

</html>