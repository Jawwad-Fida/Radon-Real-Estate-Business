<?php
include "includes/connect.php";
include "includes/functions.php";

if(isset($_POST['area'])){
    $value = $_POST['area'];
    //$value1 = $_POST['price'];
    echo $value;
    //echo $value1;
    //$stmt = query("SELECT * FROM apartment WHERE buy_price BETWEEN 0 AND '".$value1."' ORDER BY buy_price ASC");
    $stmt1 = query("SELECT * FROM apartment WHERE apartment_status='Buy' AND area BETWEEN 0 AND '".$value."' ORDER BY area ASC");

    while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)) {
        $apart_status = 'Buy';
        echo $apart_status;
        $apartment_id = $row['apartment_id'];
        $building_name = $row['building_name'];
        //$flat_no = $row['flat_no'];
        $no_of_bedroom =  $row['no_of_bedroom'];
        $no_of_bathroom =  $row['no_of_bathroom'];
        $image =  $row['image'];
        //$buy_price =  $row['buy_price'];
        $Buy_price =  $row['buy_price'];
        $area =  $row['area'];
        echo $area ;
        $status =  $row['status'];
        //$type =  $row['type'];
        //$features =  $row['features'];
        $address =  $row['address'];


}
}
?>