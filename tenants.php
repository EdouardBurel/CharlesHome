<?php
ini_set('display_errors', 'off');
session_start();
$pdo = new PDO('mysql:dbname=edouardburel_charleshome;host=mysql-edouardburel.alwaysdata.net', '302132_chome', 'Charleshome1');
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$errors = [];
$messages = [];

$stmt = $pdo->query("SELECT * FROM CurrentTenant");
$tenants = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Apartment Management</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
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
                    <a href="admin.php">
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
                    <a href="#">
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
  <div class="container mt-5">
    <h1>Apartment Management</h1>
    <button class="btn btn-primary mb-3 mt-5" data-toggle="modal" data-target="#addTenantModal">Add a tenant</button>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Apartment</th>
          <th>Name</th>
          <th>End Lease</th>
          <th>Email</th>
          <th>Number</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($tenants as $tenant): ?>
        <!-- Table rows will be dynamically populated from the database -->
        <tr>
          <td><?= $tenant['Apartment']; ?></td>
          <td><?= $tenant['TenantName']; ?></td>
          <td><?= $tenant['EndLease']; ?></td>
          <td><?= $tenant['Email']; ?></td>
          <td><?= $tenant['Number']; ?></td>
          <td>
            <a href="code.php?CurrentTenantID=<?= $tenant['CurrentTenantID']; ?>" class="btn btn-info" data-toggle="modal" data-target="#editTenantModal">Update</a>
            <form action="code.php" method="POST" class="d-inline">
                <button type="submit" name="delete_tenant" value="<?=$tenant['CurrentTenantID']; ?>" class="btn-delete btn btn-danger">Supprimer</a>
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <!-- Add Tenant Modal -->
  <div class="modal fade" id="addTenantModal" tabindex="-1" role="dialog" aria-labelledby="addTenantModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addTenantModalLabel">Add a Tenant</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Tenant form fields -->
          <form action="code.php" method="POST">
            <div class="form-group">
              <label for="apartmentInput">Apartment</label>
              <select class="form-control" name="apartment" id="apartmentSelect">
                    <option value="">Select an Apartment</option>
                    <!-- Populate the options dynamically from the database -->
                    <option>Montagne 1</option>
                    <option>Montagne 2</option>
                    <option>Montagne 3</option>
                    <!-- Add more options here -->
                </select>
            </div>
            <div class="form-group">
              <label for="nameInput">Name</label>
              <input type="text" class="form-control" name="name" id="nameInput" placeholder="Name">
            </div>
            <div class="form-group">
              <label for="endLeaseInput">End Lease</label>
              <input type="date" class="form-control" name="endLease" id="endLeaseInput">
            </div>
            <div class="form-group">
              <label for="emailInput">Email</label>
              <input type="email" class="form-control" id="emailInput" name="email" placeholder="Email">
            </div>
            <div class="form-group">
              <label for="numberInput">Number</label>
              <input type="text" class="form-control" id="numberInput" name="number" placeholder="Number">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="saveTenant">Save Tenant</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Update Tenant Modal --> 
    <div class="modal fade" id="editTenantModal" tabindex="-1" role="dialog" aria-labelledby="editTenantModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="addTenantModalLabel">Edit a Tenant</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <!-- Tenant form fields -->
            <?php
            if (isset($_GET['CurrentTenantID'])) {
                $tenant_id = $_GET['CurrentTenantID'];
                $query = "SELECT * FROM CurrentTenant WHERE  CurrentTenantID = :tenant_id";
                $res = $pdo->prepare($query);
                $res->bindParam(":tenant_id", $tenant_id);
                $res->execute();

                if ($res->rowCount() > 0) {
                    $tenant = $res->fetch(PDO::FETCH_ASSOC);
                ?>  
            <form action="code.php" method="POST">
                <input type='hidden' name="CurrentTenantID" value="<?= $tenant['CurrentTenantID']; ?>">
                <div class="form-group">
                <label for="apartmentInput">Apartment</label>
                <select class="form-control" id="apartmentSelect" name="apartment">
                        <option value="<?= $tenant['Apartment']; ?>"></option>
                        <!-- Populate the options dynamically from the database -->
                        <option>Apartment 1</option>
                        <option>Apartment 2</option>
                        <option>Apartment 3</option>
                        <!-- Add more options here -->
                    </select>
                </div>
                <div class="form-group">
                <label for="nameInput">Name</label>
                <input type="text" class="form-control" name="name" value="<?= $tenant['TenantName']; ?>" id="nameInput">
                </div>
                <div class="form-group">
                <label for="endLeaseInput">End Lease</label>
                <input type="date" name="endLease" class="form-control" id="endLeaseInput">
                </div>
                <div class="form-group">
                <label for="emailInput">Email</label>
                <input type="email" name="email" class="form-control" id="emailInput" placeholder="Email">
                </div>
                <div class="form-group">
                <label for="numberInput">Number</label>
                <input type="text" name="number" class="form-control" id="numberInput" placeholder="Number">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="updateTenant">Edit Tenant</button>
                </div>
            </form>
            </div>
        </div>
                    <?php
                } else {
                    echo "<h4> No such Id found</h4>"; 
                }
            }
            ?>
        </div>
    </div>

  <!-- jQuery and Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
