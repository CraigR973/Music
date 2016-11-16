<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Insert into database</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>
            <h1>Register</h1>
            <form method="post">
                <p>
                    Name <input type="text" name="name"/> <br/>
                    Password <input type="password" name="password"/> <br/>
                    <input type="submit"/>
                </p>
            </form>
            
            <?php
            //connect to the database now that we know we have enough to submit

            $servername = "devweb2016.cis.strath.ac.uk";
            $username = "cs312l";
            $password = "eiDo8re9Ex1O";
            $database = "cs312l";
            $conn = new mysqli($servername, $username, $password, $database);

            if ($conn->connect_error) {
                die("Connection failed:" . $conn->connect_error); //FIXME remove after debugging - secirity risk
            }

            //setup variables from $_POST
            $name = isset($_POST["name"]) ? $conn->real_escape_string($_POST["name"]) : "";
            $password = isset($_POST["password"]) ? $conn->real_escape_string($_POST["password"]) : "";

            //check form is valid
            if (empty($name)) {
                die("You need to provide a name");
            }



            //create the sql query and run it
            $sql = "INSERT INTO `Users` (`id`, `name`, `password`) VALUES "
                    . "(NULL, '$name', '$password')";

            
            if ($conn->query($sql) === TRUE) {
                echo "<p>You've successfully registered</p>";
            } else {
                die("Error on insert" . $conn->error);
            }
            ?>
        </div>
    </body>
</html>
