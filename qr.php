<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR code</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            height: 100vh;
        }

        .qrcode {
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
      top:10%;
      width: 35%;
      height: 40%;
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
            height: 81%;
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
    margin-top: 0px;
  
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
      top:10%;
      width: 35%;
      height: 5%;
        
      
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
    <div class="rname"><h2>Download Your QR code</h2></div>


<div class="qrcode">
<?php

   require_once 'phpqrcode/qrlib.php';

   $Name = $_POST['name'];
   $Nic = $_POST['nic'];
   $Tele = $_POST['tele'];
   $Date = $_POST['date'];
   $Class = $_POST['class'];
   $No_tikcets = $_POST['tickets'];
   $S_station = $_POST['s_station'];
   $E_station = $_POST['E_station'];
   
   

    $text = "Passenger name : " . $Name .
    " Nic : " . $Nic . " Tele : " . $Tele . 
    " Date : " . $Date . " class : " . $Class .
    " No of tikcets : " . $No_tikcets . 
    " Start station : " . $S_station.
    " End station : " . $E_station; 

    
   $path = 'image/';
   $qrcode = $path.time().".png";

   QRcode::png($text, $qrcode ,4 , 4);
   echo "<img src='".$qrcode."'>";
   ?>

</div>
</div>

<div class="belowbar">  
  <a href="https://facebook.com/SriLankaRail" ><img src="image/4494464.png" height="25%" width="25%"></a>
  <a href="https://twitter.com/RailwayLanka" ><img src="image/free-twitter-icon-117-thumb.png" height="25%" width="25%"></a>
  <a href="https://www.linkedin.com/company/sri-lanka-railways" ><img src="image/linkedin_black_logo_icon_147114.png" height="25%" width="25%"></a>
</div> 


</body>


</html>
