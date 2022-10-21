var registro = document.querySelector('.imgs');
var listado = document.querySelector('.imgz');
var form = document.querySelector('#form');
var regis = document.querySelector("#rest");
var click = document.querySelector("#on")

registro.addEventListener('click',function(){
    form.style.display = 'block';
    regis.style.display ='none';
})

listado.addEventListener('click',function(){
    form.style.display = 'none';
    regis.style.display ='block';
})
