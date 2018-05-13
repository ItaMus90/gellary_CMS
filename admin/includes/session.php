<?php

class Session{
    private $isSignedIn = false;
    public $userId;

    function __construct(){
        session_start();
        $this->checkTheLogin();
    }

    private function checkTheLogin(){
        if(isset($_SESSION['user_id'])){
            $this->userId = $_SESSION['user_id'];
            $this->isSignedIn = true;
        }else{
            unset($this->userId);
            $this->isSignedIn = false;
        }
    }

    public function isSignedIn(){
        return $this->isSignedIn;
    }

    public function login($user){
        if($user){
            $this->userId = $_SESSION['user_id'] = $user->id;
            $this->isSignedIn = true;
        }
    }

    public function logout(){
        unset($_SESSION['user_id']);
        unset($this->userId);
        $this->isSignedIn = false;
    }
}

$session = new Session();

?>