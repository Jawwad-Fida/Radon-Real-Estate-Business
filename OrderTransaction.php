<?php

class OrderTransaction {

    public function getRecordQuery($tran_id)
    {
        $sql = "select * from orders WHERE transaction_id='" . $tran_id . "'";
        return $sql;
    }

    public function saveTransactionQuery($post_data)
    {   
        //do changes here
        $name = $post_data['cus_name'];
        $email = $post_data['cus_email'];
        $phone = $post_data['cus_phone'];
        $transaction_amount = $post_data['total_amount'];
        $address = $post_data['cus_add1'];
        $transaction_id = $post_data['tran_id'];
        $currency = $post_data['currency'];

        $invoice_id = $post_data['invoice_id'];
        $invoice_date = $post_data['invoice_date'];
        $building_name = $post_data['building_name'];
        $flat_number = $post_data['flat_number'];

        //$sql = "INSERT INTO orders (name, email, phone, amount, address, status, transaction_id,currency)
                                    //VALUES ('$name', '$email', '$phone','$transaction_amount','$address','Pending', '$transaction_id','$currency')";

        $sql = "INSERT INTO orders (invoice_id, invoice_date, name, email, phone, amount, address, status, transaction_id, building_name, flat_no,currency) 
        VALUES ('$invoice_id', '$invoice_date','$name', '$email', '$phone','$transaction_amount','$address','Pending', '$transaction_id', '$building_name', '$flat_number','$currency')";

        return $sql;
    }

    public function updateTransactionQuery($tran_id, $type = 'Success')
    {
        $sql = "UPDATE orders SET status='$type' WHERE transaction_id='$tran_id'";

        return $sql;
    }
}

