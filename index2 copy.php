<?php
include 'filesLogic.php';

ini_set('display_errors', 'off');
session_start();

if(!isset($_SESSION['user_id'])) {
    header('location: login.php');
}

$sql = "SELECT * FROM invoice";
$result = $pdo->query($sql);
$files = $result->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
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
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
            <?php
                $id = (int)$_SESSION['user_id'];
                $query = "SELECT * FROM user WHERE id = ?";
                $res = $pdo->prepare($query);
                $res->execute([$id]);

                $user = $res->fetch(PDO::FETCH_ASSOC);

                $reservationName = (string)$user['firstName'].' '.(string)$user['lastName'];

                echo <<<HTML
              <img src="image/logo_charles-home.png" alt="CHARLES HOME">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Your stay</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#" style="color:red">Emergency</a>
                  </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">Se déconnecter</a>
                    </li>
                </ul>
                <span class="helloText navbar-text">
                    Hello $reservationName !
                </span>
              </div>
            </div>
            HTML;
            ?>
        </nav>
    </header>
    <main>
        <div class="container mt-5">
            <form>
                <div class="form-group mb-2">
                    <label for="firstName">First name (client)</label>
                    <input type="text" name='firstName' class="form-control" aria-describedby="emailHelp" placeholder="First name">
                </div>
                <div class="form-group mb-3">
                    <label for="lastName">Last name (client)</label>
                    <input type="text" name='lastName' class="form-control" aria-describedby="emailHelp" placeholder="Last name">
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