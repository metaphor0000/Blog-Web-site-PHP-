<?php 
$posts = $obj->display_public_post();
?>

<div class="col-lg-8">
    <div class="all-blog-posts">
        <div class="row">
        <?php while($postdata = mysqli_fetch_assoc($posts)){ ?>
            <div class="col-lg-12">
                <div class="blog-post">
                    <div class="blog-thumb">
                        <img src="upload/<?php echo $postdata['post_img'];?>" alt="No Image Found">
                    </div>
                    <div class="down-content">
                        <span><?php echo $postdata['cat_name'];?></span>
                        <a href="post-details.php?post_id=<?php echo $postdata['post_id']; ?>">
                            <h4><?php echo $postdata['post_title'];?></h4>
                        </a>
                        <ul class="post-info">
                            <li><a href="#"><?php echo $postdata['post_author'];?></a></li>
                            <li><a href="#"><?php echo date('M d, Y', strtotime($postdata['post_date']));?></a></li>
                            <li><a href="#"><?php echo $postdata['post_comment_count'];?></a></li>
                        </ul>
                        <p><?php echo $postdata['post_summary'];?></p>
                    </div>
                </div>
            </div>
        <?php } ?>    
        </div>
    </div>
</div>
