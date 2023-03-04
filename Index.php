<?php
session_start();
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>:: Eshoppers :: Sign In</title>
    <?php include "Loadfile.php"; ?>
</head>

<body id="layout-1" data-luno="theme-blue">
    <div class="wrapper">
        <div class="page-body auth px-xl-4 px-sm-2 px-0 py-lg-2 py-1">
            <div class="container-fluid">
                <div class="row g-0">
                    <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center">
                        <div style="max-width: 25rem;">
                            <div>
                                <img src="../images/LOGO.png" width="150px" alt="">
                            </div>
                            <div class="mb-5">
                                <h2 class="color-900">Build digital products with:</h2>
                            </div>

                            <ul class="list-unstyled mb-5">
                                <li class="mb-4">
                                    <span class="d-block mb-1 fs-4 fw-light">All-in-one tool</span>
                                    <span class="color-600">Amazing Features to make your life easier & work efficient</span>
                                </li>
                                <li>
                                    <span class="d-block mb-1 fs-4 fw-light">Higher Profits</span>
                                    <span class="color-600">With 0% commission* , you take 100% profits with you</span>
                                </li>
                            </ul>
                            <div class="mb-2">
                                <a href="#" class="me-3 color-600">Home</a>
                                <a href="#" class="me-3 color-600">About Us</a>
                                <a href="#" class="me-3 color-600">FAQs</a>
                            </div>
                            <div>
                                <a href="#" class="me-3 color-400"><i class="fa fa-facebook-square fa-lg"></i></a>
                                <a href="#" class="me-3 color-400"><i class="fa fa-github-square fa-lg"></i></a>
                                <a href="#" class="me-3 color-400"><i class="fa fa-linkedin-square fa-lg"></i></a>
                                <a href="#" class="me-3 color-400"><i class="fa fa-twitter-square fa-lg"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-center align-items-center">
                        <div class="card shadow-sm w-100 p-4 p-md-5" style="max-width: 32rem;">


                            <div class="col-12 text-center mb-5">
                                <h1>Sign in</h1>
                                <span class="text-muted">Free access to our dashboard.</span>
                            </div>
                            <?php
                            if (isset($_POST["btnsub"])) {
                                $adminemail = $_POST["adminemail"];
                                $adminpassword = $_POST["adminpassword"];

                                $result = mysqli_query($con, "SELECT * FROM tbl_admin where email_id = '$adminemail' AND admin_password = '$adminpassword'") or die(mysqli_error($con));
                                $row = mysqli_num_rows($result);





                                if ($row <= 0) {
                            ?>
                                    <div class="alert alert-primary shadow" role="alert" style="text-align: center;">
                                        Please enter a valid <b>email address and password !</b>
                                    </div>
                            <?php
                                } else {

                                    // echo "hello";
                                    $_SESSION["islogin"] = true;

                                    while ($row = mysqli_fetch_assoc($result)) {

                                        $_SESSION["adminid"] = $row["admin_id"];
                                        $_SESSION["adminname"] = $row["admin_name"];
                                        $_SESSION["email_id"] = $row["email_id"];
                                    }






                                    echo "<script> window.location = 'Dashboard.php' </script>";
                                }
                            }

                            ?>
                            <form class="row g-3" method="POST">
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Email address</label>
                                        <input type="email" name="adminemail" id="adminemail" class="form-control form-control-lg" placeholder="name@example.com">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <div class="form-label">
                                            <span class="d-flex justify-content-between align-items-center"> Password <a class="text-primary" href="Forgotpassword.php">Forgot Password?</a>
                                            </span>
                                        </div>
                                        <input class="form-control form-control-lg" name="adminpassword" id="adminpassword" type="password" maxlength="10" placeholder="Enter the password">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault"> Remember me </label>
                                    </div>
                                </div>
                                <div class="col-12 text-center mt-4">
                                    <button class="btn btn-lg btn-block btn-dark lift text-uppercase" name="btnsub" type="submit">SIGN IN</button>

                                </div>
                                <div class="col-12 text-center mt-4">
                                    <span class="text-muted">Don't have an account yet ? <a href="auth-signup.html">Sign up here</a></span>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="../../../unpkg.com/bootstrap-show-password%401.2.1/dist/bootstrap-show-password.min.js"></script>
        <script>
            $(function() {
                $('#password').password()
            })
        </script>
    </div>



    <script src="assets/js/theme.js"></script>


</body>

<!-- Mirrored from www.wrraptheme.com/templates/luno/auth-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 08 Oct 2022 18:38:00 GMT -->

</html>