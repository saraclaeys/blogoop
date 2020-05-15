<?php include ('includes/header.php'); ?>
<?php include ('includes/sidebar.php'); ?>
<?php include ('includes/content-top.php'); ?>
<div class="container-field">
    <div class="row">
        <div class="col-12">
            <h1 class="page-header">UPLOAD</h1>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title"></label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <input type="file" name="submit" value="submit" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
<?php include ('includes/footer.php'); ?>
