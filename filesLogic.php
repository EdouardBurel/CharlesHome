<?php

//This query uses an INNER JOIN to combine the "invoice" and "user" tables based on matching "firstName" and "lastName" values. It selects all columns from the "invoice" table (you can modify it to select specific columns if needed).
$sql = "SELECT invoice.* FROM invoice
        WHERE invoice.firstName = '$firstNameLog' AND invoice.lastName = '$lastNameLog'";

$result = $pdo->query($sql);
$files = $result->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST['save'])) {
    $filename = $_FILES['myfile']['name'];

    $firstName = $_POST['firstName'];

    $lastName = $_POST['lastName'];

    $destination = 'uploads/' . $filename;

    $extension = pathinfo($filename,PATHINFO_EXTENSION);

    $file = $_FILES['myfile']['tmp_name'];

    if(!in_array($extension,['pdf','zip','xlsx'])){
        echo "File not accepted";
    } else {
        if(move_uploaded_file($file,$destination)) {
            $sql = "INSERT INTO invoice (name, firstName, lastName) VALUES ('$filename', '$firstName', '$lastName')";
            
            if ($pdo->query($sql)) {
                echo "file uploaded successully";
            } else {
                echo "failed to upload the file";
            }
        }
    }
}

?>