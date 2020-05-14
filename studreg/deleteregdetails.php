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
            <h2 style="text-align: center">Delete Registration</h2>
                <?php 
                    $regid = $_GET["regid"];

                    $conn = OpenCon();
                    $sql = "DELETE FROM registration WHERE regid = $regid";
                    $result = $conn->query($sql);

                    if(!$result) {
                        die('Could not delete data: ' . mysqli_error($conn, $sql));
                    } else {
                        echo "Data deleted";
                    }
                ?>
            </article>
        </section>
    </body>
    <?php include 'footer.php'; ?>
</html>