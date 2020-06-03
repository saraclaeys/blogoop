<?php include("includes/header.php"); ?>
<?php
if (!$session->is_signed_in()){
    redirect("login.php");
}
?>

<?php include("includes/sidebar.php"); ?>

<?php include("includes/content-top.php"); ?>

<?php include("includes/content.php"); ?>

<?php include("includes/footer.php"); ?>
