<!DOCTYPE html>
<html>
    <head> 
        <title>
            Course Registration System
        </title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <header>
            <?php include 'header.php' ?>
        </header>
        <section>
            <nav>
                <?php include 'navigation.php'; ?>  
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
    </body>
    <? include 'footer.php'; ?>
</html>