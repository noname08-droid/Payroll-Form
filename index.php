<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="utf-8y">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/myFiles/bootstrap5.0.2/css/bootstrap.min.css">
    <title>System Development</title>
    <style>
        body {
            color: black;
            justify-content: center;
            margin: 0;
            background-color: white;

        }

        * {
            box-sizing: border-box;
        }

        section {
            width: 70%;
            margin-left: auto;
            margin-right: auto;
        }

        select {
            padding: 8px;
            margin-left: 5px;
            margin-top: 22px;
        }

        a {
            margin: 20px;
            float: right;
        }

        #group {
            width: 100%;
            border: 1px solid rgba(121, 121, 121, 1);
            background-color: white;
            padding: 50px;
            margin: 20px;
            height: 700px;
            border-radius: 20px;
            background-color: white;
        }

        #earnings {
            width: 49%;
            border: 1px solid rgba(121, 121, 121, 1);
            float: left;
            height: 300px;
            background-color: white;
        }

        #deductions {
            width: 49%;
            border: 1px solid rgba(121, 121, 121, 1);
            float: right;
            height: 300px;
            background-color: white;
        }

        .grouped {
            background-color: #5171dd;
            padding: 8px;
            width: 100%;
            border-bottom: 1px solid rgba(121, 121, 121, 1);
        }

        .id {
            float: left;
            margin-top: 5px;
            margin-right: 50px;
        }

        .name {
            float: left;
            margin-top: 5px;
            margin-right: 20px;
        }

        button {
            margin-top: 20px;
            margin-right: 20px;
            margin-bottom: 20px;
            float: right;
            width: 30%;
        }

        header {
            background-color: #333333;
            color: white;
            padding: 10px;
            font-family: 'Gill Sans', 'Gill Sans MT, Trebuchet MS', sans-serif;
            font-size: 30px;
        }

        img {
            width: 50px;
            height: 50px;
            margin-right: 20px;
        }

        #input {
            background-color: #d3d3d3;
            margin-top: 20px;
        }

        #row {
            background-color: #d3d3d3;
            margin-top: 20px;
            margin-left: 8px;
            width: 400px;
        }

        @media (max-width: 1000px) {

            section {
                width: 100%;
                height: auto;
                float: left;
            }
        }
    </style>

    <script type="text/javascript">
        function ValidationForm() {
            if (document.payrollForm.employeeName.value == "") {
                alert("Employee name required!");
                return false;
            } else if (document.payrollForm.position.value == "Position") {
                alert("Position required!");
                return false;
            } else if (document.payrollForm.ratePerHour.value == "") {
                alert("Rate Per Hour required!");
                return false;
            } else if (document.payrollForm.worked.value == "") {
                alert("Hours Worked required!");
                return false;
            } else if (document.payrollForm.OtPerHour.value == "") {
                alert("Ot Per Hour required!");
                return false;
            } else if (document.payrollForm.otHour.value == "") {
                alert("Ot Hour required!");
                return false;
            } else if (document.payrollForm.sss.value == "") {
                alert("SSS required!");
                return false;
            } else if (document.payrollForm.wtax.value == "") {
                alert("WTAX required!");
                return false;
            } else {
                alert("Data inserted!");
            }

        }
    </script>


</head>

<body>

    <header><img src="payroll_.png">Payroll Form</header>

    <form method="post" name="payrollForm">
        <section>
            <div id="group">

                <table class="table">
                    <tr>
                        <th>
                            <div class="form-group">
                                <label class="name">Employee Name:</label>
                                <input id="input" style="width:300px;" type="text" class="form-control" name="employeeName">
                            </div>
                            <div class="form-group">
                                <select name="position">
                                    <option value="Position">Position:</option>
                                    <option value="Front-end Developer">Front-end Developer</option>
                                    <option value="Back-end Developer">Back-end Developer</option>
                                    <option value="Fullstock Developer">Fullstock Developer</option>
                                </select>
                            </div>
                        </th>
                    </tr>
                </table>




                <div id="earnings">
                    <table class="table">
                        <tr>
                            <label class="grouped"><b>Earnings:</b></label>

                            <th>
                                <div class="form-group">
                                    <input placeholder="Rate per Hour:" id="input" type="number" class="form-control" name="ratePerHour">
                                </div>
                            </th>

                            <th>
                                <div class="form-group">
                                    <input placeholder="Hours Worked:" id="input" type="number" class="form-control" name="worked">
                                </div>
                            </th>
                        </tr>
                    </table>

                    <tr>
                        <th>
                            <div class="form-group">
                                <input placeholder="OT Per Hour:" id="row" type="number" class="form-control" name="OtPerHour">
                            </div>
                            <div class="form-group">
                                <input placeholder="OT Hour:" id="row" type="number" class="form-control" name="otHour">
                            </div>
                        </th>
                    </tr>


                </div>


                <div id="deductions">

                    <table class="table">
                        <tr>
                            <label class="grouped"><b>Deductions:</b></label>

                            <th>
                                <div class="form-group">
                                    <input placeholder="SSS:" id="input" type="number" class="form-control" name="sss">
                                </div>
                                <div class="form-group">
                                    <input placeholder="WTAX:" id="input" type="number" class="form-control" name="wtax">
                                </div>
                            </th>
                    </table>
                    </tr>

                </div>
                <button class="btn btn-dark btn-lg" name="calculate" onclick="return ValidationForm()">Calculate</button>
                <a class="btn btn-dark btn-lg" href="display.php">Display</a>
            </div>


        </section>
    </form>

    <?php

    // connection
    $serverName = 'localhost';
    $userName = 'root';
    $password = '';
    $dbName = 'payrollForm';

    //value
    $employeeID = 0 ?? '';
    $employeeName = $_POST['employeeName'] ?? '';
    $position = $_POST['position'] ?? '';
    $ratePerHour = $_POST['ratePerHour'] ?? '';
    $worked = $_POST['worked'] ?? '';
    $OtPerHour = $_POST['OtPerHour'] ?? '';
    $otHour = $_POST['otHour'] ?? '';
    $sss = $_POST['sss'] ?? '';
    $wtax = $_POST['wtax'] ?? '';


    // earning calculation 
    (int)$total = ((int)$worked * (int)$ratePerHour) + ((int)$OtPerHour * (int)$otHour);

    // deduction 
    (int)$deductions = ((int)$sss + (int)$wtax);

    (int)$earnings = $total - $deductions;




    $connection = new mysqli($serverName, $userName, $password, $dbName);

    // check connection 
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    $dbQuery = "INSERT INTO calculator VALUES($employeeID, UCASE('$employeeName'), UCASE('$position'), '$ratePerHour',
    '$worked', '$OtPerHour', '$otHour', '$sss', '$wtax', '$earnings')";

    if (isset($_POST['calculate'])) {
        if ($connection->query($dbQuery) == true) {
            echo ("Data inserted successfullly");
        } else {
            die("Error: " . $dbQuery . " " . $connection->error);
        }
    }

    ?>


</body>

</html>