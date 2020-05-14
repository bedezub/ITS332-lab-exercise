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
                    $conn = OpenCon();

                    $coursename = $_POST["coursename"];
                    $coursedate = $_POST["coursedate"];
                    $courseid = $_POST["courseid"];

                    $sql = "UPDATE course SET 
                    coursename = '$coursename',
                    coursedate = '$coursedate'
                    WHERE courseid = '$courseid'";

                    
                    $result = $conn ->query($sql);

                    if($result == true) {
                        echo "Record updated!";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }

                    CloseCon($conn);
                ?>
                <table>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="button" value="Home" onclick="window.location.href='homepage.php'">
                        </td>
                    </tr>
                </table>
            </article>
        </section>
    </body>
    <?php include 'footer.php'; ?>
</html>