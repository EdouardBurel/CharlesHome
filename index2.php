<?php
    ini_set('display_errors', 'off');
    session_start();
    $pdo = new PDO('mysql:dbname=edouardburel_charleshome;host=mysql-edouardburel.alwaysdata.net', '302132_chome', 'Charleshome1');
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(!isset($_SESSION['user_id'])) {
        header('location: login.php');
    }
    $id = (int)$_SESSION['user_id'];
    $query = "SELECT * FROM user WHERE id = ?";
    $res = $pdo->prepare($query);
    $res->execute([$id]);

    $user = $res->fetch(PDO::FETCH_ASSOC);

    $firstNameLog = (string)$user['firstName'];
    $lastNameLog = (string)$user['lastName'];

include 'filesLogic.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PHP File Upload</title>

    <style>
    .formUpload{
        width: 30%;
        margin: 100px auto;
        padding: 30px;
        border: 1px solid #555

    }

    input {
        width: 100%;
        border: 1px solid #f1f1f1;
        display: block;
        padding: 5px 10px;
    }

    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <form class="formUpload" action="index2.php" method="post" enctype="multipart/form-data">
                <h3>Upload Files</h3>
                <input type="text" name= 'firstName' placeholder="First Name (client)" required><br>
                <input type="text" name= 'lastName' placeholder="Last Name (client" required><br>
                <input type="file" name="myfile" required><br>
                <button type="submit" name="save">Upload</button>
            </form>
        </div>
    </div>
    <div class="row">
        <table>
            <thead>
                <th>Id</th>
                <th>File Name</th>
                <th>Action</th>
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
    
</body>
</html>