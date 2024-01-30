<?php
    session_start();
    include('../config/dbconn.php');
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
            
        $user=$_POST['username'];
        $pass=$_POST['password'];

        date_default_timezone_set('Asia/Kuala_Lumpur');
        $date = date("Y-m-d H:i:s");            


        $query=mysqli_query($dbconn,"SELECT * FROM `users` WHERE username='$user' AND password='$pass'");
        $res=mysqli_fetch_array($query);
        $id=$res['user_id'];

        if (mysqli_num_rows($query)<1)
        {
            $_SESSION['msg']="Login Failed, User not found!";
            header('Location:user_login_page.php');
        }

        else
        {
            $res=mysqli_fetch_array($query);
            $_SESSION['id']=$res['user_id'];
            header('Location: user_index.php');
            
            $_SESSION['id']=$id;
            $remarks="has logged in the system at ";  
            mysqli_query($dbconn,"INSERT INTO logs(user_id,action,date) VALUES('$id','$remarks','$date')")or die(mysqli_error($dbconn));
            }
        }
?>
