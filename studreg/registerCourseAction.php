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
                <h2 style="text-align: center;">Insert Course Registration Data into Database</h2><br>
                <?php 
                    $studid = $_POST['studid'];
                    $courseid = $_POST['courseid'];
                    $regid = rand(0,999999);
                    $regdate = $_POST['regdate'];
                    $staffid = $login_id;

                    $conn = OpenCon();
                    $sql = "INSERT INTO registration (regid, studid, courseid, regdate, staffid)
                    VALUES ($regid, $studid, '$courseid', '$regdate', '$staffid')";

                    if(mysqli_query($conn, $sql)) {
                        // echo "New record created successfully \n";
                        $sql2 = "SELECT * FROM registration r, student s, course c
                        WHERE r.studid = s.studid
                        AND r.courseid = c.courseid
                        AND regid = $regid";

                        $result = $conn->query($sql2);
                        while($row = $result->fetch_assoc()) {

                            $studid = $row['studid'];
                            $studname = $row['studname'];
                            $courseid = $row['courseid'];
                            $coursename = $row['coursename'];
                            $regdate = $row['regdate'];

                            echo "<table>";
                            echo    "<tr>";
                            echo         "<td>Student ID</td>";
                            echo         "<td>$studid</td>";
                            echo     "</tr>";
                            echo     "<tr>";
                            echo         "<td>Full Name</td>";
                            echo         "<td>$studname</td>";
                            echo     "</tr>";
                            echo     "<tr>";
                            echo         "<td>Course ID</td>";
                            echo         "<td>$courseid</td>";
                            echo     "</tr>";
                            echo     "<tr>";
                            echo         "<td>Course Name</td>";
                            echo         "<td>$coursename</td>";
                            echo     "</tr>";
                            echo     "<tr>";
                            echo         "<td>Registration Date</td>";
                            echo         "<td>$regdate</td>";
                            echo     "</tr>";     
                            echo "</table>";
                        }
                        
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }

                    CloseCon($conn);
                ?>

                <table>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="button" value="Home" onclick="window.location.href='homepage.php'">
                        </td>
                    </tr>
                </table>
            </article>
        </section>
    </body>
    <?php include 'footer.php'; ?>
</html>