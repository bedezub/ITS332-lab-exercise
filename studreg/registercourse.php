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
            <h2 style="text-align: center;">Course Registration Form</h2><br>
                <form action="registerCourseAction.php" id="form" method="POST">
                    <?php 
                        $studid = $_GET['studentid'];
                        $conn = OpenCon();
                        $sql1 = "SELECT * FROM student WHERE studid='$studid'";
                        $result1 = $conn->query($sql1);
                        if($result1->num_rows > 0) {

                            while($row = $result1->fetch_assoc()) {

                                $studid = $row['studid'];
                                $studname = $row['studname'];
                            }
                            
                        } else {
                            echo "Data cannot be displayed";
                        }

                        $sql2 = "SELECT * FROM course";
                        $result2 = $conn->query($sql2);
                    ?>
                    <table>
                        <tr>
                            <td>Student ID </td> 
                            <td><input type="text" name="studid" value="<?php echo $studid ?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Full Name</td> 
                            <td><input type="text" name="studname" value="<?php echo $studname ?>"readonly></td>
                        </tr>
                        <tr>
                            <td>Subject</td>
                            <td>
                                <select name="courseid">
                                    <?php foreach($result2 as $row): ?>
                                        <option value="<?= $row['courseid']; ?>"><?= $row['courseid'] . "-" . $row['coursename']; ?></option>
                                    <?php endforeach; ?>
                                </select>   
                            </td>
                        </tr>
                        <tr>
                            <td>Register Date</td> 
                            <td><input type="date" name="regdate" required></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <input type="submit" value="Submit">
                                <input type="reset" value="Reset">
                            </td>
                        </tr>
                    </table>
                </form>
            </article>
        </section>
    </body>
    <?php include 'footer.php'; ?>
</html>