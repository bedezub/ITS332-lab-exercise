<!DOCTYPE html>
<html>
    <head> 
        <title>
            Course Registration System
        </title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script type="text/javascript">
            function confirmdelete(studid) {
                if(confirm("Are you sure to delete this? ")) {
                    window.location.href='deletestudentdetails.php?studid='+studid;
                }
            }
        </script>
    </head>
    <body>
        <header>
            <?php include 'header.php' ?>
        </header>
        <section>
            <nav>
                <?php include 'navigation.php' ?>
                
            </nav>
            <article>
                <h2 style="text-align: center">Display Student Details From The Database</h2>
                <?php 
                    $conn = OpenCon();
                    
                    $studentid = $_GET["studentid"];
                    $sql = "Select * from student where studid=$studentid";
                    $result = $conn->query($sql);
                    
                    if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                                
                            $today = date("Y-m-d");
                            $fullname = $row["studname"];
                            $state = $row["studstate"];
                            $birthDate = $row["studbirthdate"];
                            $age = date_diff(date_create($birthDate), date_create($today));
                            $faculty = $row["studfaculty"];
                            $studid = $row["studid"];
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
                            echo "<tr>";
                            echo "</tr>";           
                            echo "</table>";
                        }
                    } else {
                        echo "Error in fetching data";
                    }
                    
                    CloseCon($conn);
                ?>
                <table>
                    <td colspan="2" align="center">
                    <input type="button" value="Register Course" onclick="window.location.href='registercourse.php?studentid=<?php echo $studentid ?>'"/>
                    <input type="button" value="Update" onclick="window.location.href='updatestudentdetails.php?studentid=<?php echo $studentid ?>'"/>
                    <input type="button" value="Delete" onclick="confirmdelete(<?php echo $studentid ?>)"/>
                    </td>
                </table>
            </article>
        </section>
    </body>
    <?php include 'footer.php'; ?>
</html>