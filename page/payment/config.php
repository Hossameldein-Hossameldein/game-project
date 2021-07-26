<?php 
/* 
 * PayPal API configuration 
 * Remember to switch to your live API keys in production! 
 * See your keys here: https://developer.paypal.com/ 
 */ 
 include '../../config/config.php';
define('PAYPAL_API_CLIENT_ID', 'AfV_9hd8S8G5ovIDwhxEoezaiCZfalqnrdwyKiFc9xcJPLa-TLVb7VxI6CjKLcYxH8p16QElPkyKlWNR');  
define('PAYPAL_API_SECRET', 'EGJhOYi72IhxN442UA5-3yYUUdX6YAYO5El8lIUXYhE_xxJjFkWwU9AqqaaykD9-E4ckUx7MLcSCP53q'); 
define('PAYPAL_SANDBOX', true); //set false for production 
  
// Database configuration  
define('DB_HOST', $host);  
define('DB_USERNAME', $user);  
define('DB_PASSWORD', $password);  
define('DB_NAME', $dbName1);
?>