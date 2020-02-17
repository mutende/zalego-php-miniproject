<?php 
session_start();

include_once('dbconnection.php');

function duplicateUsers($email, $dbc){
    $search="SELECT * FROM `users` WHERE `email`= ?";
    $pre = $dbc->prepare($search);
    $pre->execute([$email]);
    $rows=$pre->rowCount();
    if ($rows>0) {
        return true;
    }else{
        return false;
        }
    }

    function registerUsers($fullname,$email,$phone,$password,$dbc){

        $hashed_password = password_hash($password,PASSWORD_DEFAULT);

        $insert = "INSERT INTO `users` (fullname, email, phone,password, date)
        VALUES (?, ?, ?, ?,?)";

        $pre = $dbc->prepare($insert);
        

        if(duplicateUsers($email,$dbc) === true){

            $_SESSION["Error"] = "User with that email already exist";
            header("Location:../signup.php");        
            
            
        }else{
            if($pre->execute([$fullname,$email,$phone,$hashed_password,date('Y-m-d H:i:s')])){                

                $_SESSION["success"] = "Account created Successfully. Login!!";
                header("Location:../login.php");

            }else{
                $serror = 'Error during signup.. try again later';
            
                $_SESSION['Error']= $serror;
                header("Location:../signup.php");   
            }
        }
    }


    function loginUser($email, $password, $pdo){
        $get_user = "SELECT `email`, `password`, `fullname` FROM users WHERE email = ? ";
        $stmt = $pdo->prepare($get_user);
        $stmt->execute([$email]);
        $rows=$stmt->rowCount();
        if ($rows <= 0) {
            $_SESSION["Error"] = "username or password incorrect.";
            header("Location:../login.php");
        }else{

            if($row = $stmt->fetch()){                   

            $verifyPass = password_verify($password, $row->password);
    
            if($verifyPass){
                session_start();
                $_SESSION['email']= $row->email;
                $_SESSION['name'] = $row->fullname;                
                header('location: ../student');

                }else{

                $_SESSION["Error"] = "username or password incorrect.";
                header("Location:../login.php");

                }
            }else{

                $_SESSION["Error"] = "Unable to get password";
                header("Location:../login.php");

            }
        }
    }


    function logout(){
        session_start();
        if(session_destroy()){
            header('location: ../');
        }
        
    }


    if(isset($_POST['signup'])){
        $fname = $_POST['fname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];

      
        if(empty($fname) || empty($phone) || empty($email) || empty($password)){

            $_SESSION["Error"] = "Some fields are empty";
            header("Location:../signup.php");

        }else{

            registerUsers($fname,$email,$phone,trim($password), $pdo);

        }

        
    }

    if(isset($_POST['login'])){

        $email = $_POST['email'];
        $password = $_POST['password'];

        if(empty($email) || empty($password)){

            $_SESSION["Error"] = "Some fields are empty";

            header("Location:../login.php");

        }else{

            loginUser($email, trim($password), $pdo);

        }
        

    }

    if(isset($_GET['logout'])){
        logout();
    }