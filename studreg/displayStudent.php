<!DOCTYPE html>
<html>
    <head> 
        <title>
            Course Registration System
        </title>
        <style>
            * {
                box-sizing: border-box;
            }

            body {

                background-color: #4169e1;
                font-family: Arial, Helvetica, sans-serif;
            }

            header {

                background-color: #4169e1;
                padding: 30px;
                text-align: center;
                font-size: 35px;
                color: white;
            }

            nav {

                float: left;
                width: 30%;
                height: 450px;
                background: pink;
                padding: 20px;
            }

            nav ul {

                list-style-type: none;
                margin: 0;
                padding: 0;
                background-color: pink;
            }

            li a {

                display: block;
                color: #000;
                padding: 8px 16px;
                text-decoration: none;
            }

            li a:hover {

                background-color: powderblue;
                color: white;
            }

            article {

                float: left;
                padding: 20px;
                width: 70%;
                background-color: #DB7093;
                height: 450px;
                text-align: center;
            }

            section::after {

                content: "";
                display: table;
                clear: both;
            }

            footer {

                background-color: #1E90FF;
                padding: 10px;
                text-align: center;
                color: white;
            }

            @media(max-width: 600px) {
                nav, article {
                    width: 100%;
                    height: auto;
                }
            } 

            img {
                width: 100%;
                height: 350px;
            }
            /* Maybe kena buang */
            body { 
                background-color: powderblue; 
            }
            div { 
                background-color: pink; padding: 10px; border-style: solid;
            }
            ul  { 
                color: tomato; 
            }
            ol  { 
                color: green; 
            }

            table, th, td {
                padding: 10px;
                /* width: 50%; */
                margin-left: auto;
                margin-right: auto;
                border-collapse: collapse;
                /* border: 1px solid black; */
            }

        </style>
    </head>
    <body>
        <header>
            <h2>Welcome to FSKM Jasin</h2>
        </header>
        <section>
            <nav>
                <ul>
                    <li><a href="homepage.php">Homepage</a></li>
                    <li><a href="registerNewStudentForm.php">Register New Student</a></li>
                    <li><a href="displayStudent.php">Display Students</a></li>
                    <li><a href="registerNewCourseForm.php">Register New Course</a></li>
                    <li><a href="displayCourse.php">Display Course</a></li>
                </ul>
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
                                echo "<td>$studentid</td>";
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
    <footer>
        <p>Prescribed by zubquzaini</p>
    </footer>
</html>