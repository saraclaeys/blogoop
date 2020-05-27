<?php
include ('includes/header.php');
/*if(!$session->is_signed_in()){
    redirect('login.php');
}*/

$users = User::find_all();
?>
<?php
include ('includes/sidebar.php');
include ('includes/content-top.php');
?>

    <!-- hier komt het overzicht van alle foto's -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>USERS</h2>
                <a href="add_user.php" class="btn btn-primary rounded-0"><i class="fas fa-user-plus"></i> Add User</a>
                <table class="table table-header">
                    <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Id</th>
                        <th>Username</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Edit?</th>
                        <th>Delete?</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- start foreach -->
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><img src="<?php echo $user->image_path_and_placeholder(); ?>" height="40" width="40"></td>
                            <td><?php echo $user->id; ?></td>
                            <td><?php echo $user->username; ?></td>
                            <td><?php echo $user->first_name; ?></td>
                            <td><?php echo $user->last_name; ?></td>
                            <td><a href="edit_user.php?id=<?php echo $user->id; ?>" class="btn btn-danger rounded-0"><i class="fas fa-edit"></i></a></td>
                            <td><a href="delete_user.php?id=<?php echo $user->id; ?>" class="btn btn-danger rounded-0"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                    <!-- einde foreach -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php
include ('includes/footer.php');
?>