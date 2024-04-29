<?php
session_start();

require('./model/database.php');
require('./model/product_db.php');
require('./model/category_db.php');
require('./model/customer_db.php');
require('./model/address_db.php');

$action = filter_input(INPUT_POST, 'action');
$categories = get_categories();
$product_categories = $categories;
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    $category_id = filter_input(INPUT_GET, 'category_id', 
            FILTER_VALIDATE_INT);
    if ($action == NULL && $category_id == NULL) {
        $action = 'home'; 
    } else if ($category_id != NULL) {
        $action = 'products';
    }
}
$firstName = '';
$lastName = '';
$old_email = isset($_SESSION['old_email']) ? $_SESSION['old_email'] : '';
$email = '';
$password = '';
$confirmP = '';

$billingL1 = "";
$billingL2 = "";
$billing_city = "";
$state = "";
$billing_zip_code = "";
$billing_phone = "";

$shippingL1 = "";
$shippingL2 = "";
$shipping_city = "";
$state1 = "";
$shipping_zip_code = "";
$shipping_phone = "";

if ($action == 'home') {
    include 'home.php';
} else if ($action == 'products') {
    $category_id = filter_input(INPUT_GET, 'category_id', 
            FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
    }
    $category_name = get_category_name($category_id);
    $categories = get_categories();
    $products = get_products_by_category($category_id);
    include './products/product_list.php';
} else if ($action == 'support') {
    include ('./support.php');
} else if ($action == 'shipping') {
    include ('./shipping.php');
} else if ($action == 'guitars') {
    include ('./products/guitars.php');
} else if ($action == 'customer_login') {
    include ('./customer/customer_login.php');
} else if ($action == 'customer_page') {
    $email = filter_input(INPUT_POST, 'email');
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $states = get_states();
        $states1 = get_states();
        
        $customerInfo = get_customer_info_by_email_address($email);
        if ($customerInfo != null) {
            $first_name = $customerInfo[0]['first_name'];
            $last_name = $customerInfo[0]['last_name'];
            $customerInfo = get_customer_info_by_email_address($email);
            $old_email = $email;
            $_SESSION['old_email'] = $old_email;
            
            $billing_id = $customerInfo[0]['billing_address_id'];
            $billing_address = get_address($billing_id);
            
            $billingL1 = $billing_address[0]['line1'];
            $billingL2 = $billing_address[0]['line2'];
            $billing_city = $billing_address[0]['city'];
            $state = $billing_address[0]['state'];
            $billing_zip_code = $billing_address[0]['zip_code'];
            $billing_phone = $billing_address[0]['phone'];
            
            $shipping_id = $customerInfo[0]['shipping_address_id'];
            $shipping_address = get_address($shipping_id);
            
            $shippingL1 = $shipping_address[0]['line1'];
            $shippingL2 = $shipping_address[0]['line2'];
            $shipping_city = $shipping_address[0]['city'];
            $state1 = $shipping_address[0]['state'];
            $shipping_zip_code = $shipping_address[0]['zip_code'];
            $shipping_phone = $shipping_address[0]['phone'];
            
            include ('./customer/customer.php');
        } else {
            $error_message = "Could not find customer with given email.";
            include ('./customer/customer_login.php');
        }
    } else {
        $error_message = "Invalid email address!";
        include ('./customer/customer_login.php');
    }
} else if ($action == 'updateCustomerInfo') {
    $_SESSION['old_email'] = $old_email; // Save the old email in the session
    $states = get_states();
    $states1 = get_states();
  
    $first_name = filter_input(INPUT_POST, 'first_name');
    $last_name = filter_input(INPUT_POST, 'last_name');
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    $confirmP = filter_input(INPUT_POST, 'confirmP');
    
    $customerInfo = get_customer_info_by_email_address($old_email);
    $customer_id = $customerInfo[0]['customer_id'];
    
    $billing_id = $customerInfo[0]['billing_address_id'];
    $billing_address = get_address($billing_id);

    $billingL1 = $billing_address[0]['line1'];
    $billingL2 = $billing_address[0]['line2'];
    $billing_city = $billing_address[0]['city'];
    $state = $billing_address[0]['state'];
    $billing_zip_code = $billing_address[0]['zip_code'];
    $billing_phone = $billing_address[0]['phone'];
    
    $shipping_id = $customerInfo[0]['shipping_address_id'];
    $shipping_address = get_address($shipping_id);

    $shippingL1 = $shipping_address[0]['line1'];
    $shippingL2 = $shipping_address[0]['line2'];
    $shipping_city = $shipping_address[0]['city'];
    $state1 = $shipping_address[0]['state'];
    $shipping_zip_code = $shipping_address[0]['zip_code'];
    $shipping_phone = $shipping_address[0]['phone'];
    
    $email_regex = '/^[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/';
    if (preg_match($email_regex, $email)) {
        update_email_address($customer_id, $email);
        // Update the session variable with the new email
        $_SESSION['old_email'] = $email;
        $customer_update = "Customer Info Updated";
    } else {
        $email_error = "Invalid email";
    }
    
    $regex = '/^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/';
    if (preg_match($regex, $password)) {
        if ($password === $confirmP) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            update_password($customer_id, $hashed_password);
            $customer_update = "Customer Info Updated";
        } else {
            $confirm_error = "Passwords do not match";
        }
    } else {
        $password_error = "Invalid Password";
    }

    // Update first name and last name
    update_first_name($customer_id, $first_name);
    update_last_name($customer_id, $last_name);
    $customer_update = "Customer Info Updated";
    include ('./customer/customer.php');
} else if ($action == 'updateBillingAddress') {
    $states = get_states();
    $states1 = get_states();
    
    $customerInfo = get_customer_info_by_email_address($old_email);
    $customer_id = $customerInfo[0]['customer_id'];
  
    $first_name = $customerInfo[0]['first_name'];
    $last_name = $customerInfo[0]['last_name'];
    $email = $customerInfo[0]['email_address'];
    
    $billing_id = $customerInfo[0]['billing_address_id'];
    $billing_address = get_address($billing_id);

    $billingL1 = filter_input(INPUT_POST, 'billingL1');
    $billingL2 = filter_input(INPUT_POST, 'billingL2');
    $billing_city = filter_input(INPUT_POST, 'billing_city');
    $state = filter_input(INPUT_POST, 'state');
    $billing_zip_code = filter_input(INPUT_POST, 'billing_zip_code');
    $billing_phone = filter_input(INPUT_POST, 'billing_phone');
    
    $shipping_id = $customerInfo[0]['shipping_address_id'];
    $shipping_address = get_address($shipping_id);

    $shippingL1 = $shipping_address[0]['line1'];
    $shippingL2 = $shipping_address[0]['line2'];
    $shipping_city = $shipping_address[0]['city'];
    $state1 = $shipping_address[0]['state'];
    $shipping_zip_code = $shipping_address[0]['zip_code'];
    $shipping_phone = $shipping_address[0]['phone'];
    
    $zip_regex = '/^\d{5}(-\d{4})?(?!-)$/';
    $phone_regex = '/^(1\s?)?(\d{3}|\(\d{3}\))[\s\-]?\d{3}[\s\-]?\d{4}$/';
    
    if (preg_match($zip_regex, $billing_zip_code) && preg_match($phone_regex, $billing_phone)) {
        update_address($billing_id, $billingL1, $billingL2, $billing_city, $state, $billing_zip_code, $billing_phone);
        $billing_update = "Billing Address Updated";
    } else {
        $billing_error = "Invalid zip code or phone number";
    }
    include ('./customer/customer.php');
} else if ($action == 'updateShippingAddress') {
    $states = get_states();
    $states1 = get_states();
    
    $customerInfo = get_customer_info_by_email_address($old_email);
    $customer_id = $customerInfo[0]['customer_id'];
  
    $first_name = $customerInfo[0]['first_name'];
    $last_name = $customerInfo[0]['last_name'];
    $email = $customerInfo[0]['email_address'];
    
    $shipping_id = $customerInfo[0]['shipping_address_id'];
    $shipping_address = get_address($shipping_id);

    $shippingL1 = filter_input(INPUT_POST, 'shippingL1');
    $shippingL2 = filter_input(INPUT_POST, 'shippingL2');
    $shipping_city = filter_input(INPUT_POST, 'shipping_city');
    $state1 = filter_input(INPUT_POST, 'state1');
    $shipping_zip_code = filter_input(INPUT_POST, 'shipping_zip_code');
    $shipping_phone = filter_input(INPUT_POST, 'shipping_phone');
    
    $billing_id = $customerInfo[0]['billing_address_id'];
    $billing_address = get_address($billing_id);

    $billingL1 = $billing_address[0]['line1'];
    $billingL2 = $billing_address[0]['line2'];
    $billing_city = $billing_address[0]['city'];
    $state = $billing_address[0]['state'];
    $billing_zip_code = $billing_address[0]['zip_code'];
    $billing_phone = $billing_address[0]['phone'];
    
    $zip_regex = '/^\d{5}(-\d{4})?(?!-)$/';
    $phone_regex = '/^(1\s?)?(\d{3}|\(\d{3}\))[\s\-]?\d{3}[\s\-]?\d{4}$/';
    
    if (preg_match($zip_regex, $shipping_zip_code) && preg_match($phone_regex, $shipping_phone)) {
        update_address($shipping_id, $shippingL1, $shippingL2, $shipping_city, $state1, $shipping_zip_code, $shipping_phone);
        $shipping_update = "Shipping Address Updated";
    } else {
        $shipping_error = "Invalid zip code or phone number";
    }
    include ('./customer/customer.php');
}