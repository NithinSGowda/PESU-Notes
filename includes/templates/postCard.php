<div class="col-md-12 ftco-animate">
    <div class="job-post-item p-4 d-block d-lg-flex align-items-center">
        <div class="one-third mb-4 mb-md-0">
            <div class="job-post-item-header align-items-center">
                <span class="subadge"><?php echo $row["post_subject"];?></span>
                <h2 class="mr-3 text-black"><a href="#"><?php echo $row["post_title"];?></a></h2>
            </div>
            <div class="job-post-item-body d-block d-md-flex">
                <div class="mr-3"><span class="bx bx-download"></span><span class="number">  354</span> <span> Downloads</span></div>
                <div><span class="bx bx-user"></span> <span> <?php echo $row["created_by"];?></span></div>
            </div>
        </div>
        <div class="one-forth ml-auto d-flex align-items-center mt-4 md-md-0">
            <a href="<?php echo $row["file_url"];?>" class="btn btn-primary py-2">Download</a>
        </div>
    </div>
</div>