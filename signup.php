<?php
$Name = $_POST['name'];
$Address = $_POST['address'];
$Phone = $_POST['phone'];
$Gender = $_POST['gender'];
$Nic = $_POST['nic'];
$Username = $_POST['username'];
$Password = $_POST['password'];


$con = new mysqli('localhost','root','1234','erail_ticketing');

$sql = "insert into passenger values(null, '$Name', '$Address','$Phone','$Gender','$Nic','$Username','$Password')";

$success = $con->query($sql);
$id= $con->insert_id;

if($success){
    header("location:hello.php?id=$id");
}
else {
    echo "Something wrong";
}

$con->close();


?>