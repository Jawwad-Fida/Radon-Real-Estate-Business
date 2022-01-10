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
    $utility_id = $_GET['d_id'];

    $stmt = query("DELETE FROM utility_bill 
    WHERE building_name='$building_name'
    AND flat_no='$flat_no'
    AND utility_id='$utility_id'");
    $s= "clients_utility_bill_list.php?success=item_deleted"."&d_building=". $building_name ."&d_flat=". $flat_no ."&d_username=null";
    redirect($s);
}
?>