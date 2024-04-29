/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/javascript.js to edit this template
 */
"use strict";

const $ = selector => document.querySelector(selector);

const getErrorMsg = lbl => 
     `${lbl} must be a valid number greater than zero.`;
 
const focusAndSelect = selector => {
    const elem = $(selector);
    elem.focus();
    elem.select();
};

function calculateShipping(productCost) {
    let shippingCost = 0;
    
    if(productCost > 0 && productCost <= 50) {
        shippingCost = productCost * 0.2;
    }
    else if(productCost > 50 && productCost <= 200) {
        shippingCost = productCost * 0.18;
    }
    else if(productCost > 200 && productCost <= 500) {
        shippingCost = productCost * 0.15;
    }
    else if(productCost > 500 && productCost <= 1000) {
        shippingCost = productCost * 0.12;
    }
    else if(productCost > 1000) {
        shippingCost = productCost * 0.08;
    }
    
    return (shippingCost + productCost);
}
 
const calculate = () => {
    const productCost = parseFloat($("#productCost").value);
 
    if (isNaN(productCost) || productCost <= 0) {
        alert(getErrorMsg("productCost"));
        focusAndSelect("#productCost");
    }
    else {
        const totalCost = calculateShipping(productCost);
        $("#totalCost").value = totalCost.toFixed(2);
    }
};

document.addEventListener("DOMContentLoaded", () => {
    $("#calculate").addEventListener("click", calculate);
    $("#productCost").focus();
});
