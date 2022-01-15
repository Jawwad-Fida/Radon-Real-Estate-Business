<?php

declare(strict_types=1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

session_start();
ob_start();

include "../includes/connect.php";
include "../includes/functions.php";
include "../vendor/autoload.php";
?>

<?php

if (isset($_GET['edit'])) {
    $complaint_id = $_GET['edit'];
    $current_complaint_id = $complaint_id;
    $client_id = $_GET['client_id'];
    $current_client_id = $client_id;

    $stmt = query("SELECT * FROM complaint WHERE complaint_id ={$complaint_id} AND client_id = {$current_client_id}");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $complaint_issue = $row['complaint_issue'];
    $email = $row['email'];
    $build_num = $row['build_num'];
    $flat_no = $row['flat_no'];
    $name = $row['name'];
}

?>

<?php

if (isset($_POST['add_submit'])) {


    $flat_no = validate($_POST['flat_num']);
    $build_num = validate($_POST['build_num']);
    $complaint_issue = validate($_POST['issue']);
    $message = validate($_POST['description']);
    $complaint_date = date("Y/m/d");
    $admin_response = "Responded";

    $client_id = $_POST['client_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $complaint_id = $_POST['complaint_id'];



    //Check for errors
    if (empty($complaint_issue) || empty($message) || empty($build_num) || empty($flat_no)) {
        redirect("reply_complaint.php?error=emptyFields");
        exit();
    }


    //------------QUERY-------------


    $stmt = prepare_query("UPDATE complaint SET admin_response=?,admin_reply=? WHERE complaint_id=?");
    $stmt->bindParam(1, $admin_response, PDO::PARAM_STR);
    $stmt->bindParam(2, $message, PDO::PARAM_STR);
    $stmt->bindParam(3, $complaint_id, PDO::PARAM_INT);


    $stmt->execute();
    unset($stmt);
    

    //------------ MailTrap (Mail) -------------

    $dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__);
    $dotenv->load(); //works here

    //Mailtrap Credentials
    $SMTP_HOST = getenv('SMTP_HOST');
    $SMTP_PORT = getenv('SMTP_PORT');
    $SMTP_USER = getenv('SMTP_USER');
    $SMTP_PASSWORD = getenv('SMTP_PASSWORD');
    $SMTP_ENCRYPTION = PHPMailer::ENCRYPTION_STARTTLS;
    $mail = new PHPMailer(true);

    $current_email = "admin_finance@gmail.com";
    $current_name = "Finance and Account Admin";

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
        $mail->Subject = "Replying Complaint to Client: {$name}";
        $mail->Body = "<p>
            Dear {$name},<br><br>
            We have replied to your complaint regarding the following issue:<br><br>
            <b>{$complaint_issue}</b><br><br>
            The issue is as follows:<br><br>
            <b>{$message}</b><br><br>
            We hope you will be satisfied with our service.<br><br>
            Thank you for choosing us.<br><br>
            Regards,<br>
            Finance and Account Admin
            </p>";
        $mail->send();

        redirect("client_complaints.php?success=message_sent");
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
    <title>Reply Complaint</title>
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
                            <h3>Reply Complaint to Client</h3>
                            <div class="property-form-group">

                                <form action="" method="post">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>
                                                <label for="title">Complaint Issue</label>
                                                <input type="text" name="issue" id="title" value="<?php echo $complaint_issue; ?>">
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p>
                                                <label for="description">Complaint Description</label>
                                                <textarea id="description" name="description" placeholder="Enter message"></textarea>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">

                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <p>
                                                <label for="title">Building Number</label>
                                                <input type="text" name="build_num" id="title" value="<?php echo $build_num; ?>">
                                            </p>
                                        </div>

                                        <div class="col-md-6">
                                            <p>
                                                <label for="title">Flat number</label>
                                                <input type="text" name="flat_num" id="title" value="<?php echo $flat_no; ?>">
                                            </p>
                                        </div>
                                    </div>

                                    <input type="hidden" id="custId" name="client_id" value="<?php echo $current_client_id; ?>">
                                    <input type="hidden" id="custId" name="email" value="<?php echo $email; ?>">
                                    <input type="hidden" id="custId" name="name" value="<?php echo $name; ?>">
                                    <input type="hidden" id="custId" name="complaint_id" value="<?php echo $current_complaint_id; ?>">

                                    <div class="add-property-button pt-6">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="prperty-submit-button">
                                                    <button type="submit" name="add_submit">Reply Complaint</button>
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

<?php
//close database connection - initialize object to null
$pdo = null;
ob_end_flush();
?>