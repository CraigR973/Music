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
        <link rel="icon"
              type="image/jpeg"
              href="HeaderLogo.jpg">
        <title>Contact</title>

        <link rel="stylesheet" href="music_style.css">
    </head>
    <body>

        <ul>
            <li><a class="active" href="index.php" style="font-size: 40px;">SUCB</a></li>
            <li><a style="padding-top: 23px;" href="news.php">News</a></li>
            <li><a style="padding-top: 23px;" href="contact.php">Contact</a></li>
            <li><a style="padding-top: 23px;" href="about.php">About</a></li>
            
            
            
            <li><a style="padding-top: 23px;">
                <form method="post" action="https://www.google.co.uk/" id="searchsite">
                    <input type="text" name="search" title="search" style="margin-left: 100px;">
                    <input type="submit" name="submit" value="Search">
                </form>
                <!-- <button onclick="searchFunction()">Search</button> -->
                </a></li>

        </ul>

        <div style="background-color: white; float: left; width: 100%; margin-bottom: 0.5cm;">

            <h2>How to get in contact with the Strathclyde University Concert Band</h2>


            
            <div style="float: right; padding-right: 20%; padding-top: 30px; font-family: HelveticaNeue-Light, Helvetica Neue Light, Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif;">
                <span style="float: right; align-items: flex-end; padding-bottom: 10px; width: 100%;">
                    <?php
                        if ($user === "") {
                            echo /** @lang HTML */
                            "<a style='color: blue; text-decoration: none;' href='login.php'>Sign in</a> with your SUCB ID or
                             <a style='color: blue; text-decoration: none;' href='register.php'>Register</a> to see band events";
                        } else {
                            
                        }
                    ?>

                </span>
            </div>

        </div>


        <div>
            <p>Committee email: committee@sucb.org.uk</p>
            <p>President Email: president@sucb.org.uk</p>

        </div>
    </body>
</html>
