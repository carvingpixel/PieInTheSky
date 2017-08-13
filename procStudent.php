<?php

    //Using mysqli to clean inputs through bind_param functionality --
    $student = $_POST['student'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state  = $_POST['state'];
    $zip = $_POST['zip'];

    //PREPARE STMT --------------------------------------------------------------------------------------------------//
    $stmt = $conn->prepare("INSERT INTO students (student, address, city, state, zip) VALUES (?,?,?,?,?)");

    //BIND  ---------------------------------------------------------------------//
    $stmt->bind_param("ssssi", $student, $address, $city, $state, $zip);

    if (false === $stmt) {
        header("location:form.php?FormError=yes"
        );}

    // Execute Statement
    $rc = $stmt->execute();

    if (false === $rc) {
        header("location:form.php?FormError=yes");
    }

    // close stmt, unset posts, close conn

    $stmt->close();
    unset($_POST);
    $conn->close();