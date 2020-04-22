<html>
    <head>
        <title>Student Registration Feedback</title>
        <style>
            table, th, td {

                padding: 5px;
                width: 45%;
                margin-left: auto;
                margin-right: auto;
                border-collapse: collapse;
                border: 1px solid black;
            }
        </style>
    </head>

    <body>
            <h2 style="text-align: center">Student Registration Details</h2>
            <?php 

                $fullname = $_POST["fullname"];
                $state = $_POST["state"];
                $birthDate = $_POST["birthdate"];
                $today = date("Y-m-d");
                $age = date_diff(date_create($birthDate), date_create($today));
                $faculty = $_POST["faculty"];
                $studid = date("yy").rand(100000, 999999);
                $email = $_POST["email"];
                $address = $_POST["address"];

                // echo("Hello " .$fullname. " (" .$studid. ") from " .$state. " with age " .$age->format('%y'). "<br>Welcome to " .$faculty);

                
                echo "<table>";
                echo    "<tr>";
                echo         "<td>Student ID</td>";
                echo         "<td>$studid</td>";
                echo     "</tr>";
                echo     "<tr>";
                echo         "<td>Full Name</td>";
                echo         "<td>$fullname</td>";
                echo     "</tr>";
                echo     "<tr>";
                echo         "<td>Birthdate</td>";
                echo         "<td>$birthDate</td>";
                echo     "</tr>";
                echo     "<tr>";
                echo         "<td>Age</td>";
                echo         "<td>". $age->format('%y'). "</td>";
                echo     "</tr>";
                echo     "<tr>";
                echo         "<td>Email Address</td>";
                echo         "<td>$email</td>";
                echo     "</tr>";
                echo     "<tr>";
                echo         "<td>Address</td>";
                echo         "<td>$address</td>";
                echo     "</tr>";
                echo     "<tr>";
                echo         "<td>State</td>";
                echo         "<td>$state</td>";
                echo     "</tr>";
                echo     "<tr>";
                echo         "<td>Faculty</td>";
                echo         "<td>$faculty</td>";
                echo     "</tr>";                
                echo "</table>"
                
            ?>
    </body>
</html>