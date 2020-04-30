<!DOCTYPE html>
<html>
    <head> 
        <title>
            Course Registration System
        </title>
        <style>
            * {
                box-sizing: border-box;
            }

            body {

                background-color: #4169e1;
                font-family: Arial, Helvetica, sans-serif;
            }

            header {

                background-color: #4169e1;
                padding: 30px;
                text-align: center;
                font-size: 35px;
                color: white;
            }

            nav {

                float: left;
                width: 30%;
                height: 450px;
                background: pink;
                padding: 20px;
            }

            nav ul {

                list-style-type: none;
                margin: 0;
                padding: 0;
                background-color: pink;
            }

            li a {

                display: block;
                color: #000;
                padding: 8px 16px;
                text-decoration: none;
            }

            li a:hover {

                background-color: powderblue;
                color: white;
            }

            article {

                float: left;
                padding: 20px;
                width: 70%;
                background-color: #DB7093;
                height: 450px;
                text-align: center;
            }

            section::after {

                content: "";
                display: table;
                clear: both;
            }

            footer {

                background-color: #1E90FF;
                padding: 10px;
                text-align: center;
                color: white;
            }

            @media(max-width: 600px) {
                nav, article {
                    width: 100%;
                    height: auto;
                }
            } 

            img {
                width: 100%;
                height: 350px;
            }
            /* Maybe kena buang */
            body { 
                background-color: powderblue; 
            }
            div { 
                background-color: pink; padding: 10px; border-style: solid;
            }
            ul  { 
                color: tomato; 
            }
            ol  { 
                color: green; 
            }
            table, th, td {
                padding: 10px;
                text-align: center;
                /* border: 2px solid black; */
                /* border-collapse: collapse; */
            }
            table#t01 tr:nth-child(even) {

                background-color: tomato;
            }
            table#t01 tr:nth-child(odd) {

                background-color: lightgreen;
            }
            table#t01 th {
                background-color: powderblue;
                color: black;
            }
        </style>
    </head>
    <body>
        <header>
            <h2>Welcome to FSKM Jasin</h2>
        </header>
        <section>
            <nav>
                <ul>
                    <li><a href="homepage.php">Homepage</a></li>
                    <li><a href="registerNewStudentForm.php">Register New Student</a></li>
                    <li><a href="displayStudent.php">Display Students</a></li>
                    <li><a href="registerNewCourseForm.php">Register New Course</a></li>
                    <li><a href="displayCourse.php">Display Course</a></li>
                </ul>
            </nav>
            <article>
                <?php 
                    $fullname = $_POST["fullname"];
                    $state = $_POST["state"];
                    $birthDate = $_POST["birthdate"];
                    $faculty = $_POST["faculty"];
                    $address = $_POST["address"];
                    $email = $_POST["email"];
                    $studid = date("yy").rand(100000, 999999);
                    
                    include 'conn.php';
                    
                    $conn = OpenCon(); 
                    $sql = "INSERT INTO student (studid, studname, studbirthdate, studmail, studaddress, studstate, studfaculty) 
                    VALUES ($studid, '$fullname', '$birthDate', '$email', '$address', '$state', '$faculty')";
                    
                    if(mysqli_query($conn, $sql)) {
                        // echo "New record created successfully!";
                        
                        $sql2 = "SELECT * FROM STUDENT WHERE STUDID = $studid";
                        $result = $conn->query($sql2);

                        if($result->num_rows>0) {
                            while($row = $result->fetch_assoc()) {
                                
                                $today = date("Y-m-d");
                                $age = date_diff(date_create($birthDate), date_create($today));
                                $fullname = $row["studname"];
                                $state = $row["studstate"];
                                $birthDate = $row["studbirthdate"];
                                $faculty = $row["studfaculty"];
                                $studid = date("yy").rand(100000, 999999);
                                $email = $row["studmail"];
                                $address = $row["studaddress"];

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
                                echo "</table>";
                            }
                        }
                    } else {
                        echo "Error:  " . $sql . " <br> " . mysqli_error($conn);
                    }
                    
                    CloseCon($conn);
                ?>
                <table>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="button" value="Home" onclick="window.location.href='homepage.php'"/>
                        </td>
                    </tr>
                </table>
            </article>
        </section>
        <footer>
            <p>Prescribed by zubquzaini</p>
        </footer>
    </body>
</html>