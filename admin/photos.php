<?php include('includes/header.php'); ?>

<?php
if (!$session->is_signed_in()) {
    redirect('login.php');
}
$photos = Photo::find_all();
?>

<?php include('includes/sidebar.php'); ?>
<?php include('includes/content-top.php'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2 class="page-header">
                PHOTOS
            </h2>
            <table class="table table-header">
                <thead>
                <tr>
                    <th>Photo</th>
                    <th>Id</th>
                    <th>Title</th>
                    <th>File</th>
                    <th>Size</th>
                    <th>Delete?</th>
                </tr>
                </thead>
                <tbody>

                <?php
                foreach ($photos as $photo):
                    ?>

                    <tr>
                        <td>
                            <img src="<?php echo $photo->picture_path(); ?>" height="62" width="62" alt="">
                        </td>
                        <td>
                            <?php echo $photo->photo_id; ?>
                        </td>
                        <td>
                            <?php echo $photo->title; ?>
                        </td>
                        <td>
                            <?php echo $photo->filename; ?>
                        </td>
                        <td>
                            <?php echo $photo->size; ?>
                        </td>
                        <td>
                            <a href="delete_photo.php?id= <?php echo $photo->photo_id; ?>" class="btn btn-danger rounded-0">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>

                <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
