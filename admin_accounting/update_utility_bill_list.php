<?php

declare(strict_types=1);
session_start();
ob_start();

include "../includes/connect.php";
include "../includes/functions.php";
?>

<?php
if (isset($_GET['edit'])) {
    $utility_id = $_GET['edit'];
    $stmt = query("SELECT * 
                   FROM utility_bill 
                   WHERE utility_id =$utility_id ");

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $building_name=$row['building_name'];
    $flat_no = $row['flat_no'];
    $billing_month=$row['month'];
    $flat_status=$row['flat_status'];
    $water_bill=$row['water_bill'];
    $electricity_bill=$row['electricity_bill'];
    $gas_bill=$row['gas_bill'];                                      
    $additional_bill = $row['additional_bill'];
    $service_charge= $row['service_charge'];
}

?>

<?php

if (isset($_POST['update_submit'])) {

    
    $billing_month=$_POST['month'];
    $water_bill=$_POST['water_bill'];
    $electricity_bill=$_POST['electricity_bill'];
    $gas_bill=$_POST['gas_bill'];                                      
    $additional_bill = $_POST['additional_bill'];
    $service_charge= $_POST['service_charge'];


    //------------QUERY-------------

    $stmt = prepare_query("UPDATE utility_bill 
                           SET  month = ?, water_bill = ?,electricity_bill = ?,gas_bill = ?,additional_bill = ?,service_charge = ? 
                           WHERE utility_id = ?");
    
    $stmt->bindParam(1, $billing_month, PDO::PARAM_STR);
    $stmt->bindParam(2, $water_bill, PDO::PARAM_INT);
    $stmt->bindParam(3, $electricity_bill, PDO::PARAM_INT);
    $stmt->bindParam(4, $gas_bill, PDO::PARAM_INT);
    $stmt->bindParam(5, $additional_bill, PDO::PARAM_INT);
    $stmt->bindParam(6, $service_charge, PDO::PARAM_INT);
    $stmt->bindParam(7, $utility_id, PDO::PARAM_INT);


    $stmt->execute();
    //$last_id = last_inserted_id();
    unset($stmt);


    #redirect("add_fooditem.php?success=product_add&cat_id={$product_category}");
    $s= "clients_utility_bill_list.php?success=item_update"."&d_building=". $building_name ."&d_flat=". $flat_no ."&d_username=null";
    redirect($s);
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
    <title>Add Apartment</title>
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
                            <h3>Update Utility Bill information</h3>
                            <div class="property-form-group">

                                <form action="" method="post" enctype="multipart/form-data">

                                    <div class="row">

                                        <div class="col-lg-4 col-md-12">
                                            <p class="no-mb">
                                                <label for="water_bill"> Water Bill</label>
                                                <input type="text" name="water_bill" value=" <?php echo $water_bill; ?>" >
                                            </p>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <p class="no-mb last">
                                                <label for="Electricity_bill">Electricity Bill</label>
                                                <input type="text" name="electricity_bill" value=" <?php echo $electricity_bill; ?>" >
                                            </p>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <p class="no-mb last">
                                                <label for="Gas_bill">Gas Bill</label>
                                                <input type="text" name="gas_bill" value=" <?php echo $gas_bill; ?>">
                                            </p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4 col-md-12">
                                            <p class="no-mb">
                                                <label for="Additional_bill"> Additional Bill</label>
                                                <input type="text" name="additional_bill" value=" <?php echo $additional_bill; ?>">
                                            </p>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <p class="no-mb last">
                                                <label for="Service_charge">Service Charge</label>
                                                <input type="text" name="service_charge" value=" <?php echo $service_charge; ?>">
                                            </p>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <p class="no-mb last">
                                                <label for="billig_month">Billing Month</label>
                                                <input type="date" name="month" value=" <?php echo $billing_month; ?>">
                                            </p>
                                        </div>
                                    </div>
                                    <br>
                            </div>

                                        <div class="single-add-property">
                                            <div class="property-form-group">
                                                <div class="add-property-button pt-5">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="prperty-submit-button">
                                                                <button type="submit" name="update_submit"> Update</button>
                                                            </div>
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
        </section>
        <!-- END SECTION USER PROFILE -->

        <!-- START FOOTER -->
        <footer class="first-footer">
            <div class="second-footer">
                <div class="container">
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