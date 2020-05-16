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
            <h2>PHOTOS</h2>
            <table class="table table header">
                <thead>
                <tr>
                    <th>Photo</th>
                    <th>Id</th>
                    <th>Title</th>
                    <th>File</th>
                    <th>Size</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
