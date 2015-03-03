<?php
if (!isset($username)) {
    $username = '';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="js/login.js"></script>
        <title></title>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <?php require 'header.php' ?>
        <?php require 'mainMenu.php' ?>
        <h2>Login Form</h2>
        <form id="loginForm" action="login.php" method="POST">
            <table border="0">
                <tbody>
                    <tr>
                        <td>Username</td>
                        <td>
                            <input type="text"
                                   name="username"
                                   value="<?php echo $username; ?>" />
                            <span id="usernameError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['username'])) {
                                    echo $errorMessage['username'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>
                            <input type="password" name="password" value="" />
                            <span id="passwordError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['password'])) {
                                    echo $errorMessage['password'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Login" name="login" />
                            <input type="button" value="Register" id="registerBtn" name="registerBtn" />
                            <input type="button" value="Forgot Passward" id="forgotBtn" name="forgotBtn" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
        <?php require 'footer.php'; ?>
    </body>
</html>

