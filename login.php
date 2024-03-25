<?php

$Username = $_POST['username'];
$Password = $_POST['password'];

$con = new mysqli('localhost','root','1234','erail_ticketing');

$sql1 = "select * from passenger where p_username = '$Username'";
$result1 = $con->query($sql1);
if($result1->num_rows < 1 ) exit("Enter the valid Username");

$sql2 = "select * from passenger where p_password = '$Password'";
$result2 = $con->query($sql2);
if($result2->num_rows < 1 ) exit("Incorrect password");

$getid = "select id from passenger where p_username ='$Username'";
$result = $con->query($getid);

$id = mysqli_fetch_array($result);



if($result1 !== null){
    if($result2 !== null){
        header("location:hello.php?id=$id[id]");
    }

    else{
        echo "Incorrect Password";
    }
}
else{
    echo "Invalid Username";
}

?>