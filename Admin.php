<?php include "Session.php"; ?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.wrraptheme.com/templates/luno/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 08 Oct 2022 18:25:06 GMT -->

<head>
   <?php include "Loadfile.php" ?>
   <?php include "Connection.php" ?>
   <title>:: Eshoppers :: Admin Datatables</title>
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
                            <li class="breadcrumb-item"><a class="text-secondary" href="Dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Admin</li>
                        </ol>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col">
                        <h1 class="fs-5 color-900 mt-1 mb-0">Admin Datatables</h1>
                        <small class="text-muted">List of Admins</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-body px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                        <h4 class="card-title mb-0">Admin Table</h4>


                    </div>
                    <div style="text-align: end;padding-right: 25px;">

                        <a href="Adminform.php" class="btn btn-success"><i class="fa fa-plus" ></i> Add New Admin</a>
                    </div>
                    <?php

                    if (isset($_POST["btnsub"])) {

                        $id = $_POST["deleteid1"];

                        $result = mysqli_query($con, "DELETE FROM tbl_admin WHERE admin_id = '$id'") or die(mysqli_error($con));

                        if ($result == true) {

                            echo "<script> window.location = 'Admin.php' </script>";

                            // header("location:categoryform.php");
                        } else {
                            echo "error";
                        }
                    }


                    ?>
                    <?php

                    if (isset($_POST["btnmdel"])) {
                        // echo "hello";
                        if (isset($_POST["deletedata"])) {

                            $all = $_POST["deletedata"];
                            // echo $all;
                            $result = mysqli_query($con, "DELETE from tbl_admin where admin_id in ($all)") or die(mysqli_error($con));


                            if ($result == true) {
                            } else {
                                echo "error";
                            }

                            //   echo $all;


                        } else {
                    ?>
                           

                    <?php
                        }
                    }
                    ?>

                    <?php

                    if (isset($_POST["btnsub"])) {
                        // echo "hello";

                        $id = $_POST["deleteid1"];

                        $result = mysqli_query($con, "DELETE FROM tbl_admin WHERE admin_id = '$id'") or die(mysqli_error($con));

                        if ($result == true) {

                            echo "<script> window.location = 'admin.php' </script>";

                            // header("location:categoryform.php");
                        } else {
                            echo "error";
                        }
                    }


                    ?>
                    <div class="card-body">

                        <table class="myDataTable table table-hover align-middle mb-0">
                            <thead>
                                <tr>
                                    <th style="width:60px;">#</th>
                                    <th>Sr.No :</th>
                                    <th>Admin Name :</th>
                                    <th>Email ID :</th>
                                    <th>Password :</th>
                                    <th>Edit :</th>
                                    <th>Delete :</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $result = mysqli_query($con, "SELECT * FROM tbl_admin") or die(mysqli_error($con));
                                $cnt = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr>
                                        <td><input type="checkbox" class="delete-chk" name="ids[]" value="<?php echo $row["admin_id"] ?>"></td>
                                        <td><?php echo $cnt;
                                            $cnt++; ?></td>
                                        <td><?php echo $row["admin_name"] ?></td>
                                        <td><?php echo $row["email_id"] ?></td>
                                        <td><?php echo $row["admin_password"] ?></td>
                                        <td>
                                            <a href="EditAdminform.php?updateid=<?php echo $row["admin_id"] ?>" class="btn btn-success btn-sm" style="font-size: 13px;">
                                                <i class="fa fa-pencil-square-o"></i> Edit
                                            </a>
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-danger remove-item-btn del" type="button" data-bs-toggle="modal" data-id=<?php echo $row["admin_id"] ?> data-bs-target=".bs-example-modal-center"><i class="fa fa-trash-o"></i> Remove</button>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>

                            </tbody>
                        </table>
                        <div style="text-align: start;padding-left: 10px;">
                            <button class="btn btn-sm btn-danger deleteselect" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center1"><i class="fa fa-trash-o"></i> Delete Selected</button>
                        </div>
                    </div>

                </div>

            </div>

        </div>
        <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center p-5">
                        <img src="../images/delete.png" style="width: 70%;" alt="">
                        <div class="mt-4">
                            <h4>Are you sure you want to delete admin ?</h4>
                            <p class="text-muted fs-15 mb-4">Deleting your admin will remove all of your information from our database.</p>

                            <form action="" method="post">
                                <input type="text" hidden id="deleteid1" name="deleteid1">
                                <div class="hstack gap-2 justify-content-center">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i>Close</button>
                                    <button type="submit" name="btnsub" id="btnsub" class="btn btn-danger s">Yes, Delete It</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
        <div class="modal fade bs-example-modal-center1" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center p-5">
                        <img src="../images/delete.png" width="250px" alt="">
                        <div class="mt-4">
                            <h4>Are you sure you want to delete<br>selected admin ?</h4>
                            <p class="text-muted fs-15 mb-4">Deleting your selected admin will remove all of your information from our database.</p>

                            <form action="" method="post">

                                <div class="hstack gap-2 justify-content-center">
                                    <input type="text" hidden id="deletedata" name="deletedata">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i>Close</button>
                                    <button name="btnmdel" id="btnmdel" type="submit" class="btn btn-danger s">Yes, Delete It</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>

       
         <div style="padding-top: 187px;">
        <?php include "Footer.php" ?>
         </div>
    </div>

    <?php include "Themesetting.php" ?>


    <?php include "Loadscript.php" ?>
    <script>
            $(document).ready(function() {

                $(document).on("click", ".del", function() {
                    var deleteid = $(this).attr('data-id');
                    $("#deleteid1").val(deleteid);
                });
            })
          
            $(document).ready(function() {

                $(".deleteselect").click(function() {

                    var vale = [];
                    $('.delete-chk:checked').each(function(i) {
                        vale[i] = $(this).val();


                    });

                    $("#deletedata").val(vale);



                })
            })
        </script>
</body>

<!-- Mirrored from www.wrraptheme.com/templates/luno/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 08 Oct 2022 18:25:37 GMT -->

</html>