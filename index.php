<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Select a person</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>
            <h1>Select A Person</h1>
            
            <form action ="show.php" method ="get">
            <?php
            
            //connect to the database
            $servername = "devweb2016.cis.strath.ac.uk";
            $username = "ehb14190";
            $password = "eengooLee1Ei";
            $database = "ehb14190";
            $conn = new mysqli($servername, $username, $password, $database);
            
            if($conn->connect_error) {
                die("Connection failed:".$conn->connect_error );//FIXME remove after debugging - secirity risk
            }
            //issue the query 
            $sql = "SELECT * FROM `Number of wins`";
            $result = $conn->query($sql);
            
            //handle results
            if(!$result){
                die("Query failed".$conn->error);
            }
            echo "<select name=\"id\" >";
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "<option value=\"".$row["id"]."\">".$row["name"]."".$row["wins"]."</option>\n";
            }
            }
            echo "</select>";
            
            //close connection
            $conn->close();
            ?>
                <input type ="submit">
            </form>
        </div>
    </body>
</html>