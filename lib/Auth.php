<?php

class Auth
{
    public static function check()
    {
        global $conn;
        if (!isset($_SESSION)) {
            session_start();
        }
        $username = $_SESSION['username'];
        $password = $_SESSION['password']; 

        $sql = "SELECT id FROM admins WHERE username = '$username' and password = '$password'";

        $result = $conn->query($sql);

        if(!$result->num_rows > 0) {
            header("location: login.php");
        }

        
    }

    public static function login()
    {
        global $conn;
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            // username and password sent from form 
            
            $username = mysqli_real_escape_string($conn,$_POST['username']);
            $password = mysqli_real_escape_string($conn,$_POST['password']); 

            $password = md5($password);

            $sql = "SELECT id FROM admins WHERE username = '$username' and password = '$password'";

            $result = $conn->query($sql);

            if($result->num_rows > 0) {
                if (!isset($_SESSION)) {
                    session_start();
                }
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
               
               header("location: index.php");
            }else {
               return [
                   'error' => "Your Login Name or Password is invalid"
               ];
            }
        }
    }
}
