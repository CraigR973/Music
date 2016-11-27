<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>About</title>
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

            <h2>Who are the Strathclyde University Concert Band</h2>


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
            <p>Strathclyde University Concert Band is a large band, open to all woodwind and brass, percussion or string bass players of all abilities.</p>

            <p>It prides itself in being completely open - so no auditions! And if you would like to come along but don't have your own instrument, get in touch as the Uni has a number of instruments available for students to borrow: bass clarinet, baritone saxophone, bassoon, tenor horn, French horn, euphonium, tuba and percussion.</p>

            <p>Each year, the band pulls off some great performances at venues such as the Barony Hall and the Winter Gardens of the People's Palace (Glasgow Green).</p>

            <p>However, the other side of the band is its unique, vibrant and colourful post-rehearsal/concert scene, involving a pub, to which everyone is wholeheartedly encouraged to attend!</p>

            <p>We meet on Thursday evenings, 5:30-7:30pm, with post-rehearsal socials afterwards in Bar Home on Albion Street.</p>
        </div>
    </body>
</html>
