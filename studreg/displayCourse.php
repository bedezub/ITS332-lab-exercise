<!DOCTYPE html>
<html>
    <head> 
        <title>
            Course Registration System
        </title>
        <link rel="stylesheet" type="text/css" href="style.css">
        
        <script type="text/javascript">
            function confirmdelete(courseid) {
                console.log("Debug" + courseid);
                if(confirm("Are you sure to delete this? ")) {
                    console.log("Debug" + courseid);
                    window.location.href='deletecoursedetails.php?courseid='+courseid;
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
                <h2>Display All Courses From The Database</h2>
                <?php
                    
                    // include 'conn.php';
                    $conn = OpenCon();
                    $page = 0;
                    if(isset($_GET["page"]) == true) {
                        $page = $_GET["page"];
                    } else {
                        $page = 0;
                    }
                    if($page=="" | $page == "1") {
                        $page1 = 0;
                    } else {
                        $page1 = ($page*4)-4;
                    }
                    $sql = "SELECT * FROM COURSE LIMIT $page1,4";
                    $result = $conn->query($sql);
                    echo "<table>";
                        echo "<tr>";
                        echo "<th>Course ID</th>";
                        echo "<th>Course Name</th>";
                        echo "<th>Course Date</th>";
                        echo "</tr>";
                    if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $coursename = $row["coursename"];
                            $coursedate = $row["coursedate"];
                            $courseid = $row["courseid"];
                            
                            echo "<tr>";
                                echo "<td>$courseid</td>";
                                echo "<td>$coursename</td>";
                                echo "<td>$coursedate</td>";
                                echo "<td><a href=updatecoursedetails.php?courseid=$courseid>" ?> 
                                <img src="images/edit.png" style="width: 20px; height: 20px;" alt="FSKM Picutre"> <?php "</a></td>";
                                echo "<td><a href=deletecoursedetails.php?courseid=$courseid>" ?>
                                <img src="images/delete.png" style="width: 20px; height: 20px;" alt="FSKM Picutre"></a><?php "</td>";
                            echo "<tr>";
                        }
                    } else {
                        echo "Error in fetching data";
                    }
                    echo "</table>";

                    $sql2 = "SELECT count(*) FROM course";
                    $result = $conn->query($sql2);
                    $row = $result->fetch_row();
                    $count = ceil($row[0]/4);

                    for($pageno=1; $pageno<=$count; $pageno++) {
                        ?><a href="displayCourse.php?page=<?php echo $pageno; ?>" style="text-decoration:none"> <?php echo $pageno. " "; ?></a>
                        
                        <?php
                    }
                    CloseCon($conn);
                    
                ?>
            </article>
        </section>
    </body>
    <? include 'footer.php'; ?>
</html>