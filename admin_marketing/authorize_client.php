<?php

declare(strict_types=1);
session_start();
ob_start();

include "../includes/connect.php";
include "../includes/functions.php";

if (isset($_POST['update_submit'])) {

    $user_role = "client";

    $name = validate($_POST['name']);
    // echo $name ."<br>";
    $username = validate($_POST['username']);
    //echo $username ."<br>";
    $password = validate($_POST['password']);
    //echo $password ."<br>";
    $flat_num = validate($_POST['flat_num']);
    //echo $flat_num ."<br>";
    $building_num = validate($_POST['building_num']);
    //echo $building_num ."<br>";
    $user_id = $_POST['user_id'];
    $customer_id = $_POST['customer_id'];
    $booking_status = $_POST['booking_status'];
    //echo $booking_status ."<br>";
    $mobile_number = $_POST['mobile_number'];
    //echo $mobile_number ."<br>";
    $email = $_POST['email'];
    //echo $email ."<br>";
    $occupation = $_POST['occupation'];
    //echo $occupation ."<br>";
    $present_address = $_POST['present_address'];
    //echo $present_address ."<br>";
    $permanent_address = $_POST['permanent_address'];
    //echo $permanent_address ."<br>";
    $gender = $_POST['gender'];
    //echo $gender ."<br>";
    $nationality = $_POST['nationality'];
    //echo $nationality ."<br>";
    $age = $_POST['age'];
    //echo $age ."<br>";

    //Checking for errors
    if (empty($flat_num) || empty($building_num) || empty($name) || empty($username) || empty($name) || empty($password)) {
        redirect("client_authorize.php?error=emptyFields&edit={$customer_id}&user_id={$user_id}");
        exit();
    } elseif ($username_size <= 3) {
        //check if length of username is valid
        redirect("signup.php?error=invalid_name_length&edit={$customer_id}&user_id={$user_id}");
        exit();
    } elseif ($password_size <= 4) {
        //check if length of password is valid
        redirect("signup.php?error=invalid_pwd_length&edit={$customer_id}&user_id={$user_id}");
        exit();
    }

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    //------------QUERY-------------

    $stmt4 = prepare_query("INSERT INTO clients(user_id,name,username,mobile_number,email,occupation,present_address,permanent_address,gender,nationality) VALUES(?,?,?,?,?,?,?,?,?,?)");
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



    # redirect("view_clients.php?success=item_update");
    redirect("view_customers.php?success=item_update");
}
