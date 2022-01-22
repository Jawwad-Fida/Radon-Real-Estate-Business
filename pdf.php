<?php

if (isset($_POST['print'])){
    $invoice = $_POST['invoice'];
    $due_date = $_POST['due_date'];

    $name = $_POST['name'];
    $occupation = $_POST['occupation'];
    $present_address = $_POST['present_address'];
    $mobile_number = $_POST['mobile_number'];

    $gas_bill = $_POST['gas_bill'];
    $electricity_bill = $_POST['electricity_bill'];
    $water_bill = $_POST['water_bill'];
    $additional_bill = $_POST['additional_bill'];
    $service_charge = $_POST['service_charge'];
    $arrear = $_POST['arrear'];
    $due_charge = $_POST['due_charge'];
    $total_bill = $_POST['total_bill'];
    
}


require_once __DIR__ . '/vendor/autoload.php';


//$name = $pdf_info['name'];
//$occupation = $pdf_info['occupation'];

//create new pdf instance 
$mpdf = new \Mpdf\Mpdf();
//install mpdf by using cmd prmpt
//without using mpdf won't work
//watch can this video how to install it
//https://www.youtube.com/watch?v=MnIps8Yc8CY

//create our pdf 

$data = '';
$data .= '<h1>_____________________ INVOICE ___________________</h1>';
$data .= '<br />';
$data .= '<h5 align="right"><strong>Date    : </strong>' . $due_date .'</h5>';
$data .= '<h4 align="right"><strong>Invoice No: </strong>' . $invoice .'</h4><br/>';
$data .= '<br />';
$data .= '<br />';
$data .= '<h3><b>Name     : </b>' . $name .'</h3>';
$data .= '<h3><strong>Occupation    : </strong>' . $occupation .'</h3>';
$data .= '<h3><strong>Present Address    : </strong>' . $present_address .'<h3/>'; 
$data .= '<h4><strong>Mobile Number     : </strong>' . $mobile_number .'<h4/>'; 



$data .= '<br />';
$data .= '<br />';
$data .= '<br />';

$data .= '<h2><u>All Bills</u></h2><br />
		
		<table autosize="1">
		<tr>
		<th style="width: 28%;background-color:#427ba6"><strong>Gas Bill</strong></th>
		<th style="width: 33%;background-color:#427ba6"><strong>Electricity Bill</strong></th>
		<th style="width: 33%;background-color:#427ba6"><strong>Water Bill</strong></th>
        <th style="width: 33%;background-color:#427ba6"><strong>Additional Bill</strong></th>
        <th style="width: 33%;background-color:#427ba6"><strong>Service Charge</strong></th>
        <th style="width: 33%;background-color:#427ba6"><strong>Arrear</strong></th>
        <th style="width: 33%;background-color:#427ba6"><strong>Due Charge</strong></th>
        <th style="width: 33%;background-color:#427ba6"><strong>Total Bill (BDT)</strong></th>
		</tr>
		<tr>
		  <th style="background-color:#aedbfc">'. $gas_bill .'</th>
		  <th style="background-color:#aedbfc">'. $electricity_bill .'</th>
		  <th style="background-color:#aedbfc">'. $water_bill .'</th>
          <th style="background-color:#aedbfc">'. $additional_bill .'</th>
          <th style="background-color:#aedbfc">'. $service_charge .'</th>
          <th style="background-color:#aedbfc">'. $arrear .'</th>
          <th style="background-color:#aedbfc">'. $due_charge .'</th>
          <th style="background-color:#aedbfc">'. $total_bill .'</th>
          </tr>
		</table>';

//write pdf
$mpdf->writeHTML($data);

$mpdf->SetWatermarkText('RADON');
$mpdf->showWatermarkText = true;
$mpdf->watermarkTextAlpha = 0.1;

//output browser 
$mpdf->output('Invoice.pdf', 'D');



?>