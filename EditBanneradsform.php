<?php include "Session.php"; ?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.wrraptheme.com/templates/luno/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 08 Oct 2022 18:25:06 GMT -->

<head>
    <?php include "Loadfile.php" ?>
    <?php include "Connection.php" ?>
    <title>:: Eshoppers :: Bannera From</title>
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
                            <li class="breadcrumb-item"><a class="text-secondary" href="Bannerads.php">Bannera</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Bannera Form</li>
                        </ol>
                    </div>

                </div>
                <div class="row align-items-center">
                    <div class="col" style="padding-top: 5px;">
                        <h1 class="fs-5 color-900 mt-1 mb-0">Bannera Form</h1>
                        <small class="text-muted">Add New Bannera</small>
                    </div>


                </div>
            </div>
        </div>

        <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                        <h4 class="card-title mb-0" style="padding-top: 5px;">Bannera From</h4>
                        <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-7 col-sm-12 mt-2 mt-md-0" style="text-align: end;">
                            <a href="Bannerads.php" title="back to Admin" class="btn btn-light" style="background-color: tranparent;">
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
                            $bannerurl = $_POST["bannerurl"];
                            if (isset($_GET["updateid"])) {
                                $id = $_GET["updateid"];
                                $oldname = $_POST["oldname"];
                                // $result = mysqli_query($con, "SELECT * FROM tbl_banner where banner_Url = '$bannerurl'") or die(mysqli_error($con));
                                $result = mysqli_query($con, "SELECT * FROM tbl_banner where banner_Url = '$bannerurl' and banner_Url!='$oldname'") or die(mysqli_error($con));
                                $row = mysqli_num_rows($result);
                                if ($row <= 0) {
                                    if(!empty($_FILES["bannerimg1"]["name"])) {
                                        $FileName1 = $_FILES["bannerimg1"]["name"];
                                        
                                        move_uploaded_file($_FILES["bannerimg1"]["tmp_name"], "../images/Bannerads/$FileName1");
                                       
                                    }else {
                                        $FileName1 = $_POST["oldimg1"];
                                    }
    
                                    // echo $FileName1;
                                    if (!empty($_FILES["bannerimg2"]["name"])) {
                                        $FileName2 = $_FILES["bannerimg2"]["name"];
                                        move_uploaded_file($_FILES["bannerimg2"]["tmp_name"], "../images/Bannerads/$FileName2");
                                       
                                    }else {
                                        $FileName2 = $_POST["oldimg2"];
                                    }
                                    if (!empty($_FILES["bannerimg3"]["name"])) {
                                        $FileName3 = $_FILES["bannerimg3"]["name"];
                                        move_uploaded_file($_FILES["bannerimg3"]["tmp_name"], "../images/Bannerads/$FileName3");
                                       
                                    }else {
                                        $FileName3 = $_POST["oldimg3"];
                                    }
                                    $result = mysqli_query($con, "UPDATE  tbl_banner SET banner_Url='$bannerurl' ,banner_image_1440px_X_499px='$FileName1',banner_image_768px_X_499px='$FileName2',banner_image_425px_X_499px='$FileName3' WHERE banner_id = '$id'") or die(mysqli_error($con));
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

                        <form method="POST" id="form1" enctype="multipart/form-data">
                        <?php
                                        if (isset($_GET["updateid"])) {
                                            $id = $_GET["updateid"];
                                            $result = mysqli_query($con, "SELECT * FROM tbl_banner WHERE banner_id = '$id'") or die(mysqli_error($con));
                                            $row1 = mysqli_fetch_assoc($result);
                                        }
                                        ?>
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-12 col-md-12">
                                            
                                            <div class="col-lg-12 col-md-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h6>Desktop <small>(1440px X 499px)</small></h6>
                                                        <input type="file" name="bannerimg1" id="bannerimg1" data-default-file="../images/Bannerads/<?php if (isset($row1)) echo $row1["banner_image_1440px_X_499px"] ?>" value="<?php if (isset($row1)) echo $row1["banner_image_1440px_X_499px"] ?>" class="dropify" data-max-file-size="1m" data-allowed-file-extensions="jpg png">
                                                        <input type="hidden" name="oldimg1" data-default-file="../images/Bannerads/<?php if (isset($row1)) echo $row1["banner_image_1440px_X_499px"] ?>" value="<?php echo $row1["banner_image_1440px_X_499px"] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <pre></pre>

                                        </div>
                                        <div class="col-xl-4 col-lg-12 col-md-12">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h6>Tablet <small>(768px X 499px)</small></h6>
                                                        <input type="file" name="bannerimg2" id="bannerimg2" data-default-file="../images/Bannerads/<?php if (isset($row1)) echo $row1["banner_image_768px_X_499px"] ?>" value="<?php if (isset($row1)) echo $row1["banner_image_768px_X_499px"] ?>" class="dropify" data-max-file-size="1m" data-allowed-file-extensions="jpg png">
                                                        <input type="hidden" name="oldimg2" data-default-file="../images/Bannerads/<?php if (isset($row1)) echo $row1["banner_image_768px_X_499px"] ?>" value="<?php echo $row1["banner_image_768px_X_499px"] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <pre></pre>

                                        </div>
                                        <div class="col-xl-4 col-lg-12 col-md-12">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h6>Mobile <small>(425px X 499px)</small></h6>
                                                        <input type="file" name="bannerimg3" id="bannerimg3" data-default-file="../images/Bannerads/<?php if (isset($row1)) echo $row1["banner_image_425px_X_499px"] ?>" value="<?php if (isset($row1)) echo $row1["banner_image_425px_X_499px"] ?>" class="dropify" data-max-file-size="1m" data-allowed-file-extensions="jpg png">
                                                        <input type="hidden" hidden name="oldimg3" data-default-file="../images/Bannerads/<?php if (isset($row1)) echo $row1["banner_image_425px_X_499px"] ?>" value="<?php echo $row1["banner_image_425px_X_499px"] ?>" >
                                                    </div>
                                                </div>
                                            </div>
                                            <pre></pre>

                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputtext" class="form-label">Bannera Url</label>
                                        <input type="text" class="form-control" value="<?php if (isset($row1)) echo $row1["banner_Url"] ?>" name="bannerurl" id="bannerurl" placeholder="Enter the banner url here.">
                                        <input type="hidden" name="oldname" value="<?php if (isset($row1)) echo $row1["banner_Url"] ?>" >
                                    </div>
                                    <pre></pre>
                                    <button type="submit" name="btnsub" class="btn btn-primary" id="color-secondary">Submit</button>

                                    <button class="btn btn-light" type="reset" id="color-light">Reset</button>
                           
                        </form>

                    </div>

                </div>

            </div>

        </div>



        <div style="padding-top: 36px;">
            <?php include "Footer.php" ?>
        </div>
    </div>

    <?php include "Themesetting.php" ?>
    <?php include "Loadscript.php" ?>
    <!-- <script src="../Js/jquery-1.11.1.min.js"></script> -->
    <script src="../Js/jquery.validate.min.js"></script>
    <script src="../Js/additional-methods.min.js"></script>
    <script>
        $(document).ready(function() {

            $("#form1").validate({

                rules: {
                  
                    bannerurl: {

                        required: true,
                        
                    },
                   




                },

                messages: {

                    bannerurl: {

                        required: "Please enter the banner url here.",
                    },
                   


                }

            })

        })
    </script>
 
</body>

<!-- Mirrored from www.wrraptheme.com/templates/luno/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 08 Oct 2022 18:25:37 GMT -->

</html>