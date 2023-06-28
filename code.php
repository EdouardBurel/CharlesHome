<?php
$pdo = new PDO('mysql:dbname=edouardburel_charleshome;host=mysql-edouardburel.alwaysdata.net', '302132_chome', 'Charleshome1');
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// ADD TENANT

if(isset($_POST['saveTenant']))
{
    $apartment = $_POST['apartment'];
    $name = $_POST['name'];
    $endLease = $_POST['endLease'];
    $email = $_POST['email'];
    $number = $_POST['number'];

    $query = "INSERT INTO CurrentTenant (Apartment, TenantName, EndLease, Email, Number) VALUES (:apartment, :name, :endLease, :email, :number)";

    $res = $pdo->prepare($query);
    $res->execute([
        'apartment' => $apartment,
        'name' => $name,
        'endLease' => $endLease,
        'email' => $email,
        'number' => $number,
    ]);

    if ($res) {;
        $messages[] = "La location a bien été ajouté"; header("Location: /admin.php");
        exit(0);
    } else {
        $errors[] = "Une erreur s\'est produite."; header("Location: /admin.php");
        exit(0);
    }
}

// DELETE TENANT

if(isset($_POST['delete_tenant']))
{
    $tenant_id = $_POST['delete_tenant'];

    $query = "DELETE FROM CurrentTenant WHERE CurrentTenantID=:tenant_id";
    $res = $pdo->prepare($query);
    $res->bindParam(':tenant_id', $tenant_id);
    $res->execute();

    if($res)
    {
        $_SESSION['message'] = "Horaire supprimé";
        header("Location: /tenants.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Une erreur s'est produite.";
        header("Location: /tenants.php");
        exit(0);
    }

}

// UPDATE TENANT

if(isset($_POST['updateTenant']))
{
    $tenant_id = $_POST['CurrentTenantID'];

    $apartment = $_POST['apartment'];
    $name = $_POST['name'];
    $endLease = $_POST['endLease'];
    $email = $_POST['email'];
    $number = $_POST['number'];

    $query = "UPDATE CurrentTenant SET Apartment=:apartment, TenantName=:name, EndLease=:endLease, Email=:email, Number=:number WHERE CurrentTenantID=:tenant_id";
    $res = $pdo->prepare($query);
    $res->execute([
        'CurrentTenantID' => $tenant_id,
        'Apartment' => $apartment,
        'TenantName' => $name,
        'EndLease' => $endLease,
        'Email' => $email,
        'Number' => $number
    ]);

    if($res)
    {
        $_SESSION['message'] = "Horaire modifié";
        header("Location: /tenants.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Une erreur s'est produite";
        header("Location: /tenants.php");
        exit(0);
    }
}