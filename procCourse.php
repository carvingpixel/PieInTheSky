<?php

    //Using mysqli to clean inputs through bind_param functionality --
    $courseID = $_POST['courseID'];
    $profID = $_POST['profID'];
    $crsName = $_POST['crsName'];
    $crsDesc = $_POST['crsDesc'];

    //include "showErrors.php";
    //echo "<p>$courseID";
    //echo "<br />$profID";
    //echo "<br />$crsName";
    //echo "<br />$crsDesc";

    //PREPARE STMT --------------------------------------------------------------------------------------------------//
    $stmt = $conn->prepare("INSERT INTO courses (courseID, profID, crsName, crsDesc) VALUES (?,?,?,?)");

    //BIND  ---------------------------------------------------------------------//
    $stmt->bind_param("iiss", $courseID, $profID, $crsName, $crsDesc );

    if (false === $stmt) {header("location:form.php?FormError=yes");}

    // Execute Statement
    $rc = $stmt->execute();

    if (false === $rc) {header("location:form.php?FormError=yes"); }

    // close stmt, unset posts, close conn


    $stmt->close();
    unset($_POST);
    $conn->close();