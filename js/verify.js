"use strict";

const password = document.querySelector('.password');
const confirmPassword = document.querySelector('.password-confirm');
const container = document.querySelector('.container-form');
const span = document.querySelector('.span');
const submitBtn = document.querySelector('.btn-send');

let booleano = true;

addEventListener("load",()=>{
  container.style.display = "block";
  container.style.animation = "aparecer .7s forwards";
});

password.addEventListener("focus",()=> {
  confirmPassword.style.display = "block";
  confirmPassword.style.animation = "aparecer 1s forwards";
});

password.addEventListener("keyup",()=>{

 let contrasenia = password.value;
 let contraseniaConfirmar = confirmPassword.value;

  if(contrasenia === contraseniaConfirmar) {
    booleano = false;
    span.textContent = "Contraseña Correcta";
    const objBtn1 = new Btn({backColor: '#156f10',booleano: false});
    objBtn1.verify();
    const objBtn2 = new Btn({backColor: '#99bef4',color: '#000'});
    objBtn2.passwordVerify();
  }
  else {
    span.textContent = "No coincide con su contraseña";
    const objBtn3 = new Btn({backColor: "#ccc",color: '#000',cursor: 'not-allowed',booleano: true});
    objBtn3.verify();
    booleano = true;
    const objBtn4 = new Btn({backColor:'#bd2828',color:'#fff'});
    objBtn4.passwordVerify();
  }
  
});

confirmPassword.addEventListener('keyup',()=> {
 let contrasenia = password.value;
 let contraseniaConfirmar = confirmPassword.value;

  if(contrasenia === contraseniaConfirmar) {
     span.textContent = "Contraseña Correcta";
     const objBtn5 = new Btn({backColor:'#99bef4',color: '#000'});
     objBtn5.passwordVerify();
     const objBtn6 = new Btn({backColor:'#156f10',booleano:false});
     objBtn6.verify();
     booleano = false;
  }
  else {
     span.textContent = "No coincide con su contraseña";
     const objBtn7 = new Btn({backColor:'#bd2828'});
     objBtn7.passwordVerify();
     const objBtn8 = new Btn({backColor:'#ccc',cursor:'not-allowed',booleano:true});
     objBtn8.verify();
     booleano = true;
  }	
});

confirmPassword.addEventListener('focusout',()=> {
  const objBtn9 = new Btn({backColor:'transparent',color: '#000'});
  objBtn9.passwordVerify();
});
confirmPassword.addEventListener('focusin',()=> {
  const objBtn10 = new Btn({backColor:'#ccc',color:'#000'});
  objBtn10.passwordVerify();
});

submitBtn.addEventListener('mouseover',()=>{
 if(booleano === false){
    const objBtn11 = new Btn({backColor:'#125e0d',shadow:'5px 5px 0 #03b0c3',time:'.6s'});
    objBtn11.animation();
 } else {
    const objBtn12 = new Btn({backColor:'#444',color:'#fff',time:'.6s'});
    objBtn12.animation();
}
});

submitBtn.addEventListener('mouseout',()=>{
 if(booleano === false){
    const objBtn13 = new Btn({backColor:'#16700f',time:'.6s'});
    objBtn13.animation();
 } else {
    const objBtn14 = new Btn({backColor:'#444',color:'#fff',time:'.6s'});
    objBtn14.animation();
 } 
});
