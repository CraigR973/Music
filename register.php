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
            background-image: url("background.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
        }
        
        
    </style>
    <head>
        <script>
            function validateForm() {
                var usernameInput = document.forms["registerForm"]["username"];
                var nameInput = document.forms["registerForm"]["name"];
                var passwordInput = document.forms["registerForm"]["password"];
                var confirmInput = document.forms["registerForm"]["confirm_password"];
                var instrumentInput = document.forms["registerForm"]["section"];
                var inputErrors = "";
                usernameInput.style.background = "white";
                nameInput.style.background = "white";
                passwordInput.style.background = "white";
                confirmInput.style.background = "white";
                instrumentInput.style.background = "white";
                if (usernameInput.value === null || usernameInput.value === "") {
                    inputErrors += "You must provide a username\n";
                    usernameInput.style.background = "PeachPuff";
                }
                if (nameInput.value === null || nameInput.value === "") {
                    inputErrors += "You must provide a name\n";
                    nameInput.style.background = "PeachPuff";
                }
                if (passwordInput.value === null || passwordInput.value === "") {
                    inputErrors += "You must provide a password\n";
                    passwordInput.style.background = "PeachPuff";
                }
                if (passwordInput.value !== confirmInput.value || confirmInput === null) {
                    inputErrors += "Your passwords do not match\n";
                    confirmInput.style.background = "PeachPuff";
                }
                if (confirmInput.value === null || confirmInput.value === "") {
                    inputErrors += "You must confirm your password\n";
                    confirmInput.style.background = "PeachPuff";
                }
                if (instrumentInput.value === null || instrumentInput.value <= 0 || instrumentInput.value >= 15) {
                    inputErrors += "You must provide your section\n";
                    instrumentInput.style.background = "PeachPuff";
                }
                if (inputErrors !== "") {
                    alert(inputErrors);
                }
                return (inputErrors === "");
            }
        </script>
        <title>Register</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="music_style.css"/>
    </head>
    <body>
        <div style="margin-left: 200px; margin-top: 65px; background-color: white; max-width: 400px; padding: 14px 16px; height: 700px;">
            <h1>SUCB</h1>
            <h2 style="margin-left: 10px; margin-bottom: 30px;">Register</h2>


            <form name="registerForm" onsubmit="return validateForm()" method="post" style="padding-right: 100%">

                <label for="username"></label>
                <input id="username" name="username" type="text" placeholder="Username" style="margin-bottom: 30px;"/> <br/>
                <label for="name"></label>
                <input id="name" name="name" type="text" placeholder="Name" style="margin-bottom: 30px;"/> <br/>
                <label for="password"></label>
                <input id="password" name="password" type="password" placeholder="Password" style="margin-bottom: 30px;"/> <br/>
                <label for="confirm"></label>
                <input id="confirm" name="confirm_password" type="password" placeholder="Confirm Password" style="margin-bottom: 30px;"/> <br/>

                <label for="section"><label>
                <select id="section" name="section">
                    <option value=0 selected disabled>Instrument</option>
                    <option value=1>Conductor</option><!-- TODO: Make this require a "master" password-->
                    <option value=2>Flute</option>
                    <option value=3>Oboe</option>
                    <option value=4>Bassoon</option>
                    <option value=5>Clarinet</option>
                    <option value=6>Saxophone</option>
                    <option value=7>Trumpet/Cornet</option>
                    <option value=8>Horn</option>
                    <option value=9>Trombone</option>
                    <option value=10>Euphonium/Baritone</option>
                    <option value=11>Tuba</option>
                    <option value=12>String Bass</option>
                    <option value=13>Percussion</option>
                    <option value=14>Keyboard/Harp</option>
                </select>
                <input type="submit" value="Register" style="width: 375px; align-content: center; background-color: #C12828; color: white; height: 50px;">


            </form>
            
            <p style="width: 200px;">Already registered?</p>
            <a href="login.php" style="color: #C12828; font-family: HelveticaNeue-Light, Helvetica Neue Light, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif; font-weight: 300;">Sign in</a>
            

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
                $name = isset($_POST["name"]) ? $conn->real_escape_string($_POST["name"]) : "";
                $password = isset($_POST["password"]) ? $conn->real_escape_string($_POST["password"]) : "";
                $section = isset($_POST["section"]) ? $_POST["section"] : 0;

                //check form is valid
                if (empty($username) || empty($name) || empty($password) || $section === 0) {
                    die();
                }


                //create the sql query and run it
                $sql = "INSERT INTO `Users` (`id`, `username`, `name`, `password`, `instrument_id`) VALUES (NULL, '$username','$name', '$password', '$section')";


                if ($conn->query($sql) === TRUE) {
                    $_SESSION["session_user"] = $username;
                    echo "<p>You've successfully registered</p>";
                    ?>

                    <form action="index.php" method="post">
                        <input type="submit" value="Proceed"/>
                    </form>

                    <?php

                } else {
                    die("Error on insert" . $conn->error);
                }
            ?>
        </div>
    </body>
</html>
