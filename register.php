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
                var x =document.forms["registerForm"]["name"];
                var y =document.forms["registerForm"]["pw"];
                var z =document.forms["registerForm"]["ConfirmPassword"];
                var errs ="";
                x.style.background = "white"; y.style.background = "white"; z.style.background = "white";
                if(x.value===null || x.value==="") {
                    errs+="You must proivde a name\n"; x.style.background = "red";
                }
                if(y.value===null || y.value==="") {
                    errs+="You must proivde a password\n"; y.style.background = "red";
                }
                if(y.value !== z.value) {
                    errs+="Your passwords do not macth\n"; z.style.background = "red";
                }
                if(errs !== "") {
                    alert(errs);
                }
                return (errs==="");
            }
            </script>
        <title>Insert into database</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>
            <h1>Register</h1>
            <form name="registerForm"  onsubmit="return validateForm()" method="post">
                
                    Name <input type="text" name="name"/> <br/>
                    Password <input type="password" name="pw"/> <br/>
                    Confirm password <input type="password" name="ConfirmPassword"/> <br/>
                    <input type="submit"/>
                
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
            $pw = isset($_POST["pw"]) ? $conn->real_escape_string($_POST["pw"]) : "";

            //check form is valid
            if (empty($name)) {
                die("You need to provide a name");
            }



            //create the sql query and run it
            $sql = "INSERT INTO `Users` (`id`, `name`, `password`) VALUES "
                    . "(NULL, '$name', '$pw')";

            
            if ($conn->query($sql) === TRUE) {
                echo "<p>You've successfully registered</p>";
                ?>
                
                <form action="home2.php" method="post">
                        <input type="submit" value="Proceed"/>
                    </form>
                        
      <?php      } else {
                die("Error on insert" . $conn->error);
            }
            ?>
        </div>
    </body>
</html>