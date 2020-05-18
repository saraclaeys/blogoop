<?php include ('includes/header.php'); ?>
<?php include ('includes/sidebar.php'); ?>
<?php include ('includes/content-top.php'); ?>

<?php
// inloggen
if (!$session->is_signed_in()){
    redirect('login.php');
}

// upload
$message = "";
if (isset($_POST['submit'])){
    $photo = new Photo();
    $photo->title = $_POST['title'];
    $photo->set_file($_FILES['file']);

    if ($photo->save()){
        $message = "Photo uploaded succesfully";
    } else {
        $message = join("<br>", $photo->errors);
    }
}

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1 class="page-header">
                UPLOAD
            </h1>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <input type="file" name="file" class="form-control">
                </div>
                <input type="submit" value="submit" name="submit" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>

<?php include ('includes/footer.php'); ?>
