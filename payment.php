<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Information Form</title>
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
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 670px;
      position: relative;
      margin:auto;
      top:18%;
      width: 35%;
      height: 67%;
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
    
    height: 51px;
    width: 100%;
    position: relative;
    background-color: rgb(119, 123, 127);
    margin: auto;
    margin-top: 179px;
  
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

    .invisible-placeholder {
            color: transparent;
            border: none;
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
    
    <?php
    $reservationID = $_GET['id'];
    ?>

    <div class="bg-image img4">
<div class="form_container">
<form action="bank.php?" method="post" id="cardForm">
<h3>Total Amount: </h3>

<?php
$total = $_GET['total'];

echo "<h2>". $total ."</h2>";

 ?>
    
    <h3> Enter your card details</h3>
    <label for="cardType">Card Type:</label>
    <select id="cardType" name="cardType">
        <option value="--select--">--select--</option>
        <?php 
                        $con = new mysqli('localhost','root','1234','erail_ticketing');

                        $type = "select cardtype from bank";
                        $result =  $con->query($type);
                    
                        while ($row = mysqli_fetch_assoc($result)){

                        echo '<option value='.$row['cardtype'].'>'.$row['cardtype']."</option>";
                        }  
                    ?>
    </select>

    <label for="cardNumber">Card Number:</label>
    <input type="text" id="cardNumber" name="cardNumber" placeholder="Enter card number" required>

    <label for="pinNumber">PIN Number:</label>
    <input type="password" id="pinNumber" name="pinNumber" placeholder="Enter PIN" required>

    <label for="r_id" class="invisible-placeholder"></label>
    <input type="text" id="r_id" name="r_id" class="invisible-placeholder" placeholder="reservation id" value="<?= $reservationID ?> ">
        

    <button type="submit">Pay & Book</button>
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
