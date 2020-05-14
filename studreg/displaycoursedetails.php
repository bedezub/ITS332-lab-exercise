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
            <h2 style="text-align: center">Display Course Details From The Database</h2>
            <?php 
                $conn = OpenCon(); 
                $courseid = $_GET['courseid'];
                $sql = "SELECT * FROM course WHERE courseid='$courseid'";
                $result = $conn->query($sql);

                if($result->num_rows > 0) {

                    while($row = $result->fetch_assoc()) {

                        $courseid = $row["courseid"];
                        $coursename = $row["coursename"];
                        $coursedate = $row["coursedate"];

                        echo "<table>";
                        echo    "<tr>";
                        echo         "<td>Course ID</td>";
                        echo         "<td>$courseid</td>";
                        echo     "</tr>";
                        echo     "<tr>";
                        echo         "<td>Course Name</td>";
                        echo         "<td>$coursename</td>";
                        echo     "</tr>";
                        echo     "<tr>";
                        echo         "<td>Course Date</td>";
                        echo         "<td>$coursedate</td>";
                        echo     "</tr>";
                    }
                } else {
                    echo "Error fetching data";
                }
                CloseCon($conn);
            ?>
            <tr>
                <td><input type="button" value="Update" onclick="window.location.href='updatecoursedetails.php?courseid=<?php echo $courseid ?>'"/></td>
            </tr>
            </table>
            </article>
        </section>
    </body>
    <?php include 'footer.php'; ?>
</html>