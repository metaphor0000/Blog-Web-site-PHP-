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
        $admin_email = $data['admin_email'];
        $admin_pass = md5($data['admin_pass']);

        $query = "select * from admin_info where admin_email='$admin_email' && admin_pass='$admin_pass'";

        if(mysqli_query($this->conn,$query)){
            $admin_info = mysqli_query($this->conn,$query);

            if($admin_info){
                header("location:dashboard.php");
                $admin_info = mysqli_query($this->conn,$query);
                $admin_data = mysqli_fetch_assoc($admin_info);
                session_start();
                $_SESSION['adminID']=$admin_data['id'];
                $_SESSION['adminName']=$admin_data['admin_name'];
            }
        }
    }

    public function adminLogout(){
        unset($_SESSION['adminID']);
        unset($_SESSION['adminName']);
        header('location:index.php');
    }

    public function add_cat($data){
        $cat_name = $data['cat_name'];
        $cat_des = $data['cat_des'];

        $query="insert into category(cat_name,cat_des) values('$cat_name','$cat_des')";

        if(mysqli_query($this->conn,$query)){
            return "Inserted";
        }
    }

    public function display_cat(){
        
        $query="select * from category";

        if(mysqli_query($this->conn,$query)){
            $category = mysqli_query($this->conn,$query);
            return $category;
        }
    }

    public function deleteCat($id){
        $query = "DELETE FROM category WHERE cat_id=$id";

        if (mysqli_query($this->conn, $query)) {
            return "Category Deleted"; 
        } else {
            return "Error deleting data: " . mysqli_error($this->conn);
        }
    }

}

?>