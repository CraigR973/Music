<!DOCTYPE html>
<html>
    <head>
        <link rel="icon"
              type="image/jpeg"
              href="HeaderLogo.jpg">
        <title>SUCB</title>


        <style>
            body {
                background-color: #fafafa;
            }

            ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
                background-color: #C12828;
                color: white;
                font-size: 24px;
                padding-left: 20%;

            }

            li {
                float: left;
            }

            li a {
                display: block;
                color: white;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
                margin-top: 10px;

            }

            li a:hover {
                text-decoration: underline;

            }

            h2 {
                text-align: left;
                font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
                font-weight: 300;
                font-size: 30px;
                margin-bottom: 0.01cm;
                margin-left: 20%;

            }

            p {
                text-align: center;
                font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
                font-weight: 300;
                font-size: 20px;
                color: gray;
                margin-bottom: 40px;

            }

            form {
                text-align: right;
                font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
                font-weight: 300;
                font-size: 20px;
                color: gray;
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
                    <a href="login.php">Login</a>
                    <a href="register.php">Register</a>
                </span>
            </div>

        </div>

        <div style="margin-left: 10%; margin-right: 10%; display: inline-flex; justify-content: space-between">
            <div style="max-width: 70%">
                <p><img src="sucb_kelvingrove.jpg" alt="Picture" style="max-width: 70%"></p>
                <p>Beloved loves knows most enlightenments. Tobaccos sing from loves like mighty captains. Potus
                    superbe ducunt ad castus brodium. With asparagus drink peanut sauce. Tightly examine a
                    hur'q.</p>
            </div>

            <div style="max-width: 30%">
                <a class="twitter-timeline" href="https://twitter.com/SUCBOfficial" data-height="675">Tweets by
                    SUCBOfficial</a>
                <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
        </div>
        <footer style="margin-top: 800px; margin-left: 20%; ">
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

