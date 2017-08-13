<?php

    // mysqli --
    $conn = new mysqli('127.0.0.1','user1','test','races');

    // if errors --
    if ($conn->connect_error) {
        die('Connection Failed: ('. $conn->connect_errno .') '. $conn->connect_error);
    }

    mysqli_set_charset($conn,"utf8");

