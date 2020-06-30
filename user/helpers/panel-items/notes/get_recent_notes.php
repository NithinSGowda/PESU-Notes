<!-- GET RECENT 8 NOTES -->
<?php require_once '/var/www/pesu/libraries/config/config.php';?>
<?php
    $pagelimit = 8;
    $order_by = 'created_at';
    $order_dir = 'Desc';
    $db_notes = getDbInstance();
    $select = array('post_id', 'post_title', 'post_semester','file_url','post_subject','downloads','post_likes');
    $db_notes->orderBy($order_by, $order_dir);
    $db_notes->pageLimit = $pagelimit;
    $db_notes->where('created_by', $user_id );
    $notes = $db_notes->arraybuilder()->paginate('posts', 1, $select);
    $total_pages = $db_notes->totalPages;
?>
<div class="card">
    <div class="card-header border-0">
        <div class="row align-items-center">
        <div class="col">
            <h3 class="mb-0">Notes</h3>
        </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                <th scope="col">Notes name</th>
                <th scope="col">Semester/Subject</th>
                <th scope="col">Likes</th>
                <th scope="col">Downloads</th>
                <th scope="col">Actions</th>

                </tr>
            </thead>
            <tbody>
            <?php foreach ($notes as $note): ?>
                <tr>
                    <th scope="row"><?php echo $note['post_title']; ?></th>
                    <td><?php echo $note['post_semester'] .' / ' . $note['post_subject']; ?></td>
                    <td> <?php echo $note['post_likes']; ?></td>
                    <td><i class="fas fa-arrow-up text-success mr-3"></i> <?php echo $note['downloads']; ?></td>
                    <td>
                    <a href="#"  class="btn btn-outline-danger btn-sm " data-toggle="modal" data-target="#confirm-delete-<?php echo $note['post_id']; ?>"><i class="fa fa-trash"></i></a>
                    
                    </td>
                </tr>

                <!-- DELETE POST -->
                <div class="modal fade" id="confirm-delete-<?php echo $note['post_id']; ?>" role="dialog">
                <div class="modal-dialog">
                    <form action="/user/helpers/panel-items/notes/delete.php" method="POST">
                        <!-- Modal content -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title">Deleting <?php echo $note['post_title']; ?> </h3>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="del_post_id"  value="<?php echo $note['post_id']; ?>">
                                <input type="hidden" name="del_post_file"  value="<?php echo $note['file_url']; ?>">

                                <p>Are you sure you want to proceed with this action?</p>
                                <i class="fa fa-arrow-alt-circle-right"></i>
                                Deleting <?php echo $note['post_title']; ?>
                            </div>
                            <div class="modal-footer">
                                <button type="submit"  class="btn btn-danger pull-left"> <i class="fa fa-trash"></i> &nbsp;Yes</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


             <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>