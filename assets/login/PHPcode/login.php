<?php

    $url ='mysql://lf7jfljy0s7gycls:qzzxe2oaj0zj8q5a@u0zbt18wwjva9e0v.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/c0t1o13yl3wxe2h3';

    $dbparts = parse_url($url);

    $hostname = $dbparts['host'];
    $username = $dbparts['user'];
    $password = $dbparts['pass'];
    $database = ltrim($dbparts['path'],'/');

    $DBConnect = mysqli_connect($hostname, $username, $password, $database);

    if($DBConnect === false)
    {
        $response = array("error"=> "Database connection error", "sqliErrorCode"=>mysqli_connect_error());
        $responseJSON = json_encode($response);
        echo $responseJSON;
    }
    else
    {
        // receive all input values from the form
        $email = mysqli_real_escape_string($DBConnect, $_POST['email']);
        $password = mysqli_real_escape_string($DBConnect, $_POST['password']);


        if ($email != "" && $password != "")
        { 
            //fetch salt 
            $saltQ = "SELECT * FROM USER WHERE USERNAME='$email'";
            $saltQResult = mysqli_query($DBConnect, $saltQ);
            $saltResult = mysqli_fetch_assoc($saltQResult);

            $userID = $saltResult['USER_ID'];
            $employeeID = $saltResult['EMPLOYEE_ID'];
            $salt = $saltResult['PASSWORD_SALT'];
            $accessLevelID = $saltResult['ACCESS_LEVEL_ID'];

            $passSalt = $password.$salt;
            $HSPassword = hash('sha256', $passSalt);

            $query = "SELECT * FROM USER WHERE USERNAME='$email' AND USER_PASSWORD='$HSPassword'";
            $results = mysqli_query($DBConnect, $query);

            if (mysqli_num_rows($results) == 1) 
            {
                //fetch employee name and surname
                $employeeQ = "SELECT * FROM EMPLOYEE WHERE EMPLOYEE_ID='$employeeID'";
                $employeeQResult = mysqli_query($DBConnect, $employeeQ);
                $employeeResult = mysqli_fetch_assoc($employeeQResult);

                $name = $employeeResult['NAME'];
                $surname = $employeeResult['SURNAME'];

                //Fetch access level functionalities
                $userFunctionalityQ = "SELECT * FROM ACCESS_LEVEL_FUNCTIONALITY WHERE ACCESS_LEVEL_ID='$accessLevelID'";
                $userFunctionalityQResult = mysqli_query($DBConnect, $userFunctionalityQ);

                $access = array();
                while( $level = mysqli_fetch_array($userFunctionalityQResult))
                { 
                    array_push($access, $level['FUNCTIONALITY_ID']);
                }
                
                //Populate session variable
                session_start();
                $_SESSION['name'] = $name;
                $_SESSION['surname'] = $surname;
                $_SESSION['userID'] = $userID;
                $_SESSION['accessLevel'] = $access;
                $_SESSION['access'] = true;

                echo "success";
            }
            else
            {
                $_SESSION['access'] = false;
                $response = "Wrong username/password combination";
                echo $response;
            }
        }
        //Close database connection
        mysqli_close($DBConnect);
    }
?>