"use strict";

class Btn {

  constructor({backColor, color="#fff", cursor="pointer", time="", booleano=true}){
    this.backColor = backColor;
    this.color = color;
    this.cursor = cursor;
    this.time = time;
    this.booleano = booleano;
  }

   animation() {
    submitBtn.style.backgroundColor = this.backColor;
    submitBtn.style.transition = this.time;
    submitBtn.style.color = this.color;
    submitBtn.removeAttribute("disabled");
   }

   verify() {
    submitBtn.style.backgroundColor = this.backColor;
    submitBtn.disabled = this.booleano;
    submitBtn.style.cursor = this.cursor;
    submitBtn.removeAttribute("disabled");
   }

   passwordVerify() {
    confirmPasswordInput.style.backgroundColor = this.backColor;
    confirmPasswordInput.style.color = this.color;
    
}

}