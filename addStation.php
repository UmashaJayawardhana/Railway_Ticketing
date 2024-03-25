<?php
$StationName = $_POST['StationName'];
$StationCode = $_POST['StationCode'];

$StationName = trim($StationName);
$StationCode = trim($StationCode);

$crit1 = $StationName !="";
$crit2 = $StationCode !="";

if(!$crit1) echo "Station Name is required";
if(!$crit2) echo "Station Code is required";

if(!$crit1 ||!$crit2) exit();  

$con = new mysqli('localhost','root','1234','erail_ticketing');

$Snamesql = "select * from station where s_name = '$StationName'";
$result1 = $con->query($Snamesql);
if($result1->num_rows > 0 ) exit("Station Name is already exists");

$Scodesql = "select * from station where s_code = '$StationCode'";
$result2 = $con->query($Scodesql);
if($result2->num_rows > 0 ) exit("Station Code is already exists");


$sql = "insert into station values(null, '$StationName', '$StationCode')";

$success = $con->query($sql);

if($success){
    header("location:addStation.html");
}
else {
    echo "Something wrong";
}

$con->close();


?>