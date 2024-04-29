"use strict";
const $ = selector => document.querySelector(selector);

function togglerErrorVisibility(elementId, msg) {
    const element = $(elementId);
    if (element) {
        element.style.display = msg ? 'block' : 'none';
    }
}

// Check if there are errors and toggle visibility accordingly
toggleVisibility('emailError', '<?php echo isset($email_error) && !empty($email_error); ?>');
toggleVisibility('passwordError', '<?php echo isset($password_error) && !empty($password_error); ?>');
toggleVisibility('confirmError', '<?php echo isset($confirm_error) && !empty($confirm_error); ?>');

toggleVisibility('billingError', '<?php echo isset($billing_error) && !empty($billing_error); ?>');
toggleVisibility('shippingError', '<?php echo isset($shipping_error) && !empty($shipping_error); ?>');

toggleVisibility('customerUpdate', '<?php echo isset($customer_update) && !empty($customer_update); ?>');
toggleVisibility('billingUpdate', '<?php echo isset($billing_update) && !empty($billing_update); ?>');
toggleVisibility('shippingUpdate', '<?php echo isset($shipping_update) && !empty($shipping_update); ?>');