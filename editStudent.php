<?php
include 'crud.php';
if ($_GET['id'] && $_GET['id'] != '') {
    $data = new query();
$getId = $data->get_safe_str($_GET['id']);
$id = array('id' => $getId);
$student = $data->getData('students', '*', $id);
if (!$student) {
    header("Location: /");
}
}
else {
    header("Location: /");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'css.php' ?>
</head>
<body>

    <section>
        <div class="container">
            <div class="row">
                <div class="card">
                <div class="card-header">Edit Student
                <div class="form-group" style="float: right;">
                    <a href="/viewStudent.php?id=<?php echo $getId ?>" class="btn btn-warning btn-sm">View</a>
                    <a href="/" class="btn btn-info btn-sm">View Student List</a>
                    </div>
                </div>
                    <div class="card-body">
                        <form method="post" action="/updateStudent.php" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $student[0]['id']?>">
                        <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control dropify" data-default-file="uploads/<?php echo $student[0]['image'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" class="form-control" type="text" name="name" required value="<?php echo $student[0]['name']?>">
                            </div>
                            <div class="form-group">
                                <label for="age">Age</label>
                                <input id="age" class="form-control" type="text" name="age" required value="<?php echo $student[0]['age']?>">
                            </div>
                            <div class="form-group">
                                <label for="father_name">Father Name</label>
                                <input id="father_name" class="form-control" type="text" name="father_name" required value="<?php echo $student[0]['father_name']?>">
                            </div>
                            <div class="form-group">
                                <label for="mother_name">Mother Name</label>
                                <input id="mother_name" class="form-control" type="text" name="mother_name" required value="<?php echo $student[0]['mother_name']?>">
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea id="address" class="form-control" name="address" rows="3" required><?php echo $student[0]['address']?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="District">District</label>
                                <input id="District" class="form-control" type="text" name="district" required value="<?php echo $student[0]['district']?>">
                            </div>
                            <div class="form-group">
                                <label for="Thana">Thana</label>
                                <input id="Thana" class="form-control" type="text" name="thana" required value="<?php echo $student[0]['thana']?>">
                            </div>
                            <div class="form-group">
                                <label for="postoffice">Post Office</label>
                                <input id="postoffice" class="form-control" type="text" name="postoffice" required value="<?php echo $student[0]['postoffice']?>">
                            </div>
                            <div class="form-group">
                                <label for="zip-code">Zip Code</label>
                                <input id="zip-code" class="form-control" type="text" name="zipcode" required value="<?php echo $student[0]['zipcode']?>">
                            </div>
                            <button class="btn btn-success" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include 'js.php' ?>
</body>
</html>