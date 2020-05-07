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

                    $fullname = $_POST["studname"];
                    $state = $_POST["state"];
                    $birthDate = $_POST["studbirthdate"];
                    $faculty = $_POST["faculty"];
                    $studid = $_POST["studid"];
                    $email = $_POST["studmail"];
                    $address = $_POST["studaddress"];

                    $sql = "UPDATE student SET 
                    studname = '$fullname',
                    studbirthdate = '$birthDate',
                    studmail = '$email',
                    studaddress = '$address',
                    studstate = '$state',
                    studfaculty = '$faculty'
                    WHERE studid = '$studid'";
                
                    $result = $conn ->query($sql);

                    if($result == true) {
                        echo $sql;
                        // echo "Record updated!";
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