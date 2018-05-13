<?php 

    class User{

        public $id;
        public $username;
        public $password;
        public $first_name;
        public $last_name;


        private function hasTheAttribute($theAttribute){
            $objectProps = get_object_vars($this);
            //check if theAttribute exists in objectProps -> array
            //then return true or false
            return array_key_exists($theAttribute, $objectProps);
        }

        public static function instantiation($theRecord){
            $theObject = new self;

            // $theObject->id = $foundUser['id'];
            // $theObject->username = $foundUser['username'];
            // $theObject->password = $foundUser['password'];
            // $theObject->first_name = $foundUser['first_name'];
            // $theObject->last_name = $foundUser['last_name'];
            
            foreach ($theRecord as $theAttribute => $value) {
                if($theObject->hasTheAttribute($theAttribute)){
                    $theObject->$theAttribute = $value;
                }   
            }

            return $theObject;
        }

        public static function getAllUsers(){
            return self::findThisQuery("SELECT * FROM users");
        }


        public static function getUserById($id){
            $resultArray = self::findThisQuery("SELECT * FROM users WHERE id= $id LIMIT 1");

            return !empty($resultArray) ? array_shift($resultArray) : false;
            // if(!empty($resultArray)){
            //     $firstItem = array_shift($resultArray);
            //     return $firstItem
            // }else{
            //     return false;
            // }         
        }

        public static function findThisQuery($sql){
            global $database;
            $resultSet = $database->query($sql);
            $objectArray = array();

            while ($row = mysqli_fetch_array($resultSet)) {
                $objectArray[] = self::instantiation($row);
            }

            return $objectArray;
        }

        public static function verifyUser($username, $password){
            global $database;
            $username = $database->escapeString($username);
            $password = $database->escapeString($password);

            $sql = "SELECT * FROM users WHERE ";
            $sql .= "username = '{$username}' ";
            $sql .= "AND password = '{$password}' LIMIT 1";

            $resultArray = self::findThisQuery($sql);

            return !empty($resultArray) ? array_shift($resultArray) : false;
        }

    }
?>