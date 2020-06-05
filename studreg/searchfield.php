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
                <h2 style="text-align: center">Search Field</h2>
                <form action="searchfieldaction.php" id="form" method="GET">
                    <table>
                        <tr>
                            <td>Search Data From Register</td>
                            <td><input type="text" name="searchfield" maxlength="100" placeholder="search registration" required></td>
                        </tr>
                        <tr>
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
    <?php include 'footer.php'; ?>
</html>