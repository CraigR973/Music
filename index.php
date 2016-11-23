<!DOCTYPE html>
<html>
<head>
    <title>Strathclyde Music</title>
    
    <!-- checking this works at home -->
<style>
    body{
        background-color: #fafafa;
    }
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #C12828;
    text-color: white;
    font-size: 24px;
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
}

li a:hover {
    background-color: #111;
}

h2{
    text-align: left;
    font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
    font-weight: 300;
    font-size: 30px;
    margin-bottom: 0.01cm;
    
}

p{
    text-align: center;
    font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
    font-weight: 300;
    font-size: 20px;
    color: gray;
    margin-bottom: 40px;
    
   
}

form{
    text-align: right;
    font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
    font-weight: 300;
    font-size: 20px;
    color: gray;
}



</style>
</head>
<body>

<ul>
  <li><a class="active" href="index.php">Home</a></li>
  <li><a href="news.php">News</a></li>
  <li><a href="contact.php">Contact</a></li>
  <li><a href="about.php">About</a></li>
  <li><a target="_blank" title="SUCB Facebook Page" href="https://en-gb.facebook.com/StrathclydeUniversityConcertBand/"><img alt="SUCB Facebook Page" src="https://c866088.ssl.cf3.rackcdn.com/assets/facebook30x30.png" border=0></a></li>
</ul>
    
    <div style="background-color: white; float: left; width: 100%;">
        
        <h2>Welcome to the Strathclyde University Concert Band</h2>
        
        
        
    
    
        <p id="date" style="float: left;"></p>
    
    <script>
        var d = new Date();
        var days = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
        var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        document.getElementById("date").innerHTML = days[d.getDay()] + ", " + d.getDate() + " " + months[d.getMonth()];
        </script>
      
        <div style="float: right; padding-right: 30%;">
        <span style="float: right; align-items: flex-end; padding-bottom: 10px; width: 100%;">
       <a href="login.php">Login</a>
       <a href="register.php">Register</a>
            
    </span>
        </div>
        
    </div>
    
    <div>
        <p><img src="15058610_1379894388689484_245722395_n.jpg" alt="Picture" style="width:35%; float: left; margin-left: 20%"></p>
    </div>
    
        <span style="float: right; width: 20%; margin-right: 20%; height: 20%;">        
 <a class="twitter-timeline" href="https://twitter.com/SUCBOfficial" data-height="675">Tweets by SUCBOfficial</a> 
 <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
        </span>

</body>
</html>

