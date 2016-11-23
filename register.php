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
                var x = document.forms["registerForm"]["name"];
                var y = document.forms["registerForm"]["pw"];
                var z = document.forms["registerForm"]["ConfirmPassword"];
                var i = document.forms["registerForm"]["section"];
                var errs = "";
                x.style.background = "white";
                y.style.background = "white";
                z.style.background = "white";
                if (x.value === null || x.value === "") {
                    errs += "You must provide a name\n";
                    x.style.background = "red";
                }
                if (y.value === null || y.value === "") {
                    errs += "You must provide a password\n";
                    y.style.background = "red";
                }
                if (y.value !== z.value) {
                    errs += "Your passwords do not match\n";
                    z.style.background = "red";
                }
                if (i.value === null || i.value === "") {
                    errs += "You must provide your section\n";
                    i.style.background = "red";
                }
                if (errs !== "") {
                    alert(errs);
                }
                return (errs === "");
            }
        </script>
        <title>Insert into database</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="music_style.css"/>
    </head>
    <body>
        <div>
            <h1>Register</h1>
            <form name="registerForm" onsubmit="return validateForm()" method="post">

                <label for="name">Name</label>
                <input id="name" name="name" type="text"/> <br/>
                <label for="password">Password</label>
                <input id="password" name="pw" type="password"/> <br/>
                <label for="confirm">Confirm password</label>
                <input id="confirm" name="ConfirmPassword" type="password"/> <br/>

                <label for="section">Section</label>
                <select id="section" name="section">
                    <option value='' selected disabled>Please select your section.</option>
                    <option value="1">Conductor</option><!-- TODO: Make this require a "master" password-->
                    <option value="2">Flute</option>
                    <option value="3">Oboe</option>
                    <option value="4">Bassoon</option>
                    <option value="5">Clarinet</option>
                    <option value="6">Saxophone</option>
                    <option value="7">Trumpet/Cornet</option>
                    <option value="8">Horn</option>
                    <option value="9">Trombone</option>
                    <option value="10">Euphonium/Baritone</option>
                    <option value="11">Tuba</option>
                    <option value="12">String Bass</option>
                    <option value="13">Percussion</option>
                    <option value="14">Keyboard/Harp</option>
                </select>

                <input type="submit"/>

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
                    die("You need to provide a name along with a password and section");
                }


                //create the sql query and run it
                $sql = "INSERT INTO `Users` (`id`, `name`, `password`, `instrument`) VALUES "
                    . "(NULL, '$name', '$pw', '$section')";


                if ($conn->query($sql) === TRUE) {
                    echo "<p>You've successfully registered</p>";
                    ?>

                    <form action="home.php" method="post">
                        <input type="submit" value="Proceed"/>
                    </form>

                <?php } else {
                    die("Error on insert" . $conn->error);
                }
            ?>
        </div>
    </body>
</html>
