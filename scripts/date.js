/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/javascript.js to edit this template
 */

"use strict";

const $date = selector => document.getElementById(selector);

document.addEventListener("DOMContentLoaded", () => {
            const currentDateElement = $date("currentDate");
            
            // Get current date
            const currentDate = new Date();

            // Format date as desired (e.g., "Month Day, Year")
            const month = parseInt(currentDate.getMonth()) + 1;
            const day = parseInt(currentDate.getDate());
            const year = currentDate.getFullYear();

            // Display the formatted date on the page
            currentDateElement.textContent = `${month}/${day}/${year}`;
            });