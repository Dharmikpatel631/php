<?php include "Session.php"; ?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.wrraptheme.com/templates/luno/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 08 Oct 2022 18:25:06 GMT -->

<head>
    <?php include "Loadfile.php" ?>
    <?php include "Connection.php" ?>
    <title>:: Eshoppers :: Admin From</title>
    <style>
        label.error {
            color: red;
        }
    </style>
</head>

<body class="layout-1" data-luno="theme-blue">

    <?php include "Menu.php" ?>

    <div class="wrapper">

        <?php include "Header.php" ?>

        <div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
            <div class="container-fluid">
                <div class="row g-3 mb-3 align-items-center">
                    <div class="col" style="padding-top: 5px;">
                        <ol class="breadcrumb bg-transparent mb-0">
                            <li class="breadcrumb-item"><a class="text-secondary" href="Admin.php">Admin</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Admin Form</li>
                        </ol>
                    </div>

                </div>
                <div class="row align-items-center">
                    <div class="col" style="padding-top: 5px;">
                        <h1 class="fs-5 color-900 mt-1 mb-0">Admin Form</h1>
                        <small class="text-muted">Add New Admin</small>
                    </div>


                </div>
            </div>
        </div>

        <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                        <h4 class="card-title mb-0" style="padding-top: 5px;">Admin From</h4>
                        <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-7 col-sm-12 mt-2 mt-md-0" style="text-align: end;">
                            <a href="Admin.php" title="back to Admin" class="btn btn-light" style="background-color: tranparent;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                                    <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                                </svg>
                            </a>
                        </div>

                    </div>



                    <div class="card-body">
                        <?php
                        if (isset($_POST["btnsub"])) {

                            $adminname = $_POST["adminname"];
                            $emailid = $_POST["emailid"];
                            $password = $_POST["password"];
                            if (isset($_GET["updateid"])) {
                                $id = $_GET["updateid"];
                                $oldname = $_POST["oldname"];
                                $result = mysqli_query($con, "SELECT * FROM tbl_admin where email_id = '$emailid' and email_id!='$oldname'") or die(mysqli_error($con));
                                $row = mysqli_num_rows($result);
                                if ($row <= 0) {
                                    $result = mysqli_query($con, "UPDATE  tbl_admin SET admin_name='$adminname' , email_id='$emailid' , admin_password= '$password' WHERE admin_id = '$id'") or die(mysqli_error($con));
                                    if ($result == true) {
                        ?>
                                        <div class="alert alert-primary shadow" role="alert">
                                            <strong> Hi! </strong> Form Inserted
                                        </div>
                                    <?php
                                    } else {
                                        echo "error";
                                    }
                                } else {
                                    ?>
                                    <div class="alert alert-primary shadow" role="alert">
                                        <strong> Heyy! </strong>The data has already been entered
                                    </div>
                        <?php
                                }
                            } else {
                            }
                        }
                        ?>

                        <form method="POST" id="form1">
                            <?php
                            if (isset($_GET["updateid"])) {
                                $id = $_GET["updateid"];
                                $result = mysqli_query($con, "SELECT * FROM tbl_admin WHERE admin_id = '$id'") or die(mysqli_error($con));
                                $row1 = mysqli_fetch_assoc($result);
                            }
                            ?>
                            <div class="mb-3">
                                <label for="exampleInputtext" class="form-label">Admin Name</label>
                                <input type="text" class="form-control" value="<?php if (isset($row1)) echo $row1["admin_name"] ?>" name="adminname" id="adminname" placeholder="Please enter the administrator's name.">

                            </div>
                            <pre></pre>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" value="<?php if (isset($row1)) echo $row1["email_id"] ?>" name="emailid" id="emailid" aria-describedby="emailHelp" placeholder="Please enter the administrator's email address.">
                                <input type="hidden" value="<?php if (isset($row1)) echo $row1["email_id"] ?>" name="oldname">

                            </div>
                            <pre></pre>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" value="<?php if (isset($row1)) echo $row1["admin_password"] ?>" name="password" id="password" placeholder="Please enter the administrator's password">
                            </div>
                            <pre></pre>
                            <button type="submit" name="btnsub" class="btn btn-primary" id="color-secondary">Submit</button>

                            <button class="btn btn-light" type="reset" id="color-light">Reset</button>

                        </form>

                    </div>

                </div>

            </div>

        </div>



        <div style="padding-top: 84px;">
            <?php include "Footer.php" ?>
        </div>
    </div>

    <?php include "Themesetting.php" ?>
    <?php include "Loadscript.php" ?>
    <script src="../Js/jquery-1.11.1.min.js"></script>
    <script src="../Js/jquery.validate.min.js"></script>
    <script src="../Js/additional-methods.min.js"></script>
    <script>
        $(document).ready(function() {
            $.validator.addMethod('mypassword1', function(value, element) {
                    return this.optional(element) || (value.match(/[a-zA-Z]/));
                },
                'Please enter at least one alphabetic character (a-z,A-Z)');
            $.validator.addMethod('mypassword2', function(value, element) {
                    return this.optional(element) || (value.match(/[0-9]/));
                },
                'Please enter at least one numeric (0-9).');
            $.validator.addMethod('mypassword3', function(value, element) {
                    return this.optional(element) || (value.match(/[!@#$%^&()'[\]"?+-/*={}.,;:_]/));
                },
                'Please enter at least one special character (e.g. !@#$%^&()"?+-/*={}.,;:_).');
            $("#form1").validate({

                rules: {

                    adminname: {
                        required: true,

                    },
                    emailid: {

                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 8,
                        maxlength: 12,
                        mypassword1: true,
                        mypassword2: true,
                        mypassword3: true,
                    }




                },

                messages: {

                    adminname: {
                        required: "Please enter the administrator's name.",

                    },
                    emailid: {

                        required: "Please enter the administrator's email address.",
                    },
                    password: {

                        required: "Please enter the administrator's password",
                    }


                }

            })

        })
    </script>

</body>

<!-- Mirrored from www.wrraptheme.com/templates/luno/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 08 Oct 2022 18:25:37 GMT -->

</html>