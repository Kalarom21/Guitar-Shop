<!DOCTYPE html>

<html lang="en">
    
<head>
    <title>The Guitar Store</title>
    <link rel="stylesheet" href="/Assignment7/styles/main.css">
    <link rel="stylesheet" href="/Assignment7/styles/customers.css">
    <script src="/Assignment7/scripts/errors.js" defer></script>
</head>

<body>
    <?php include 'view/header.php' ?>
    
    
    <?php include 'view/nav_bar.php' ?>

    
    <main>
        <?php include 'view/aside.php'?>
        
        <section>
            <div class="form-container">
                <form action ="/Assignment7/index.php" method ="post">
                    <table>
                        <tr>
                            <th>Customer Information</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td>First Name:</td>
                            <td><input type="text" name="first_name" value= "<?php echo $first_name ?>"></td>
                            <td id="shippingError" class="message"><?php echo isset($shipping_error) ? $shipping_error : ''; ?></td>
                            <td id="customerUpdate" class="message"><?php echo isset($customer_update) ? $customer_update : ''; ?></td>
                        </tr>
                        <tr>
                            <td>Last Name:</td>
                            <td><input type="text" name="last_name" value= "<?php echo $last_name ?>"></td>
                            <td id="billingError" class="message"><?php echo isset($billing_error) ? $billing_error : ''; ?></td>
                            <td id="billingUpdate" class="message"><?php echo isset($billing_update) ? $billing_update : ''; ?></td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><input type="text" name="email" value= "<?php echo $email ?>"></td>
                            <td id="emailError" class="message"><?php echo isset($email_error) ? $email_error : ''; ?></td>
                            <td id="shippingUpdate" class="message"><?php echo isset($shipping_update) ? $shipping_update : ''; ?></td>
                        </tr>
                        <tr>
                            <td>Password:</td>
                            <td><input type="password" name="password" value= "<?php echo $password ?>"></td>
                            <td id="passwordError" class="message"><?php echo isset($password_error) ? $password_error : ''; ?></td>
                        </tr>
                        <tr>
                            <td>Confirm Password:</td>
                            <td><input type="password" name="confirmP" value= "<?php echo $confirmP ?>"></td>
                            <td id="confirmError" class="message"><?php echo isset($confirm_error) ? $confirm_error : ''; ?></td>
                        </tr>
                    </table>
                    <input type="hidden" name="action" value="updateCustomerInfo">
                    <input type="submit" id="updateCustomerInfo" value="Update Customer Information">
                </form>
            </div>
            <div class = "form-container side-by-side">
                <form action ="/Assignment7/index.php" method ="post">
                    <table>
                        <tr>
                            <th>Billing Information</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td>Address Line 1:</td>
                            <td><input type="text" name="billingL1" value= "<?php echo $billingL1 ?>"></td>
                        </tr>
                        <tr>
                            <td>Address Line 2:</td>
                            <td><input type="text" name="billingL2" value= "<?php echo $billingL2 ?>"></td>
                        </tr>
                        <tr>
                            <td>City:</td>
                            <td><input type="text" name="billing_city" value= "<?php echo $billing_city ?>"></td>
                        </tr>
                        <tr>
                            <td>State:</td>
                            <td>
                                <select id="stateDropdown" name="state">
                                    <?php foreach ($states as $state_option) : ?>
                                        <option value="<?php echo $state_option['state']; ?>"
                                            <?php if ($state_option['state'] == $state) echo 'selected'; ?>>
                                            <?php echo $state_option['state']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Zip Code:</td>
                            <td><input type="text" name="billing_zip_code" value= "<?php echo $billing_zip_code ?>"></td>
                        </tr>
                        <tr>
                            <td>Phone:</td>
                            <td><input type="text" name="billing_phone" value= "<?php echo $billing_phone ?>"></td>
                        </tr>
                    </table>
                    <input type="hidden" name="action" value="updateBillingAddress">
                    <input type="submit" id="updateBillingAddress" value="Update Billing Address">
                </form>
                
                <form action ="/Assignment7/index.php" method ="post">
                    <table>
                        <tr>
                            <th>Shipping Information</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td>Address Line 1:</td>
                            <td><input type="text" name="shippingL1" value= "<?php echo $shippingL1 ?>"></td>
                        </tr>
                        <tr>
                            <td>Address Line 2:</td>
                            <td><input type="text" name="shippingL2" value= "<?php echo $shippingL2 ?>"></td>
                        </tr>
                        <tr>
                            <td>City:</td>
                            <td><input type="text" name="shipping_city" value= "<?php echo $shipping_city ?>"></td>
                        </tr>
                        <tr>
                            <td>State:</td>
                            <td>
                                <select id="stateDropdown" name="state1">
                                    <?php foreach ($states1 as $state1_option) : ?>
                                        <option value="<?php echo $state1_option['state']; ?>"
                                            <?php if ($state1_option['state'] == $state1) echo 'selected'; ?>>
                                            <?php echo $state1_option['state']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Zip Code:</td>
                            <td><input type="text" name="shipping_zip_code" value= "<?php echo $shipping_zip_code ?>"></td>
                        </tr>
                        <tr>
                            <td>Phone:</td>
                            <td><input type="text" name="shipping_phone" value= "<?php echo $shipping_phone ?>"></td>
                        </tr>
                    </table>
                    <input type="hidden" name="action" value="updateShippingAddress">
                    <input type="submit" id="updateShippingAddress" value="Update Shipping Address">
                </form>
            </div>
  
        </section>
    </main>
    <?php include 'view/footer.php' ?>
</body>

