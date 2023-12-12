<?php
    $catdata = $obj->display_cat();

    if(isset($_GET['status'])){
        if($_GET['status'] == 'delete'){
            $delete_id = $_GET['id'];
            $del_msg = $obj->deleteCat($delete_id);
        }
    }
?>

<h1>MANAGE CATEGORY PAGE</h1>
<?php if(isset($del_msg)){echo $del_msg;} ?>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Category Name</th>
            <th>Category Description</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
    <?php while($cat=mysqli_fetch_assoc($catdata)){ ?>
        <tr>
            <td><?php echo $cat['cat_id'] ?></td>
            <td><?php echo $cat['cat_name'] ?></td>
            <td><?php echo $cat['cat_des'] ?></td>
            <td>
                <a href="" class="btn btn-success">Edit</a>
                <a href="?status=delete&&id=<?php echo $cat['cat_id'] ?>" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>