<?php
	require_once 'config.php';
    require_once 'connect.php';

    $db = connect(DB_HOST, DB_NAME, DB_USERNAME, DB_PASSWD);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $type = mysqli_real_escape_string($db, $_POST['type']);

    if($type == 'donor') {
        $select = "SELECT * FROM donor WHERE email = ('$email')";
        $result = $db->query($select);
        if($result->num_rows == 0) {
            echo("user doesn't exist");
        } else {
            $done = $db->query($select);
            echo "Login Successful. Welcome ".$firstname;
        }
    }

    else if($type == 'donee') {
        $select = "SELECT * FROM donee WHERE email = ('$email')";
        $result = $db->query($select);
        if($result->num_rows == 0) {
            echo("user doesn't exist");
        } else {
            $done = $db->query($select);
            echo "Login Successful. Welcome ".$firstname;
        }
    }


    if ($done) {
        $url = '127.0.0.1:3000/login';
        $data = array('email' => $email);

        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        // if ($result === FALSE) { var_dump('error'); }
        echo ($result.token);
        $_SESSION['token']=$result.token;
        $_SESSION['is_logged']=true;
        $_SESSION['username']=$firstname.''.$lastname;
        header("refresh:1;url=./Home.html");
    }
        exit;
    }
    else {
        echo("Error while adding new user");
    }
