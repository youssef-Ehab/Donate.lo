<?php
	require_once 'config.php';
    require_once 'connect.php';

    $db = connect(DB_HOST, DB_NAME, DB_USERNAME, DB_PASSWD);
    $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $country = mysqli_real_escape_string($db, $_POST['country']);
    $type = mysqli_real_escape_string($db, $_POST['type']);

    echo $type;

    if($type == 'donor') {
        $select = "SELECT * FROM donor WHERE email = ('$email')";
        $result = $db->query($select);
        if($result->num_rows == 0) {
            $insert = "INSERT INTO donor VALUES ('$email', '$firstname', '$lastname', '$password', '$country')";
            $done = $db->query($insert);
        } else {
            echo("This email already exists");
        }
    }

    else if($type == 'donee') {
        $select = "SELECT * FROM donee WHERE email = ('$email')";
        $result = $db->query($select);
        if($result->num_rows == 0) {
            $insert = "INSERT INTO donee VALUES ('$email', '$firstname', '$lastname', '$password', '$country')";
            $done = $db->query($insert);
        } else {
            echo("This email already exists");
        }
    }


    if ($done) {
        $_SESSION['is_logged']=true;
        $_SESSION['username']=$firstname.''.$lastname;
        header("Location: ./Home.html");
        exit;
    }
    else {
        echo("Error while adding new user");
    }
