<html>
    <head>
        <title>Train Schedule</title>
     
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            
        }

        table {
            
            width: 80%;
            border-collapse: collapse;
            margin: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 100px;
            margin-left: 20px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: gray;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .container {
            text-align: center;
            height: 665px;
        }
       
        table {
            margin: auto;
        }

        #upbar{
    box-sizing : border-box;
    text-align: center;
    height :55px;
    width: 100%;
    background-color : rgb(119, 123, 127);
    position: relative; 
    margin: auto;
    padding-top: 5px;
    display: flex;
}

#upbar a{
    font-family: Arial, Helvetica, sans-serif;
    text-decoration:solid;
    color: black;
    margin-left: 2%;
    margin-top: 12px;
    text-align: center;
    font-weight: bolder;
    font-size: large;
}

#upbar img{
    margin-left: 42%;
    margin-top: 4px;
    text-align: center;
    transition: transform 0.5s ease-in-out;
}


#upbar img:hover {
    transform: rotate(360deg);
}

.belowbar{
    
    height: 50px;
    width: 100%;
    position: relative;
    background-color: rgb(119, 123, 127);
    margin: auto;
  
    }

    .belowbar img{
        height: 25px;
        width: 20px;
        left:46%;
        position: relative;
        margin: auto;
        margin-top: 10px;
        margin-left: 10px;
    }

    .belowbar img:hover {
        transform: scale(1.2);
        transition: transform 0.3s ease-in-out;
    }

    .bg-image{
            top: -0px;
            height: 80.5%;
            width: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }

        .bg-image::before {
                content: '';
                display: block;
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.3); /* Adjust the opacity as needed */
}


        .img4{ background-image: url("image/bgimage4.jpg");}
    

        #topbar{
    box-sizing : border-box;
    height : 55px;
    width: 100%;
    padding : 10px 15px;
    background-color : #0b0b0b;
    position: relative;
}

#topbar a{
    color : white;
    text-decoration : none;
    font-family : sans-serif;
    display : inline-block;
    margin-top : 3px;
    margin-right: 3px;
    font-size: 16px;
    background-color : #000606;
    padding : 6px 12px;


}



body, html {
    margin: 0;
   }

   #topbar a:hover {
    background-color: #333;
    color: #fff;
    transition: background-color 0.3s, color 0.3s;
}

</style>

<body>

    <div id="upbar">
            <img src="image/Sri_Lanka_Railway_logo.png" height="80%" width="3%">
            <a href ="http://www.railway.gov.lk/">Sri Lanka Railway</a>
        </div>
    
    <div id="topbar">
            <a href ="home.html"  target="_self">Home</a>
            <a href ="about.html"  target="_self">About Us</a>
            <a href ="schedule.php"  target="_self">Schedule</a>
            <a href ="ticket.php"  target="_self">Tickets</a>
            <a href ="reservation.php"  target="_self">Reservation</a>
            <a href ="signup.html"  target="_self" style="float: right">Sign up</a>
            <a style="float: right">|</a>
            <a href ="login.html"  target="_self" style="float: right">Log In</a>
        </div>
<div class="bg-image img4">
    <div class="container">
        <table border="1">
            <thead>
                <tr>
                
        
                    <th>Start Station</th>
                    <th>End Station</th>
                    <th>Class</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>

            <?php

        $con = new mysqli('localhost','root','1234','erail_ticketing');
        $sql = "select * from ticket where start_station_id = 1 and end_station_id = 2 or start_station_id=3 and end_station_id=1";
        $result = $con->query($sql);

        

        while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                
                    $S_stationId = "select stationID from start_station where id =$row[start_station_id]";
                    $result2 = $con->query($S_stationId);
                    $result3 = mysqli_fetch_array($result2);
                    $S_station_name = "select s_name from station where id=$result3[stationID]";
                    $result4 = $con->query($S_station_name);
                    $S_name = mysqli_fetch_assoc($result4);
                    
                    echo "<td>".$S_name['s_name']."</td>";

                    $E_stationId = "select station_id from end_station where id =$row[end_station_id]";
                    $result5 = $con->query($E_stationId);
                    $result6 = mysqli_fetch_array($result5);
                    $E_station_name = "select s_name from station where id=$result6[station_id]";
                    $result7 = $con->query($E_station_name);
                    $E_name = mysqli_fetch_assoc($result7);

                    echo "<td>".$E_name['s_name']."</td>";

                    $classid = "select type from class where id=$row[c_id]";
                    $result8 = $con->query($classid);
                    $class = mysqli_fetch_array($result8);

                    echo "<td>".$class['type']."</td>";

                    echo "<td>".$row['price']."</td>";
                    



            
                echo "</tr>";
        }
?>

            </tbody>
        </table>
    </div>
    </div>
        
        <div class="belowbar">  
            <a href="https://facebook.com/SriLankaRail" ><img src="image/4494464.png" height="25%" width="25%"></a>
            <a href="https://twitter.com/RailwayLanka" ><img src="image/free-twitter-icon-117-thumb.png" height="25%" width="25%"></a>
            <a href="https://www.linkedin.com/company/sri-lanka-railways" ><img src="image/linkedin_black_logo_icon_147114.png" height="25%" width="25%"></a>
        </div> 
        
</body>

</html>