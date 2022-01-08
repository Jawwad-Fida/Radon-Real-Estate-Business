<?php

declare(strict_types=1);
session_start();
ob_start();

include "../includes/connect.php";
include "../includes/functions.php";
include "upload-image.php";
?>

<?php

if (isset($_GET['edit'])) {
    $apartment_id = $_GET['edit'];
    $apart_status = $_GET['apart_status']; //Buy or Rent

    $stmt = query("SELECT * FROM apartment WHERE apartment_id ={$apartment_id} AND apartment_status = '{$apart_status}'");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $building_id = $row['building_id'];
    $building_name = $row['building_name'];
    $flat_no = $row['flat_no'];
    $no_of_bedroom = $row['no_of_bedroom'];
    $no_of_bathroom = $row['no_of_bathroom'];
    $buy_price = $row['buy_price'];
    $rent_price = $row['rent_price'];
    $area = $row['area'];
    $status = $row['status'];
    $type = $row['type'];
    $old_apartment_image = $row['image'];
    $current_division = $row['division'];
}

?>


<?php

if (isset($_POST['update_submit'])) {

    //Test Case Building
    //$building_id = 4;
    //$building_name = 'Test Case';
    $new_building_name = $_POST['new_building_name'];
    $flat_num = validate($_POST['flat_num']);
    $area = validate($_POST['area']);
    $new_apart_status = $_POST['apart_status'];
    $type = $_POST['type'];
    $booking_status = $_POST['booking_status'];
    $buy_price = validate($_POST['buy_price']);
    $rent_price = validate($_POST['rent_price']);
    $no_of_bedroom = $_POST['no_of_bedroom'];
    $no_of_bathroom = $_POST['no_of_bathroom'];

    
    //For Files, we need $_FILES['form_name']['property'] - FILES have 5 properties
    $apartment_image = $_FILES['apartment_image']['name'];
    $apartment_image_temp = $_FILES['apartment_image']['tmp_name'];
    $fileError = $_FILES['apartment_image']['error'];
    $fileSize = $_FILES['apartment_image']['size'];


    //return previous image file path from database and then delete it 

    //Upload File

    //return previous image file path from database and then delete the image from the directory 
    $stmt3 = query("SELECT image FROM apartment WHERE apartment_id ={$apartment_id}");
    $row = $stmt3->fetch(PDO::FETCH_ASSOC);
    $prev_image_path = $row['image'];
    if($prev_image_path != 'images/apartment_images/200x200.png'){
        unlink($prev_image_path);
    }
    unset($stmt3);

    $apartment_image_upload = upload_apartment_image($apartment_image, $apartment_image_temp, $fileError, $fileSize);

    //check if the image location is empty or not
    if (empty($apartment_image_upload)) {
        $apartment_image_upload = $old_apartment_image;
        //NOTE: - in this way, we can update product without the picture being lost
    }


    //------------QUERY-------------

    $stmt = prepare_query("UPDATE apartment SET building_name=?,flat_no=?,no_of_bedroom=?,no_of_bathroom=?,image=?,buy_price=?,rent_price=?,area=?,status=?,type=?,apartment_status=? 
    WHERE apartment_id = ?");

    $stmt->bindParam(1, $new_building_name, PDO::PARAM_STR);
    $stmt->bindParam(2, $flat_num, PDO::PARAM_INT);
    $stmt->bindParam(3, $no_of_bedroom, PDO::PARAM_INT);
    $stmt->bindParam(4, $no_of_bathroom, PDO::PARAM_INT);
    $stmt->bindParam(5, $apartment_image_upload, PDO::PARAM_STR);
    $stmt->bindParam(6, $buy_price, PDO::PARAM_INT);
    $stmt->bindParam(7, $rent_price, PDO::PARAM_INT);
    $stmt->bindParam(8, $area, PDO::PARAM_STR);
    $stmt->bindParam(9, $booking_status, PDO::PARAM_STR);
    $stmt->bindParam(10, $type, PDO::PARAM_STR);
    $stmt->bindParam(11, $new_apart_status, PDO::PARAM_STR);
    $stmt->bindParam(12, $apartment_id, PDO::PARAM_INT);

    $stmt->execute();
    //$last_id = last_inserted_id();
    unset($stmt);

    #redirect("add_fooditem.php?success=product_add&cat_id={$product_category}");
    redirect("view-{$new_apart_status}-apartment.php?success=item_update");
}


?>

<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from code-theme.com/html/findhouses/add-property.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Dec 2021 10:32:32 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="html 5 template">
    <meta name="author" content="">
    <title>Edit Apartment</title>
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/dashbord-mobile-menu.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/swiper.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/lightcase.css">
    <link rel="stylesheet" href="css/owl-carousel.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" id="color" href="css/default.css">
</head>

<body class="inner-pages maxw1600 m0a dashboard-bd">
    <!-- Wrapper -->
    <div id="wrapper" class="int_main_wraapper">
        <!-- START SECTION HEADINGS -->
        <!-- Header Container
        ================================================== -->
        <?php include "navigation.php"; ?>

        <div class="clearfix"></div>
        <!-- Header Container / End -->

        <!-- START SECTION USER PROFILE -->
        <section class="user-page section-padding pt-5">
            <div class="container-fluid">
                <div class="row">

                    <?php include "left_sidebar.php" ?>

                    <div class="col-lg-9 col-md-12 col-xs-12 royal-add-property-area section_100 pl-0 user-dash2">

                        <!-- Display error messages -->
                        <?php display_error_message(); ?>

                        <!-- Display success messages -->
                        <?php display_success_message(); ?>

                        <div class="single-add-property">
                            <h3>Edit apartment information</h3>
                            <div class="property-form-group">

                                <form action="" method="post" enctype="multipart/form-data">

                                    <div class="row">

                                        <div class="col-lg-6 col-md-12">
                                            <p class="no-mb">
                                                <label for="price">Flat No.</label>
                                                <input type="text" name="flat_num" value="<?php echo $flat_no; ?>" id="price">
                                            </p>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <p class="no-mb last">
                                                <label for="area">Area/Size</label>
                                                <input type="text" name="area" value="<?php echo $area; ?>" id="area">
                                            </p>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row">

                                        <div class="col-lg-4 col-md-12 dropdown faq-drop">
                                            <div class="form-group categories">
                                                <label for="city">Apartment Status</label>
                                                <select class="form-control" name="apart_status">
                                                    <option value="<?php echo $apart_status; ?>"><?php echo $apart_status; ?></option>
                                                    <option value="Rent">Rent</option>
                                                    <option value="Buy">Buy</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-12 dropdown faq-drop">
                                            <div class="form-group categories">
                                                <label for="city">Type</label>
                                                <select class="form-control" name="type">
                                                    <option value="<?php echo $type; ?>"><?php echo $type; ?></option>
                                                    <option value="House">House</option>
                                                    <option value="Commercial">Commercial</option>
                                                    <option value="Lot">Lot</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-12 dropdown faq-drop">
                                            <div class="form-group categories">
                                                <label for="city">Booking Status</label>
                                                <select class="form-control" name="booking_status">
                                                    <option value="<?php echo $status; ?>"><?php echo $status; ?></option>
                                                    <option value="Booked">Booked</option>
                                                    <option value="Not Booked">Not Booked</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <p class="no-mb">
                                                <label for="price">Buy Price</label>
                                                <input type="text" name="buy_price" value="<?php echo $buy_price; ?>" id="price">
                                            </p>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <p class="no-mb last">
                                                <label for="area">Rent Price</label>
                                                <input type="text" name="rent_price" value="<?php echo $rent_price; ?>" id="price">
                                            </p>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row">

                                        <div class="col-lg-4 col-md-12 dropdown faq-drop">
                                            <div class="form-group categories">
                                                <label for="city">No. of Bedroom</label>
                                                <select class="form-control" name="no_of_bedroom">
                                                    <option value="<?php echo $no_of_bedroom; ?>"><?php echo $no_of_bedroom; ?></option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-12 dropdown faq-drop">
                                            <div class="form-group categories">
                                                <label for="city">No. of Bathroom</label>
                                                <select class="form-control" name="no_of_bathroom">
                                                    <option value="<?php echo $no_of_bathroom; ?>"><?php echo $no_of_bathroom; ?></option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-12 dropdown faq-drop">
                                            <div class="form-group categories">
                                                <label for="city">Building Name</label>
                                                <select class="form-control" name="new_building_name">

                                                    <?php
                                                    $stmt3 = query("SELECT building_name FROM building WHERE division='{$current_division}'");

                                                    while ($row = $stmt3->fetch(PDO::FETCH_ASSOC)) {
                                                        $building_name = $row['building_name'];
                                                    ?>
                                                        <option value="<?php echo $building_name; ?>"><?php echo $building_name; ?></option>
                                                    <?php } ?>

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <label for="product-title"> Upload Image</label>
                                            <img style='display:block;margin-left:auto;margin-right:auto' width="150" src="<?php echo $old_apartment_image; ?>">
                                            <input type="file" name="apartment_image">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="add-property-button pt-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="prperty-submit-button">
                                                        <button type="submit" name="update_submit">Submit Property</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- END SECTION USER PROFILE -->

        <!-- START FOOTER -->
        <footer class="first-footer">
            <div class="second-footer">
                <div class="container">
                    <p>2021 © Copyright - All Rights Reserved.</p>
                    <p>Made With <i class="fa fa-heart" aria-hidden="true"></i> By Code-Theme</p>
                </div>
            </div>
        </footer>

        <a data-scroll href="#wrapper" class="go-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
        <!-- END FOOTER -->

        <!-- START PRELOADER -->
        <div id="preloader">
            <div id="status">
                <div class="status-mes"></div>
            </div>
        </div>
        <!-- END PRELOADER -->

        <!-- ARCHIVES JS -->
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/jquery-ui.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/moment.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/mmenu.min.js"></script>
        <script src="js/mmenu.js"></script>
        <script src="js/swiper.min.js"></script>
        <script src="js/swiper.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/slick2.js"></script>
        <script src="js/fitvids.js"></script>
        <script src="js/jquery.waypoints.min.js"></script>
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/imagesloaded.pkgd.min.js"></script>
        <script src="js/isotope.pkgd.min.js"></script>
        <script src="js/smooth-scroll.min.js"></script>
        <script src="js/lightcase.js"></script>
        <script src="js/search.js"></script>
        <script src="js/owl.carousel.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/ajaxchimp.min.js"></script>
        <script src="js/newsletter.js"></script>
        <script src="js/jquery.form.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/searched.js"></script>
        <script src="js/dashbord-mobile-menu.js"></script>
        <script src="js/forms-2.js"></script>
        <script src="js/color-switcher.js"></script>
        <script src="js/dropzone.js"></script>

        <!-- MAIN JS -->
        <script src="js/script.js"></script>
        <script>
            $(".dropzone").dropzone({
                dictDefaultMessage: "<i class='fa fa-cloud-upload'></i> Click here or drop files to upload",
            });
        </script>
        <script>
            $(".header-user-name").on("click", function() {
                $(".header-user-menu ul").toggleClass("hu-menu-vis");
                $(this).toggleClass("hu-menu-visdec");
            });
        </script>

    </div>
    <!-- Wrapper / End -->
</body>


<!-- Mirrored from code-theme.com/html/findhouses/add-property.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Dec 2021 10:32:33 GMT -->

</html>