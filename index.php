<?php

    $MSGStatus = '';

    if(isset($_GET['purge'])):

        $purge = htmlentities($_GET['purge']);

        if($purge == 1):
            $MSGStatus = "<p class='success'>Thank you, your registration has been deleted.</p>";
        endif;

        if ($purge == 0):
            $MSGStatus = "<p class='success'>Error deleting registration from system, please call email customer service.</p>";
        endif;

    elseif(isset($_GET['FormError'])):

        $MSGStatus = "<p class='success'>There seems to be an error in processing your submission, please try again.</p>";

    endif;

    function escape($string) {return  htmlentities(trim($string), ENT_QUOTES, 'UTF-8');}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pie in the Sky</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- local css -->
    <link rel="stylesheet" href="child.css">

</head>
<body>


<div class="container">

<img src="PieSky2.png" alt="Pie in the sky 5k" width="297" height="108" />

    <p><?php if ($MSGStatus != ''):  echo $MSGStatus;  endif;  ?>
    <br>
    <div class="row">

        <!-- REGISTRATION ^^^^^^^^^^^^^^^^^^^^^^^-->
        <div class="col-sm-6">
            <h2>Registration Information</h2>
            <form name='racerForm' id='racerForm' method='post' action='submission.php'>
             <input type="hidden" name="token" value="TK66924284">

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input required name="name" type="text" class="form-control" id="name" placeholder="Name">
                </div>

                <div class="form-group">
                    <label for="address">Street:</label>
                    <input required name="address" type="text" class="form-control" id="address" placeholder="address">
                </div>

                <div class="form-group">
                    <label for="city">City:</label>
                    <input required  name="city" type="text" class="form-control" id="city" placeholder="City">
                </div>

                <div class="form-group">
                    <label for="state">State: (e.g. SC)</label>
                    <input required pattern="[A-Za-z]{2}" name="state" type="text" class="form-control" id="state" placeholder="State">
                </div>

                <div class="form-group">
                    <label for="zip">Zip:</label>
                    <input required name="zip" type="text" class="form-control" id="zip" placeholder="zip">
                </div>

                <div class="form-group">
                    <label for="zip">Email:</label>
                    <input required  name="email" type="email" class="form-control" id="zip" placeholder="Email">
                </div>

                <div class="form-group">
                    <label for="people">How Many:</label>
                    <input required  name="people" type="text" class="form-control" id="people" placeholder="How Many">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-default">Submit</button>
                </div>
            </form>
        </div>


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