<?php include("admin/class/function.php");
    $obj = new AdminBlog();
    $getcat= $obj->display_cat();

    if(isset($_GET['view'])){
        if($_GET['view'] == 'postview'){
            $id = $_GET['id'];
            $single = $obj->get_post_info($id);
        }
    }
?>

<?php include_once("includes/head.php"); ?>

<body>
    <?php include_once("includes/preloader.php"); ?>

    <?php include_once("includes/header.php"); ?>


    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <?php include_once("includes/banner.php"); ?>

    <!-- Banner Ends Here -->

    <?php include_once("includes/cta.php"); ?>

    <section class="blog-posts">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                <h1>Single Post Page</h1>
                <h2><?php echo $single['post_title'];?></h2>
                <img src="upload/<?php echo $single['post_img'];?>" alt="Not Available" class="img-fluid">
                <p>
                <?php echo $single['post_content'];?>
                </p>
                </div>
                <?php include_once("includes/sidebar.php"); ?>

            </div>
        </div>
    </section>

    <?php include_once("includes/footer.php"); ?>
    <?php include_once("includes/script.php"); ?>