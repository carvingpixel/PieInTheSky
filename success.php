<?php

    $MSGStatus = '';
    function escape($string) {return  htmlentities(trim($string), ENT_QUOTES, 'UTF-8');}

if(isset($_GET['email']) && isset($_GET['quantity']) && !empty($_GET['email']) && !empty($_GET['quantity']) ):

        $email = htmlentities($_GET['email']);
        $quantity = htmlentities($_GET['quantity']);
        $cost = 25 * $quantity;

        $MSGStatus = "<h2>Success</h2>";
        $MSGStatus .= "<p class='success'>Thank you $email for your recent registration! <br />";
        $MSGStatus .= " Race cost is $25 dollars per your $quantity runner(s). Your total cost is $$cost.00.";
        $MSGStatus .= " Please mail payment or pay at morning check-in on the day of the event cash only.</p>";

        $MSGStatus .= "<h2>Review</h2>";
        $MSGStatus .= "<p class='success'>Please review the information to the right for verification. Make any required changes and resubmit if needed.";
        $MSGStatus .= "<p><button type=\"button\" onclick=\"deleteReg()\" class=\"btn btn-danger\">Delete Registration</button>";
    else:

        $MSGStatus = "<p style='font-style:italic;font-size:17px;color:orangered'>There seems to be an error in processing your submission, please try again.</p>";
        $email = '';

    endif;



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Review Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- local css -->
    <link rel="stylesheet" href="child.css">
<script>
    function deleteReg() {
    var r = confirm("Delete Registration for <?php echo $email; ?>, Are you sure?");
        if (r == true) {
            window.location="purge.php?email=<?php echo $email; ?>";
        } else {
            alert ("WHEW, don't Stop Runnin!");
        }// if
    }//function
</script>
</head>
<body>


<div class="container">

<img src="PieSky2.png" alt="Pie in the sky 5k" width="297" height="108" />

    <div class="row">

        <!-- REGISTRATION ^^^^^^^^^^^^^^^^^^^^^^^-->
        <div class="col-sm-6">

            <p><?php if ($MSGStatus != ''):  echo $MSGStatus;  endif;  ?>

        </div>

        <!-- REGISTRATION ^^^^^^^^^^^^^^^^^^^^^^^-->
        <div class="col-sm-6">
            <h2>Modify Registration</h2>
            <?php

            require_once ('dbcnx.php');

            $runnerID = "";
            $name = "";
            $address = "";
            $city = "";;
            $state = "";
            $zip = "";
            $people  = "";

            // select runner and event info
            // EMAIL IS UNIQUE IN EVENT INFO TO AVOID DUPLICATE REGISTRATIONS

            $runnerSQL = "SELECT * FROM runner where email = '$email'";
            $result = $conn->query($runnerSQL);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $runnerID = $row["runnerID"];
                    $name = $row["name"];
                    $address = $row["address"];
                    $city = $row["city"];
                    $state = $row["state"];
                    $zip = $row["zip"];
                }
            } else {
                echo "0 results, We could not find any accounts for you.";
            }

            $eventSQL = "SELECT recordID, people, email FROM events where email ='$email'";
            $result = $conn->query($eventSQL);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $recordID = $row["recordID"];
                    $people = $row["people"];
            }
            } else {
                echo "0 race registrations found in the system";
            }


            //close connection down below //
            ?>

            <form name='racerForm' id='racerForm' method='post' action='submission.php'>
             <input type="hidden" name="token" value="TK66924284">

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input required name="name" type="text" class="form-control" id="name" value="<?php echo escape($name); ?>">
                </div>

                <div class="form-group">
                    <label for="address">Street:</label>
                    <input required name="address" type="text" class="form-control" id="address" value="<?php echo escape($address); ?>">
                </div>

                <div class="form-group">
                    <label for="city">City:</label>
                    <input required  name="city" type="text" class="form-control" id="city" value="<?php echo escape($city); ?>">
                </div>

                <div class="form-group">
                    <label for="state">State: (e.g. SC)</label>
                    <input required pattern="[A-Za-z]{2}" name="state" type="text" class="form-control" id="state" value="<?php echo escape($state); ?>">
                </div>

                <div class="form-group">
                    <label for="zip">Zip:</label>
                    <input required name="zip" type="text" class="form-control" id="zip" value="<?php echo escape($zip); ?>">
                </div>

                <div class="form-group">
                    <label for="zip">Email:</label>
                    <input required  name="email" type="email" class="form-control" id="zip" value="<?php echo escape($email); ?>">
                </div>

                <div class="form-group">
                    <label for="people">How Many:</label>
                    <input required  name="people" type="text" class="form-control" id="people" value="<?php echo escape($people); ?>">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-default">Submit</button>
                </div>
            </form>
        </div>

        <?php
        // close connection
        $conn->close();

        ?>


        </div><!--outer row -->

</div><!--container -->












<div class="container">


    <div class="row">

        <?php require("dbcnx.php"); // closed at last select ?>

        <!-- show students ***************************-->
        <div class="col-sm-3">
            <h4>Students</h4>
            <?php

//            $select = "SELECT * FROM students order by StudentID desc;";
//            $result = mysqli_query($conn, $select);
//
//            if (mysqli_num_rows($result) > 0) {
//
//                while($row = mysqli_fetch_assoc($result)) {
//
//                    $SID =  escape($row["studentID"]);
//                    $student =  escape($row["student"]);
//                    $address =  escape($row["address"]);
//                    $city =  escape($row["city"]);
//                    $state =  escape($row["state"]);
//                    $zip =  escape($row["zip"]);
//
//                    $showData  = "<p style='border-bottom:1px solid#ccc;padding-bottom:8px;'>";
//                    $showData .= "SID: $SID <br />";
//                    $showData .= "NAME: $student <br />";
//                    $showData .= "ADDRESS: $address <br />";
//                    $showData .= "CITY: $city <br />";
//                    $showData .= "STATE: $state <br />";
//                    $showData .= "ZIP: $zip </p>";
//                    echo $showData;
//                }
//            } else {
//                echo "0 results";
//            }
            ?>
        </div>



        <?php mysqli_close($conn); ?>

    </div>

</div>





<footer class="container-fluid text-center">
    <p>Pie in the Sky 5k &copy; 2017</p>
</footer>

</body>
</html>