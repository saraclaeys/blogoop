<?php include('includes/header.php'); ?>

<?php
$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
$items_per_page = 4;
$items_total_count = Photo::count_all();

$paginate = new Paginate($page, $items_per_page, $items_total_count);

$sql = "SELECT * FROM photo";
$sql .= "LIMIT {$items_per_page} ";
$sql .= "OFFSET {$paginate->offset()}";

$photos = Photo::find_this_query($sql);
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

        <div class="row">
            <ul class="pager">
                <?php
                    if ($paginate->page_total()>1){
                        if ($paginate->has_next()){
                            echo "<li class='next'<a href='index.php?page={$paginate->next()}'>Next</a></li>";
                        }
                        for ($i = 1; $i <= $paginate->page_total(); $i++) {
                            if ($i == $paginate->current_page) {
                                echo "<li class='active'><a href='index.php?page={$li}'> </a></li>";
                            }
                        }
                        if ($paginate->has_previous()){
                            echo "<li class='previous'><a href='index.php?page={$paginate->previous()}'>Previous</a></li>";
                        }
                    }

                    ?>
            </ul>
        </div>

    </div>
</div>

<?php include ('includes/footer.php'); ?>