<?php
######
# THIS FILE IS ONLY AN EXAMPLE. PLEASE MODIFY AS REQUIRED.
# Contributors: 
#       Md. Rakibul Islam <rakibul.islam@sslwireless.com>
#       Prabal Mallick <prabal.mallick@sslwireless.com>
######

error_reporting(0);
ini_set('display_errors', 0);
?>

<?php
session_start();

require_once(__DIR__ . "/../lib/SslCommerzNotification.php");
include_once(__DIR__ . "/../db_connection.php");
include_once(__DIR__ . "/../OrderTransaction.php");
include(__DIR__ . "/../vendor/autoload.php");

use SslCommerz\SslCommerzNotification;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->load();

$STORE_NAME = getenv('Store_Name');

//Mailtrap Credentials
$SMTP_HOST = getenv('SMTP_HOST');
$SMTP_PORT = getenv('SMTP_PORT');
$SMTP_USER = getenv('SMTP_USER');
$SMTP_PASSWORD = getenv('SMTP_PASSWORD');
$SMTP_ENCRYPTION = PHPMailer::ENCRYPTION_STARTTLS;
$mail = new PHPMailer(true);

?>


<!DOCTYPE html>

<head>
    <meta name="author" content="SSLCommerz">
    <title>Successful Transaction - SSLCommerz</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row" style="margin-top: 10%;">
            <div class="col-md-8 offset-md-2">

                <?php


                $sslc = new SslCommerzNotification();

                //re-directed from checkout page
                $tran_id = $_POST['tran_id'];
                $amount =  $_POST['amount'];
                $currency =  $_POST['currency'];

                # SHIPMENT INFORMATION (Company Details) (fixed) [Adjust the details here again for the receipt]
                //$ship_name = $post_data['ship_name'] = "{$STORE_NAME}"; //store name
                //$ship_address = $post_data['ship_add1'] = "House:24, Road:11, Mohammadia Housing Society,Mohammadpur,Dhaka-1207";
                //$ship_phone = $post_data['ship_phone'] = "+880 1234 56789";

                //$vat = 100;
                //$discount_amount = 0;
                //$delivery_charge = 50;
                //$total_amount = $amount + $vat + $delivery_charge - $discount_amount;

                $ot = new OrderTransaction();
                $sql = $ot->getRecordQuery($tran_id); //get all records from orders table based on transaction id (unique for each customer)
                $result = $conn_integration->query($sql);
                $row = $result->fetch_array(MYSQLI_ASSOC); //fetch as associative array

                //get some info from database table
                $invoice_id = $row['invoice_id'];
                $invoice_date = $row['invoice_date'];
                $client_name = $row['name'];
                $client_email = $row['email'];


                //$Receipt_number = $row['identify_num'];

                //$order_date = $row['order_date'];
                //$order_pin_code = $row['order_pin_code'];


                if ($row['status'] == 'Pending' || $row['status'] == 'Processing') {
                    $validated = $sslc->orderValidate($tran_id, $amount, $currency, $_POST);

                    if ($validated) {
                        $sql = $ot->updateTransactionQuery($tran_id, 'Success');

                        if ($conn_integration->query($sql) === TRUE) { ?>
                            <h2 class="text-center text-success">Congratulations! Your Transaction is Successful.</h2>
                            <br>
                            <table border="1" class="table table-striped">
                                <thead class="thead-dark">
                                    <tr class="text-center">
                                        <th colspan="2">Payment Details</th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td class="text-right">Invoice ID</td>
                                    <td><?= $row['invoice_id'] ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Invoice Date</td>
                                    <td><?= $row['invoice_date'] ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Client Name</td>
                                    <td><?= $row['name'] ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Transaction ID</td>
                                    <td><?= $_POST['tran_id'] ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Transaction Time</td>
                                    <td><?= $_POST['tran_date'] ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Payment Method</td>
                                    <td><?= $_POST['card_issuer'] ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Bank Transaction ID</td>
                                    <td><?= $_POST['bank_tran_id'] ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right">Amount</td>
                                    <td><?= $_POST['amount'] . ' ' . $_POST['currency'] ?></td>
                                </tr>
                            </table>

                <?php

                            //Enter the receipt details into database receipt table 
                            //$sql = "INSERT INTO payment_details(order_id,cus_id,payment_type,receipt_number,receipt_date,transaction_id,transaction_date,bank_transaction_id,paid_amount) 
        //VALUES ($order_id,$cus_id,'$card_type','$Receipt_number','$order_date','$tran_id','$trans_date','$bank_trans_id',$total_amount)";
                            $sql = "UPDATE ORDERS 
                            SET payment_type='{$_POST['card_issuer']}', bank_transaction_id = '{$_POST['bank_tran_id']}' 
                            WHERE transaction_id='$tran_id'";

                            $result = $conn_integration->query($sql);

                            $sql2 = "UPDATE INVOICE SET status='Paid' WHERE invoice_no='$invoice_id'";
                            $result2 = $conn_integration->query($sql2);
    

                            try {
                                //access class
                                
                                $current_email = "admin@gmail.com";
                                $current_name = "Marketing Admin";

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
                                $mail->addAddress($client_email);

                                // Content
                                $mail->isHTML(true);
                                $mail->Subject = "Invoice Payment Confirmation Email for {$client_name}";
                                $mail->Body = "
                                <h2>Invoice Payment Receipt</h2>

                                <table border='1' class='table table-striped'>
                                    <thead class='thead-dark'>
                                        <tr class='text-center'>
                                            <th colspan='2'>Order Details</th>
                                        </tr>
                                    </thead>
                                    <tr>
                                        <td class='text-right'>Invoice ID</td>
                                        <td>{$invoice_id}</td>
                                    </tr>
                                    <tr>
                                        <td class='text-right'>Invoice Date</td>
                                        <td>{$invoice_date}</td>
                                    </tr>
                                    <tr>
                                        <td class='text-right'>Client Name</td>
                                        <td>{$client_name}</td>
                                    </tr>
                                    <tr>
                                        <td class='text-right'>Transaction ID</td>
                                        <td>{$tran_id}</td>
                                    </tr>
                                    <tr>
                                        <td class='text-right'>Transaction Time</td>
                                        <td>{$_POST['tran_date']}</td>
                                    </tr>
                                    <tr>
                                        <td class='text-right'>Payment Method</td>
                                        <td>{$_POST['card_issuer']}</td>
                                    </tr>
                                    <tr>
                                        <td class='text-right'>Bank Transaction ID</td>
                                        <td>{$_POST['bank_tran_id']}</td>
                                    </tr>
                                    <tr>
                                        <td class='text-right'>Amount</td>
                                        <td>{$_POST['amount']} {$_POST['currency']}</td>
                                    </tr>

                                </table>
        ";

                                $mail->send();

                                //redirect("index.php?success=customer_reserve");
                            } catch (Exception $e) {
                                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                            }

                            echo "<a href='../index.php' class='btn btn-success btn-lg btn-block'>Click here to return to Home Page</a>";
                            //session_destroy();
                        } else { // update query returned error

                            echo '<h2 class="text-center text-danger">Error updating record: </h2>' . $conn_integration->error;
                        } // update query successful or not 

                    } else { // $validated is false

                        $conn_integration->query($ot->updateTransactionQuery($tran_id, 'Failed'));
                        echo '<h2 class="text-center text-danger">Payment was not valid. Please contact with the merchant.</h2>';
                    } // check if validated or not

                } else { // status is something else

                    echo '<h2 class="text-center text-danger">Invalid Information.</h2>';
                    //session_destroy();
                } // status is 'Pending' or already 'Processing'
                ?>

            </div>
        </div>
    </div>
</body>