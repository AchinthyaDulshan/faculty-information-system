<?php
    session_start();
    include "db_connection.php";

    // get the entered username and password 
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        // error codes
        // 1 --> username is empty
        // 2 --> password is empty
        // 3 --> username or password incorrect

        if (empty($username)) {
            header("Location:/FIS/index.html?error=1");
            exit();
        } else if(empty($password)){
            header("Location:/FIS/index.html?error=2");
            exit();
        }else{
            $sql = "SELECT * FROM user_student WHERE username='".$username."'AND password='".$password."';";
            $result = mysqli_query($conn,$sql);
            
            if(mysqli_num_rows($result) === 1){
                $row = mysqli_fetch_assoc($result);
                if ($row['username'] == $username && $row['password'] == $password) {
                    
                    $_SESSION['username'] = $row['username'] ;
                    $_SESSION['id'] = $row['id'] ;
                    $_SESSION['studentId'] = $row['student_details_id'] ;

                    header("Location:../pages/dashboard.php");
                    exit();
                } else {
                    header("Location:/FIS/index.html?error=3");
                    exit();
                }
            }else{
                header("Location:/FIS/index.html?error=3");
                exit();
            }
        }
        
    }else{
        header("Location:/FIS/index.html");
        exit();
    }
    
?>