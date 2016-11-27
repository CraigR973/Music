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
        <title>Pieces</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>
            <h1>Upcoming pieces for your instrument:</h1>

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

                $inst = 1; //Change this out to get the users instrument id

                $sql = "SELECT `file_location` FROM `Parts` WHERE `instument_id` = '$inst'";
                $result = $conn->query($sql);

                if ($result->num_rows >= 1) {
                    echo '<p>' . $result . '</p>';
                } else {
                    echo '<p>There are no pieces for your instrument yet</p>';
                }
            ?>

        </div>
    </body>
</html>
