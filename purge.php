<?php

if(isset($_GET['email']) && !empty($_GET['email'])):

    $email = htmlentities($_GET['email']);

    require_once('dbcnx.php');

    // sql to delete a record
    $runnerSQL = "DELETE FROM runner WHERE email= '$email'";
    $eventSQL = "DELETE FROM events where email ='$email'";


    if (($conn->query($runnerSQL) === TRUE) && ($conn->query($eventSQL) === TRUE)) {

        echo "success";
        $conn->close();
        header("location:index.php?purge=1");

    } else {

        echo "error";
        $conn->close();
       header("location:index.php?purge=0");
    }

else:

    header("location:index.php?purge=0");

endif;