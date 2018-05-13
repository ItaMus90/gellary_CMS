<?php require_once("init.php");?>

<?php

    if($session->isSignedIn()){
        redirect("index.php");
    }

    if(isset($_POST['submit'])){
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        
        //Method to check database user
        $userFound = User::verifyUser($username, $password);


        if($userFound){
            $session->login($userFound);
            redirect("index.php");
        }else{
            $message = "Your password or username are incorrect";
        }
    }else{ //if isset
        $username = "";
        $password = "";
    }

?>