  

                    

<?php
$str_data = file_get_contents("/var/www/pesu/docs/subjects.json");
$branch=strtoupper($_SESSION['user_branch']);
$data = json_decode($str_data,true);
$data =$data[$branch][$_SESSION['user_semester']];
?>
<!-- DEFAULT -->
<div class="row py-3 card border-bottom mb-2 rounded shadow ">
    <div class="col-12 d-flex align-items-center ">   
        <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
            <i class='bx bx-detail'></i>
        </div>
        <span class="pl-2">Latest</span>
    </div>
    <a href="/audience/" class=" stretched-link"></a>
</div>

<?php foreach ($data as $subject):?>     
    <div class="row py-3 card  border-bottom mb-2 rounded shadow ">
    <div class="col-12 d-flex align-items-center ">   
        <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
            <i class='bx bx-file'></i>
        </div>
        <span class="pl-2"><?php echo $subject?></span>
    </div>
    <a href="/audience/getfeedfor.php?subject=<?php echo $subject?>" class=" stretched-link"></a>
</div>
<?php endforeach;
?>
