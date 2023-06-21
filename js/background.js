const body = document.querySelector('.body');
const h3 = document.querySelector('.h3');
const form = document.querySelector('.form');

addEventListener('load',()=>{
  form.style.display = 'block';
  h3.style.display = 'block';
  form.style.animation = 'aparecer .8s forwards';
  h3.style.animation = 'aparecer .8s forwards';
});

cookies = document.cookie.split('; ');
cookie = [];
for(let i=0; i < cookies.length; i++){
 cookie = cookies[i].split('=');

  if(cookie[i] === 'colorFondo'){
   body.style.backgroundColor = cookie[1];
    if(cookie[1] === '#161b22'){
     h3.style.color = '#fff';
     form.style.boxShadow = '0 0 15px #2600ff';
    }
  }     
}