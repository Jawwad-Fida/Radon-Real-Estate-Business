<?php
include(__DIR__ . "/../vendor/autoload.php");

//create a .env and .env.example file in config folder
//NOTE:- this files can appear multiple times in different directories

$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->load();

$STORE_ID = getenv('Store_ID');
$STORE_PASSWORD = getenv('Store_Password');
$STORE_NAME = getenv('Store_Name');

if (!defined('PROJECT_PATH')) {
    define('PROJECT_PATH', 'http://localhost/phpDemo/Radon/'); // Replace this value with your project path
}

if (!defined('API_DOMAIN_URL')) {
    define('API_DOMAIN_URL', 'https://sandbox.sslcommerz.com'); //sandbox url, change it when going live
}

if (!defined('STORE_ID')) {
    define('STORE_ID', 'testbox'); //from mail
}

if (!defined('STORE_PASSWORD')) {
    define('STORE_PASSWORD', 'qwerty'); //from mail
}

if (!defined('IS_LOCALHOST')) {
    define('IS_LOCALHOST', true); //change it to false for live server
}

return [
    'projectPath' => constant("PROJECT_PATH"),
    'apiDomain' => constant("API_DOMAIN_URL"),
    'apiCredentials' => [
        'store_id' => constant("STORE_ID"),
        'store_password' => constant("STORE_PASSWORD"),
    ],
    'apiUrl' => [ //Use v3 instead, v4 shows problems
        'make_payment' => "/gwprocess/v3/api.php",
        'transaction_status' => "/validator/api/merchantTransIDvalidationAPI.php",
        'order_validate' => "/validator/api/validationserverAPI.php",
        'refund_payment' => "/validator/api/merchantTransIDvalidationAPI.php",
        'refund_status' => "/validator/api/merchantTransIDvalidationAPI.php",
    ],
    'connect_from_localhost' => constant("IS_LOCALHOST"),
    'success_url' => 'pg_redirection/success.php',
    'failed_url' => 'pg_redirection/fail.php',
    'cancel_url' => 'pg_redirection/cancel.php',
    'ipn_url' => 'pg_redirection/ipn.php',
];
