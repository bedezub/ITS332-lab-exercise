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
                <h2 style="text-align: center">Delete Course</h2>
                <?php 
                    $courseid = $_GET["courseid"];

                    $conn = OpenCon();
                    $sql = "DELETE FROM COURSE WHERE courseid = '$courseid'";
                    $result = $conn->query($sql);

                    if(!$result) {
                        die('Could not delete data: ' . mysqli_error($conn));
                    } else {
                        echo "Data deleted";
                    }
                ?>
            </article>
        </section>
    </body>
    <?php include 'footer.php'; ?>
</html>