<?php
    ini_set('display_errors', 'off');
    session_start();
    $pdo = new PDO('mysql:dbname=edouardburel_charleshome;host=mysql-edouardburel.alwaysdata.net', '302132_chome', 'Charleshome1');
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="css/override-bootstrap.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    
    <title>Test</title>
</head>
<body class="bg-white">
    <header>
        <nav class="navbar navbar-expand-lg bg-white">
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
            <h1>Invoices</h1>
            <div class="row">
                <table class=" bg-white table table-bordered mt-5">
                    <thead>
                        <th>Month</th>
                        <th>File Name</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php foreach($files as $file): ?>
                            <tr>
                                <td><?php echo $file['Month'].' '.$file['Year'];?></td>
                                <td><?php echo $file['name'];?></td>
                                <td>
                                    <a href="download.php?file_id=<?php echo $file['id']; ?>">Download</a>
                                </td>

                            </tr>

                            <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-md-3 d-flex align-items-center">
          <span class="mb-2 mb-md-0" style="color:#fff">© 2023 Charles Home. All rights reserved</span>
        </div>
        <div class="col-md-6 d-flex justify-content-center align-items-center">
            <a href="https://www.charleshome.com/" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
                <img src="image/logo-key.png" alt="CHARLES HOME" width="30px">
              </a>
        </div>
        <div class="col-md-3 d-flex align-items-center justify-content-end">
            <span class="mb-2 m-md-1" style="color:#fff">contact@charleshome.com</span>
          </div>
      </footer>

    <script src="script.js"></script> 
</body>
</html>