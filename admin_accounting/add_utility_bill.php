<?php

declare(strict_types=1);
session_start();
ob_start();

include "../includes/connect.php";
include "../includes/functions.php";



if (isset($_POST['add_submit']) && isset($_GET['d_building']) && isset($_GET['d_flat']) && isset($_GET['d_status'])) {
    $building_name=$_GET['d_building'];
    $flat_no= $_GET['d_flat'] ;
    $flat_status= $_GET['d_status'] ;
    $month=$_POST['month'];
    $gas_bill=validate($_POST['gas_bill']);
    $water_bill=validate($_POST['water_bill']);
    $electricity_bill=validate($_POST['electricity_bill']);
    $additional_bill=validate($_POST['additional_bill']);
    $service_charge=$_POST['service_charge'];


    //------------QUERY------------- 

    $stmt = query("SELECT * 
            FROM utility_bill 
            WHERE building_name='$building_name'
            AND flat_no='$flat_no'
            AND month='$month'");

    if($stmt->rowCount()==0){

        $stmt = prepare_query("INSERT INTO utility_bill(building_name,flat_no,month,flat_status,water_bill,gas_bill,electricity_bill,additional_bill,service_charge) 
                               VALUES(?,?,?,?,?,?,?,?,?)");
        $stmt->bindParam(1, $building_name, PDO::PARAM_STR);
        $stmt->bindParam(2, $flat_no, PDO::PARAM_INT);
        $stmt->bindParam(3, $month, PDO::PARAM_STR);
        $stmt->bindParam(4, $flat_status, PDO::PARAM_STR);
        $stmt->bindParam(5, $water_bill, PDO::PARAM_INT);
        $stmt->bindParam(6, $gas_bill, PDO::PARAM_INT);
        $stmt->bindParam(7, $electricity_bill, PDO::PARAM_INT);
        $stmt->bindParam(8, $additional_bill, PDO::PARAM_INT);
        $stmt->bindParam(9, $service_charge, PDO::PARAM_INT);


        $stmt->execute();
    
        unset($stmt);

        redirect("apartment_list.php?success=item_add"."&b_name=". $building_name );
    }
    else{
        
        redirect("apartment_list.php?error=already_exits"."&b_name=". $building_name );
      }
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
                            <h3>Add Utility information</h3>
                            <div class="property-form-group">

                                <form action="" method="post" enctype="multipart/form-data">

                                    <div class="row">

                                        <div class="col-lg-4 col-md-12">
                                            <p class="no-mb">
                                                <label for="water_bill"> Water Bill</label>
                                                <input type="text" name="water_bill">
                                            </p>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <p class="no-mb last">
                                                <label for="Electricity_bill">Electricity Bill</label>
                                                <input type="text" name="electricity_bill">
                                            </p>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <p class="no-mb last">
                                                <label for="Gas_bill">Gas Bill</label>
                                                <input type="text" name="gas_bill">
                                            </p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4 col-md-12">
                                            <p class="no-mb">
                                                <label for="Additional_bill"> Additional Bill</label>
                                                <input type="text" name="additional_bill">
                                            </p>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <p class="no-mb last">
                                                <label for="Service_charge">Service Charge</label>
                                                <input type="text" name="service_charge">
                                            </p>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <p class="no-mb last">
                                                <label for="billig_month">Billing Month</label>
                                                <input type="Month" name="month">
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
                                                                <button type="submit" name="add_submit">Submit Utility Bill</button>
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