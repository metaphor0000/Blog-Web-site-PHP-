<?php

if(isset($_GET['status'])){
    if(isset($_GET['status'])=='editpost'){
        $id = $_GET['id'];
        $postdata = $obj->get_post_info($id);
    }
}

if(isset($_POST['uppost_btn'])){
    $msg = $obj->edit_post($_POST);
}
?>

<div class="shadow p-5 m-5">
    <?php if(isset($msg)){ echo $msg; } ?>
    <form action="" method="post" class="form">
        <input type="hidden" name="edittitle_id" value="<?php echo $id;?>">
    <div class="form-group">
        <label class="mb-1" for="edit_title">Edit Title</label><br>
        <input value="<?php echo $postdata['post_title'] ?>" class="form-control" name="edit_title" class="py-4" id="edit_title" type="text" />
    </div>
    <div class="form-group">
        <label class="mb-1" for="edit_content">Edit Content</label><br>
        <textarea class="form-control" name="edit_content" id="edit_content" cols="30" rows="10">
        <?php echo $postdata['post_content'] ?>
        </textarea>    
    </div>
    <input type="submit" value="Update Post" name="uppost_btn" class="btn btn-primary">

    </form>
</div>

