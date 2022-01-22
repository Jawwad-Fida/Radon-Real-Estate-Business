<?php

declare(strict_types=1);
session_start();
ob_start();

include "../includes/connect.php";
include "../includes/functions.php";
?>

<?php

if (isset($_POST['add_submit'])) {

    $property_name = validate($_POST['name']);
    $property_info = validate($_POST['description']);
    $address = validate($_POST['address']);
    $build_num = validate($_POST['build_num']);
    $Division = $_POST['Division'];
    $no_of_floors = $_POST['no_of_floors'];
    $no_of_flats = $_POST['no_of_flats'];

    //Check for errors
    if (empty($property_name) || empty($property_info) || empty($address) || empty($build_num)|| empty($Division)|| empty($no_of_flats)|| empty($no_of_floors)) {
        redirect("add-property.php?error=emptyFields");
        exit();
    }

    //------------QUERY-------------

    $stmt = prepare_query("INSERT INTO building(building_name,no_of_flats,address,build_info,division,no_of_floors,build_num) VALUES(?,?,?,?,?,?,?)");
    $stmt->bindParam(1, $property_name, PDO::PARAM_STR);
    $stmt->bindParam(2, $no_of_flats, PDO::PARAM_INT);
    $stmt->bindParam(3, $address, PDO::PARAM_STR);
    $stmt->bindParam(4, $property_info, PDO::PARAM_STR);
    $stmt->bindParam(5, $Division, PDO::PARAM_STR);
    $stmt->bindParam(6, $no_of_floors, PDO::PARAM_INT);
    $stmt->bindParam(7, $build_num, PDO::PARAM_INT);

    $stmt->execute();
    //$last_id = last_inserted_id();
    unset($stmt);

    redirect("view-property.php?success=item_add");
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
    <title>Add Property</title>
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
                            <h3>Add Property Information</h3>
                            <div class="property-form-group">

                                <form action="" method="post">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>
                                                <label for="title">Property Name</label>
                                                <input type="text" name="name" id="title" placeholder="Enter your property title">
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>
                                                <label for="description">Property Description</label>
                                                <textarea id="description" name="description" placeholder="Describe about your property"></textarea>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">

                                    </div>

                                    <div class="row">

                                        <div class="col-lg-4 col-md-12">
                                            <p class="no-mb">
                                                <label for="price">Building No.</label>
                                                <input type="text" name="build_num" placeholder="enter building num" id="num">
                                            </p>
                                        </div>

                                        <div class="col-lg-4 col-md-12 dropdown faq-drop">
                                            <div class="form-group categories">
                                                <label for="address">Address</label>
                                                <select class="form-control" name="address">
                                                <option value="null">Location</option>
                                                <option value="Banani">Banani</option>
                                                <option value="Gulshan">Gulshan</option>
                                                <option value="Dhanmondi">Dhanmondi</option>
                                                <option value="Badda">Badda</option>
                                                <option value="Baridhara">Baridhara</option>
                                                <option value="Motijheel">Motijheel</option>
                                                <option value="Wari">Wari</option>
                                                <option value="Uttara">Uttara</option>
                                                <option value="Farmgate">Farmgate</option>
                                                <option value="Mirpur">Mirpur</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-12 dropdown faq-drop">
                                            <div class="form-group categories">
                                                <label for="city">Division</label>
                                                <select class="form-control" name="Division">
                                                    <option value="Dhaka">Dhaka</option>
                                                    <option value="Chittagong">Chittagong</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-12">
                                            <p class="no-mb">
                                                <label for="no_of_floors">Number Of Floors</label>
                                                <input type="int" name="no_of_floors" placeholder="Enter number of floors" id="no_of_floors">
                                            </p>
                                        </div>

                                        <div class="col-lg-4 col-md-12">
                                            <p class="no-mb">
                                                <label for="no_of_flats">No. of Flats(Per Floor)</label>
                                                <input type="int" name="no_of_flats" placeholder="Enter number of flats(Per floor)" id="no_of_flats">
                                            </p>
                                        </div>

                                        

                                    </div>

                                    <div class="add-property-button pt-5">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="prperty-submit-button">
                                                    <button type="submit" name="add_submit">Submit Property</button>
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

<?php
//close database connection - initialize object to null
$pdo = null;
ob_end_flush();
?>