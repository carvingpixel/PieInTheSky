<?php

    //Using mysqli to clean inputs through bind_param functionality --
    $studentID = $_POST['studentID'];
    $courseID = $_POST['courseID'];

    //PREPARE STMT --------------------------------------------------------------------------------------------------//
    $stmt = $conn->prepare("INSERT INTO registration (studentID, courseID) VALUES (?,?)");


    //BIND  ---------------------------------------------------------------------//
    $stmt->bind_param("ii", $studentID, $courseID );


    if (false === $stmt) {header("location:form.php?FormError=yes");}

    // Execute Statement
    $rc = $stmt->execute();

    if (false === $rc) {header("location:form.php?FormError=yes");}


    // close stmt, unset posts, close conn
    $stmt->close();
    unset($_POST);
    $conn->close();