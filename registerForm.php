<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="js/register.js"></script>
        <?php require "styles.php" ?>
        <title>REGISTER</title>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        
        <Img src="images/jumboTron2.jpg" alt="JumboTron2" class = "img-responsive"/>
        <div class="container">
            
            <form class="signUp col-lg-8 col-lg-push-2 col-md-8 col-md-push-2" id="registerForm" action="register.php" method="POST">
                <table class="table-striped" border="0">
                    <tbody>
                    <thead><h2>Registration Form</h2></thead>
                        <tr>
                            <td>Username</td>
                            <td>
                                <input type="text" name="username" value="<?php
                                    if (isset($_POST) && isset($_POST['username'])) {
                                        echo $_POST['username'];
                                    }
                                ?>" />
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
                            <td>Confirm Password</td>
                            <td>
                                <input type="password" name="password2" value="" />
                                <span id="password2Error" class="error">
                                    <?php
                                    if (isset($errorMessage) && isset($errorMessage['password2'])) {
                                        echo $errorMessage['password2'];
                                    }
                                    ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>
                                <input type="text" name="email" value="<?php
                                    if (isset($_POST) && isset($_POST['email'])) {
                                        echo $_POST['email'];
                                    }
                                ?>" />
                                <span id="emailError" class="error">
                                    <?php
                                    if (isset($errorMessage) && isset($errorMessage['email'])) {
                                        echo $errorMessage['email'];
                                    }
                                    ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" value="Register" name="register" />
                            </td>
                        </tr>
                    </tbody>
                </table>

            </form>
          </div>
        <?php require 'footer.php'; ?>
        <?php require 'scripts.php'; ?>
    </body>
</html>
