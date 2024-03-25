<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have a database connection already established
    $con = new mysqli('localhost', 'root', '1234', 'erail_ticketing');

    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

$TrainName = $_POST['TrainName'];
$TrainCode = $_POST['TrainCode'];
$EngineType = $_POST['EngineType'];
$Seat = $_POST['Seat'];
$StartD = $_POST['StartD'];
$EndD = $_POST['EndD'];
$STime = $_POST['STime'];
$ETime = $_POST['ETime'];

$TrainName = trim($TrainName);
$TrainCode = trim($TrainCode);
$EngineType = trim($EngineType);
$Seat = trim($Seat);

$crit1 = $TrainName !="";
$crit2 = $TrainCode !="";
$crit3 = $EngineType !="";
$crit4 = $Seat !="";


if(!$crit1) echo "Train Name is required";
if(!$crit2) echo "Train Code is required";
if(!$crit3) echo "Engine type is required";
if(!$crit4) echo "No of seat is required";

if(!$crit1 ||!$crit2 || !$crit3 || !$crit4) exit();  

//$con = new mysqli('localhost','root','1234','erail_ticketing');

//chech the validity of train name
$Snamesql = "select * from train where t_name = '$TrainName'"; 
$result1 = $con->query($Snamesql);
if($result1->num_rows > 0 ) exit("Train Name is already exists");


// check the validity of train code
$Scodesql = "select * from train where t_code = '$TrainCode'";
$result2 = $con->query($Scodesql);
if($result2->num_rows > 0 ) exit("Train Code is already exists");

//get the start station id from station table
$StartDcode = "select id from station where s_name like '%$StartD%'";
$result3 = $con->query($StartDcode);

$result4 = mysqli_fetch_array($result3);
$start_stationID = "select id from start_station where stationID = '$result4[id]'";

$result5 = $con->query($start_stationID);
$result6 = mysqli_fetch_array($result5);

//get the end station id from station table
$EndDcode = "select id from station where s_name like '%$EndD%'";
$result7 = $con->query($EndDcode);

$result8 = mysqli_fetch_array($result7);
$end_stationID = "select id from end_station where station_id = '$result8[id]'";

$result9 = $con->query($end_stationID);
$result10 = mysqli_fetch_array($result9);

//insert data to the database

$sql = "insert into train values (null, '$TrainName', '$EngineType', '$result6[id]', '$result10[id]', '$Seat', '$STime', '$ETime', '$TrainCode')";


$success = $con->query($sql);

if($success){
    header("location:Trainnaddform.php");
}
else {
    echo "Something wrong";
}

$con->close();

}
?>