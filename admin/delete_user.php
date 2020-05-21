<?php include('includes/header.php');?>

<?php

if (!$session->is_signed_in()) {
    redirect('login.php');
}

if (empty($_GET['id'])) {
    redirect('users.php');
}

$user = User::find_by_id($_GET['id']);

if ($user) {
    $user->delete();
    redirect('users.php');
} else {
    redirect('users.php');
}

?>

<?php include('includes/sidebar.php'); ?>
<?php include('includes/content-top.php'); ?>

<h1>Welkom op de delete user pagina</h1>

<?php include('includes/footer.php'); ?>
