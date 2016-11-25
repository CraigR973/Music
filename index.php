<!DOCTYPE html>
<html>
    <head>
        <link rel="icon"
              type="image/jpeg"
              href="HeaderLogo.jpg">
        <title>SUCB</title>


        <style>

            li a {
                margin-top: 10px;
            }


            form {
                text-align: right;
            }

            input[type=text] {
                width: 200px;
                box-sizing: border-box;
                border: 2px solid #ccc;
                border-radius: 4px;
                font-size: 16px;
                background-color: white;
                background-image: url('searchicon.png');
                background-position: 10px 10px;
                background-repeat: no-repeat;
                padding: 6px 10px 6px 20px;
                -webkit-transition: width 0.4s ease-in-out;
                transition: width 0.4s ease-in-out;
                margin-top: 20px;

            }

            input[type=submit] {
                background-color: white;
                padding: 6px 10px 6px 20px;

            }


        </style>
        <link rel="stylesheet" href="music_style.css">
    </head>
    <body>

        <ul>
            <li><a class="active" href="index.php" style="font-size: 40px; background-color: black; ">SUBC</a></li>
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

            <h2>Welcome to the Strathclyde University Concert Band</h2>


            <p id="date" style="float: left; margin-left: 20%;"></p>

            <script>
                var d = new Date();
                var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
                var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                document.getElementById("date").innerHTML = days[d.getDay()] + ", " + d.getDate() + " " + months[d.getMonth()];
            </script>

            <div style="float: right; padding-right: 20%;">
                <span style="float: right; align-items: flex-end; padding-bottom: 10px; width: 100%;">
                    <a style="color: blue; text-decoration: none;" href="login.php">Sign in</a> with your SUBC ID or
                    <a style="color: blue; text-decoration: none;"  href="register.php">Register</a> to see band events
                </span>
            </div>

        </div>

        <div style="margin-left: 15%; margin-right: 15%; display: inline-flex; justify-content: space-between">
            <div style="max-width: 70%">
                <p><img src="sucb_kelvingrove.jpg" alt="Picture" style="max-width: 80%"></p>
                <p style="margin-right: 15%; margin-left: 15%;"> Beloved loves knows most enlightenments. Tobaccos sing from loves like mighty captains. Potus
                    superbe ducunt ad castus brodium. With asparagus drink peanut sauce. Tightly examine a
                    hur'q.</p>
            </div>

            <div style="max-width: 30%; margin-right: 5%;">
                <a class="twitter-timeline" href="https://twitter.com/SUCBOfficial" data-height="600" data-width="400">Tweets by
                    SUCBOfficial</a>
                <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
        </div>
        <footer style="margin-bottom: 40px; margin-left: 20%; ">
            <a style="padding-right: 10px;" target="_blank" title="SUCB Facebook Page"
               href="https://en-gb.facebook.com/StrathclydeUniversityConcertBand/"><img alt="SUCB Facebook Page"
                                                                                        src="https://c866088.ssl.cf3.rackcdn.com/assets/facebook30x30.png"
                                                                                        border=0></a></li>
            <a target="_blank" title="SUCB SoundCloud" href="https://soundcloud.com/sucb-2"><img alt="SUCB SoundCloud"
                                                                                                 src="http://icons.iconarchive.com/icons/danleech/simple/32/soundcloud-icon.png"
                                                                                                 border=0></a>
        </footer>

    </body>
</html>

