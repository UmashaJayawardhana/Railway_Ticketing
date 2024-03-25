<?php
$con = new mysqli('localhost','root','1234','erail_ticketing');
$id = $_GET['id'];

$sql = "select * from passenger where id=$id";
$result = $con->query($sql);

$result1 = mysqli_fetch_array($result);

?>

<html>
    <head>
        <title>E-Ticketing</title>
    </head>
    <body>
        


        <style>

@media screen and (max-width: 600px) {
    /* Add responsive styles here */
}
            body, html {
             height: 100%;
             margin: auto;
             width: 100%;
            }

            .bg-image{
            top: -22px;
            height: 80%;
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

            #topbar a:hover{
                color : #ccc;
            }

            #topbar a:hover {
                background-color: #333;
                color: #fff;
                transition: background-color 0.3s, color 0.3s;
            }
            

            #welcomeMsg{
                position: relative;
                background-color : black;
                opacity: 0.7;
                text-align: center;
                margin:auto;
                top:20%;
                width: 35%;
                height: 40%;
                border-radius: 25px;
                      

            }
            #welcomeMsg {
                transition: opacity 0.5s ease-in-out;
            }

            #welcomeMsg:hover {
                opacity: 1;
            }

            #welcomeMsg h1,h2{
                color: white;
                text-align: center;
                font-family: Arial, Helvetica, sans-serif;
                padding-top: 15px;
                padding-bottom: 10px;

            }

            #welcomeMsg .a1:link, .a1:visited {
                background-color: gray;
                opacity: 0.7;
                color: white;
                border: 2px solid black;
                padding: 10px 20px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                position: relative;
                border-radius: 25px;
                font-family: Arial, Helvetica, sans-serif;
                margin: auto;
                
                
    }

            .a1 {
                transition: background-color 0.3s, color 0.3s;
            }

            .a1:hover {
                background-color: #fff;
                color: #000;
            }

            .a1:hover, .a1:active {
                background-color: white;
                color: black;
                font-family: Arial, Helvetica, sans-serif;
            }

            

            .belowbar{
            top: -22px;
            height: 55px;
            width: 100%;
            position: relative;
            background-color: rgb(119, 123, 127);
            margin: auto;
            text-align: center;
          
            }

            .belowbar img{
                height: 25px;
                width: 20px;
                position: relative;
                margin: auto;
                margin-top: 15px;
                margin-left: 10px;
            }

            .belowbar img:hover {
                transform: scale(1.2);
                transition: transform 0.3s ease-in-out;
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

            

           

        </style>
        <div id="upbar">
            <img src="image/Sri_Lanka_Railway_logo.png" height="80%" width="3%">
            <a href ="http://www.railway.gov.lk/">Sri Lanka Railway</a>
        </div>
        <div id="topbar">
            <a href ="home.html"  target="_self">Home</a>
            <a href ="about.html"  target="_self">About Us</a>
            <a href ="schedule.php"  target="_self">Schedule</a>
            <a href ="ticket.php"  target="_self">Tickets</a>
            <a href ="hello_reservation.php"  target="_self">Reservation</a>
            <a href ="home.html"  target="_self" style="float: right">Log out</a>
            
            
            
        </div>

        

        <div class="bg-image img4">

        <div id="welcomeMsg">

        <?php
$con = new mysqli('localhost','root','1234','erail_ticketing');
$id = $_GET['id'];

$sql = "select * from passenger where id=$id";
$result = $con->query($sql);

$result1 = mysqli_fetch_array($result);

echo "<h1>Hello, " .$result1['p_name']. " !</h1>";

?>
        
            
            <h2>Welcome to Sri Lanka Railways</h2>
            <a class="a1" href="hello_reservation.php" target="_self">Book Your Seat</a>
        </div>
        </div>

        <div class="belowbar">  
            <a href="https://facebook.com/SriLankaRail" ><img src="image/4494464.png" height="25%" width="25%"></a>
            <a href="https://twitter.com/RailwayLanka" ><img src="image/free-twitter-icon-117-thumb.png" height="25%" width="25%"></a>
            <a href="https://www.linkedin.com/company/sri-lanka-railways" ><img src="image/linkedin_black_logo_icon_147114.png" height="25%" width="25%" ></a>
        </div>         

        
    </body>
</html>