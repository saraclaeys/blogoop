<?php include('includes/header.php'); ?>

<?php
$photos = Photo::find_all();
?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Homepagina: photos</h1>
                <?php foreach ($photos as $photo): ?>
                    <div class="col-3">
                        <a href="photo.php?id= <?php echo $photo->id; ?> ">
                            <img src="<?php echo 'admin' . DS . $photo->picture_path(); ?>" alt="" class="img-fluid">
                        </a>
                    </div>

                <?php endforeach; ?>

            </div>
        </div>
    </div>

<?php include('includes/footer.php'); ?>