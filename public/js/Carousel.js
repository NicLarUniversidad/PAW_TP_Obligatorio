class Carousel{
    constructor(listaImagenes, tagPadre)
    {
        this.listaImagenes = listaImagenes;
        let index = 0;
        let padre = document.querySelector(tagPadre);
        console.log(padre);
        listaImagenes.forEach(imagen => {
            console.log(imagen);

            let elemento = this.crearElemento('img','',{"src": imagen, "class": "carousel","style": "width:100%;height:100%","index":index });
            console.log(elemento);
            padre.appendChild(elemento);

            index++;
        });
        let selector = this.crearElemento('div','',{"class": "selector","style": "width:100%"});
        let buttonLeft = this.crearElemento('button','<',{"class": "button-left","onclick": "showImage(-1)"});
        let buttonRight = this.crearElemento('button','>',{"class": "button-right","onclick": "showImage(1)"});
        selector.appendChild(buttonLeft);
        selector.appendChild(buttonRight);
        padre.appendChild(selector);
        let slideIndex = 1;
        showSlideImages(slideIndex);
    }
    crearElemento(tag, contenido, atributos={}){
        var element = document.createElement(tag);
        for(const atributo in atributos){
            element.setAttribute(atributo, atributos[atributo])
        }
        element.appendChild(document.createTextNode(contenido));
        //console.log(element);
        return element;

    }
    
}
var slideIndex = 1;
function showImage(n) {
    showSlideImages(slideIndex += n);
 }
 
function currentImage(n) {
   showSlideImages(slideIndex = n);
 }
function showSlideImages(n) {
   var i;
   var x = document.getElementsByClassName("carousel");
   var dots = document.getElementsByClassName("selector");
   if (n > x.length) {slideIndex = 1}
   if (n < 1) {slideIndex = x.length}
   for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
   }
   x[slideIndex-1].style.display = "block";  
 }

document.addEventListener("DOMContentLoaded", () => {
    let listaImagenes =[
        "img/imagen1.jpg",
        "img/imagen2.jpg",
        "img/imagen3.jpg"
    ]
    let carousel = new Carousel(listaImagenes, 'aside');
});