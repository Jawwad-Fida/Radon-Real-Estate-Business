<?php

declare(strict_types=1);
session_start();
ob_start();

include "../includes/connect.php";
include "../includes/functions.php";
?>

<?php

if (isset($_POST['add_submit'])) {

    $client_id = $_SESSION['client_id'];

    $stmt2 = query("SELECT * FROM clients WHERE client_id = {$client_id}");
    $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
    $name =  $row2['name'];
    $username =  $row2['username'];
    $mobile_number =  $row2['mobile_number'];
    $email =  $row2['email'];

        
    $flat_no = validate($_POST['flat_num']);
    $build_num = validate($_POST['build_num']);
    $complaint_issue = validate($_POST['issue']);
    $complaint_description = validate($_POST['description']);
    $complaint_date = date("Y/m/d");
    $admin_response = "Not Responded Yet";
    
    //Check for errors
    if (empty($complaint_issue) || empty($complaint_description) || empty($build_num) || empty($flat_no)) {
        redirect("complaint_box.php?error=emptyFields");
        exit();
    }

    //------------QUERY-------------

    $stmt = prepare_query("INSERT INTO complaint(client_id,name,mobile_number,email,build_num,flat_no,complaint_issue,complaint_date,complaint_details,username,admin_response) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bindParam(1, $client_id, PDO::PARAM_INT);
    $stmt->bindParam(2, $name, PDO::PARAM_STR);
    $stmt->bindParam(3, $mobile_number, PDO::PARAM_INT);
    $stmt->bindParam(4, $email, PDO::PARAM_STR);
    $stmt->bindParam(5, $build_num, PDO::PARAM_STR);
    $stmt->bindParam(6, $flat_no, PDO::PARAM_STR);
    $stmt->bindParam(7, $complaint_issue, PDO::PARAM_STR);
    $stmt->bindParam(8, $complaint_date, PDO::PARAM_STR);
    $stmt->bindParam(9, $complaint_description, PDO::PARAM_STR);
    $stmt->bindParam(10, $username, PDO::PARAM_STR);
    $stmt->bindParam(11, $admin_response, PDO::PARAM_STR);
    

    $stmt->execute();
    //$last_id = last_inserted_id();
    unset($stmt);

    redirect("complaint_box.php?success=message_sent");
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
    <title>Complaint Box</title>
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
                            <h3>Please Write Down your Complaint</h3>
                            <div class="property-form-group">

                                <form action="" method="post">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>
                                                <label for="title">Complaint Issue</label>
                                                <input type="text" name="issue" id="title" placeholder="Enter complaint subject">
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>
                                                <label for="description">Complaint Description</label>
                                                <textarea id="description" name="description" placeholder="Describe your complaint"></textarea>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">

                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <p>
                                                <label for="title">Building Number</label>
                                                <input type="text" name="build_num" id="title" placeholder="Enter Building Number">
                                            </p>
                                        </div>

                                        <div class="col-md-6">
                                            <p>
                                                <label for="title">Flat number</label>
                                                <input type="text" name="flat_num" id="title" placeholder="Enter flat number">
                                            </p>
                                        </div>
                                    </div>

                                    <div class="add-property-button pt-6">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="prperty-submit-button">
                                                    <button type="submit" name="add_submit">Submit Complaint</button>
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