"use strict";

const $ = selector => document.querySelector(selector);


// Function to be triggered by the validateCustomerInfo event
function validateCustomerInfo(email, password, confirmPassword) {
    alert("IamWorking");
    // Email validation using a provided regex pattern
    const emailRegex = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
    const isValidEmail = emailRegex.test(email);

    // Password validation using the provided regex pattern
    const passwordRegex = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    const isValidPassword = passwordRegex.test(password);

    // Check if password and confirm password match
    const doPasswordsMatch = (password === confirmPassword);

    // Return validation results
    return {
        isValidEmail: isValidEmail,
        isValidPassword: isValidPassword,
        doPasswordsMatch: doPasswordsMatch,
        isValid: isValidEmail && isValidPassword && doPasswordsMatch
    };
}

function displayValidationErrors(results) {
    // Display error messages within the empty <td> elements
    displayError(results.isValidEmail, "emailError", "Invalid email address!");
    displayError(results.isValidPassword, "passwordError", "Invalid password!");
    displayError(results.doPasswordsMatch, "confirmPasswordError", "Passwords do not match!");
}

function displayError(isValid, tdId, errorMessage) {
    
    const error = document.getElementById(tdId);

    if (isValid) {
        error.textContent = "";
    } else {
        error.textContent = errorMessage;
    }
}

const validate = (event) => {
    
    const emailInput = $("customerForm input[name='email']").value;
    const passwordInput = $("customerForm input[name='password']").value;
    const confirmPasswordInput = $("customerForm input[name='confirm_password']").value;
    alert(emailInput);
    const validationResults = validateCustomerInfo(emailInput, passwordInput, confirmPasswordInput);
    displayValidationErrors(validationResults);

    if (!validationResults.isValid) {
        // event.preventDefault(); // Uncomment this line if you want to prevent form submission on validation failure
    }
};

const form = $("form");
form.addEventListener("submit", validate);


