<?php

$posts = $obj->display_post();

?>
<H1>MANAGE POST</H1>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Thumbnail</th>
                <th>Author</th>
                <th>Date</th>
                <th>Category</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($postdata=mysqli_fetch_assoc($posts)){ ?>
            <tr>
                <td><?php echo $postdata['post_id'];?></td>                
                <td><?php echo $postdata['post_title'];?></td>
                <td><?php echo $postdata['post_content'];?></td>
                <td><img height="100px" src="../upload/<?php echo $postdata['post_img'];?>" alt="No Image Found"></td>
                <td><?php echo $postdata['post_author'];?></td>
                <td><?php echo $postdata['post_date'];?></td>
                <td><?php echo $postdata['cat_name'];?></td>
                <td><?php if($postdata['post_status']==1){ echo "Published"; }else{ echo "Not Published"; }?></td>
                <td>
                    <a class="btn btn-primary" href="">Edit</a>
                    <a class="btn btn-danger" href="">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>