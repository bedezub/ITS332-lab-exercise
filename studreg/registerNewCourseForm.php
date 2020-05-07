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
            <h2 style="text-align: center;">Course Registration Form</h2><br>
                <form action="insertCourseAction.php" id="form" method="POST">
                    <table>
                        <tr id="row1">
                            <td>Course Code:</td> 
                            <td><input type="text" name="courseid" maxlength="10" placeholder="CS110" required></td>
                        </tr>
                        <tr id="row1">
                            <td>Course Name:</td> 
                            <td><input type="text" name="coursename" maxlength="50" placeholder="Faculty of Computer Scince" required></td>
                        </tr>
                        <tr id="row2">
                            <td>Course date:</td>
                            <td><input type="date" name="coursedate" required></td>
                        </tr>
                        <tr id="row3">
                            <td colspan="2" align="center">
                                <input type="submit" value="Submit">
                                <input type="reset" value="Reset">
                            </td>
                        </tr>
                    </table>
                </form>
            </article>
        </section>
    </body>
    <? include 'footer.php'; ?>
</html>