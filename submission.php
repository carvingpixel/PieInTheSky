<?php  // check to verify request is post not bot and verify token exists as extra bot check

include "showErrors.php";



if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['token'])):

    $token =  htmlentities($_POST['token']);

    if($token != 'TK66924284'):

        header("location:index.php?FormError=yes");

    else: //if token valid

        //Using mysqli to clean inputs through bind_param functionality --
        $name = $_POST['name'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state  = $_POST['state'];
        $zip = $_POST['zip'];
        $email = $_POST['email'];
        $people = $_POST['people'];

        // Race Info //
        $eventDate = "5/15/17";
        $race = "Pie in the Sky 5k";

        require('dbcnx.php');



//        $sql = "INSERT INTO events (email, race, eventDate, people)VALUES ('$email', '$race', '$eventDate','$people')";
//
//        if (mysqli_query($conn, $sql)) {
//            echo "New record created successfully";
//        } else {
//            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
//        }


        //PREPARE $racerIN ----------------------------------------------------------------------------------------//
        $stmt = $conn->prepare("INSERT INTO events (email, race, eventDate, people) VALUES (?,?,?,?)");

        //BIND  ---------------------------------------------------------------------//
        $stmt->bind_param("sssi", $email, $race, $eventDate, $people);


        // IF ERRORS & EXECUTE RACER ------------------------------------------------------------------------------//
        if (false === $stmt) {header("location:index.php?FormError=yes");}

        $rc = $stmt->execute();

        if (false === $rc) {
            //echo "<h2>event</h2>";
            header("location:index.php?FormError=yes");
        }





        //PREPARE $racerIN ----------------------------------------------------------------------------------------//
        $racerIN = $conn->prepare("INSERT INTO runner (name, address, city, state, zip, email) VALUES (?,?,?,?,?,?)");

        //BIND  ---------------------------------------------------------------------//
        $racerIN->bind_param("ssssis", $name, $address, $city, $state, $zip, $email);


        // IF ERRORS & EXECUTE RACER ------------------------------------------------------------------------------//
        if (false === $racerIN) {header("location:index.php?FormError=yes");}

        $rc = $racerIN->execute();

        if (false === $rc) {
           // echo "<h2>racer</h2>";
           header("location:index.php?FormError=yes");
        }



        // close bind & connections, clear post ------------------------//
        $racerIN->close();
        $stmt->close();
        unset($_POST);
        $conn->close();

      header("location:success.php?email=$email&quantity=$people");

    endif; //if isset

else:

 header("location:form.php?FormError=yes");

endif;




