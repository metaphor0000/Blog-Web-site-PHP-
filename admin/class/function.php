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

    public function add_post($data){
        $post_title = $data['post_title'];
        $post_content = $data['post_content'];
        $post_img = $_FILES['post_img']['name'];
        $post_img_tmp = $_FILES['post_img']['tmp_name'];
        $post_ctg = $data['post_cats'];
        $post_summary = $data['post_summary'];
        $post_tag= $data['post_tag'];
        $post_status= $data['post_status'];


        $query = "INSERT INTO posts(post_title,post_content,post_img,
        post_ctg,post_author,post_date,post_comment_count,post_summary,
        post_tag,post_status) 
        VALUE('$post_title','$post_content','$post_img',$post_ctg,
        'Admin',now(),3,'$post_summary','$post_tag',$post_status)";

        if(mysqli_query($this->conn, $query)){
            move_uploaded_file($post_img_tmp, '../upload/'.$post_img);
            return "Post Added Successfully";
        }
    }

    public function display_post(){
        
        $query="SELECT * FROM `new_view` ";

        if(mysqli_query($this->conn,$query)){
            $posts = mysqli_query($this->conn,$query);
            return $posts;
        }
    }

    public function display_public_post(){
        
        $query="SELECT * FROM new_view ";

        if(mysqli_query($this->conn,$query)){
            $posts = mysqli_query($this->conn,$query);
            return $posts;
        }
    }

    public function edit_img($data){
        $id = $data['editimg_id'];
        $img_name = $_FILES['change_img']['name'];
        $tmp_name = $_FILES['change_img']['tmp_name'];
        


        $query = "update posts set post_img='$img_name' where post_id=$id";

        if(mysqli_query($this->conn, $query)){
            move_uploaded_file($tmp_name, '../upload/'.$img_name);
            return "Post Added Successfully";
        }
    }

    public function edit_post($data){
        $id = $data['edittitle_id'];
        $post_title = $data['edit_title'];
        $post_content = $data['edit_content'];
        
        $query = "update posts set post_title='$post_title',post_content='$post_content'
         where post_id=$id";

        if(mysqli_query($this->conn, $query)){
            return "Post Added Successfully";
        }
    }

    public function del_post($id){
        $query = "DELETE FROM posts WHERE post_id=$id";

        if (mysqli_query($this->conn, $query)) {
            return "Category Deleted"; 
        } else {
            return "Error deleting data: " . mysqli_error($this->conn);
        }
    }

    public function get_post_info($id){
        
        $query="SELECT * FROM new_view where post_id=$id ";

        if(mysqli_query($this->conn,$query)){
            $postinfo = mysqli_query($this->conn,$query);
            $post = mysqli_fetch_assoc($postinfo);
            return $post;
        }
    }



}

?>