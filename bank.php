<?php 
        $Type = $_POST['cardType'];
        $Number = $_POST['cardNumber'];
        $Pin = $_POST['pinNumber'];
        $reservationID = $_POST['r_id'];
        var_dump($Type);
        var_dump($Number);
        var_dump($Pin);
        var_dump($reservationID);

        $con = new mysqli('localhost','root','1234','erail_ticketing');

        $sql1 = "select * from ticket_resevation where id=$reservationID";
        $result1 = $con->query($sql1);
        if (!$result1) {
                die("Error in SQL query: " . $con->error);
            }
            
        $row1 = mysqli_fetch_array($result1);
        var_dump($row1);

        $sql2 = "select * from bank where cardtype='$Type' and cardno='$Number' and pin='$Pin'";
        $result2 = $con->query($sql2);
        if (!$result2) {
                die("Error in SQL query: " . $con->error);
            }
            
        $row2 = mysqli_fetch_array($result2);
        var_dump($row2);
        

        if($result2->num_rows > 0 ){
                $sql3 = "insert into payment values(null, '$row1[r_ticketid]', '$row1[r_passengerid]', '$row2[id]')";
                $result3 = $con->query($sql3);
                if (!$result3) {
                        die("Error in SQL query: " . $con->error);
                    }

                $sql4 = $con->insert_id;
                

                $sql4 = "update ticket_resevation set r_paymentid=$sql4 where id=$$reservationID";
                $result4 = $con->query($sql4);


                header("location:detail.php?id=$reservationID");
        }
        else{
              echo "something wrong, try again";  
        }

        


        ?>