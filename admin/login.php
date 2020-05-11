<?php
require_once("includes/header.php");
?>

<?php
$the_message = '';
if ($session->is_signed_in()) {
    redirect("index.php");
}

if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // check in de database of de user bestaat
    $user_found = User::verify_user($username, $password);

    if ($user_found) {
        $session->login($user_found);
        redirect("index.php");
    } else {
        $the_message = "Your password or username FAILED";
    }
} else {
    $username = "";
    $password = "";
}
?>

<!-- Outer Row -->
<!--    <div class="row justify-content-center">-->
<div class="col-xl-10 col-lg-12 col-md-9">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                <div class="col-lg-6">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                        </div>
                        <form class="user" method="post">
                            <div class="form-group">
                                <label for="username">Username: </label>
                                <input type="text" class="form-control" placeholder="Enter username..." name="username">
                            </div>
                            <div class="form-group">
                                <label for="password">Password: </label>
                                <input type="password" class="form-control" placeholder="Password" name="password">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>
</body>
</html>