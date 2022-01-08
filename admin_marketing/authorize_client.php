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


if (isset($_POST['update_submit'])) {

    $user_role = "client";

    $name = validate($_POST['name']);
    $username = validate($_POST['username']);
    $password = validate($_POST['password']);
    $flat_num = validate($_POST['flat_num']);
    $building_num = validate($_POST['building_num']);
    $user_id = $_POST['user_id'];
    $customer_id = $_POST['customer_id'];
    $booking_status = $_POST['booking_status'];
    $mobile_number = $_POST['mobile_number'];
    $email = $_POST['email'];
    $occupation = $_POST['occupation'];

    $stmt = query("SELECT * FROM apartment WHERE (flat_no ='{$flat_num}' AND build_num = '{$building_num}')");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $present_address =  $row['address'];
    $apartment_status =  $row['apartment_status'];
    $building_name =  $row['building_name'];
    $type =  $row['type'];

    $permanent_address = $_POST['permanent_address'];
    $gender = $_POST['gender'];
    $nationality = $_POST['nationality'];

    //Checking for errors
    if (empty($flat_num) || empty($building_num) || empty($name) || empty($username) || empty($name) || empty($password)) {
        redirect("client_authorize.php?error=emptyFields&edit={$customer_id}&user_id={$user_id}");
        exit();
    }

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    //------------QUERY-------------

    $stmt4 = prepare_query("INSERT INTO clients(user_id,name,username,mobile_number,email,occupation,present_address,permanent_address,gender,nationality,building_name,flat_number,client_type) 
    VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");

    $stmt4->bindParam(1, $user_id, PDO::PARAM_INT);
    $stmt4->bindParam(2, $name, PDO::PARAM_STR);
    $stmt4->bindParam(3, $username, PDO::PARAM_STR);
    $stmt4->bindParam(4, $mobile_number, PDO::PARAM_INT);
    $stmt4->bindParam(5, $email, PDO::PARAM_STR);
    $stmt4->bindParam(6, $occupation, PDO::PARAM_STR);
    $stmt4->bindParam(7, $present_address, PDO::PARAM_STR);
    $stmt4->bindParam(8, $permanent_address, PDO::PARAM_STR);
    $stmt4->bindParam(9, $gender, PDO::PARAM_STR);
    $stmt4->bindParam(10, $nationality, PDO::PARAM_STR);
    $stmt4->bindParam(11, $building_name, PDO::PARAM_STR);
    $stmt4->bindParam(12, $flat_num, PDO::PARAM_STR);
    $stmt4->bindParam(13, $apartment_status, PDO::PARAM_STR);
    $stmt4->execute();

    $stmt6 = prepare_query("UPDATE users SET user_role=?,username=?,user_password=? WHERE user_id=?");
    $stmt6->bindParam(1, $user_role, PDO::PARAM_STR);
    $stmt6->bindParam(2, $username, PDO::PARAM_STR);
    $stmt6->bindParam(3, $passwordHash, PDO::PARAM_STR);
    $stmt6->bindParam(4, $user_id, PDO::PARAM_INT);
    $stmt6->execute();

    $stmt5 = prepare_query("UPDATE apartment SET status=?,client_username=? WHERE (flat_no=? AND build_num=?)");
    $stmt5->bindParam(1, $booking_status, PDO::PARAM_STR);
    $stmt5->bindParam(2, $username, PDO::PARAM_STR);
    $stmt5->bindParam(3, $flat_num, PDO::PARAM_STR);
    $stmt5->bindParam(4, $building_num, PDO::PARAM_STR);
    $stmt5->execute();

    unset($stm4);
    unset($stm5);
    unset($stm6);

    $stmt7 = query("DELETE FROM customers WHERE user_id={$user_id}");
    unset($stmt7);


    //------------ MailTrap (Mail)  Send Username and Password to Client Email   -------------
    //Mail Section (Mailtrap API)
    $dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__);
    $dotenv->load(); //works here

    //Mailtrap Credentials
    $SMTP_HOST = getenv('SMTP_HOST');
    $SMTP_PORT = getenv('SMTP_PORT');
    $SMTP_USER = getenv('SMTP_USER');
    $SMTP_PASSWORD = getenv('SMTP_PASSWORD');
    $SMTP_ENCRYPTION = PHPMailer::ENCRYPTION_STARTTLS;
    $mail = new PHPMailer(true);

    $current_email = "admin@gmail.com";
    $current_name = "Marketing Admin";

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
        $mail->Subject = "Client Purchase Confirmation Email for {$name}";
        $mail->Body = "<p>
            Dear {$name},<br><br>
            We are hereby confirming your purchase for the apartment {$flat_num}-{$building_num} at {$present_address}<br><br>
            Apartment type - {$type}, Purchase type - {$apartment_status}<br><br>
            Your new Client username is {$username} and your password is {$password}, you can change the password after logging in<br><br>
            Thank you for choosing us, and please do contact us if you have any inquiries.<br><br>
            Best Regards,<br>
            Marketing Team
            </p>";
        $mail->send();

        redirect("view_clients.php?success=item_update");
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    
}
