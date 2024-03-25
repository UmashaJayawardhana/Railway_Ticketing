<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            height: 100vh;
        }

        .form_container {
            background-color: #fff;
            padding: 20px;
            border-radius: 0px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 650px;
      position: relative;
      margin:auto;
      top:1%;
      width: 35%;
      height: 80%;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        select, input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #3498db;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }


        .bg-image{
            top: -0px;
            height: 120%;
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
    margin-top: 78px;
  
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
    .rname{
      background-color: #fff;
      position: relative;
      padding: 20px;
      border-radius: 0px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      display: flex;
      justify-content: center;
      margin:auto;
      top:1%;
      width: 35%;
      height: 4%;
        
      
    }


    </style>
</head>
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
    <div class="rname"><h2>Your Ticket Details</h2></div>

    


<?php
$reservationID = $_GET['id'];


    // Create connection
    $con = new mysqli('localhost','root','1234','erail_ticketing');

    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    // SQL query to retrieve data from your_table
    $sql1 = "SELECT * FROM ticket_resevation where id=$reservationID";
    $result1 = $con->query($sql1);
    if($result1){
        $row1 = mysqli_fetch_array($result1);
    }
    else{
        echo "Error executing query: " . $con->error;
    }
    
    //get name
    $getname = "select * from passenger where id=$row1[r_passengerid]";
    $result2 = $con->query($getname);
    if($result2){
        $row2 = mysqli_fetch_array($result2);
    }
    else{
        echo "Error executing query: " . $con->error;
    }
     //get start station
                    $S_stationId = "select * from start_station where id =$row1[r_start_station]";
                    $result3 = $con->query($S_stationId);
                    $result4 = mysqli_fetch_array($result3);
                    $S_station_name = "select * from station where id=$result4[stationID]";
                    $result5 = $con->query($S_station_name);
                    $S_name = mysqli_fetch_assoc($result5);

    //get end station
    $E_stationId = "select station_id from end_station where id =$row1[r_end_station]";
    $result6 = $con->query($E_stationId);
    $result7 = mysqli_fetch_array($result6);
    $E_station_name = "select * from station where id=$result7[station_id]";
    $result8 = $con->query($E_station_name);
    $E_name = mysqli_fetch_assoc($result8);


    //get class
    $class = "select * from ticket where id=$row1[r_ticketid]";
    $result9 = $con->query($class);
    $row3 = mysqli_fetch_array($result9);
    $row4 = "select * from class where id=$row3[c_id]";
    $result10 = $con->query($row4);
    $row6 = mysqli_fetch_array($result10);

    ?>
    <div class="form_container">
<form id="form" action="qr.php?" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value=<?= $row2['p_name'] ?>>

        <label for="tele">TelePhone:</label>
        <input type="text" id="tele" name="tele" value=<?= $row2['p_telephone'] ?>>

        <label for="nic">NIC:</label>
        <input type="text" id="nic" name="nic" value=<?= $row2['p_nic'] ?>>

        <label for="date">Reservation Date:</label>
        <input type="text" id="date" name="date" value=<?= $row1['r_date'] ?>>

        <label for="return">Return:</label>
        <input type="text" id="return" name="return" value=<?= $row1['r_return'] ?>>

        <label for="tickets">No of Tickets:</label>
        <input type="text" id="tickets" name="tickets" value=<?= $row1['no_ticket'] ?>>

        <label for="Class">Class:</label>
        <input type="text" id="class" name="class" value=<?= $row6['type'] ?>>

        <label for="price">Price Rs :</label>
        <input type="text" id="price" name="price" value=<?= $row3['price'] ?>>

        <label for="s_station">Start Station</label>
        <input type="text" id="s_station" name="s_station" value=<?= $S_name['s_name'] ?>>

        <label for="E_station">End Station</label>
        <input type="text" id="E_station" name="E_station" value=<?= $E_name['s_name'] ?>>

        <button type="submit">Generate QR Code</button>


</form>
</div>
        

  <div class="belowbar">  
    <a href="https://facebook.com/SriLankaRail" ><img src="image/4494464.png" height="25%" width="25%"></a>
    <a href="https://twitter.com/RailwayLanka" ><img src="image/free-twitter-icon-117-thumb.png" height="25%" width="25%"></a>
    <a href="https://www.linkedin.com/company/sri-lanka-railways" ><img src="image/linkedin_black_logo_icon_147114.png" height="25%" width="25%"></a>
</div> 
</div>

</body>


</html>
