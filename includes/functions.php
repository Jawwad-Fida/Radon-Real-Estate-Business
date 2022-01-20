<?php

function validate($data){
    $data = trim($data); # remove empty spaces in front and back
    $data = stripslashes($data); # remove backslashes
    $data = htmlspecialchars($data); # convert special characters to html entities
    return $data;
}

//for prepared statements using pdo

//for prepare_query("INSERT, UPDATE, DELETE")
function prepare_query($sql){
    global $pdo;
    try{
        $stmt = $pdo->prepare($sql); //This errors don't affect the overall code
        return $stmt;
    } catch(Exception $ex){
        die("Query Failed " .$ex->getMessage());
    }
}

//for query("SELECT")
function query($sql)
{
    global $pdo;
    try {
        $stmt = $pdo->query($sql);
        return $stmt;
    } catch (Exception $ex) {
        die("Query failed " . $ex->getMessage());
    }
}

//pull last inserted id
function last_inserted_id(){
    global $pdo;
    try {
        $id = $pdo->lastInsertId();;
        return $id;
    } catch (Exception $ex) {
        die("Query failed " . $ex->getMessage());
    }
}

//return no. of rows in table
function count_records($stmt)
{
    //$stmt contains the prepared query statement 
    $rowNumber = $stmt->rowCount();
    return $rowNumber;
}

function redirect($location)
{
    header("Location: {$location}");
}


//list of error messages (on redirect)
function display_error_message()
{
    if (isset($_GET['error'])) {
        if ($_GET['error'] == 'emptyFields') {
            echo "<p style='color:red;font-size:25px;text-align:center'>Please Fill in all the Fields!<p>";
        } elseif ($_GET['error'] == 'no_user') {
            echo "<p style='color:red;font-size:25px;text-align:center'>Username does not exist!<p>";
        } elseif ($_GET['error'] == 'password') {
            echo "<p style='color:red;font-size:25px;text-align:center'>Incorrect Password!<p>";
        } elseif ($_GET['error'] == 'notallowed') {
            echo "<p style='color:red;font-size:25px;text-align:center'>Cannot be accessed without logging in!<p>";
        } elseif ($_GET['error'] == 'invalid_email') {
            echo "<p style='color:red;font-size:25px;text-align:center'>Invalid E-mail format!<p>";
        } elseif ($_GET['error'] == 'invalid_username') {
            echo "<p style='color:red;font-size:25px;text-align:center'>No special characters allowed for username!<p>";
        } elseif ($_GET['error'] == 'invalid_name_length') {
            echo "<p style='color:red;font-size:25px;text-align:center'>Username has to be more than 4 Characters!<p>";
        } elseif ($_GET['error'] == 'invalid_pwd_length') {
            echo "<p style='color:red;font-size:25px;text-align:center'>Password has to be more than 5 Characters!<p>";
        } elseif ($_GET['error'] == 'pwd_no_match') {
            echo "<p style='color:red;font-size:25px;text-align:center'>Passwords do not match!<p>";
        } elseif ($_GET['error'] == 'user_exists') {
            echo "<p style='color:red;font-size:25px;text-align:center'>Username already exists!<p>";
        } elseif ($_GET['error'] == 'email_exists') {
            echo "<p style='color:red;font-size:25px;text-align:center'>E-mail already exists!<p>";
        } elseif ($_GET['error'] == 'no_email') {
            echo "<p style='color:red;font-size:25px;text-align:center'>E-mail does not exist!<p>";
        } elseif ($_GET['error'] == 'not_admin') {
            echo "<p style='color:red;font-size:25px;text-align:center'>Sorry! Only Admin is Allowed<p>";
        } elseif ($_GET['error'] == 'sqlerror') {
            echo "<p style='color:red;font-size:25px;text-align:center'>SQL Error! Recheck statements<p>";
        } elseif ($_GET['error'] == 'not_login') {
            echo "<p style='color:red;font-size:25px;text-align:center'>Not allowed!<p>";
        } elseif ($_GET['error'] == 'pin_no_match') {
            echo "<p style='color:red;font-size:25px;text-align:center'>Pin code does not match!<p>";
        } elseif ($_GET['error'] == 'invalid_phone_length') {
            echo "<p style='color:red;font-size:25px;text-align:center'>Phone number cannot be more than 11 characters!<p>";
        }
          elseif ($_GET['error'] == 'already_exits') {
            echo "<p style='color:red;font-size:25px;text-align:center'>This months utility has been added already!<p>";
        } 
          elseif ($_GET['error'] == 'invoice_exits') {
            echo "<p style='color:red;font-size:25px;text-align:center'>This months invoice has been created already!<p>";
        }  
    }
}

