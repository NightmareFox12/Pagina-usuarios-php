"use strict";

const password = document.querySelector('.password');
const confirmPassword = document.querySelector('.password-confirm');
const confirmPasswordInput = document.querySelector('.password-confirm-input');
const container = document.querySelector('.container-form');
const span = document.querySelector('.span');
const submitBtn = document.querySelector('.btn-send');
const title = document.querySelector('.title');

let booleano = true;

addEventListener("load",()=>{
  container.style.display = 'block';
  title.style.display = 'block';
  container.style.animation = 'aparecer .8s forwards';
  title.style.animation = 'aparecer .8s forwards';
});

password.addEventListener("focus",()=> {
  confirmPassword.style.display = 'block';
  confirmPassword.style.animation = 'aparecer 1s forwards';
});

password.addEventListener("keyup",()=>{

 let contrasenia = password.value;
 let contraseniaConfirmar = confirmPasswordInput.value;
 
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
    const objBtn3 = new Btn({backColor: "#7e7e7e",color: '#000',cursor: 'not-allowed',booleano: true});
    objBtn3.verify();
    booleano = true;
    const objBtn4 = new Btn({backColor:'#bd2828',color:'#fff'});
    objBtn4.passwordVerify();
  }
  
});

confirmPasswordInput.addEventListener('keyup',()=> {
 let contrasenia = password.value;
 let contraseniaConfirmar = confirmPasswordInput.value;

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

confirmPasswordInput.addEventListener('focusout',()=> {
  const objBtn9 = new Btn({backColor:'#fff',color: '#000'});
  objBtn9.passwordVerify();
});
confirmPasswordInput.addEventListener('focusin',()=> {
  const objBtn10 = new Btn({backColor:'#fff',color:'#000'});
  objBtn10.passwordVerify();
});

submitBtn.addEventListener('mouseover',()=>{
 if(booleano === false){
    const objBtn11 = new Btn({backColor:'#125e0d',time:'.6s'});
    objBtn11.animation();
 } else {
    const objBtn12 = new Btn({backColor:'#7e7e7e',color:'#fff',time:'.6s'});
    objBtn12.animation();
}
});

submitBtn.addEventListener('mouseout',()=>{
 if(booleano === false){
    const objBtn13 = new Btn({backColor:'#16700f',time:'.6s'});
    objBtn13.animation();
 } else {
    const objBtn14 = new Btn({backColor:'#7e7e7e',color:'#fff',time:'.6s'});
    objBtn14.animation();
 } 
});
