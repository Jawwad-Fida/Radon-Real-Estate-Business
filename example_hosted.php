<?php
session_start();

include "includes/connect.php";
include "includes/functions.php";

//delete building based on id 
if (isset($_GET['amount'])) {

    $amount = $_GET['amount'];
    $_SESSION['amount'] = $amount; 

    $invoice_id = $_GET['invoice_id'];
    $invoice_date = $_GET['invoice_date'];
}

if (is_client() == true) {

    $client_id = $_SESSION['client_id'];
    $stmt = query("SELECT * FROM clients WHERE client_id = {$client_id}");
    /*
	$stmt = query("SELECT u1.name,c1.mobile_number,c1.email,c1.address,c1.city,c1.zipcode
    FROM users u1
    
    JOIN customers c1
    ON c1.user_id = u1.user_id
    WHERE c1.customer_id = {$cus_id}");
    */

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $client_name = $row['name'];
    $client_mobile_number = $row['mobile_number'];
    $client_email = $row['email'];
    $client_present_address = $row['present_address'];
    $building_name = $row['building_name'];
    $flat_number = $row['flat_number'];
}


?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="SSLCommerz">
    <title>Example - Hosted Checkout | SSLCommerz</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>

<body class="bg-light">
    <div class="container">
        <div class="py-5 text-center">
            <h2>Hosted Payment - SSLCommerz</h2>
            <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. We have provided this sample form for understanding Hosted Checkout Payment with SSLCommerz.</p>
        </div>

        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your Invoice Details</span>
                    <span class="badge badge-secondary badge-pill">Details Below</span>
                </h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Invoice ID</h6>
                            <small class="text-muted">Brief description</small>
                        </div>
                        <span class="text-muted"><?php echo $invoice_id; ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Invoice Date</h6>
                            <small class="text-muted">Brief description</small>
                        </div>
                        <span class="text-muted"><?php echo $invoice_date; ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (BDT)</span>
                        <strong><?php echo $amount; ?> TK</strong>
                    </li>
                </ul>
            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Billing address</h4>


                <form action="checkout_hosted.php" method="POST" class="needs-validation">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="firstName">Full name</label>
                            <input type="text" name="customer_name" class="form-control" id="customer_name" value="<?php echo $client_name; ?>" required>
                            <div class="invalid-feedback">
                                Valid customer name is required.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="mobile">Mobile</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">+88</span>
                            </div>
                            <input type="text" name="customer_mobile" class="form-control" id="mobile" value="<?php echo $client_mobile_number; ?>" required>
                            <div class="invalid-feedback" style="width: 100%;">
                                Your Mobile number is required.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email <span class="text-muted">(Optional)</span></label>
                        <input type="email" name="customer_email" class="form-control" id="email" value="<?php echo $client_email; ?>" required>
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="customer_address" value="<?php echo $client_present_address; ?>" required>
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>

                    <hr class="mb-4">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="same-address">
                        <input type="hidden" value="<?php echo $amount; ?>" name="amount" id="total_amount" required />
                        <input type="hidden" value="<?php echo $invoice_id; ?>" name="invoice_id" required />
                        <input type="hidden" value="<?php echo $invoice_date; ?>" name="invoice_date" required />
                        <input type="hidden" value="<?php echo $building_name; ?>" name="building_name" required />
                        <input type="hidden" value="<?php echo $flat_number; ?>" name="flat_number" required />
                        <!-- sent client id session and others as hidden values   -->
                    </div>

                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout (Hosted)</button>
                </form>


            </div>
        </div>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">&copy; 2019 Company Name</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Privacy</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Support</a></li>
            </ul>
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>