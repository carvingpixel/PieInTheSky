    <?php

    //Using mysqli to clean inputs through bind_param functionality --
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phone = $_POST['phone'];

    //PREPARE STMT --------------------------------------------------------------------------------------------------//
    $stmt = $conn->prepare("INSERT INTO professors (firstName, lastName, phone) VALUES (?,?,?)");

    //BIND  ---------------------------------------------------------------------//
    $stmt->bind_param("sss",$firstName, $lastName, $phone );


    if (false === $stmt) {header("location:form.php?FormError=yes");}

    // Execute Statement
    $rc = $stmt->execute();

    if (false === $rc) {header("location:form.php?FormError=yes"); }

    // close stmt, unset posts, close conn

    $stmt->close();
    unset($_POST);
    $conn->close();