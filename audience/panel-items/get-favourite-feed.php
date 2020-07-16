<?php
 $currentUser= $_SESSION['user_profile_id'];
$page = filter_input(INPUT_GET, 'page');
if (!$page) {
    $page = 1;
}
$pagelimit = 30;
$order_by = 'id';
$order_dir = 'Desc';
$db = getDbInstance();
$db->orderBy($order_by, $order_dir);
$db->pageLimit = $pagelimit;
$db->where('f.user_id', $currentUser);
$db->join("posts p", "p.post_id=f.post_id", "LEFT");
$db->join("auth_users u", "p.created_by=u.user_id", "LEFT");
$posts=$db->orderBy('p.created_at','DESC')->get('favourite_posts f'); 

$total_pages = $db->totalPages;

?>

<div style="overflow-y:scroll; height:750px;" id="scrollable-element" class="row ">
    <?php foreach ($posts as $post):?>    
    <?php $isFavPost= isFavourite($post["post_id"]);?>
        <div class="col-md-3">
            <div class="border border-white bg-white mb-3 rounded card-body ">
            <p class="text-right mb-0 mt-0 pb-0"><a <?php echo ($isFavPost)? 'data-state="fav"' : 'data-state="non-fav"' ?> 
            data-postId="<?php echo $post["post_id"];?>" href="#" 
            id="toggle-favourite" class="text-danger"> <?php echo ($isFavPost)? '<i class="fa fa-heart"></i>' : '<i class="bx bx-heart"></i>' ?></a>
            </p>
            
            <div>
                <h2 class="mr-3 text-black mb-0 text-uppercase"><a href="post.php?id=<?php echo $post["post_id"];?>"><?php echo $post["post_title"];?></a></h2>  
                <span class="subadge"> <?php echo $post["user_name"];?></span>
            </div>
            <p style="height:120px;" class="text-justify overflow-hidden mb-2">
            <?php echo $post["post_description"];?>
            </p>
            <div class="mb-3  d-flex">
                    <div class="d-flex  align-items-center text-muted">
                    <span class="bx bx-download  text-primary"></span>
                    <span class="ml-1 text-primary"><?php echo $post["downloads"];?></span>
                    </div>
                    <div class="d-flex ml-2 align-items-center text-muted">
                    <span class="bx bx-heart text-danger"></span>
                    <span class="ml-1 text-danger">100</span>
                    </div>
            </div>
                <form method="post" action="download.php">
                    <input type="text" hidden value="<?php echo encrypt($post["post_id"])?>" name="mcrypt_encrypt">
                    <button class="btn btn-block rounded btn-outline-primary download-file">Download</button>
                </form>

            </div>
        </div>
    <?php endforeach; ?>
</div>

<div class="text-center">
    <?php echo paginationLinks($page, $total_pages, 'getFavourites.php'); ?>
</div>
