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
                <h2 style="text-align: center">Update Form</h2>
                <form action="updateregaction.php" id="updateform" method="POST">
                    <?php 
                        $conn = OpenCon();
                        $regid = $_GET['regid'];
                        $sql = "SELECT * FROM registration r, student s, course c 
                        WHERE r.studid = s.studid
                        AND r.courseid = c.courseid
                        and regid = $regid";

                        $result = $conn->query($sql);

                        if($result->num_rows > 0) {
                            while($row=$result->fetch_assoc()) {

                                $studid = $row["studid"];
                                $studname = $row["studname"];
                                $courseid = $row["courseid"];
                                $coursename = $row["coursename"];
                                $regid = $row["regid"];
                                $regdate = $row["regdate"];

                                $sql2 = "SELECT * FROM course";
                                $result = $conn->query($sql2);

                                echo "<table>";
                                    echo "<tr>";
                                        echo "<td>Registration ID</td>"; 
                                        echo "<td>" ?> <input type="text" name="regid" value="<?php echo $regid ?>" readonly> <?php "</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                        echo "<td>Student ID</td>";
                                        echo "<td>" ?> <input type="text" name="studid" value="<?php echo $studid ?>" readonly> <?php "</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                        echo "<td>Student Name</td>";
                                        echo "<td>" ?> <input type="text" name="studname" value="<?php echo $studname ?>"> <?php "</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                        echo "<td>Registration Date</td>";
                                        echo "<td>" ?> <input type="date" name="regdate" value="<?php echo $regdate ?>"> <?php "</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                        echo "<td>Course</td>";
                                        echo "<td>" ?> 
                                            <select name="courseid">
                                                <?php foreach($result as $row) {
                                                    echo '<option value="'.$row['courseid'].'"';
                                                    if($row['courseid'] == $courseid) {
                                                        echo 'selected';
                                                    }
                                                    echo '>' .$row['courseid'] . "-" . $row['coursename'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        <?php echo"</td>";
                                    echo "</tr>";
                            }
                        } else {
                            echo "Data cannot be displayed";
                        }
                        CloseCon($conn);
                    ?>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" value="Submit">
                            <input type="button" value="Back" onclick="history.back()">
                        </td>
                    </tr>
                    </table>
                </form>
            </article>
        </section>
    </body>
    <?php include 'footer.php'; ?>
</html>