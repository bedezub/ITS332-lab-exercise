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
            <h2 style="text-align: center;">Update Form</h2><br>
            <form action="updatecourseaction.php" id="updateform" method="POST">
                <?php 
                    $conn = OpenCon();
                    
                    $courseid = $_GET["courseid"];
                    $sql = "Select * from course where courseid='$courseid'";
                    $result = $conn->query($sql);

                    if($result->num_rows > 0) {

                        while($row = $result->fetch_assoc()) {
                            $coursename = $row["coursename"];
                            $coursedate = $row["coursedate"];
                            $courseid = $row["courseid"];

                            echo "<table>";
                            echo    "<tr>";
                            echo         "<td>Course ID</td>";
                            echo         "<td>"?> <input type="text" name="courseid"  value="<?php echo $courseid ?>"  readonly><?php "</td>";
                            echo     "</tr>";
                            echo     "<tr>";
                            echo         "<td>Course Name</td>";
                            echo         "<td>"?> <input type="text" name="coursename" value="<?php echo $coursename ?>"><?php "</td>";
                            echo     "</tr>";
                            echo     "<tr>";
                            echo         "<td>Birthdate</td>";
                            echo         "<td>"?> <input type="date" name="coursedate"  value="<?php echo $coursedate ?>"><?php "</td>";
                            echo     "</tr>";              
                            echo "</table>";
                        }
                    } else {
                        echo "Error in fetching data";
                    }
                    CloseCon($conn);
                ?>
                <table>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" value="Submit">
                            <input type="button" value="Back" onclick="history.back()">
                        </td>
                    </tr>
                </table>
            </article>
        </section>
    </body>
    <?php include 'footer.php'; ?>
</html>