<html>
    <head>
        <title>Form</title>
    </head>
    <body>
        <h1>Train Registation Form</h1>
        <form action="addTrain.php" method="POST" id="form">
            <table cellpadding="2">
                <tr valign="top">
                    <td>
                        <label>Train Name:</label>
                    </td>
                    <td>
                        <input type="text" name="TrainName" id="TrainNameField"><br/>
                        <span class="error-msg" id="TrainNameFieldMsg"></span>
                    </td>
                </tr>

                <tr valign="top">
                    <td>
                        <label>Train Code:</label>
                    </td>
                    <td>
                        <input type="text" name="TrainCode" id="TrainCodeField"><br/>
                        <span class="error-msg" id="TrainCodeFieldMsg"></span>
                    </td>
                </tr>

                <tr valign="top">
                    <td>
                        <label>Engine Type:</label>
                    </td>
                    <td>
                        <input type="text" name="EngineType" id="EngineTypeField"><br/>
                        <span class="error-msg" id="EngineTypeFieldMsg"></span>
                    </td>
                </tr>

                <tr valign="top">
                    <td>
                        <label>No. of Seats:</label>
                    </td>
                    <td>
                        <input type="text" name="Seat" id="SeatField"><br/>
                        <span class="error-msg" id="SeatFieldMsg"></span>
                    </td>
                </tr>

                <tr valign="top">
                    <td>
                        <label>Start Destination:</label>
                    </td>
                    <td>
                    <select name="StartD" id="StartDField">
                    <option value="--Select--">--Select--</option>

                    <?php 
                        $con = new mysqli('localhost','root','1234','erail_ticketing');

                        $station = "select s_name from station";
                        $result =  $con->query($station);
                    
                        while ($row = mysqli_fetch_assoc($result)){

                        echo '<option value='.$row['s_name'].'>'.$row['s_name']."</option>";
                        }  
                    ?>
                    
                    </select><br/>
                        <span class="error-msg" id="StartDFieldMsg"></span>
                    </td>
                </tr>

                <tr valign="top">
                    <td>
                        <label>End Destination:</label>
                    </td>
                    <td>
                    <select name="EndD" id="EndDField">
                    <option value="--Select--">--Select--</option>

                    <?php 
                        $con = new mysqli('localhost','root','1234','erail_ticketing');

                        $station = "select s_name from station";
                        $result =  $con->query($station);
                    
                        while ($row = mysqli_fetch_assoc($result)){

                        echo '<option value='.$row['s_name'].'>'.$row['s_name']."</option>";
                        }  
                    ?>
                    
                    </select><br/>
                        <span class="error-msg" id="EndDFieldMsg"></span>
                    </td>
                </tr>

                <tr valign="top">
                    <td>
                        <label>Start Time:</label>
                    </td>
                    <td>
                        <input type="text" name="STime" id="STimeField"><br/>
                        <span class="error-msg" id="STimeFieldMsg"></span>
                    </td>
                </tr>

                <tr valign="top">
                    <td>
                        <label>End Time:</label>
                    </td>
                    <td>
                        <input type="text" name="ETime" id="ETimeField"><br/>
                        <span class="error-msg" id="ETimeFieldMsg"></span>
                    </td>
                </tr>



                <tr>
                    <th colspan="2" style="text-align: right">
                        <button type="submit">ADD</button>
                    </th>
                </tr>
            </table>

        </form>

        
    </body>

    <script type="text/javaScript">
        const form = document.getElementById('form');
        const TrainName = document.getElementById('TrainNameField');
        const TrainNameFieldMsg = document.getElementById('TrainNameFieldMsg');
        const TrainCode = document.getElementById('TrainCodeField');
        const TrainCodeFieldMsg = document.getElementById('TrainCodeFieldMsg');
        const EngineType = document.getElementById('EngineTypeField');
        const EngineTypeFieldMsg = document.getElementById('EngineTypeFieldMsg');
        const SeatField = document.getElementById('SeatField');
        const SeatFieldMsg = document.getElementById('SeatFieldMsg');
        const StartD = document.getElementById('StartDField');
        const StartDFieldMsg = document.getElementById('StartDFieldMsg');
        const EndD = document.getElementById('EndDField');
        const EndDFieldMsg = document.getElementById('EndDFieldMsg');
        const STime = document.getElementById('STimeField');
        const STimeFieldMsg = document.getElementById('STimeFieldMsg');
        const ETime = document.getElementById('ETimeField');
        const ETimeFieldMsg = document.getElementById('ETimeFieldMsg');

        function validateTrainName() {
            const Name = TrainName.value.trim();
            const crit1 = Name !="";
            const crit2 = Name.length >= 3;

            if(!crit1){
                TrainNameFieldMsg.innerHTML = "Train Name is required";
                return false;
            }

            if(!crit2){
                TrainNameFieldMsg.innerHTML = "Train Name should has at lease 3 characters";
                return false;
            }
            else{
                TrainNameFieldMsg.innerHTML = "";
                return true;
            }
        }

        function validateTrainCode() {
            const Code = TrainCode.value.trim();
            const crit3 = Code !="";
            const crit4 = Code.length >= 3;

            if(!crit3){
                TrainCodeFieldMsg.innerHTML = "Train Code is required";
                return false;
            }

            if(!crit4){
                TrainCodeFieldMsg.innerHTML = "Train Code should has at lease 3 characters";
                return false;
            }
            else{
                TrainCodeFieldMsg.innerHTML = "";
                return true;
            }
        }

        

        function validateEngineType() {
            const Engine = EngineType.value.trim();
            const crit5 = Engine !="";


            if(!crit5){
                EngineTypeFieldMsg.innerHTML = "Engine Type is required";
                return false;
            }

            else{
                EngineTypeFieldMsg.innerHTML = "";
                return true;
            }
        }

        
        function validateSeat() {
            const Seat = SeatField.value.trim();
            const crit5 = Seat !="";


            if(!crit5){
                SeatFieldMsg.innerHTML = "No of seat is required";
                return false;
            }

            else{
                SeatFieldMsg.innerHTML = "";
                return true;
            }
        }

        function validateStartD() {
            const StartDesti = StartD.value.trim();
            const crit6 = StartDesti !="";

            if(!crit6){
                StartDFieldMsg.innerHTML = "Start Station is required";
                return false;
            }

            else{
                StartDFieldMsg.innerHTML = "";
                return true;
            }
        }

        function validateEndD() {
            const EndDesti = EndD.value.trim();
            const crit7 = EndDesti !="";

            if(!crit7){
                EndDFieldMsg.innerHTML = "End Station is required";
                return false;
            }

            else{
                EndDFieldMsg.innerHTML = "";
                return true;
            }
        }

        function validateSTime() {
            const StartT = STime.value.trim();
            const crit8 = StartT !="";


            if(!crit8){
                STimeFieldMsg.innerHTML = "Train Start Time is required";
                return false;
            }

            else{
                STimeFieldMsg.innerHTML = "";
                return true;
            }
        }


        function validateETime() {
            const EndT = ETime.value.trim();
            const crit9 = EndT !="";


            if(!crit9){
                ETimeFieldMsg.innerHTML = "Train End Time is required";
                return false;
            }

            else{
                ETimeFieldMsg.innerHTML = "";
                return true;
            }
        }


        form.addEventListener('submit', function(e){
            const TrainNameValidity = validateTrainName();
            const TrainCodeValidity = validateTrainCode();
            const EngineTypeValidity = validateEngineType();
            const SeatValidity = validateSeat();
            const StartDValidity = validateStartD();
            const EndDValidity = validateEndD();
            const STimeValidity= validateSTime();
            const ETimeValidity = validateETime();

            if(!TrainNameValidity || !TrainCodeValidity || !EngineTypeValidity || !SeatValidity || !StartDValidity || !EndDValidity || !STimeValidity || !ETimeValidity) e.preventDefault();

        });
    </script>



    <style type="text/css">
    .error-msg{
    color: #e60e0e;
    }

    </style>
        



    </html>
                    
