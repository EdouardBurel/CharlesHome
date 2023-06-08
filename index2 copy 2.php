<?php

include 'filesLogic.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">

    <title>Invoices</title>
</head>
<body>
    <main>
        <div class="container mt-5">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group mb-2">
                    <label>First name (client)</label>
                    <input type="text" name='firstName' class="form-control" placeholder="First name">
                </div>
                <div class="form-group mb-3">
                    <label>Last name (client)</label>
                    <input type="text" name='lastName' class="form-control" placeholder="Last name">
                </div>
                <div class="form-group">
                    <input type="file" name="myfile" required>
                </div>
                <button type="submit" name="save" class="btn btn-primary mt-3">Upload</button>
            </form>
        </div>
        <!-- <div class="container">
        <div class="row">
            <form class="formUpload" action="index2.php" method="post" enctype="multipart/form-data">
                <h3>Upload Files</h3>
                <input type="text" name= 'firstName' placeholder="First name (client)" required><br>
                <input type="text" name= 'lastName' placeholder="Last name (client)" required><br>
                <input type="file" name="myfile" required><br>
                <button type="submit" name="save">Upload</button>
            </form>
        </div>
        </div>
        !-->
        <div class="container mt-5">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>File Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($files as $file): ?>
                    <tr>
                        <td><?php echo $file['id'];?></td>
                        <td><?php echo $file['name'];?></td>
                        <td>
                            <a href="download.php?file_id=<?php echo $file['id']; ?>">Download</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>    
</body>
</html>