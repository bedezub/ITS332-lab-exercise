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
            Only Authorize User is Allowed
        </header>
        <section>
            <nav>
                <li>Please Login First</li>
            </nav>
            <article>
                <?php 
                    include 'conn.php';

                    $conn = OpenCon();
                    session_start();
                    
                    $staffid = $_POST["staffid"];
                    $password = $_POST["password"];

                    $sql = "SELECT * FROM staff WHERE staffid = $staffid AND password = '$password'";
                    $result = $conn->query($sql);

                    if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $_SESSION['login_user'] = $staffid;
                            header("location: homepage.php");
                        }
                    } else {
                        echo "Your Login Name or Password is Invalid";
                    }

                    CloseCon($conn);
                ?>
            </article>
        </section>
    </body>
    <?php include 'footer.php'; ?>
</html>