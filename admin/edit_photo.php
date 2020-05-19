<?php include('includes/header.php'); ?>

<?php
if (!$session->is_signed_in()) {
    redirect('login.php');
}

// $photos = Photo::find_all();
if (empty($_GET['id'])) {
    redirect('photos.php');
} else {
    $photo = Photo::find_by_id($_GET['id']);
    if(isset($_POST['update'])){
        if ($photo){
            $photo->title = $_POST['title'];
            $photo->caption = $_POST['caption'];
            $photo->description = $_POST['description'];
            $photo->alternate_text = $_POST['alternate_text'];
            $photo->type = $_POST['type'];
            $photo->size = $_POST['size'];
            $photo->update();
        }
    }
}

?>

<?php include('includes/sidebar.php'); ?>
<?php include('includes/content-top.php'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2 class="page-header">
                Welkom op de edit photo pagina
            </h2>
            <form action="edit_photo.php" method="post">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="caption">Caption</label>
                        <input type="text" name="caption" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="alternate_text">Alternate text</label>
                        <input type="text" name="alternate_text" class="form-control">
                    </div>
                    <div class="form-group"><label for="description">Description</label>
                        <textarea name="form-control" name="description" id="" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="photo-info-box">
                        <div class="info-box-header">
                            <h4>Save <span id="toggle" class="fas fa-arrow-up"></span></h4>
                        </div>
                        <div class="inside">
                            <div class="box-inner">
                                <p class="text">
                                    <span class="fas fa-calendar">Uploaded on: April, 15, 2019 @ 7:54</span>
                                </p>
                                <p class="text">
                                    Photo id: <span class="data photo_id_box">34</span>
                                </p>
                                <p class="text">
                                    Filename: <span class="data">image.jpg</span>
                                </p>
                                <p class="text">
                                    File Type: <span class="data">JPG</span>
                                </p>
                                <p class="text">
                                    File Size: <span class="data">3547458</span>
                                </p>
                            </div>
                            <div class="info-box-footer float-left">
                                <div class="info-box-delete pull-left">
                                    <a href="delete_photo.php?id=<?php echo $photo->id; ?>"
                                       class="btn btn-danger btn-lg">Delete</a>
                                </div>
                                <div class="info-box-update float-right">
                                    <input type="submit" name="update" value="update" class="btn btn-primary btn-lg">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
