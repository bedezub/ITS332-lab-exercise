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
                <h2 style="text-align: center">Update Registration Data in the Database</h2>
                <?php 
                    
                    $regid = $_POST['regid'];
                    $studid = $_POST['studid'];
                    $regdate = $_POST['regdate'];
                    $courseid = $_POST['courseid'];

                    $conn = OpenCon();

                    $sql = "UPDATE registration 
                    SET regdate = '$regdate',
                        courseid = '$courseid'
                    WHERE regid = '$regid'";

                    $result = $conn->query($sql);

                    if($result == true) {

                        $sql2 = "SELECT * FROM 
                        registration r, course c, student s
                        WHERE r.studid = s.studid
                        AND r.courseid = c.courseid
                        AND regid = '$regid'";

                        $result2 = $conn->query($sql2);

                        if($result2->num_rows > 0) {
                            while($row = $result2->fetch_assoc()) {
    
                                $studid = $row["studid"];
                                $studname = $row["studname"];
                                $courseid = $row["courseid"];
                                $coursename = $row["coursename"];
                                $regid = $row["regid"];
                                $regdate = $row["regdate"];

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
                            }
                        }
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                    CloseCon($conn);
                ?>
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