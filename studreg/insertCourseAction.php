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
                <?php 
                    $coursename = $_POST["coursename"];
                    $coursedate = $_POST["coursedate"];
                    $courseid = $_POST["courseid"];

                    include 'conn.php';
                    
                    $conn = OpenCon(); 
                    $sql = "INSERT INTO course (courseid, coursename, coursedate) 
                    VALUES ('$courseid', '$coursename', '$coursedate')";
                    
                    if(mysqli_query($conn, $sql)) {
                        echo "New record created successfully!";
                        
                        $sql2 = "SELECT * FROM COURSE WHERE COURSEID = '$courseid'";
                        $result = $conn->query($sql2);

                        if($result->num_rows>0) {
                            while($row = $result->fetch_assoc()) {
                                
                                $coursename = $row["coursename"];
                                $coursedate = $row["coursedate"];
                                $courseid = $row["courseid"];

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
                                echo "</table>";
                            }
                        }
                    } else {
                        echo "Error:  " . $sql . " <br> " . mysqli_error($conn);
                    }
                    
                    CloseCon($conn);
                ?>
                <table>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="button" value="Home" onclick="window.location.href='homepage.php'"/>
                        </td>
                    </tr>
                </table>
            </article>
        </section>
    </body>
    <? include 'footer.php'; ?>
</html>