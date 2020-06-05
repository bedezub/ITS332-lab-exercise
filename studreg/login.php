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
                <h2 style="text-align:center">
                    Login
                </h2>
                <form action="loginaction.php" id="form" method="POST">
                    <table>
                        <tr>
                            <td>
                                Staff ID
                            </td>
                            <td>
                                <input type="text" name="staffid" maxlength="10" placeholder="Staff ID" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Password
                            </td>
                            <td>
                                <input type="password" name="password" maxlength="10" placeholder="Password" required>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <input type="submit" value="Login">
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