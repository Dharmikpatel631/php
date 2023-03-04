<?php
session_start();
include 'connection.php';
?>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/PHPMailer/phpmailer/src/PHPMailer.php';
require 'vendor/PHPMailer/phpmailer/src/SMTP.php';
require 'vendor/PHPMailer/phpmailer/src/Exception.php';
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.wrraptheme.com/templates/luno/auth-password-reset.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 08 Oct 2022 18:38:00 GMT -->

<head>

    <title>:: Eshoppers :: Password reset</title>
    <?php include "Loadfile.php"; ?>
</head>

<body id="layout-1" data-luno="theme-blue">

    <div class="wrapper">

        <div class="page-body auth px-xl-4 px-sm-2 px-0 py-lg-2 py-1">
            <div class="container-fluid">
                <div class="row g-3">
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


                            <div class="col-12 text-center mb-3">
                                <img src="../images/auth-password-reset.svg" class="w240 mb-3" alt="" />
                                <h1>Forgot password?</h1>
                                <span>Enter the email address you used when you joined and we'll send you instructions to send your password.</span>
                            </div>
                            <?php
                            if (isset($_POST["btnsub"])) {

                                // echo "hello";

                                $adminemail = $_POST["adminemail"];


                                $result = mysqli_query($con, "SELECT * FROM tbl_admin where email_id = '$adminemail'") or die(mysqli_error($con));
                                $row = mysqli_num_rows($result);
                                if ($row >= 1) {

                                    foreach ($result as $row) {


                                        $password = $row['admin_password'];
                                    }

                                    // echo $password;


                                    $mail = new PHPMailer;
                                    $mail->isSMTP();
                                    //$mail->SMTPDebug = 1; # 0 off, 1 client, 2 client y server
                                    $mail->CharSet  = 'UTF-8';
                                    $mail->Host     = 'smtp.gmail.com';
                                    $mail->SMTPAuth = true;
                                    $mail->SMTPSecure = 'tls';
                                    $mail->Port     = 587;
                                    $mail->Username = 'eshoppers.website@gmail.com';
                                    $mail->Password = 'jfaenljgdscnzyvd';
                                    // Sender info 
                                    $mail->setFrom('eshoppers.website@gmail.com', 'Eshoppers');
                                    $mail->addReplyTo('eshoppers.website@gmail.com', 'Eshoppers');

                                    // Add a recipient 
                                    $mail->addAddress($adminemail);

                                    // Email subject 
                                    $mail->Subject = 'Eshoppers Username and Password';

                                    // Set email format to HTML 
                                    $mail->isHTML(true);

                                    $mail->Body = "<h2> Welcome To Eshoppers!  </h2>
                                    <p> Your Username and Password is mentioned below </p>
                
                <p>Username : $adminemail <br> Password : $password</p>
                <p>This e-mail and any files transmitted with it are for the sole use of the intended recipient(s) or addressee and may contain confidential and privileged information. If you are not the intended recipient or addressee, please contact the sender by reply e-mail and destroy all copies and the original message. Any unauthorised review, use, disclosure, dissemination, forwarding, printing, or copying of this email or any action taken in reliance on this email is strictly prohibited and may be unlawful. The recipient/addressee acknowledges that Eshoppers or its group company(s) are unable to exercise control over, ensure, or
                </p>
                <p>guarantee the integrity of or control over the contents of e-mail transmissions and acknowledges that any views expressed in this message are those of the individual sender and that no binding nature of the message shall be implied or assumed unless the sender expressly does so with due authority of Eshoppers  Before opening any attachments, please check them for viruses and defects.</p>
                <h2>Thank you for your interest, trust, and support!</h2>
                
                ";

                                    // Send email 

                                    if (!$mail->send()) {
                                        echo "mail not send";
                                        print_r(error_get_last());
                                    } else {
                                        // echo "Mail Send";
                                        // echo "<script>window.location='index.php'</script>";
                                        ?>
                                        <div class="alert alert-primary shadow" role="alert" style="text-align: center;">
                                        Message has been sent ! <b>Please check your email.</b>
                                    </div>
                                        <?php
                                    }
                                } else {


                            ?>
                                    <div class="alert alert-primary shadow" role="alert" style="text-align: center;">
                                    <b>Hello !</b> this email address is not registered.
                                    </div>
                            <?php
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
                                <div class="col-12 text-center mt-4">

                                    <button class="btn btn-lg btn-block btn-dark lift text-uppercase" type="submit" name="btnsub">SUBMIT</button>
                                </div>
                                <div class="col-12 text-center mt-4">
                                    <span class="text-muted"><a href="Index.php">Back to Sign in</a></span>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php include "Loadscript.php"; ?>


</body>

<!-- Mirrored from www.wrraptheme.com/templates/luno/auth-password-reset.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 08 Oct 2022 18:38:01 GMT -->

</html>