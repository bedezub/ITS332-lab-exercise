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
            <h2>Welcome to FSKM Jasin</h2>
        </header>
        <section>
            <nav>
                <?php include 'navigation.php'; ?>
            </nav>
            <article>
                <h2>Display All Students From The Database</h2>
                <?php
                    
                    include 'conn.php';

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
                    $sql = "SELECT * FROM STUDENT LIMIT $page1,4";
                    $result = $conn->query($sql);

                    echo "<table>";
                        echo "<tr>";
                        echo "<th>Student ID</th>";
                        echo "<th>Student Name</th>";
                        echo "<th>Student Age</th>";
                        echo "<th>Student Email</th>";
                        echo "<th>Student Faculty</th>";
                        echo "<th>Student State</th>";
                        echo "</tr>";
                    if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {

                            $today = date("Y-m-d");
                            $age = date_diff(date_create($row["studbirthdate"]), date_create($today));
                            $studentid = $row["studid"];
                            $studentname = $row["studname"];
                            $studentbirthdate = $row["studbirthdate"];
                            $studentstate = $row["studstate"];
                            $studentfaculty = $row["studfaculty"];
                            $studentaddress = $row["studaddress"];
                            $studentemail = $row["studmail"];
                            
                            echo "<tr>";
                                // echo "<td>$studentid</td>";
                                echo "<td><a href=displaystudentdetails.php?studentid=$studentid>$studentid</td>";
                                echo "<td>$studentname</td>";
                                echo "<td>".$age->format('%y')."</td>";
                                echo "<td>$studentemail</td>";
                                echo "<td>$studentfaculty</td>";
                                echo "<td>$studentstate</td>";
                            echo "<tr>";
                        }
                    } else {
                        echo "Error in fetching data";
                    }
                    echo "</table>";

                    $sql2 = "SELECT count(*) FROM student";
                    $result = $conn->query($sql2);
                    $row = $result->fetch_row();
                    $count = ceil($row[0]/4);

                    for($pageno=1; $pageno<=$count; $pageno++) {
                        ?><a href="displaystudent.php?page=<?php echo $pageno; ?>" style="text-decoration:none"> <?php echo $pageno. " "; ?></a>
                        
                        <?php
                    }
                    CloseCon($conn);
                ?>
            </article>
        </section>
    </body>
    <? include 'footer.php'; ?>
</html>