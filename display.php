<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/myFiles/bootstrap5.0.2/css/bootstrap.min.css">
    <title>Checking</title>
    <style>
        table {
            margin: 10px;
            text-align: center;
        }
    </style>

    <script type="text/javascript">
        function Confirmation(myID) {
            if (confirm("You want to delete this entry?")) {
                window.location.href = "delete.php?myID=" + myID;
            }
        }
    </script>

</head>

<body>
    <?php

    $serverName = 'localhost';
    $userName = 'root';
    $password = '';
    $dbName = 'payrollForm';

    $connection = new mysqli($serverName, $userName, $password, $dbName);


    $sql = "SELECT employeeID, employeeName, position, ratePerHour, hoursWork, otPerHour, otHour, sss, wtax, Netpay FROM calculator";
    $result = $connection->query($sql);


    if ($result->num_rows > 0) {
        echo "<table class='table'><tr><th>Name</th><th>Position</th><th>RatePerHour</th><th>HoursWork</th><th>OtPerHour</th><th>OtHour</th><th>SSS</th><th>WTAX</th><th>NetPay</th><th>Action</th></tr>";
        // output data of each row 
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["employeeName"] . "</td><td>" . $row["position"] . "</td>
            <td>" . $row["ratePerHour"] . "</td><td>" . $row["hoursWork"] . "</td><td>" . $row["otPerHour"] . "</td>
            <td>" . $row["otHour"] . "</td><td>" . $row["sss"] . "</td><td>" . $row["wtax"] . "</td><td>" . $row["Netpay"] . "</td> 
            <form method='post'><td>

            <a href='update.php?myID=$row[employeeID]'><input type=button style='width: 100px' class='btn btn-link' value='Edit' /></a>

            <button name=mybutton class='btn btn-link' onclick='Confirmation($row[employeeID])' type='button'>Delete</button>
            </td></from></tr>";
        }

        echo "</table>";
    } else {
        echo "No Record detected!";
    }

    $connection->close();

    ?>
    <button style="margin: 20px;
            float: right;
            width: 20%;" class="btn btn-dark btn-lg" onclick="window.location.href='index.php'" type="button">InsertData</button>
</body>

</html>
