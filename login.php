<?php
    session_start();

    if (isset($_SESSION["session_user"])) {
        $user = $_SESSION["session_user"];
    } else {
        $user = "";
    }
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <style>
        body {
            background-size: cover;
            background: url("background.jpg") no-repeat center center;
        }


    </style>
    <head>
        <script>
            function validateForm() {
                var usernameInput = document.forms["loginForm"]["username"];
                var passwordInput = document.forms["loginForm"]["password"];
                var inputErrors = "";
                usernameInput.style.background = "white";
                passwordInput.style.background = "white";
                if (usernameInput.value === null || usernameInput.value === "") {
                    inputErrors += "You must provide a username\n";
                    usernameInput.style.background = "red";
                }
                if (passwordInput.value === null || passwordInput.value === "") {
                    inputErrors += "You must provide a password\n";
                    passwordInput.style.background = "red";
                }
                if (inputErrors !== "") {
                    alert(inputErrors);
                }
                return (inputErrors === "");
            }
        </script>
        <link rel="icon"
              type="image/jpeg"
              href="HeaderLogo.jpg">
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="music_style.css" />
    </head>
    <body>
        <div style="margin-left: 200px; margin-top: 65px; background-color: white; max-width: 400px; padding: 14px 16px; height: 500px;">

            <h1>SUCB</h1>
            <h2 style="margin-left: 10px; margin-bottom: 30px;">Sign in</h2>
            <form name="loginForm" onsubmit="return validateForm()" method="post" style="padding-right: 100%">

                <label for="username"></label>
                <input id="username" name="username" type="text" placeholder="Username" style="margin-bottom: 30px;" />
                <br />
                <label for="password"></label>
                <input id="password" name="password" type="password" placeholder="Password"
                       style="margin-bottom: 30px;" /> <br />
                <input type="submit" value="Sign in"
                       style="width: 375px; align-content: center; background-color: #C12828; color: white; height: 50px;">
            </form>

            <p>Don't have a SUCB account yet?</p>
            <a href="register.php"
               style="color: #C12828; font-family: HelveticaNeue-Light, Helvetica Neue Light, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif; font-weight: 300;">Register now</a>


            <?php
                //connect to the database now that we know we have enough to submit

                $server_name = "devweb2016.cis.strath.ac.uk";
                $db_username = "cs312l";
                $db_password = "eiDo8re9Ex1O";
                $db_name = "cs312l";
                $conn = new mysqli($server_name, $db_username, $db_password, $db_name);

                if ($conn->connect_error) {
                    die("Connection failed:" . $conn->connect_error); //FIXME remove after debugging - security risk
                }

                //setup variables from $_POST
                $username = isset($_POST["username"]) ? $conn->real_escape_string($_POST["username"]) : "";
                $password = isset($_POST["password"]) ? $conn->real_escape_string($_POST["password"]) : "";

                //check form is valid
                if (empty($username)) {
                    die();
                }


                //create the sql query and run it
                $sql = "SELECT * FROM `Users` WHERE `username` = '$username' AND `password` = '$password'";
                $result = $conn->query($sql);

                if ($result->num_rows == 1) {
                    $row = mysqli_fetch_row($result);
                    $_SESSION["session_user"] = array_values($row)[1];
                    $_SESSION["session_name"] = array_values($row)[2];
                    $_SESSION["session_instrument_id"] = array_values($row)[4];
                    echo "<p>You've successfully logged in</p>";

                    ?>

                    <form action="index.php" method="post">
                        <?php
                            echo '<input type="submit" value"proceed"/>';
                        ?>
                    </form>


                <?php } else {
                    die("Details incorrect: Please check your username and password." . $conn->error);
                }
            ?>
        </div>
    </body>
</html>
