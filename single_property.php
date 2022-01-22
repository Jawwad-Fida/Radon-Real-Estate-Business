<?php

declare(strict_types=1);
session_start();
ob_start();

include "includes/connect.php";
include "includes/functions.php";
?>

<?php

if (isset($_GET['edit'])) {
    $apartment_id = $_GET['edit'];
    $apart_status = $_GET['apart_status']; //Buy or Rent



    //$apartment_id = 2;
    //$apart_status = "Rent";


    $stmt = query("SELECT b1.building_name, b1.address, a1.flat_no, a1.no_of_bedroom, a1.no_of_bathroom, a1.image, a1.buy_price, a1.rent_price, a1.area, a1.status, a1.features, a1.type, b1.build_info
FROM building b1

JOIN apartment a1
ON b1.building_id = a1.building_id
WHERE a1.apartment_id = {$apartment_id} AND a1.apartment_status='{$apart_status}'");

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $building_name = $row['building_name'];
    $address = $row['address'];
    $flat_no = $row['flat_no'];
    $no_of_bedroom =  $row['no_of_bedroom'];
    $no_of_bathroom =  $row['no_of_bathroom'];
    $image =  $row['image'];

    if ($apart_status == "Rent") {
        $price = $row['rent_price'];
    } else {
        $price = $row['buy_price'];
    }

    $area =  $row['area'];
    $status =  $row['status'];
    $features =  $row['features'];
    $type =  $row['type'];
    $build_info =  $row['build_info'];
}

?>

<?php

/*
$_SESSION['customer_id'] =  $row['customer_id'];
$_SESSION['user_id'] = $row['user_id'];
$_SESSION['user_role'] = $row['user_role'];
$_SESSION['username'] = $row['username'];
$_SESSION['name'] = $row['name'];

*/

if (isset($_SESSION['customer_id'])) {
    $customer_id = $_SESSION['customer_id'];
    $user_role = $_SESSION['user_role'];
    $name = $_SESSION['name'];

    $stmt2 = query("SELECT email FROM customers WHERE customer_id = {$customer_id}");
    $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
    $email = $row2['email'];
} elseif (isset($_SESSION['admin_id'])) {
    $user_id = $_SESSION['user_id'];
    $user_role = $_SESSION['user_role'];
    $name = $_SESSION['name'];
}





if (isset($_POST['appoint_submit'])) {

    $appoint_date = validate($_POST['appoint_date']);
    $appoint_time = validate($_POST['appoint_time']);
    $message = validate($_POST['message']);
    $request_status = "Pending";

    //------------QUERY-------------

    $stmt = prepare_query("INSERT INTO appointment(customer_id,customer_name,email,appoint_date,appoint_time,message,building_name,flat_no,request_status) VALUES(?,?,?,?,?,?,?,?,?)");
    $stmt->bindParam(1, $customer_id, PDO::PARAM_INT);
    $stmt->bindParam(2, $name, PDO::PARAM_STR);
    $stmt->bindParam(3, $email, PDO::PARAM_STR);
    $stmt->bindParam(4, $appoint_date, PDO::PARAM_STR);
    $stmt->bindParam(5, $appoint_time, PDO::PARAM_STR);
    $stmt->bindParam(6, $message, PDO::PARAM_STR);
    $stmt->bindParam(7, $building_name, PDO::PARAM_STR);
    $stmt->bindParam(8, $flat_no, PDO::PARAM_INT);
    $stmt->bindParam(9, $request_status, PDO::PARAM_STR);


    $stmt->execute();
    //$last_id = last_inserted_id();
    unset($stmt);

    # redirect("single_property.php?success=appointment_submit&apart_status={$apart_status}&apartment_id={$apartment_id}");
    redirect("single_property.php?success=appointment_submit&edit={$apartment_id}&apart_status={$apart_status}");
}


?>


<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from code-theme.com/html/findhouses/single-property-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Dec 2021 10:32:04 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="html 5 template">
    <meta name="author" content="">
    <title>Property Details</title>
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:500,600,800" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="font/flaticon.css">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/fontawesome-5-all.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- LEAFLET MAP -->
    <link rel="stylesheet" href="css/leaflet.css">
    <link rel="stylesheet" href="css/leaflet-gesture-handling.min.css">
    <link rel="stylesheet" href="css/leaflet.markercluster.css">
    <link rel="stylesheet" href="css/leaflet.markercluster.default.css">
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="css/timedropper.css">
    <link rel="stylesheet" href="css/datedropper.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/lightcase.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" id="color" href="css/default.css">
</head>

<body class="inner-pages sin-1 homepage-4 hd-white">
    <!-- Wrapper -->
    <div id="wrapper">
        <!-- START SECTION HEADINGS -->
        <!-- Header Container
        ================================================== -->
        <header id="header-container">
            <!-- Header -->
            <div id="header">
                <div class="container container-header">

                    <?php include "main-nav-buy-rent.php" ?>

                </div>
            </div>
            <!-- Header / End -->

        </header>


        <div class="clearfix"></div>
        <!-- Header Container / End -->
        <!-- END SECTION HEADINGS -->

        <!-- START SECTION PROPERTIES LISTING -->
        <section class="single-proper blog details">

            <!-- Display success messages -->
            <?php display_success_message(); ?>

            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 blog-pots">
                        <div class="row">
                            <div class="col-md-12">
                                <section class="headings-2 pt-0">
                                    <div class="pro-wrapper">
                                        <div class="detail-wrapper-body">
                                            <div class="listing-title-bar">
                                                <h3><?php echo $building_name; ?><span class="mrg-l-5 category-tag">For <?php echo $apart_status; ?></span></h3>
                                                <div class="mt-0">
                                                    <a class="listing-address">
                                                        <i class="fa fa-map-marker pr-2 ti-location-pin mrg-r-5"></i><?php echo $address; ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single detail-wrapper mr-2">
                                            <div class="detail-wrapper-body">
                                                <div class="listing-title-bar">
                                                    <h4>৳ <?php echo $price; ?></h4>
                                                    <div class="mt-0">
                                                        <a href="#listing-location" class="listing-address">
                                                            <p><?php echo $area; ?></p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <!-- main slider carousel items -->


                                <div id="listingDetailsSlider" class="carousel listing-details-sliders slide mb-30">
                                    <h5 class="mb-4">Gallery</h5>
                                    <div class="carousel-inner">
                                        <div class="active item carousel-item" data-slide-number="0">
                                            <img src="admin_marketing/<?php echo $image; ?>" class="img-fluid" alt="slider-listing">
                                        </div>
                                        <div class="item carousel-item" data-slide-number="1">
                                            <img src="admin_marketing/<?php echo $image; ?>" class="img-fluid" alt="slider-listing">
                                        </div>
                                        <div class="item carousel-item" data-slide-number="2">
                                            <img src="admin_marketing/<?php echo $image; ?>" class="img-fluid" alt="slider-listing">
                                        </div>
                                        <a class="carousel-control left" href="#listingDetailsSlider" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                                        <a class="carousel-control right" href="#listingDetailsSlider" data-slide="next"><i class="fa fa-angle-right"></i></a>

                                    </div>
                                    <!-- main slider carousel nav controls -->
                                    <ul class="carousel-indicators smail-listing list-inline">
                                        <li class="list-inline-item active">
                                            <a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#listingDetailsSlider">
                                                <img src="admin_marketing/<?php echo $image; ?>" class="img-fluid" alt="listing-small">
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a id="carousel-selector-1" data-slide-to="1" data-target="#listingDetailsSlider">
                                                <img src="admin_marketing/<?php echo $image; ?>" class="img-fluid" alt="listing-small">
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a id="carousel-selector-2" data-slide-to="2" data-target="#listingDetailsSlider">
                                                <img src="admin_marketing/<?php echo $image; ?>" class="img-fluid" alt="listing-small">
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- main slider carousel items -->
                                </div>




                                <div class="blog-info details mb-30">
                                    <h5 class="mb-4">Description</h5>
                                    <p class="mb-3"><?php echo $build_info; ?></p>
                                </div>
                            </div>
                        </div>


                        <div class="single homes-content details mb-30">


                            <!-- title -->
                            <h5 class="mb-4">Property Details</h5>
                            <ul class="homes-list clearfix">
                                <li>
                                    <span class="font-weight-bold mr-1">Flat no:</span>
                                    <span class="det"><?php echo $flat_no; ?></span>
                                </li>
                                <li>
                                    <span class="font-weight-bold mr-1">Type:</span>
                                    <span class="det"><?php echo $type; ?></span>
                                </li>
                                <li>
                                    <span class="font-weight-bold mr-1">Apartment status:</span>
                                    <span class="det"><?php echo $apart_status; ?></span>
                                </li>
                                <li>
                                    <span class="font-weight-bold mr-1">Price:</span>
                                    <span class="det"><?php echo $price; ?></span>
                                </li>
                                <li>
                                    <span class="font-weight-bold mr-1">Apartment Size:</span>
                                    <span class="det"><?php echo $area; ?></span>
                                </li>
                                <li>
                                    <span class="font-weight-bold mr-1">Bedrooms:</span>
                                    <span class="det"><?php echo $no_of_bedroom; ?></span>
                                </li>
                                <li>
                                    <span class="font-weight-bold mr-1">Bathroom:</span>
                                    <span class="det"><?php echo $no_of_bathroom; ?></span>
                                </li>
                            </ul>
                            <!-- title -->

                            <h5 class="mt-5">Features</h5>
                            <!-- cars List -->

                            <ul class="homes-list clearfix">
                                <?php
                                $aDoor = explode(",", $features);
                                $N = count($aDoor);
                                $m = 1;
                                for ($i = 0; $i < $m; $i++) {
                                    //echo ($aDoor[$i] . " ");
                                ?>

                                    <li>
                                        <i class="fa fa-check-square" aria-hidden="true"></i>
                                        <span><?php echo $aDoor[$i]; ?></span>
                                    </li>

                                <?php } ?>
                            </ul>

                            <ul class="homes-list clearfix">
                                <?php
                                for ($i = $m; $i < $N; $i++) {
                                    //echo ($aDoor[$i] . " ");
                                ?>

                                    <li>
                                        <i class="fa fa-check-square" aria-hidden="true"></i>
                                        <span><?php echo $aDoor[$i]; ?></span>
                                    </li>

                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <aside class="col-lg-4 col-md-12 car">
                        <div class="single widget">

                            <!-- Start: Schedule a Tour -->

                            <div class="schedule widget-boxed mt-33 mt-0">
                                <div class="widget-boxed-header">
                                    <h4><i class="fa fa-calendar pr-3 padd-r-10"></i>Schedule an Appointment</h4>
                                </div>

                                <form method="post" action="">
                                    <div class="agent-contact-form-sidebar">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12 book">
                                                <input type="date" name="appoint_date" id="reservation-date" data-lang="en" data-large-mode="true" data-min-year="2021" data-max-year="2025" data-id="datedropper-0" data-theme="my-style" class="form-control">
                                            </div>
                                            <div class="col-lg-6 col-md-12 book2">
                                                <input type="text" name="appoint_time" id="reservation-time" class="form-control" readonly="">
                                            </div>
                                            <textarea placeholder="Message" name="message" required></textarea>

                                        </div>
                                        <button type="submit" name="appoint_submit" class="btn reservation btn-radius theme-btn full-width mrg-top-10">Submit Request</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <!-- End: Schedule a Tour -->
                        <!-- end author-verified-badge -->
                        
                </div>
                </aside>



            </div>
    </div>
    </section>
    <!-- START FOOTER -->
    <a data-scroll href="#wrapper" class="go-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
    <!-- END FOOTER -->


    <!-- ARCHIVES JS -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/range-slider.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/mmenu.min.js"></script>
    <script src="js/mmenu.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/slick4.js"></script>
    <script src="js/fitvids.js"></script>
    <script src="js/smooth-scroll.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/popup.js"></script>
    <script src="js/ajaxchimp.min.js"></script>
    <script src="js/newsletter.js"></script>
    <script src="js/timedropper.js"></script>
    <script src="js/datedropper.js"></script>
    <script src="js/leaflet.js"></script>
    <script src="js/leaflet-gesture-handling.min.js"></script>
    <script src="js/leaflet-providers.js"></script>
    <script src="js/leaflet.markercluster.js"></script>
    <script src="js/map-single.js"></script>
    <script src="js/color-switcher.js"></script>
    <script src="js/inner.js"></script>

    <!-- Date Dropper Script-->
    <script>
        $('#reservation-date').dateDropper();
    </script>
    <!-- Time Dropper Script-->
    <script>
        this.$('#reservation-time').timeDropper({
            setCurrentTime: false,
            meridians: true,
            primaryColor: "#e8212a",
            borderColor: "#e8212a",
            minutesInterval: '15'
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
                disableOn: 700,
                type: 'iframe',
                mainClass: 'mfp-fade',
                removalDelay: 160,
                preloader: false,
                fixedContentPos: false
            });
        });
    </script>

    <script>
        $('.slick-carousel').each(function() {
            var slider = $(this);
            $(this).slick({
                infinite: true,
                dots: false,
                arrows: false,
                centerMode: true,
                centerPadding: '0'
            });

            $(this).closest('.slick-slider-area').find('.slick-prev').on("click", function() {
                slider.slick('slickPrev');
            });
            $(this).closest('.slick-slider-area').find('.slick-next').on("click", function() {
                slider.slick('slickNext');
            });
        });
    </script>

    </div>
    <!-- Wrapper / End -->
</body>


<!-- Mirrored from code-theme.com/html/findhouses/single-property-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Dec 2021 10:32:05 GMT -->

</html>