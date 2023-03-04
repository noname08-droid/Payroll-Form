<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    // connection
    $serverName = 'localhost';
    $userName = 'root';
    $password = '';
    $dbName = 'payrollForm';

    $connection = new mysqli($serverName, $userName, $password, $dbName);

    // check connection 
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    $myID = $_GET['myID'] ?? '';
    $delete = "DELETE FROM calculator WHERE employeeID=$myID";
    if ($connection->query($delete)) {
        echo "Reocored Deleted: " . $myID;
        echo "<script>window.location.href='display.php'</script>";
    } else {
        echo "Delete fail: " . $connection->error;
    }
    ?>

</body>

</html>