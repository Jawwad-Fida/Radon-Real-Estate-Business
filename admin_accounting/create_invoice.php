<?php

declare(strict_types=1);
session_start();
ob_start();

include "../includes/connect.php";
include "../includes/functions.php";
?>

<?php

     
     if(isset($_POST['billing_month']) &&isset($_POST['invoice_name'])&&isset($_POST['building_name'])&&isset($_POST['issue_date'])&&isset($_POST['due_date']))
     {
          $building_name=$_POST['building_name'];
          $billing_month=$_POST['billing_month'];
          $current_date=$_POST['issue_date'];
          $due_date=$_POST['due_date'];
          $invoice_name=$_POST['invoice_name'];

          echo "hi";
     }

     else
     {
       echo "no";
     }

     $mysqlquery="SELECT total_bill 
                 FROM invoice
                 WHERE Flat_No= '$flat_no' 
                 AND Building_Name='$building_name' 
                 AND Status ='unpaid'";

?>