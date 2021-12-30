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

    $request_status = 'Rejected';

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
        $mail->Subject = "Appointment Rejection Email for {$customer_name}";
        $mail->Body = "<p>
            Dear {$customer_name},<br><br>
            Your appointment request has been rejected.<br><br>
            Please choose another time.<br><br>
            Thank you.<br><br>
            </p>";
        $mail->send();

        redirect("view_appointment.php?success=appointment_reject");
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

?>