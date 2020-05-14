<!DOCTYPE html>
<html>
    <head> 
        <title>
            Course Registration System
        </title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script type="text/javascript">
            function confirmdelete(regid) {
                if(confirm("Are you sure to delete this? ")) {
                    window.location.href='deleteregdetails.php?regid='+regid;
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
                <?php include 'navigation.php'; ?>
            </nav>
            <article>
                <h2>Display All Students Registration From The Database</h2>
                <?php
                    $conn = OpenCon();
                    $page = 0;

                    if(isset($_GET['page']) == true) {
                        $page = $_GET['page'];
                    } else {
                        $page = 0;
                    }

                    if($page == "" || $page == "1") {
                        $page = 0;
                    } else {
                        $page1 = ($page*5)-5;
                    }

                    $sql = "SELECT * FROM registration r, student s, course c 
                    WHERE r.studid = s.studid
                    AND r.courseid = c.courseid
                    ORDER BY r.regdate DESC
                    LIMIT $page, 5";

                    $result = $conn->query($sql);
                    echo "<table>";
                    echo "<tr>";
                    echo "<th>Registration ID</th>";
                    echo "<th>Registration Name</th>";
                    echo "<th>Student ID</th>";
                    echo "<th>Student Name</th>";
                    echo "<th>Course ID</th>";
                    echo "<th>Course Name</th>";
                    echo "</tr>";
                    if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {

                            $studentid = $row["studid"];
                            $studentname = $row["studname"];
                            $courseid = $row["courseid"];
                            $coursename = $row["coursename"];
                            $regid = $row["regid"];
                            $regdate = $row["regdate"];
                            
                            echo "<tr>";
                                echo "<td>$regid</td>";
                                echo "<td>$regdate</td>";
                                echo "<td>" ?> <a href='displaystudentdetails.php?studentid=<?php echo $studentid; ?>'><?php echo $studentid ?></a></td> <?php
                                echo "<td>$studentname</td>";
                                echo "<td>" ?><a href='displaycoursedetails.php?courseid=<?php echo $courseid; ?>'><?php echo $courseid ?></a></td> <?php
                                echo "<td>$coursename</td>";
                                echo "<td>"?>
                                <button onclick="window.location.href='updateregdetails.php?regid=<?php echo $regid; ?>'">UPDATE</button>
                                <button onclick="confirmdelete('<?php echo $regid ?>')">DELETE</button> <?php "</td>";
                            echo "<tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "Error in fetching data";
                    }
                    $sql2 = "SELECT count(*) FROM registration";
                    $result = $conn->query($sql2);
                    $row = $result->fetch_row();
                    $count = ceil($row[0]/5);

                    for($pageno=1; $pageno <= $count; $pageno++) {
                        ?> <a href="displayreport.php?page=<?php echo $pageno ?>" style="text-decoration: none">
                                <?php echo $pageno. " " ?>
                        </a>
                        <?php
                    }
                    CloseCon($conn);
                ?>
            </article>
        </section>
    </body>
    <?php include 'footer.php'; ?>
</html>