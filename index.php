<?php
include 'crud.php';
$data = new query();
$students = $data->getData('students');
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php include 'css.php' ?>
</head>

<body>
    <section>
        <div class="container">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        Student List
                        <a href="/addStudent.php" class="btn btn-info btn-sm" style="float: right">Add New Student</a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Father Name</th>
                                    <th>Mother Name</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($students as $key => $value) { ?>
                                    <tr>
                                        <td><?php echo $key +1 ?></td>
                                        <td><img src="uploads/<?php echo $value['image'] ?>" width="50px"></td>
                                        <td><?php echo $value['name'] ?></td>
                                        <td><?php echo $value['father_name'] ?></td>
                                        <td><?php echo $value['mother_name'] ?></td>
                                        <td><?php echo $value['address'] ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="/viewStudent.php?id=<?php echo $value['id'] ?>" class="btn btn-success">View</a>
                                                <a href="/editStudent.php?id=<?php echo $value['id'] ?>" class="btn btn-warning">Edit</a>
                                                <form action="/deleteStudent.php" method="POST" onsubmit="return formConfirm()">
                                                    <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
                                                    <button class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'js.php' ?>
    <script>
        function formConfirm() {
            return confirm('Are You Sure');
        }
    </script>
</body>

</html>