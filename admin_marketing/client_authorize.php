<?php

declare(strict_types=1);
session_start();
ob_start();

include "../includes/connect.php";
include "../includes/functions.php";
# include "upload-image.php";
?>

<?php

if (isset($_GET['edit'])) {
    $customer_id = $_GET['edit'];
    $user_id = $_GET['user_id'];
    $current_user_id = $user_id;
    
    $stmt = query("SELECT * FROM customers WHERE customer_id ={$customer_id} AND user_id = {$user_id}");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $username = $row['username'];
    $mobile_number = $row['mobile_number'];
    $email = $row['email'];
    $occupation = $row['occupation'];
    $permanent_address = $row['permanent_address'];
    $gender = $row['gender'];
    $identity_num = ['identity_num'];
    $nationality = $row['nationality'];

    $stmt2 = query("SELECT * FROM users WHERE user_id ={$current_user_id}");
    $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
    $name = $row2['name'];

    $client_username = generateClientUsername($username); //generate random username for client
    $client_password = generateClientPassword(); //generate random password for password
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
                            <h3>Authorize to Client</h3>
                            <div class="property-form-group">

                                <form action="authorize_client.php" method="post">

                                    <div class="row">

                                        <div class="col-lg-4 col-md-12">
                                            <p class="no-mb">
                                                <label for="price">Name</label>
                                                <input type="text" name="name" value="<?php echo $name; ?>" id="price">
                                            </p>
                                        </div>

                                        <div class="col-lg-4 col-md-12">
                                            <p class="no-mb">
                                                <label for="price">Client Username</label>
                                                <input type="text" name="username" value="<?php echo $client_username; ?>" id="price">
                                            </p>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <p class="no-mb last">
                                                <label for="area">Client Password</label>
                                                <input type="text" name="password" value="<?php echo $client_password; ?>" id="area">
                                            </p>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-lg-4 col-md-12">
                                            <p class="no-mb">
                                                <label for="price">Building No.</label>
                                                <input type="text" name="building_num" id="price">
                                            </p>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <p class="no-mb">
                                                <label for="price">Flat No.</label>
                                                <input type="text" name="flat_num" id="price">
                                            </p>
                                        </div>

                                
                                        <div class="col-lg-4 col-md-12 dropdown faq-drop">
                                            <div class="form-group categories">
                                                <label for="city">Booking Status</label>
                                                <select class="form-control" name="booking_status">
                                                    <option value="Booked">Booked</option>
                                                    <option value="Not Booked">Not Booked</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <br>

                                    <input type="hidden" id="custId" name="user_id" value="<?php echo $current_user_id; ?>">
                                    <input type="hidden" id="custId" name="customer_id" value="<?php echo $customer_id; ?>">
                                    <input type="hidden" id="custId" name="mobile_number" value="<?php echo $mobile_number; ?>">
                                    <input type="hidden" id="custId" name="email" value="<?php echo $email; ?>">
                                    <input type="hidden" id="custId" name="occupation" value="<?php echo $occupation; ?>">
                                    <input type="hidden" id="custId" name="permanent_address" value="<?php echo $permanent_address; ?>">
                                    <input type="hidden" id="custId" name="gender" value="<?php echo $gender; ?>">
                                    <input type="hidden" id="custId" name="nationality" value="<?php echo $nationality; ?>">



                                    <div class="row">
                                        <div class="add-property-button pt-5">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="prperty-submit-button">
                                                        <button type="submit" name="update_submit">Authorize Client</button>
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