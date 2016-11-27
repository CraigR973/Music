<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <script>
            function validateForm() {
                var usernameInput = document.forms["loginForm"]["username"];
                var passwordInput = document.forms["loginForm"]["password"];
                var errs = "";
                usernameInput.style.background = "white";
                passwordInput.style.background = "white";
                z.style.background = "white";
                if (usernameInput.value === null || usernameInput.value === "") {
                    errs += "You must provide a username\n";
                    usernameInput.style.background = "red";
                }
                if (passwordInput.value === null || passwordInput.value === "") {
                    errs += "You must provide a password\n";
                    passwordInput.style.background = "red";
                }
                if (errs !== "") {
                    alert(errs);
                }
                return (errs === "");
            }
        </script>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="music_style.css"/>
    </head>
    <body>
        <div>
            <h1>Sign in</h1>
            <form name="loginForm" onsubmit="return validateForm()" method="post" style="padding-right: 100%">

                <label for="username">Username</label>
                <input id="username" name="username" type="text"/> <br/>
                <label for="password">Password</label>
                <input id="password" name="password" type="password"/> <br/>
                <input type="submit">
            </form>

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
                    die("You need to provide your username");
                }


                //create the sql query and run it
                $sql = "SELECT * FROM `Users` WHERE `username` = '$username' AND `password` = '$password'";
                $result = $conn->query($sql);

                if ($result->num_rows == 1) {
                    echo "<p>You've successfully logged in</p>";

                    ?>

                    <form action="index.php" method="post">
                        <?php
                            echo 'Username: ' . $username;
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
