<?php

declare(strict_types=1);
session_start();
ob_start();

include "../includes/connect.php";
include "../includes/functions.php";
?>

<?php
//delete building based on id 
if (isset($_GET['d_b'])&& isset($_GET['d_f'])&& isset($_GET['d_id'])) {
    $building_name = $_GET['d_b'];
    $flat_no = $_GET['d_f'];
    $invoice_no = $_GET['d_id'];

    $stmt = query("DELETE 
                   FROM invoice 
                   WHERE building_name='$building_name'
                   AND flat_no='$flat_no'
                   AND invoice_no='$invoice_no'");
    $s= "view_invoice_bill_list.php?success=item_deleted"."&d_building=". $building_name ."&d_flat=". $flat_no ."&d_username=null";
    redirect($s);
}
?>