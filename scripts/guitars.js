/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/javascript.js to edit this template
 */
"use strict";
$(function(){ 
    const slider = $('.bxslider').bxSlider({
      mode: 'horizontal',
      captions: true,
      infiniteLoop: true,
      auto: true,
      controls: false,
      randomStart: true,
      pause: 3000,
      slideWidth: 200,
      pager: true,
      pagerType: 'short'
      
    });
  });