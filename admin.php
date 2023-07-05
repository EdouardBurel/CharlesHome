<?php
    ini_set('display_errors', 'off');
    session_start();
    $pdo = new PDO('mysql:dbname=edouardburel_charleshome;host=mysql-edouardburel.alwaysdata.net', '302132_chome', 'Charleshome1');
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(!isset($_SESSION['admin_id'])) {
        header('location: login.php');
    }

    require_once('lib/CheckinTable.php');
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
            </ul>
        </div>
    </nav>
    <section class="dashboard">
        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="fa fa-home"></i>
                    <span class="text">Monthly Check-in/out - <?php echo date('F Y'); ?></span>
                </div>

                <div class="boxes" style="display: flex;">
                    <div class="box" style="background-color: #F5F5F5; padding: 10px;">
                    <table class="table table-striped" style="border-collapse: collapse;">
                        <thead>
                            <tr>
                                <th colspan="2" style="text-align: center;">Check-in</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row" colspan="2" style="color: green; font-size: 30px; text-align: center; background-color: #F5F5F5;"><?php echo $checkInCount; ?></td>
                            </tr>
                        </tbody>
                        <thead>
                            <tr>
                                <th style="text-align: center;">Date</th>
                                <th style="text-align: center;">Apt</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($checkInRows as $row): ?>
                            <tr>
                                <td style="text-align: center;"><?php echo date('l jS F', strtotime($row['StartDate'])); ?></td>
                                <td style="text-align: center;">
                                <?php
                                    $apartmentId = $row['ApartmentID'];
                                    $query = "SELECT ApartmentName FROM Apartment WHERE ApartmentID = ?";
                                    $statement = $pdo->prepare($query);
                                    $statement->execute([$apartmentId]);
                                    $apartmentResult = $statement->fetch(PDO::FETCH_ASSOC);

                                    if ($apartmentResult) {
                                        echo $apartmentResult['ApartmentName'];
                                    }
                                ?>
                                </td>
                            <?php endforeach; ?>
                            </tr>
                        </tbody>
                    </table>

                    <table class="table table-striped" style="border-collapse: collapse;">
                        <thead>
                            <tr>
                                <th colspan="2" style="text-align: center;">Check-out</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row" colspan="2" style="color: red; font-size: 30px; text-align: center;"><?php echo $checkOutCount; ?></td>
                            </tr>
                        </tbody>
                        <thead>
                            <tr>
                                <th style="text-align: center;">Date</th>
                                <th style="text-align: center;">Apt</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($checkOutRows as $checkoutRow): ?>
                            <tr>
                                <td style="text-align: center;"><?php echo date('l jS F', strtotime($checkoutRow['EndDate'])); ?></td>
                                <td style="text-align: center;">
                                <?php
                                    $apartmentId = $row['ApartmentID'];
                                    $query = "SELECT ApartmentName FROM Apartment WHERE ApartmentID = ?";
                                    $statement = $pdo->prepare($query);
                                    $statement->execute([$apartmentId]);
                                    $apartmentResult = $statement->fetch(PDO::FETCH_ASSOC);

                                    if ($apartmentResult) {
                                        echo $apartmentResult['ApartmentName'];
                                    }
                                ?>
                                </td>
                            <?php endforeach; ?>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>

                <div class="activity">
                    <div class="title">
                        <i class="fa fa-list"></i>
                        <span class="text">Current tenants</span>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Apartment</th>
                        <th scope="col">Name</th>
                        <th scope="col">Number</th>
                        <th scope="col">End Lease</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tenants as $tenant): ?>
                            <?php foreach ($leases as $lease): ?>
                                <?php if ($tenant['TenantID'] === $lease['TenantID']): ?> 
                            <tr>
                                <td>
                                    <?php
                                    $apartmentId = $tenant['ApartmentID'];
                                    $query = "SELECT ApartmentName FROM Apartment WHERE ApartmentID = ?";
                                    $statement = $pdo->prepare($query);
                                    $statement->execute([$apartmentId]);
                                    $apartmentResult = $statement->fetch(PDO::FETCH_ASSOC);

                                    if ($apartmentResult) {
                                        echo $apartmentResult['ApartmentName'];
                                    }
                                    ?>
                                </td>
                                <td><?= $tenant['FirstName'].' '.$tenant['LastName']; ?></td>
                                <td><?= $tenant['Number']; ?></td>
                                <td><?php echo date('jS F Y', strtotime($lease['EndDate'])); ?></td>
                            </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>

        </div>

    </section>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>