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
        <link rel="stylesheet" href="music_style.css"/>
    </head>
    <body>
        <ul>
            <li><a class="active" href="index.php" style="font-size: 40px; background-color: black; ">SUCB</a></li>
            <li><a style="padding-top: 23px;" href="news.php">News</a></li>
            <li><a style="padding-top: 23px;" href="contact.php">Contact</a></li>
            <li><a style="padding-top: 23px;" href="about.php">About</a></li>
            <li><a style="padding-top: 23px;" href="music.php">Music</a></li>
            <li>
                <form method="post" action="search.php?go" id="searchsite">
                    <input type="text" name="search" title="search" style="margin-left: 480px;">
                    <input type="submit" name="submit" value="Search">
                </form>
                <!-- <button onclick="searchFunction()">Search</button> -->
            </li>

        </ul>

        <!--  <p id="demo2"></p>

          <script>
              function searchFunction() {
                  var x = document.getElementById("mySearch").innerHTML;
                  document.getElementById("demo2").innerHTML = x;
              }
              </script> -->

        <div style="background-color: white; float: left; width: 100%; margin-bottom: 0.5cm;">

            <h2>Download the music we are playing</h2>


            <p id="date" style="float: left; margin-left: 20%;"></p>

            <script>
                var d = new Date();
                var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
                var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                document.getElementById("date").innerHTML = days[d.getDay()] + ", " + d.getDate() + " " + months[d.getMonth()];
            </script>

            <div style="float: right; padding-right: 20%;">
                <span style="float: right; align-items: flex-end; padding-bottom: 10px; width: 100%;">
                    <a style="color: blue; text-decoration: none;" href="login.php">Sign in</a> with your SUCB ID or
                    <a style="color: blue; text-decoration: none;" href="register.php">Register</a> to see band events
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

        $inst = 1; //Change this out to get the users instrument id with sessions
                
        $sql = "SELECT `file_location` FROM `Parts` WHERE `instument_id` = '$inst'";
        $result = $conn->query($sql);
        
        if ($result->num_rows >= 1) {        
            while ($row = mysqli_fetch_assoc($result)) {
                print_r ($row);
            }
        }else{
            echo '<p>There are no pieces for your instrument yet</p>';
        }
        ?>
           
            
        </div>
    </body>
</html>