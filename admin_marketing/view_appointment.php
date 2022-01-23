<?php

declare(strict_types=1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();
ob_start();

include "../includes/connect.php";
include "../includes/functions.php";

//Load Composer's autoloader
#require 'vendor/autoload.php';
#require '../vendor/autoload.php';
include "../vendor/autoload.php";
# include(__DIR__ . "/../vendor/autoload.php");
?>

<!-- Mail Section (Mailtrap API) -->
<?php
$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->load(); //works here

//Mailtrap Credentials
$SMTP_HOST = getenv('SMTP_HOST');
$SMTP_PORT = getenv('SMTP_PORT');
$SMTP_USER = getenv('SMTP_USER');
$SMTP_PASSWORD = getenv('SMTP_PASSWORD');
$SMTP_ENCRYPTION = PHPMailer::ENCRYPTION_STARTTLS;
$mail = new PHPMailer(true);
//echo get_class($mail); //find out if class is available
?>

<?php
if (isset($_GET['edit'])) {
    $appointment_id = $_GET['edit'];
    $stmt = query("SELECT * FROM appointment WHERE appointment_id={$appointment_id}");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $customer_id = $row['customer_id'];
    $customer_name = $row['customer_name'];
    $email = $row['email'];
    $building_name = $row['building_name'];
    $appoint_date = $row['appoint_date'];
    $appoint_time = $row['appoint_time'];
    $flat_no =  $row['flat_no'];

    $request_status = 'Confirmed';

    //------------QUERY-------------

    $stmt = prepare_query("UPDATE appointment SET request_status = ? WHERE appointment_id = ?");
    $stmt->bindParam(1, $request_status, PDO::PARAM_STR);
    $stmt->bindParam(2, $appointment_id, PDO::PARAM_INT);

    $stmt->execute();
    //$last_id = last_inserted_id();
    unset($stmt);

    $current_email = "admin@gmail.com";
    $current_name = "Marketing Admin";

    //Setting up PHPMAILER
    try {
        //access class

        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                   
        $mail->isSMTP();
        $mail->Host = $SMTP_HOST;
        $mail->Username = $SMTP_USER;
        $mail->Password = $SMTP_PASSWORD;
        $mail->Port = $SMTP_PORT;
        $mail->SMTPSecure = $SMTP_ENCRYPTION;
        $mail->SMTPAuth = true;

        //Recipients
        $mail->setFrom($current_email, $current_name);
        $mail->addAddress($email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = "Appointment Confirmation Email for {$customer_name}";
        $mail->Body = "<p>
            Dear {$customer_name},<br><br>
            Thank you for your appointment request. We are pleased to confirm your appointment with us on {$appoint_date} at {$appoint_time} for {$building_name} flat no. {$flat_no}.<br><br>
            Please make sure to come on time.<br><br>
            Thank you for choosing us.<br><br>
            </p>";
        $mail->send();

        redirect("view_appointment.php?success=appointment_confirmed");
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
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
    <title>View Property</title>
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

                        <!-- Display success messages -->
                        <?php display_success_message(); ?>

                        <div class="dashborad-box stat bg-white">

                            <div class="dashborad-box">
                                <h4 class="title">View Appointment Request</h4>
                                <div class="section-body listing-table">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Customer ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Appointment Date</th>
                                                    <th>Time</th>
                                                    <th>Building name</th>
                                                    <th>Flat no.</th>
                                                    <th>Message</th>
                                                    <th>Confirm</th>
                                                    <th>Reject</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                //JOIN query
                                                $stmt = query("SELECT * FROM appointment WHERE request_status='Pending'");

                                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                    $appointment_id = $row['appointment_id'];
                                                    $customer_id = $row['customer_id'];
                                                    $customer_name = $row['customer_name'];
                                                    $email =  $row['email'];
                                                    $appoint_date =  $row['appoint_date'];
                                                    $appoint_time =  $row['appoint_time'];
                                                    $building_name =  $row['building_name'];
                                                    $flat_no =  $row['flat_no'];
                                                    $message =  $row['message'];

                                                    //close php tag so that we can include some html inside the php while loop
                                                ?>


                                                    <tr>
                                                        <td><?php echo $customer_id; ?></td>
                                                        <td><?php echo $customer_name; ?></td>
                                                        <td><?php echo $email; ?></td>
                                                        <td><?php echo $appoint_date; ?></td>
                                                        <td><?php echo $appoint_time; ?></td>
                                                        <td><?php echo $building_name; ?></td>
                                                        <td><?php echo $flat_no; ?></td>
                                                        <td><?php echo $message; ?></td>
                                                        <td class="edit"><a onClick="javascript: return confirm('Confirm Appointment?');" href="view_appointment.php?edit=<?php echo $appointment_id; ?>"><i class="fa fa-check"></i></a></td>
                                                        <td class="edit"><a onClick="javascript: return confirm('Reject Appointment?');" href="reject_appointment.php?edit=<?php echo $appointment_id; ?>"><i class="fa fa-close"></i></a></td>
                                                    </tr>

                                                <?php } ?>

                                            </tbody>
                                        </table>


                                    </div>
                                </div>
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