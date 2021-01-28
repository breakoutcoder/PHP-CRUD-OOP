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
                    <div class="card-header">Add New Student
                        <a href="/" class="btn btn-info btn-sm" style="float: right;">View Students</a>
                    </div>
                    <div class="card-body">
                        <form method="post" action="/insertStudent.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control dropify" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" class="form-control" type="text" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="age">Age</label>
                                <input id="age" class="form-control" type="text" name="age" required>
                            </div>
                            <div class="form-group">
                                <label for="father_name">Father Name</label>
                                <input id="father_name" class="form-control" type="text" name="father_name" required>
                            </div>
                            <div class="form-group">
                                <label for="mother_name">Mother Name</label>
                                <input id="mother_name" class="form-control" type="text" name="mother_name" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea id="address" class="form-control" name="address" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="District">District</label>
                                <input id="District" class="form-control" type="text" name="district" required>
                            </div>
                            <div class="form-group">
                                <label for="Thana">Thana</label>
                                <input id="Thana" class="form-control" type="text" name="thana" required>
                            </div>
                            <div class="form-group">
                                <label for="postoffice">Post Office</label>
                                <input id="postoffice" class="form-control" type="text" name="postoffice" required>
                            </div>
                            <div class="form-group">
                                <label for="zip-code">Zip Code</label>
                                <input id="zip-code" class="form-control" type="text" name="zipcode" required>
                            </div>
                            <button class="btn btn-info mt-2 btn-sm" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include 'js.php' ?>
</body>

</html>