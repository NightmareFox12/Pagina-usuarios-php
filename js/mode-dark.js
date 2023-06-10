'use strict';

const btnBody = document.querySelector('.checkbox');
const body = document.querySelector('.body')
let bool = true;
let color;


const cambiar = ()=>{
if (bool) {
  document.cookie = 'colorFondo=#001';
  bool = false;
  return color;
 } 
  document.cookie = 'colorFondo=#fff';
  bool = true;
  return color;
};
  

btnBody.addEventListener('click',()=>{
 if(btnBody.checked){
    cambiar();
    body.style.backgroundColor = '#001';
 } else {
    cambiar();
    document.cookie = `colorFondo=${color}`;
    body.style.backgroundColor = '#fff';
 }
});


let cookies = document.cookie.split('; ');
let cookie = cookies[0].split('=');
body.style.backgroundColor = cookie[1];

 if(cookie[1] === '#001'){
   btnBody.checked = true;
   console.log("modo dark");
 } else {
   btnBody.checked = false;
   console.log('modo blanco');
 }

