"use strict";

class Btn {

  constructor({backColor, color="#fff", cursor="pointer", shadow="none", time="", booleano=true}){
    this.backColor = backColor; this.color = color;
    this.cursor = cursor; this.shadow = shadow;
    this.time = time;  this.booleano = booleano;
  }

   animation() {
    submitBtn.style.backgroundColor = this.backColor;
    submitBtn.style.boxShadow = this.shadow;
    submitBtn.style.transition = this.time;
    submitBtn.style.color = this.color;
   }

   verify() {
    submitBtn.style.backgroundColor = this.backColor;
    submitBtn.disabled = this.booleano;
    submitBtn.style.cursor = this.cursor;
   }

   passwordVerify() {
    confirmPassword.style.backgroundColor = this.backColor;
    confirmPassword.style.color = this.color;
}

}