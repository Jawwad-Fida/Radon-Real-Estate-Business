<?php

declare(strict_types=1);
session_start();
ob_start();

include "includes/connect.php";
include "includes/functions.php";
?>
<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
include(__DIR__ . "/vendor/autoload.php");
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

if (isset($_POST['forgot_submit'])) {
    $email = validate($_POST['email']);

    //Error messages
    if (empty($email)) {
        redirect("forgot.php?error=emptyFields");
        exit();
    }

    //check if email exists
    if (email_does_not_exist($email) == 'true') {
        redirect("forgot.php?error=no_email");
        exit();
    }

    //Creating tokens (see if same system can be used for OTP order and reservation - part 2)
    $length = 50;
    $token = bin2hex(openssl_random_pseudo_bytes($length));

    //Updating database with token values
    $stmt = prepare_query("UPDATE users SET token=? WHERE user_email=?");
    $stmt->bindParam(1, $token, PDO::PARAM_STR);
    $stmt->bindParam(2, $email, PDO::PARAM_STR);
    $stmt->execute();
    unset($stmt); //close off prepared statements

    //Setting up PHP Mailer for Mailtrap API
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
        $mail->setFrom('admin@example.com', 'Restaurant Admin');
        $mail->addAddress($email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Password Reset Email';
        $mail->Body = "<p>Please click here to reset your password: - 
        <a href='http://localhost/radon/reset.php?email={$email}&token={$token}' target='_blank'>http://localhost/radon/reset.php?email={$email}&token={$token}</a>
        </p>";
        
        $mail->send();
        redirect("forgot.php?success=forgot_sent");
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>



<!DOCTYPE html>
<html>

<head>
    <title>Forgot Password</title>
    <link rel="stylesheet" type="text/css" href="css\fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="css\style_login.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <!-- Display error messages -->
            <?php display_error_message(); ?>

            <!-- Display success messages -->
            <?php display_success_message(); ?>
            <h2>Password Recovery</h2>
        </div>
        <div class="main">

            <form action="" method="post">
                <span>
                    <i class="fa fa-user"></i>
                    <input type="email" placeholder="Enter Email" name="email">
                </span><br>
                

                <button type="submit" name="forgot_submit" class="btn btn-primary">Password Recovery</button>
                <br>
                <span> <a  href="#"></a></span><br>
                <br>
                


            </form>

        </div>
    </div>
</body>

</html>

<?php
//close database connection - initialize object to null
$pdo = null;
ob_end_flush();
?>





<!--<a href='http://www.jawwadfida.com/phpDemo/food/reset.php?email={$email}&token={$token}' target='_blank'>http://www.jawwadfida.com/phpDemo/food/reset.php?email={$email}&token={$token}</a>
        </p>"--> 

        