<?php include "Session.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "Loadfile.php" ?>
    <?php include "Connection.php" ?>
    <title>:: Eshoppers :: Banners Ads Datatables</title>
</head>

<body class="layout-1" data-luno="theme-blue">

    <?php include "Menu.php" ?>

    <div class="wrapper">

        <?php include "Header.php" ?>

        <div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
            <div class="container-fluid">
                <div class="row g-3 mb-3 align-items-center">
                    <div class="col">
                        <ol class="breadcrumb bg-transparent mb-0">
                            <li class="breadcrumb-item"><a class="text-secondary" href="index-2.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Banners Ads</li>
                        </ol>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <h1 class="fs-5 color-900 mt-1 mb-0">All Banners Ads</h1>
                        <small class="text-muted">List of Banners Ads</small>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-12" style="text-align: end;">
                        <div class="row">
                            <!-- <div>
                                <button type="button" class="btn btn-success btn-sm remove-item-btn del" type="button" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center1"><i class="fa fa-picture-o"></i> Banner Design And Banner Creation</button>



                            </div> -->

                            <div style="padding-top: 5px;">
                                <a href="Banneradsform.php" type="button" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add New Banners Ads</a>
                            </div>
                        </div>

                    </div>

                </div>



            </div>
        </div>
        <?php

        if (isset($_POST["btnsub"])) {

            $id = $_POST["deleteid1"];

            $result = mysqli_query($con, "DELETE FROM tbl_banner WHERE banner_id = '$id'") or die(mysqli_error($con));

            if ($result == true) {

                echo "<script> window.location = 'Bannerads.php' </script>";

                // header("location:categoryform.php");
            } else {
                echo "error";
            }
        }


        ?>
        <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
            <div class="card-body"></div>
            <?php
            $result = mysqli_query($con, "SELECT * FROM tbl_banner") or die(mysqli_error($con));
            $cnt = 1;
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card chat-widgets mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
                                    <div class="container-fluid">

                                        <div class="row align-items-center">
                                            <div class="col-xl-6 col-lg-6 col-md-6">
                                                <h1 class="fs-5 color-900 mt-1 mb-0"><b><i class="fa fa-sliders"></i> Slider <?php echo $cnt;
                                                                                                                                $cnt++; ?></td></b></h1>

                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-6" style="text-align: end;">

                                                <a href="EditBanneradsform.php?updateid=<?php echo $row["banner_id"] ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                                <button class="btn btn-sm btn-danger remove-item-btn del" type="button" data-bs-toggle="modal" data-id=<?php echo $row["banner_id"] ?> data-bs-target=".bs-example-modal-center"><i class="fa fa-trash-o"></i> Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-12">


                                    <div class="card chat-widgets mb-3">
                                        <div class="card-body">

                                            <div class="thumbnail position-relative">


                                                <h6 style="text-align: center;">Desktop (1440px X 499px)</h6>
                                                <img src="../images/Bannerads/<?php echo $row["banner_image_1440px_X_499px"] ?>" class="img-fluid rounded-2" width="100%" alt="">


                                            </div>


                                        </div>

                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-12">
                                    <div class="card chat-widgets mb-3">
                                        <div class="card-body">

                                            <div class="thumbnail position-relative">



                                                <h6 style="text-align: center;">Tablet (768px X 499px)</h6>
                                                <img src="../images/Bannerads/<?php echo $row["banner_image_768px_X_499px"] ?>" class="img-fluid rounded-2" width="100%" alt="">

                                            </div>


                                        </div>

                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-12">
                                    <div class="card chat-widgets mb-3">
                                        <div class="card-body">

                                            <div class="thumbnail position-relative">



                                                <h6 style="text-align: center;">Mobile (425px X 499px)</h6>
                                                <img src="../images/Bannerads/<?php echo $row["banner_image_425px_X_499px"] ?>" width="100%" class="img-fluid rounded-2" alt="">

                                            </div>


                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <div class="card chat-widgets mb-3">
                                    <div class="card-body">

                                        <b>Add Link :</b> <?php echo $row["banner_Url"] ?>


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center p-5">
                        <img src="../images/delete.png" width="250px" alt="">
                        <div class="mt-4">
                            <h4 class="mb-3" style="font-size: 23px;">You are about to delete a banner ads ?</h4>
                            <p class="text-muted fs-15 mb-4"> Deleting your banner ads will remove all of your information from our database.</p>

                            <form action="" method="post">
                                <input type="text" hidden id="deleteid1" name="deleteid1">
                                <div class="hstack gap-2 justify-content-center">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i>Close</button>
                                    <button type="submit" name="btnsub" id="btnsub" class="btn btn-danger">Yes, Delete It</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="modal fade bs-example-modal-center1" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center p-12">
                        <div class="row">


                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        
                                        <div class="card chat-widgets mb-3">
                                            <div class="card-body">

                                                <div class="thumbnail position-relative">


                                                    <h6 style="text-align: center;">Desktop (1440px X 499px)</h6>
                                                    <img src="../images/Bannerads/ban 1.jpg" class="img-fluid rounded-2" alt="">


                                                </div>


                                            </div>

                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        
                                        <div class="card chat-widgets mb-3">
                                   <div class="card-body">

                                       <div class="thumbnail position-relative">



                                           <h6 style="text-align: center;">Tablet (768px X 499px)</h6>
                                           <img src="../images/Bannerads/ban 2.jpg" class="img-fluid rounded-2" alt="">

                                       </div>


                                   </div>

                               </div>
                                    </div>
                                    <div class="carousel-item">
                                       
                                        <div class="card chat-widgets mb-3">
                                   <div class="card-body">

                                       <div class="thumbnail position-relative">



                                           <h6 style="text-align: center;">Mobile (425px X 499px)</h6>
                                           <img src="../images/Bannerads/ban.jpg" width="70%" class="img-fluid rounded-2" alt="">

                                       </div>


                                   </div>

                               </div>
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>

                        </div>
                        <h4 class="mb-3">Make your website banners creative.</h4>
                            <p class="text-muted fs-15 mb-4">Make your banner and download it, then upload it to the Eshopper retailer web site.</p>
                            <div class="row">


                    <div class="col-xl-4 col-lg-4 col-md-12">

                    <a href="https://www.canva.com/design/DAFToq_d_Rg/baB0xi92fmlxHy_7swC92Q/edit?utm_content=DAFToq_d_Rg&utm_campaign=designshare&utm_medium=link2&utm_source=sharebutton" type="button" class="btn btn-success btn-sm">Make your desktop banner <br>(1440px X 499px) </a>
                        
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12">
                    <a href="https://www.canva.com/design/DAFTom_jlDk/E-IlOO5PbWpPL_iwpS6ZTA/edit?utm_content=DAFTom_jlDk&utm_campaign=designshare&utm_medium=link2&utm_source=sharebutton" type="button" class="btn btn-success btn-sm">Make your Tablet banner <br>(768px X 499px)</a>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-12">
                    <a href="https://www.canva.com/design/DAFTosVr9CU/Dmm2o6IEbB2Mm-xS6Bsp7Q/edit?utm_content=DAFTosVr9CU&utm_campaign=designshare&utm_medium=link2&utm_source=sharebutton" type="button" class="btn btn-success btn-sm">Make your Mobile banner <br>(425px X 499px)</a>
                    </div>

                </div>

                    </div>
                </div>
            </div>
        </div> -->
        <div style="padding-top: 60px;">
            <?php include "Footer.php" ?>
        </div>
    </div>

    <?php include "Themesetting.php" ?>
    <script>
        $(document).ready(function() {

            $(".del").click(function() {
                // alert("hello");

                var deleteid = $(this).attr('data-id');

                // alert($deleteid);
                $("#deleteid1").val(deleteid);

            })
        })
    </script>

    <?php include "Loadscript.php" ?>
</body>

</html>