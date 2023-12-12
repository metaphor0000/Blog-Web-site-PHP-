<?php
Class AdminBlog {
    private $conn;

    public function __construct(){
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "blogproject";

        $this->conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

        if (!$this->conn) {
            die("Database Connection Error: " . mysqli_connect_error());
        }
    }

    public function admin_login($data){
        
    }

}

?>