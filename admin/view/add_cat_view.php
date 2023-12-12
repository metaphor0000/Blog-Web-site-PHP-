<?php
    if(isset($_POST['add_cat'])){
        $ret_msg = $obj->add_cat($_POST);
    }
?>

<h1>ADD CATEGORY</h1>
<?php if(isset($ret_msg)){ echo "Successfully Added";} ?>
<form action="" method="POST">
    <div class="form-group">
        <label class="mb-1" for="cat_name">Category Name</label>
        <input name="cat_name" class="form-control py-4" id="cat_name" type="text" />
    </div>
    <div class="form-group">
        <label class="mb-1" for="cat_des">Category Description</label>
        <input name="cat_des" class="form-control py-4" id="cat_des" type="text" />
    </div>
    <input type="submit" name="add_cat" value="Add Category" class="form-control btn btn-block btn btn-success">
</Form>