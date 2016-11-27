<?php
    session_start();

    if (isset($_SESSION["session_user"])) {
        $user = $_SESSION["session_user"];
    } else {
        $user = "";
    }
?>
<!DOCTYPE html>

<html>
    <head>
        <title>Pieces</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>
            <h1>Upcoming music:</h1>
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

                $inst = 1; //Change this out to get the users instrument id with sessions

                $sql = "SELECT `file_location` FROM `Parts` WHERE `instument_id` = '$inst'";
                $result = $conn->query($sql);

                if ($result->num_rows == 1) {                   
                    $row = mysqli_fetch_row($result); 
                        $path = array_values($row)[0];
                        echo '<a href="'.$path.'">Text</a>';
                }else{
                    echo '<p>There is no piece for your instrument yet</p>';
                }
            ?>

        </div>
    </body>
</html>
