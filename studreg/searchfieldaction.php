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
                <h2 style="text-align:center">Result of searching</h2>
                <?php 
                    $searching = $_GET["searchfield"];
                    $conn = OpenCon();
                    $page = 0;

                    if(isset($_GET["page"]) == true) {
                        $page = $_GET["page"];
                    } else {
                        $page = 0;
                    }

                    if($page == "" || $page == "1") {
                        $page1 = 0;
                    } else {
                        $page1 = ($page * 7) - 7;
                    }

                    $sql = "SELECT * FROM registration r, student s, course c
                    WHERE r.studid = s.studid
                    AND r.courseid = c.courseid
                    AND (r.regid LIKE '%$searching%'
                    OR r.regdate LIKE '%$searching%'
                    OR r.studid LIKE '%$searching%'
                    OR s.studname LIKE '%$searching%'
                    OR r.courseid LIKE '%$searching%'
                    OR c.coursename LIKE '%$searching%')
                    LIMIT $page1, 7";

                    $result = $conn->query($sql);

                    if($result->num_rows > 0) {
                        echo '<table>';
                            echo '<tr>';
                                echo '<th>Registration ID</th>';
                                echo '<th>Registration Date</th>';
                                echo '<th>Student ID</th>';
                                echo '<th>Student Name</th>';
                                echo '<th>Course ID</th>';
                                echo '<th>Course Name</th>';
                            echo '<tr>';

                        while($row = $result->fetch_assoc()) {
                            $studid = $row["studid"];
                            $studname = $row["studname"];
                            $regid = $row["regid"];
                            $regdate = $row["regdate"];
                            $courseid = $row["courseid"];
                            $coursename = $row["coursename"];

                            echo "<tr>";
                                echo "<td><a href=displayreport.php>$regid</td>";
                                echo "<td>$regdate</td>";
                                echo "<td><a href=displaystudentdetails.php?studid=$studid</a></td>";
                                echo "<td>$studname</td>";
                                echo "<td><a href=displaycoursedetails.php?courseid=$courseid>$courseid</a></td>";
                                echo "<td>$coursename</td>";
                            echo "</tr>";
                        } 
                    } else {

                        echo 'No result';
                    }
                    echo '</table>';

                    if($result->num_rows > 0) {
                        $sql1 = "SELECT count(*) FROM registration r, student s, course c
                        WHERE r.studid = s.studid
                        AND r.courseid = c.courseid
                        AND r.staffid = '$login_id'
                        AND (r.regid LIKE '%$searching%'
                        OR r.regdate LIKE '%$searching%'
                        OR r.studid LIKE '%$searching%'
                        OR s.studname LIKE '%$searching%'
                        OR r.courseid LIKE '%$searching%'
                        OR c.coursename LIKE '%$searching%')
                        LIMIT $page1, 7";

                        $result = $conn->query($sql1);
                        $row = $result -> fetch_row();
                        $count = ceil($row[0]/7);

                        for($pageno=1; $pageno<=$count; $pageno++) {

                            ?><a href="searchfieldaction.php?page=<?php echo $pageno ?>searchfield=<?php echo $searching; ?>"
                            style="text-decoration:none"> <?php echo $pageno. " "; ?></a><?php
                        }
                    }

                    CloseCon($conn);
                ?>
            </article>
        </section>
    </body>
    <?php include 'footer.php'; ?>
</html>