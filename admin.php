<?php
    ini_set('display_errors', 'off');
    session_start();
    $pdo = new PDO('mysql:dbname=edouardburel_charleshome;host=mysql-edouardburel.alwaysdata.net', '302132_chome', 'Charleshome1');
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(!isset($_SESSION['admin_id'])) {
        header('location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Espace admin - Charles Home</title>
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-img">
                <img src="image/logo-key.png" alt="Charles Home">
            </div>

            <span class="logo_name">Charles Home</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li>
                    <a href="#">
                        <i class="fa fa-home"></i>
                        <span class="link-name">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="tenants.php">
                        <i class="fa fa-user"></i>
                        <span class="link-name">Tenants</span>
                    </a>
                </li>

                <li>
                    <a href="invoiceAdmin.php">
                        <i class="fa-solid fa-file-invoice"></i>
                        <span class="link-name">Invoice</span>
                    </a>
                </li>
            </ul>

            <ul class="logout-mode">
                <li>
                    <a href="logout.php">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        <span class="link-name">Logout</span>
                    </a>
                </li>

                <li class="mode">
                    <a href="#">
                        <i class="fa-solid fa-moon"></i>
                        <span class="link-name">Dark Mode</span>
                    </a>

                    <div class="mode-toggle">
                        <span class="switch"></span>
                    </div>
                </li>

            </ul>
        </div>
    </nav>
    <section class="dashboard">
        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="fa fa-home"></i>
                    <span class="text">Rentals</span>
                </div>

                <div class="boxes">
                    <div class="box box1">
                        <span class="text">Occupancy</span>
                        <span class="number">100%</span>
                    </div>

                    <div class="box box2">
                        <span class="text">Monthly income</span>
                        <span class="number">100€</span>
                    </div>

                    <div class="box box3">
                        <span class="text">Cleaning Service</span>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col">Vert</th>
                                <th scope="col">Noir</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">10</td>
                                    <td>3</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="activity">
                    <div class="title">
                        <i class="fa fa-list"></i>
                        <span class="text">Current tenants</span>
                    </div>
                </div>
                <?php
                $stmt = $pdo->query("SELECT * FROM CurrentTenant");
                $tenants = $stmt->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Apartment</th>
                        <th scope="col">Name</th>
                        <th scope="col">End Lease</th>
                        <th scope="col">Email</th>
                        <th scope="col">Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tenants as $tenant): ?>
                            
                        
                            <tr>
                                <td><?= $tenant['Apartment']; ?></td>
                                <td><?= $tenant['TenantName']; ?></td>
                                <td><?= $tenant['EndLease']; ?></td>
                                <td><?= $tenant['Email']; ?></td>
                                <td><?= $tenant['Number']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>