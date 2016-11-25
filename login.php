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
                var x =document.forms["loginForm"]["name"];
                var y =document.forms["loginForm"]["pw"];
                var errs ="";
                x.style.background = "white"; y.style.background = "white"; z.style.background = "white";
                if(x.value===null || x.value==="") {
                    errs+="You must provide a name\n"; x.style.background = "red";
                }
                if(y.value===null || y.value==="") {
                    errs+="You must provide a password\n"; y.style.background = "red";
                }
                if(errs !== "") {
                    alert(errs);
                }
                return (errs==="");
            }
            </script>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel ="stylesheet" href="music_style.css"/>
    </head>
    <body>
        <div>
            <h1>Sign in</h1>
            <form name="loginForm" onsubmit="return validateForm()" method="post" style="padding-right: 100%">

                <label for="name">Name</label>
                <input id="name" name="name" type="text"/> <br/>
                <label for="password">Password</label>
                <input id="password" name="pw" type="password"/> <br/>
                <input type="submit">
            </form>
            
            <?php
            //connect to the database now that we know we have enough to submit

            $server_name = "devweb2016.cis.strath.ac.uk";
            $username = "cs312l";
            $password = "eiDo8re9Ex1O";
            $database = "cs312l";
            $conn = new mysqli($server_name, $username, $password, $database);

            if ($conn->connect_error) {
                die("Connection failed:" . $conn->connect_error); //FIXME remove after debugging - security risk
            }

            //setup variables from $_POST
            $name = isset($_POST["name"]) ? $conn->real_escape_string($_POST["name"]) : "";
            $pw = isset($_POST["pw"]) ? $conn->real_escape_string($_POST["pw"]) : "";
            
            //check form is valid
            if (empty($name)) {
                die("You need to provide your name");
            }


                //create the sql query and run it
                $sql = "SELECT * FROM `Users` WHERE `name` = '$name' AND `password` = '$pw'";
                $result = $conn->query($sql);

                if ($result->num_rows == 1) {
                    echo "<p>You've successfully logged in</p>";

                    ?>

                    <form action="index.php" method="post">
                        <?php
                            echo 'Username: '.$name;
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
