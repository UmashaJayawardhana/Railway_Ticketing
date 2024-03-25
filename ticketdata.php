<?php
$Name = $_POST['name'];
$Telephone = $_POST['telephone'];
$Nic = $_POST['nic'];
$Train = $_POST['train'];
$Start_station = $_POST['start_station'];
$End_station = $_POST['end_station'];
$Class = $_POST['class'];
$Num_tickets = $_POST['num_tickets'];
$Return = $_POST['return'];
$Date = $_POST['date'];

$con = new mysqli('localhost','root','1234','erail_ticketing');

$sql = "insert into passenger values(null, '$Name', null,'$Telephone',null,'$Nic',null,null)";
$success = $con->query($sql);
var_dump($success);

if ($success === false) {
    echo "Error executing query: " . $con->error;
} else {
    echo "Query executed successfully!";
}

//select the start station
$sql1 = "select * from station where s_name like '%$Start_station%'";
$result1 =  $con->query($sql1);
if($result1){
    $row1 = mysqli_fetch_array($result1);
}    
else {
    echo "Error executing query: " . $con->error;
}        


$sql2 = "select * from start_station where stationID=$row1[id]";
$result2 = $con->query($sql2);

if($result2){
    $row2 = mysqli_fetch_array($result2);
}    
else {
    echo "Error executing query: " . $con->error;
}


//select the end station
$sql3 = "select id from station where s_name like '%$End_station%'";
$result4 =  $con->query($sql3);               
$row4 = mysqli_fetch_array($result4);
$sql4 = "select * from end_station where station_id=$row4[id]";
$result5 = $con->query($sql4);
$row5 = mysqli_fetch_array($result5);



//select the class type
$sql5 = "select * from class where type like '%$Class%'";
$result7 = $con->query($sql5);

if($result7){
    $row7 = mysqli_fetch_array($result7);
}    
else {
    echo "Error executing query: " . $con->error;
}



// Prepare the statement
$stmt = $con->prepare("SELECT * FROM ticket WHERE start_station_id = ? AND end_station_id = ? AND c_id = ?");
$stmt->bind_param("iii", $row2['id'], $row5['id'], $row7['id']);

$stmt->execute();
$result8 = $stmt->get_result();
$row8 = $result8->fetch_assoc();

$stmt->close();



//get passenger id
$getid = "select * from passenger where p_name ='$Name'";
$result = $con->query($getid);
if($result){
    $id = mysqli_fetch_array($result);
}
else{
    echo "Error executing query: " . $con->error;
}


$sql6 = "insert into ticket_resevation values(null, '$Date', '$Return' , '$row2[id]', '$row5[id]' , null, '$row8[id]', '$id[id]', '$Num_tickets')";
$success1 = $con->query($sql6);
$reservationID= $con->insert_id;

if ($success1 === false) {
    echo "Error executing query: " . $con->error;
} else {
    echo "Query executed successfully!";
}



//select the amount
$amount = $row8['price'] * $Num_tickets;
if($Return == "Yes") {
    $total = $amount * 2;

    header("location:payment.php?total=$total&id=$reservationID");
}

else{
    $total = $amount;

    header("location:payment.php?total=$total&id=$reservationID");

}
$con->close();


?>