<?php

declare(strict_types=1);
session_start();
ob_start();

include "../includes/connect.php";
include "../includes/functions.php";


$username = $_SESSION['username'];
$name = $_SESSION['name'];
if(isset($_GET['i_no'])){
$i_no = $_GET['i_no'];


}

$invoice = $i_no;


?>

<!DOCTYPE html>
<html lang="zxx">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="html 5 template">
    <meta name="author" content="">
    <title>Find Houses - HTML5 Template</title>
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
    <link rel="stylesheet" href="css/invoice.css">
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

                    <div class="col-lg-9 col-md-12 col-xs-12 py-0 pl-0 user-dash2">
                        <!-- Print Button -->        
                        <form action="../pdf.php" method="post" id="test22">
                        <div class="print-button-container">
                           <!-- <a href="javascript:window.print()" class="print-button">Print this invoice</a> -->
                           <!--<a href="../pdf.php" class="print-button">Print this invoice</a>-->
                           <button class="print-button" form="test22" name="print" formmethod="post">Print This invoice</button>
                        </div>             
                        <div class="invoice mb-0">
                            <div class="card border-0">
                                <div class="card-body p-0">
                                    <div class="row p-5 the-five">
                                        <div class="col-md-6">
                                            <img src="images/logo.svg" width="80" alt="Logo">
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <p class="font-weight-bold mb-1">Invoice No:  <?php echo $i_no ?></p>
                                            <?php  $stmt = query("SELECT * 
                                                    FROM invoice
                                                    WHERE invoice_no='$i_no'");
                                                    $table= $stmt->fetchall();
                                                    $row=$table[0];

                                                    $b_month=$row['billing_month'];
                                                    $flat_no= $row['flat_no'];
                                                    
                                                    $building_name= $row['building_name'];

                                                    $stmt1 = query("SELECT * 
                                                    FROM utility_bill
                                                    WHERE building_name='$building_name' 
                                                    AND flat_no='$flat_no' 
                                                    AND month='$b_month'  ");

                                                    $table1=$stmt1->fetchAll(); 
                                                    $row1=$table1[0];?>
                                                    

                                            <p class="text-muted">Due to: <?php echo $row['due_date'] ?> </p>
                                            
                                        </div>
                                    </div>
                                    <hr class="my-5">
                                    <div class="row pb-5 p-5 the-five">
                                        <div class="col-md-6">
                                            <h3 class="font-weight-bold mb-4">Invoice To</h3>
                                                <p class="mb-0 font-weight-bold"><?php echo $name ?></p>
                                                <?php  $stmt2 = query("SELECT * 
                                                                       FROM clients
                                                                       WHERE name='$name'");
                                                                       $table2= $stmt2->fetchall();
                                                                       $row2=$table2[0];
                                                ?>

                                                <p class="mb-0">Occupation: <?php echo $row2['occupation']?></p>
                                                <p class="mb-0">Present Address: <?php echo $row2['present_address']?></p>
                                                <p class="mb-0">Mobile Number: <?php echo $row2['mobile_number']?></p>
                 
                                        </div>
                                    </div>

                                    <div class="row p-5 the-five">
                                        <div class="col-md-12">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="border-0 text-uppercase small font-weight-bold">Description</th>
                                                        <th class="border-0 text-uppercase small font-weight-bold">Gas Bill</th>
                                                        <th class="border-0 text-uppercase small font-weight-bold">Electricity Bill</th>
                                                        <th class="border-0 text-uppercase small font-weight-bold">Water Bill</th>
                                                        <th class="border-0 text-uppercase small font-weight-bold">Additional Bill</th>
                                                        <th class="border-0 text-uppercase small font-weight-bold">Service Charge</th>
                                                        <th class="border-0 text-uppercase small font-weight-bold">Arrear</th>
                                                        <th class="border-0 text-uppercase small font-weight-bold">Due Charge</th>
                                                        <th class="border-0 text-uppercase small font-weight-bold">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Amount</td>
                                                        <td><?php echo $row1['gas_bill']?></td>
                                                        <td><?php echo $row1['electricity_bill']?></td>
                                                        <td><?php echo $row1['water_bill']?></td>
                                                        <td><?php echo $row1['additional_bill']?></td>
                                                        <td><?php echo $row1['service_charge']?></td>
                                                        <td><?php echo $row['arrear']?></td>
                                                        <td><?php echo $row['due_charge']?></td>
                                                        <td><?php echo $row['total_bill']?></td>
                                                        
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <input type="hidden" value="<?php echo $name; ?>" name="name" required />
                                    <input type="hidden" value="<?php echo $invoice; ?>" name="invoice" required />
                                    <input type="hidden" value="<?php echo $row['due_date'] ?>" name="due_date" required />

                                    <input type="hidden" value="<?php echo $row2['occupation'] ?>" name="occupation" required />
                                    <input type="hidden" value="<?php echo $row2['present_address'] ?>" name="present_address" required />
                                    <input type="hidden" value="<?php echo $row2['mobile_number'] ?>" name="mobile_number" required />

                                    <input type="hidden" value="<?php echo $row1['gas_bill'] ?>" name="gas_bill" required />
                                    <input type="hidden" value="<?php echo $row1['electricity_bill'] ?>" name="electricity_bill" required />
                                    <input type="hidden" value="<?php echo $row1['water_bill'] ?>" name="water_bill" required />
                                    <input type="hidden" value="<?php echo $row1['additional_bill'] ?>" name="additional_bill" required />
                                    <input type="hidden" value="<?php echo $row1['service_charge'] ?>" name="service_charge" required />
                                    <input type="hidden" value="<?php echo $row['arrear'] ?>" name="arrear" required />
                                    <input type="hidden" value="<?php echo $row['due_charge'] ?>" name="due_charge" required />
                                    <input type="hidden" value="<?php echo $row['total_bill'] ?>" name="total_bill" required />

                                    <div class="d-flex flex-row-reverse bg-dark text-white p-4">
                                        <div class="py-3 px-5 text-left">
                                            <div class="mb-2"><a href="../example_hosted.php?amount=<?php echo $row['total_bill']; ?>&invoice_id=<?php echo $row['invoice_no']; ?>&invoice_date=<?php echo $row['issue_date']; ?>" onclick="javascript: return confirm('Do want to proceed to payment?');"><i class="fas fa-credit-card"></i></a> </div>
                                            <div class="h2 font-weight-light"><a href="../example_hosted.php?amount=<?php echo $row['total_bill']; ?>&invoice_id=<?php echo $row['invoice_no']; ?>&invoice_date=<?php echo $row['issue_date']; ?>" onclick="javascript: return confirm('Do want to proceed to payment?');"> Pay Now</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
</form>
                    </div>
                </div>
            </div>
        </section>
        <!-- END SECTION USER PROFILE -->

        <!-- START PRELOADER -->
        <div id="preloader">
            <div id="status">
                <div class="status-mes"></div>
            </div>
        </div>
        <!-- END PRELOADER -->

        <!-- ARCHIVES JS -->
        <script src="js/jquery-3.5.1.min.js"></script>
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
            $(".header-user-name").on("click", function() {
                $(".header-user-menu ul").toggleClass("hu-menu-vis");
                $(this).toggleClass("hu-menu-visdec");
            });

        </script>

    </div>
    <!-- Wrapper / End -->
</body>


<!-- Mirrored from code-theme.com/html/findhouses/invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Dec 2021 10:32:33 GMT -->
</html>
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
            $(".header-user-name").on("click", function() {
                $(".header-user-menu ul").toggleClass("hu-menu-vis");
                $(this).toggleClass("hu-menu-visdec");
            });

        </script>

    </div>
    <!-- Wrapper / End -->
</body>


<!-- Mirrored from code-theme.com/html/findhouses/invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Dec 2021 10:32:33 GMT -->
</html>
