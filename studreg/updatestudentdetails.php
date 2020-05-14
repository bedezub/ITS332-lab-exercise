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
            <h2 style="text-align: center;">Update Form</h2><br>
                <form action="updatestudentaction.php" id="updateform" method="POST">
                <?php 
                    $conn = OpenCon();
            
                    $studentid = $_GET["studentid"];
                    $sql = "Select * from student where studid=$studentid";
                    $result = $conn->query($sql);
                    
                    if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                                
                            $today = date("Y-m-d");
                            $fullname = $row["studname"];
                            $state = $row["studstate"];
                            $birthDate = $row["studbirthdate"];
                            $age = date_diff(date_create($birthDate), date_create($today));
                            $faculty = $row["studfaculty"];
                            $studid = $row["studid"];
                            $email = $row["studmail"];
                            $address = $row["studaddress"];

                            echo "<table>";
                            echo    "<tr>";
                            echo         "<td>Student ID</td>";
                            echo         "<td>"?> <input type="text" name="studid"  value="<?php echo $studid ?>"  readonly><?php "</td>";
                            echo     "</tr>";
                            echo     "<tr>";
                            echo         "<td>Full Name</td>";
                            echo         "<td>"?> <input type="text" name="studname" value="<?php echo $fullname ?>"><?php "</td>";
                            echo     "</tr>";
                            echo     "<tr>";
                            echo         "<td>Birthdate</td>";
                            echo         "<td>"?> <input type="date" name="studbirthdate"  value="<?php echo $birthDate ?>"><?php "</td>";
                            echo     "</tr>";
                            echo     "<tr>";
                            echo         "<td>Address</td>";
                            echo         "<td>"?> <textarea col="20" rows="5" name="studaddress"><?php echo $address ?> </textarea><?php "</td>";
                            echo     "</tr>";
                            echo     "<tr>";
                            echo         "<td>Email Address</td>";
                            echo         "<td>"?> <input type="text" name="studmail"  value="<?php echo $email ?>"><?php "</td>";
                            echo     "</tr>";
                            echo     "<tr>";
                            echo         "<td>State</td>";
                            echo         "<td>"?> 
                                            <select id="state" name="state">
                                                <option value="Johor" <?php if($state == "Johor") echo "SELECTED";?>>Johor</option>
                                                <option value="Kedah" <?php if($state == "Kedah") echo "SELECTED";?>>Kedah</option>
                                                <option value="Kelantan" <?php if($state == "Kelantan") echo "SELECTED";?>>Kelantan</option>
                                                <option value="KL" <?php if($state == "KL") echo "SELECTED";?>>Kuala Lumpur</option>
                                                <option value="Melaka" <?php if($state == "Melaka") echo "SELECTED";?>>Melaka</option>
                                                <option value="NSembilan" <?php if($state == "NSembilan") echo "SELECTED";?>>Negeri Sembilan</option>
                                                <option value="Pahang" <?php if($state == "Pahang") echo "SELECTED";?>>Pahang</option>
                                                <option value="Penang" <?php if($state == "Penang") echo "SELECTED";?>>Penang</option>
                                                <option value="Perak" <?php if($state == "Perak") echo "SELECTED";?>>Perak</option>
                                                <option value="Perlis" <?php if($state == "Perlis") echo "SELECTED";?>>Perlis</option>
                                                <option value="Selangor" <?php if($state == "Selangor") echo "SELECTED";?>>Selangor</option>
                                                <option value="Sabah" <?php if($state == "Sabah") echo "SELECTED";?>>Sabah</option>
                                                <option value="Sarawak" <?php if($state == "Sarawak") echo "SELECTED";?>>Sarawak</option>
                                                <option value="Terengganu" <?php if($state == "Terengganu") echo "SELECTED";?>>Terengganu</option>
                                            </select>
                            <?php "</td>";
                            echo     "</tr>";
                            echo     "<tr>";
                            echo         "<td>Faculty</td>";
                            echo         "<td>"?> 
                                        <td>
                                            <input id="faculty" type="radio" name="faculty" value="Fakulti Sains Komputer dan Matematik" <?php if($faculty == "Fakulti Sains Komputer dan Matematik") echo "CHECKED";?>><span style="padding-left: 5px;">Fakulti Sains Komputer dan Matematik<br>
                                            <input id="faculty" type="radio" name="faculty" value="Fakulti Perladangan and Agroteknologi" <?php if($faculty == "Fakulti Perladangan and Agroteknologi") echo "CHECKED";?>><span style="padding-left: 5px;"></span>Fakulti Perladangan and Agroteknologi<br>
                                            <input id="faculty" type="radio" name="faculty" value="Fakulti Kejuteraan Mekanikal" <?php if($faculty == "Fakulti Kejuteraan Mekanikal") echo "CHECKED";?>><span style="padding-left: 5px;"></span>Fakulti Kejuteraan Mekanikal<br>                     
                                        </td>
                            <?php "</td>";
                            echo     "</tr>";                
                            echo "</table>";
                        }
                    } else {
                        echo "Error in fetching data";
                    }
                    CloseCon($conn);
                ?>
                <table>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" value="Submit">
                            <input type="button" value="Back" onclick="history.back()">
                        </td>
                    </tr>
                </table>
            </article>
        </section>
    </body>
    <?php include 'footer.php'; ?>
</html>