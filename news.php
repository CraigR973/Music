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
        <title>News</title>

        <link rel="stylesheet" href="music_style.css">
    </head>
    <body>

        <div id="menu-bar">
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
        </div>

        <div style="background-color: white; float: left; width: 100%; margin-bottom: 0.5cm;">

            <h2>Welcome to the Strathclyde University Concert Band</h2>


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
        <h2>News</h2>
        <div>

            <div style="max-width: 30%; margin-right: 5%;">
                <a class="twitter-timeline" href="https://twitter.com/SUCBOfficial" data-height="600"
                   data-width="400">Tweets by SUCBOfficial</a>
                <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
            <?php
                if ($user !== "") {
                    echo '<iframe src="https://calendar.google.com/calendar/embed?src=strathclydeuniconcertband%40gmail.com&ctz=Europe/London" style="border: 0" width="400" height="600" frameborder="0" scrolling="no"></iframe>';
                }
            ?>
        </div>
    </body>
</html>
