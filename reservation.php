<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <title>Train Reservation Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      min-height: 100vh;
    }

    .reservation-container {
      background-color: #fff;
      padding: 20px;
      border-radius: 0px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      display: flex;
      justify-content: center;
      height: 625px;
      position: relative;
      margin:auto;
      top:20%;
      width: 35%;
      height: 40%;
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
      height: 20%;
        
      
    }

    

    label {
      display: block;
      margin-bottom: 8px;
    }

    input, select {
      width: 100%;
      padding: 8px;
      margin-bottom: 16px;
      box-sizing: border-box;
    }

    button {
      background-color: #3498db;
      color: #fff;
      padding: 10px 15px;
      border: none;
      border-radius: 3px;
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
<div class="rname"><h2>Train Reservation Form</h2></div>
  <div class="reservation-container">
  
    <form action="ticketdata.php" method="post" id="form">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>

      <label for="telephone">Telephone:</label>
      <input type="tel" id="telephone" name="telephone" pattern="[0-9]{10}" required>
      <small>Format: 1234567890</small> 

      <label for="nic">NIC (National Identification Card):</label>
      <input type="text" id="nic" name="nic" required>

      <label for="date">Date:</label>
      <input type="date" id="date" name="date" required>

      <label for="train">Train:</label>
      <select id="train" name="train" required>
        <option value="--select--">--select--</option>
        <?php 
                        $con = new mysqli('localhost','root','1234','erail_ticketing');

                        $train = "select t_name from train where id=8 or id=18";
                        $result =  $con->query($train);
                    
                        while ($row = mysqli_fetch_assoc($result)){

                        echo '<option value='.$row['t_name'].'>'.$row['t_name']."</option>";
                        }  
                    ?>
      </select>

      <label for="start_station">Start Station:</label>
      <select id="start_station" name="start_station" required>
        <option value="--select--">--select--</option>
        <?php 
                        $con = new mysqli('localhost','root','1234','erail_ticketing');

                        $station = "select s_name from station where id=8 or id=7";
                        $result =  $con->query($station);
                    
                        while ($row = mysqli_fetch_assoc($result)){

                        echo '<option value='.$row['s_name'].'>'.$row['s_name']."</option>";
                        }  
                    ?>
      </select>

      <label for="end_station">End Station:</label>
      <select id="end_station" name="end_station" required>
        <option value="--select--">--select--</option>
        <?php 
                        $con = new mysqli('localhost','root','1234','erail_ticketing');

                        $station = "select s_name from station where id=7 or id=8";
                        $result =  $con->query($station);
                    
                        while ($row = mysqli_fetch_assoc($result)){

                        echo '<option value='.$row['s_name'].'>'.$row['s_name']."</option>";
                        }  
                    ?>
      </select>

      <label for="class">Class:</label>
      <select id="class" name="class" required>
      <option value="--select--">--select--</option>
        <?php 
                        $con = new mysqli('localhost','root','1234','erail_ticketing');

                        $type = "select type from class";
                        $result =  $con->query($type);
                    
                        while ($row = mysqli_fetch_assoc($result)){

                        echo '<option value='.$row['type'].'>'.$row['type']."</option>";
                        }  
                    ?>
      </select>

      <label for="num_tickets">Number of Tickets:</label>
      <input type="number" id="num_tickets" name="num_tickets" min="1" required>

      <label for="return">Return:</label>
      <select id="return" name="return" required>
        <option value="yes">Yes</option>
        <option value="no">No</option>
      </select>

                      
      </br>
      </br>

      <button type="submit">Confrim & Pay</button>
    </form>
  </div>
  </div>

  <div class="belowbar">  
    <a href="https://facebook.com/SriLankaRail" ><img src="image/4494464.png" height="25%" width="25%"></a>
    <a href="https://twitter.com/RailwayLanka" ><img src="image/free-twitter-icon-117-thumb.png" height="25%" width="25%"></a>
    <a href="https://www.linkedin.com/company/sri-lanka-railways" ><img src="image/linkedin_black_logo_icon_147114.png" height="25%" width="25%"></a>
</div> 

</body>
</html>
