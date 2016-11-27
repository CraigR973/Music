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
    <head>
        <title>Music</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="music_style.css" />
    </head>
    <body>
        <ul>
            <li><a class="active" href="index.php" style="font-size: 40px;">SUCB</a></li>
            <li><a style="padding-top: 23px;" href="news.php">News</a></li>
            <li><a style="padding-top: 23px;" href="contact.php">Contact</a></li>
            <li><a style="padding-top: 23px;" href="about.php">About</a></li>
            <?php
                if ($user !== "") { // Buttons that only show when logged in
                    echo /** @lang HTML */
                    '<li><a style="padding-top: 23px;" href="music.php">Music</a></li>';
                }
            ?>


            <li><a style="padding-top: 23px;">
                    <form method="post" href="https://www.google.co.uk/" id="searchsite">
                        <input type="text" name="search" title="search" style="margin-left: 100px;">
                        <input type="submit" name="submit" value="Search" href="https://www.google.co.uk/">
                    </form>
                    <!-- <button onclick="searchFunction()">Search</button> -->
                </a></li>

        </ul>

        <div style="background-color: white; float: left; width: 100%; margin-bottom: 0.5cm;">

            <h2>Download the music we are playing</h2>


            <p id="date" style="float: left; margin-left: 20%;"></p>

            <script>
                var d = new Date();
                var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
                var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                document.getElementById("date").innerHTML = days[d.getDay()] + ", " + d.getDate() + " " + months[d.getMonth()];
            </script>

            <div style="float: right; padding-right: 20%; padding-top: 30px; font-family: HelveticaNeue-Light, Helvetica Neue Light, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;">
                <span style="float: right; align-items: flex-end; padding-bottom: 10px; width: 100%;">
                    <?php
                        if ($user === "") {
                            echo /** @lang HTML */
                            "<a style='color: blue; text-decoration: none;' href='login.php'>Sign in</a> with your SUCB ID or
                             <a style='color: blue; text-decoration: none;' href='register.php'>Register</a> to see band events";
                        } else {
                            echo /** @lang HTML */
                            "Welcome back, $user";
                        }
                    ?>

                </span>
            </div>

        </div>

        <div>

            <?php

                //connect to the database

                $server_name = "devweb2016.cis.strath.ac.uk";
                $db_username = "cs312l";
                $db_password = "eiDo8re9Ex1O";
                $db_name = "cs312l";
                $conn = new mysqli($server_name, $db_username, $db_password, $db_name);

                if ($conn->connect_error) {
                    die("Connection failed:" . $conn->connect_error); //FIXME remove after debugging - security risk
                }

                $inst = isset($_SESSION["session_instrument_id"]) ? $_SESSION["session_instrument_id"] : 0; //Change this out to get the users instrument id with sessions

                $sql = "SELECT `name`, `file_location` FROM `Parts` WHERE `instument_id` = '$inst'";
                $result = $conn->query($sql);

                if ($result->num_rows >= 1) {
                    for ($i = 0; $i < mysqli_num_rows($result); $i++) {
                        $row = mysqli_fetch_row($result);
                        $partName = array_values($row)[0];
                        $path = array_values($row)[1];
                        echo /** @lang HTML */
                        '<a href="' . $path . '">' . $partName . '</a>';
                    }
                } else {

                    echo $inst <= 0 ?
                        '<p>There are no pieces available for your instrument yet.</p>' :
                        '<p>You need to be logged in to see this page</p>';
                }
            ?>
        </div>
    </body>
</html>
