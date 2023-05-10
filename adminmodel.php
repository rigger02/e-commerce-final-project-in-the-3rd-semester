<?php
    class admin{
        protected $username;
        protected $password;

        protected function getdata(){
            include 'database.php';

            $query = mysqli_query($konek, "SELECT * FROM buat_admin WHERE username ='".$this->username."' AND password = '".$this->password."'  ");
            $result = $query->fetch_assoc();

            if($result){
                if(password_verify($this->password, $result['password']))
                $result = $result;
            }else {
                $result = false;
            }

            return $result;

        }

    }

    class kuasa extends admin{
        public function __construct($username, $password){
            $this->username = $username;
            $this->password = $password;
        }

        public function getuser(){
            return $this->getdata();

        }

        
    }
?>