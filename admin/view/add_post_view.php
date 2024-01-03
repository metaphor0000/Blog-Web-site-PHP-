<?php
//include("class/function.php");
$catItem = $obj->display_cat();

if(isset($_POST['add_post'])){
    $msg = $obj->add_post($_POST);
}

?>
<h1>ADD POST</h1>
<?php if(isset($msg)){echo $msg;} ?>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label class="mb-1" for="post_title">Post Title</label>
        <input name="post_title" class="form-control py-4" id="post_title" type="text" />
    </div>
    <div class="form-group">
        <label class="mb-1" for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="post_content" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group">
        <label class="mb-1" for="post_img">Upload Thumbnail</label><br>
        <input name="post_img" class="py-4" id="post_img" type="file" />
    </div>
    <div class="form-group">
        <label class="mb-1" for="post_cats">Post Category</label>
        <select class="form-control" name="post_cats" id="post_cats">
            <?php while ($cat = mysqli_fetch_assoc($catItem)) { ?>
                <option value="<?php echo $cat['cat_id']; ?>">
                    <?php echo $cat['cat_name']; ?>
                </option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label class="mb-1" for="post_summary">Post Summary</label>
        <input name="post_summary" class="form-control py-4" id="post_summary" type="text" />
    </div>
    <div class="form-group">
        <label class="mb-1" for="post_tag">Post Tags</label>
        <input name="post_tag" class="form-control py-4" id="post_tag" type="text" />
    </div>
    <div class="form-group">
        <label class="mb-1" for="post_status">Post Status</label>
                <select class="form-control" name="post_status" id="post_status">
                    <option value="1">Published</option>
                    <option value="0">Not Published</option>
                </select>
    </div>
   
    <input type="submit" name="add_post" value="Add Post" class="form-control btn btn-block btn btn-success">
</Form>