//list of success messages (on redirect)
function display_success_message()
{
    if (isset($_GET['success'])) {
        if ($_GET['success'] == 'logout') {
            echo "<p style='color:green;font-size:30px;text-align:center'>You are logged out!<p>";
        } elseif ($_GET['success'] == 'login') {
            echo "<p style='color:green;font-size:30px;text-align:center'>You are logged in!<p>";
        } elseif ($_GET['success'] == 'register') {
            echo "<p style='color:green;font-size:40px;text-align:center'>Welcome User!<p>";
        } elseif ($_GET['success'] == 'forgot_sent') {
            echo "<p style='color:green;font-size:30px;text-align:center'>Mail Sent! Check your inbox!<p>";
        } elseif ($_GET['success'] == 'reset') {
            echo "<p style='color:green;font-size:30px;text-align:center'>Password Reset Successfull!<p>";
        } elseif ($_GET['success'] == 'feedback_sent') {
            echo "<p style='color:green;font-size:30px;text-align:center'>Thank you for your Feedback!<p>";
        } elseif ($_GET['success'] == 'item_delete') {
            echo "<p style='color:green;font-size:30px;text-align:center'>Data Deleted!<p>";
        } elseif ($_GET['success'] == 'item_add') {
            echo "<p style='color:green;font-size:30px;text-align:center'>Data Added!<p>";
        } elseif ($_GET['success'] == 'item_update') {
            echo "<p style='color:green;font-size:30px;text-align:center'>Data Updated!<p>";
        } elseif ($_GET['success'] == 'appointment_submit') {
            echo "<p style='color:green;font-size:30px;text-align:center'>Submitted Successfully!<p>";
        } elseif ($_GET['success'] == 'appointment_reject') {
            echo "<p style='color:red;font-size:25px;text-align:center'>Appointment Rejected!<p>";
        } elseif ($_GET['success'] == 'appointment_confirmed') {
            echo "<p style='color:green;font-size:25px;text-align:center'>Appointment Confirmed!<p>";
        } elseif ($_GET['success'] == 'message_sent') {
            echo "<p style='color:green;font-size:25px;text-align:center'>Message Sent!<p>";
        } 
          elseif ($_GET['success'] == 'invoice_created') {
            echo "<p style='color:green;font-size:25px;text-align:center'>Invoice Created!<p>";
        } 
    }
}

//check if username already exists in table
function username_exists(string $username)
{
    $stmt = query("SELECT username FROM users WHERE username='$username'");
    $rowNumber = count_records($stmt);

    if ($rowNumber > 0) {
        return true;
    } else {
        return false;
    }
}

//check if email already exists in table
function email_exists(string $email)
{
    $stmt = query("SELECT user_email FROM users WHERE user_email='$email'");
    $rowNumber = count_records($stmt);

    if ($rowNumber > 0) {
        return true;
    } else {
        return false;
    }
}

//for forgotten password system - check if a email does not exist 
function email_does_not_exist(string $email)
{
    $stmt = query("SELECT user_email FROM users WHERE user_email='$email'");
    $rowNumber = count_records($stmt);

    if ($rowNumber <= 0) {
        return true;
    } else {
        return false;
    }
}

function generateKey()
{
    //generate a unique string

    $keyLength = 5;  //define how long the key will be
    $str = "1234567890abcdefghijklmnopqrstuvwxyz()/$"; //create the characters we want to include inside our key
    $shuffleStr = str_shuffle($str); //mix them together, shuffle them, and then cut off the tail

    //substr() - 3 parameters: - shuffled string, where we want to start cutting characters, how many characters to include before cutting off rest of characters
    $randStr = substr($shuffleStr, 0, $keyLength);
    return $randStr;
}

function generatePinCode()
{
    //generate a unique string
    $keyLength = 8; 
    $str = "1234567890abcdefghijklmnopqrstuvwxyz()/$"; 
    $shuffleStr = str_shuffle($str); 

    $randStr = substr($shuffleStr, 0, $keyLength);
    return $randStr;
}

//check if username exists in database for login
function login_user_exists(string $username)
{
    $stmt = query("SELECT * FROM users WHERE username='{$username}'");
    $rowNumber = count_records($stmt);
    if ($rowNumber <= 0) {
        redirect("login.php?error=no_user");
        exit();
    }
    return $stmt;
}

//check if user is logged in 
function is_logged_in(){
    //using ternary operator - ? :
    return isset($_SESSION['user_id']) ? true : false;
}

//check if user is admin
function is_admin(){
    if(is_logged_in()){
        if($_SESSION['user_role'] == 'admin'){
            return true;
        } else {
            return false;
        }
    }
}

//check if user is customer
function is_customer(){
    if(is_logged_in()){
        if($_SESSION['user_role'] == 'customer'){
            return true;
        } else {
            return false;
        }
    }
}

//check if user is client
function is_client(){
    if(is_logged_in()){
        if($_SESSION['user_role'] == 'client'){
            return true;
        } else {
            return false;
        }
    }
}

//get username of the user logged in
function get_username()
{
    return isset($_SESSION['username']) ? $_SESSION['username'] : null;
}

//get user role of the user logged in
function get_user_role()
{
    return isset($_SESSION['user_role']) ? $_SESSION['user_role'] : null;
}

//generate random username for client
function generateClientUsername($username)
{
    $keyLength = 4; 
    $str = "1234567890"; 
    $shuffleStr = str_shuffle($str); 

    $randStr = substr($shuffleStr, 0, $keyLength);

    $new = $username.$randStr;
    return $new;
}

//generate random password for password
function generateClientPassword()
{
    $keyLength = 5; 
    $str = "1234567890abcdefghijklmnopqrstuvwxyz@_#*^%"; 
    $shuffleStr = str_shuffle($str); 

    $passStr = substr($shuffleStr, 0, $keyLength);
    return $passStr;
}






















