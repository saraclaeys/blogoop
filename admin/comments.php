<?php include ("includes/header.php"); ?>

<?php
if (!$session->is_signed_in()){
    redirect('login.php');
}

$comments = Comment::find_all();
?>

<?php include ("includes/sidebar.php"); ?>

<?php include ("includes/content-top.php"); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2 class="page-header">
                COMMENTS
            </h2>
            <a href="add_comment.php" class="btn btn-primary rounded-0"><i class="fas fa-comment"></i>Add Comment</a>
            <table class="table table-header">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Author</th>
                    <th>body</th>
                    <th>Delete?</th>
                </tr>
                </thead>
                <tbody>
                <!-- start foreach -->
                <?php
                foreach ($comments as $comment):
                    ?>

                    <tr>
                        <td>
                            <?php echo $comment->id; ?>
                        </td>
                        <td>
                            <?php echo $comment->author; ?>
                        </td>
                        <td>
                            <?php echo $comment->body; ?>
                        </td>
                        <td>
                            <a href="delete_comment.php?id= <?php echo $comment->id; ?>" class="btn btn-danger rounded-0">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>

                <?php endforeach; ?>
                <!-- einde foreach -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include ("includes/footer.php"); ?>
