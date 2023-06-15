"use strict";
const formu = document.querySelector('.form');

window.addEventListener('load',()=>{
   formu.style.display = 'block';
   formu.style.animation = 'aparecer 1.5s forwards ease';
});

const select1 = document.querySelector('.s-1');
const select2 = document.querySelector('.s-2');
const select3 = document.querySelector('.s-3');

const input = document.querySelector('.in-1');
const input2 = document.querySelector('.in-2');
const input3 = document.querySelector('.in-3');

select1.addEventListener('click',()=>{
   input.style.display = "block";
   input.style.animation = 'aparecer 1s forwards';
});

select2.addEventListener('click',()=>{
   input2.style.display = "block";
   input2.style.animation = 'aparecer 1s forwards';
});

select3.addEventListener('click',()=>{
   input3.style.display = "block";
   input3.style.animation = 'aparecer 1s forwards';
});