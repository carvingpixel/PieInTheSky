<?php
require 'ShowErrors.php';

    $MSGStatus = '';

    if(isset($_GET['Complete'])):

        $formComplete = htmlentities($_GET['Complete']);
        $MSGStatus = "<p style='font-style:italic;font-size:17px;color:deepskyblue'>Thank you for your recent $formComplete submission.</p>";

    elseif(isset($_GET['FormError'])):

        $MSGStatus = "<p style='font-style:italic;font-size:17px;color:orangered'>There seems to be an error in processing your submission, please try again.</p>";

    endif;

    function escape($string) {return  htmlentities(trim($string), ENT_QUOTES, 'UTF-8');}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SYSADMIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        h4.formTitles {border-bottom:1px solid #ccc;padding-bottom:5px;}
        footer {
            background-color: #f2f2f2;
            padding: 25px;
            position:fixed;
            left:0;
            bottom:0;
            height:30px;
            width:100%;
        }
    </style>
</head>
<body>


<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">SYSADMIN</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Forms</a></li>
            </ul>
        </div>
    </div>
</nav>


<div class="container">
    <h3>SYSADMIN</h3>
    <p><?php if ($MSGStatus != ''):  echo $MSGStatus;  endif;  ?>
    <br>
    <div class="row">


        <!-- STUDENT ^^^^^^^^^^^^^^^^^^^^^^^-->
        <div class="col-sm-3">
            <h4 class="formTitles">Student</h4>
            <form name='student' method='post' action='submission.php?frm=student'>
             <input type="hidden" name="token" value="TK66924284">

                <div class="form-group">
                    <label for="student">Name:</label>
                    <input required name="student" type="text" class="form-control" id="student" placeholder="Name">
                </div>

                <div class="form-group">
                    <label for="address">Address:</label>
                    <input required name="address" type="text" class="form-control" id="student" placeholder="Address">
                </div>

                <div class="form-group">
                    <label for="city">City:</label>
                    <input required name="city" type="text" class="form-control" id="student" placeholder="City">
                </div>

                <div class="form-group">
                    <label for="state">State:</label>
                    <input required name="state" type="text" class="form-control" id="student" placeholder="State">
                </div>

                <div class="form-group">
                    <label for="zip">Zip:</label>
                    <input required name="zip" type="text" class="form-control" id="zip" placeholder="zip">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Submit</button>
                </div>
            </form>
        </div>



        <!-- TEACHER ^^^^^^^^^^^^^^^^^^^^^^^-->
        <div class="col-sm-3">
        <h4 class="formTitles">Professors</h4>
            <form name='teacher' method='post' action='submission.php?frm=professors'>
                <input type="hidden" name="token" value="TK66924284">

                <div class="form-group">
                    <label for="firstName">First:</label>
                    <input required  name="firstName" type="text" class="form-control" id="firstName" placeholder="First Name">
                </div>

                <div class="form-group">
                    <label for="lastName">Last:</label>
                    <input required  name="lastName" type="text" class="form-control" id="lastName" placeholder="Last Name">
                </div>

                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input required  name="phone" type="text" class="form-control" id="phone" placeholder="Phone">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-default">Submit</button>
                </div>
            </form>
        </div>







        <!-- COURSE ^^^^^^^^^^^^^^^^^^^^^^^-->
        <div class="col-sm-3">
            <h4 class="formTitles">Course</h4>
            <form name='course' method='post' action='submission.php?frm=course'>
                <input type="hidden" name="token" value="TK66924284">

                <div class="form-group">
                    <label for="courseID">Course ID:</label>
                    <input required name="courseID" type="text" class="form-control" id="courseID" placeholder="courseID">
                </div>

                <div class="form-group">
                    <label for="profID">Professor ID:</label>
                    <input required name="profID" type="text" class="form-control" id="profID" placeholder="profID">
                </div>

                <div class="form-group">
                    <label for="crsName">Name:</label>
                    <input required name="crsName" type="text" class="form-control" id="crsName" placeholder="crsName">
                </div>

                <div class="form-group">
                    <label for="crsDesc">Description:</label>
                    <input required name="crsDesc" type="text" class="form-control" id="crsDesc" placeholder="crsDesc">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-default">Submit</button>
                </div>
            </form>
        </div>



        <!-- REGISTRATION ^^^^^^^^^^^^^^^^^^^^^^^-->
        <div class="col-sm-3">
            <h4 class="formTitles">Registration</h4>
            <form name='registration' method='post' action='submission.php?frm=registration'>
                <input type="hidden" name="token" value="TK66924284">

                <div class="form-group">
                    <label for="studentID">Student ID:</label>
                    <input required name="studentID" type="text" class="form-control" id="studentID" placeholder="studentID">
                </div>

                <div class="form-group">
                    <label for="courseID">Course ID:</label>
                    <input required name="courseID" type="text" class="form-control" id="courseID" placeholder="courseID">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-default">Submit</button>
                </div>
            </form>
        </div>




    </div>
    <hr>
</div>












<div class="container">
    <h3>Data Review Results</h3>
    <br>
    <div class="row">

        <?php require("dbcnx.php"); // closed at last select ?>

        <!-- show students ***************************-->
        <div class="col-sm-3">
            <h4>Students</h4>
            <?php

            $select = "SELECT * FROM students order by StudentID desc;";
            $result = mysqli_query($conn, $select);

            if (mysqli_num_rows($result) > 0) {

                while($row = mysqli_fetch_assoc($result)) {

                    $SID =  escape($row["studentID"]);
                    $student =  escape($row["student"]);
                    $address =  escape($row["address"]);
                    $city =  escape($row["city"]);
                    $state =  escape($row["state"]);
                    $zip =  escape($row["zip"]);

                    $showData  = "<p style='border-bottom:1px solid#ccc;padding-bottom:8px;'>";
                    $showData .= "SID: $SID <br />";
                    $showData .= "NAME: $student <br />";
                    $showData .= "ADDRESS: $address <br />";
                    $showData .= "CITY: $city <br />";
                    $showData .= "STATE: $state <br />";
                    $showData .= "ZIP: $zip </p>";
                    echo $showData;
                }
            } else {
                echo "0 results";
            }
            ?>
        </div>


        <!--show professors ********************-->
        <div class="col-sm-3">
            <h4>Professors</h4>
            <?php

            $select = "SELECT * FROM professors order by profID desc;";
            $result = mysqli_query($conn, $select);

            if (mysqli_num_rows($result) > 0) {

                while($row = mysqli_fetch_assoc($result)) {

                    $profID =  escape($row["profID"]);
                    $firstName =  escape($row["firstName"]);
                    $lastName =  escape($row["lastName"]);
                    $phone =  escape($row["phone"]);

                    $showData  = "<p style='border-bottom:1px solid#ccc;padding-bottom:8px;'>";
                    $showData .= "PID: $profID <br />";
                    $showData .= "NAME: $firstName $lastName <br />";
                    $showData .= "PHONE: $phone <br />";
                    echo $showData;
                }
            } else {
                echo "0 results";
            }
            ?>
        </div>



        <div class="col-sm-3">
            <h4>Courses</h4>
            <?php

            $select = "SELECT 
            courses.courseID, courses.profID, courses.crsName, courses.crsDesc,
            professors.firstName, professors.lastName, professors.profID
            FROM courses, professors where courses.profID = professors.profID order by courses.courseID desc;";
            $result = mysqli_query($conn, $select);

            if (mysqli_num_rows($result) > 0) {

                while($row = mysqli_fetch_assoc($result)) {

                    $courseID =  escape($row["courseID"]);
                    $profID =  escape($row["profID"]);
                    $firstName =  escape($row["firstName"]);
                    $lastName =  escape($row["lastName"]);
                    $crsName =  escape($row["crsName"]);
                    $crsDesc =  escape($row["crsDesc"]);

                    $showData  = "<p style='border-bottom:1px solid#ccc;padding-bottom:8px;'>";
                    $showData .= "CID: $courseID <br />";
                    $showData .= "NAME: $crsName<br />";
                    $showData .= "PROF: $profID - $firstName $lastName <br />";
                    $showData .= " <em>$crsDesc</em><br />";
                    echo $showData;
                }
            } else {
                echo "0 results";
            }
            ?>
        </div>



        <div class="col-sm-3">
            <h4>Registration</h4>
            <?php

            $select = "SELECT 
            registration.regID, registration.studentID, registration.courseID,
            courses.crsName,
            students.student,
            professors.firstName, professors.lastName, professors.profID
            FROM registration, courses, students, professors
            WHERE registration.courseID = courses.courseID
            AND registration.studentID = students.studentID
            AND courses.profID = professors.profID
            ORDER BY studentID DESC;";
            $result = mysqli_query($conn, $select);

            if (mysqli_num_rows($result) > 0) {

                while($row = mysqli_fetch_assoc($result)) {

                    $student =  escape($row["student"]);
                    $studentID =  escape($row["studentID"]);
                    $courseID =  escape($row["courseID"]);
                    $crsName =  escape($row["crsName"]);
                    $profID =  escape($row["profID"]);
                    $firstName =  escape($row["firstName"]);
                    $lastName =  escape($row["lastName"]);

                    $showData  = "<p style='border-bottom:1px solid#ccc;padding-bottom:8px;'>";
                    $showData .= "STUDENT: $studentID - $student<br />";
                    $showData .= "REGISTERED:<br /> $courseID - $crsName<br />";
                    $showData .= "PROF: $profID - $firstName $lastName <br />";
                    echo $showData;
                }
            } else {
                echo "0 results";
            }
            ?>

        </div>

        <?php mysqli_close($conn); ?>

    </div>
    <hr>
</div>





<footer class="container-fluid text-center">
    <p>Footer Section</p>
</footer>

</body>
</html>