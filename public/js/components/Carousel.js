class Carousel{
    constructor(listaImagenes, tagPadre)
    {
        document.head.appendChild(PAW.nuevoElemento("link","",{rel:"stylesheet", type: "text/css" ,href: "js/components/styles/carousel.css"}));

        this.listaImagenes = listaImagenes;
        let index = 0;
        let padre = document.querySelector(tagPadre);
        console.log(padre);

        /*
          Barra de progreso
          
        */

        let progressBar = PAW.nuevoElemento("div", "", {"class": "progressBar"});
        let actualProgress = PAW.nuevoElemento("div", "", {"class": "progress"});

        /* */
        listaImagenes.forEach(imagen => {
            console.log(imagen);

            let elemento = PAW.nuevoElemento('img','',{"src": imagen, "class": "carousel","style": "width:100%;height:100%","index":index });
            console.log(elemento);
            padre.appendChild(elemento);

            index++;
        });
        let selector = PAW.nuevoElemento('div','',{"class": "selector","style": "width:100%"});
        // let buttonLeft = PAW.nuevoElemento('button','',{"class": "button-left","onclick": "showImage(-1)"});
        // let buttonRight = PAW.nuevoElemento('button','',{"class": "button-right","onclick": "showImage(1)"});
        let buttonLeft = PAW.nuevoElemento('button','',{"class": "button-left"});
        let buttonRight = PAW.nuevoElemento('button','',{"class": "button-right"});
        buttonLeft.addEventListener("click", (event)=>{
            this.mostrarImagen(-1);
        });
        buttonRight.addEventListener("click", (event)=>{
            this.mostrarImagen(1);
        });
        
        selector.appendChild(buttonLeft);
        selector.appendChild(buttonRight);
        padre.appendChild(selector);
        this.slideIndex = 0;

        this.mostrarImagen(this.slideIndex);
    }

    mostrarImagen(n){
        let carousel = document.getElementsByClassName("carousel");
        this.slideIndex = this.slideIndex + n;
        this.ocultarImagenes(this.listaImagenes.length, carousel);
        if( this.slideIndex >= this.listaImagenes.length){
            this.slideIndex=0;
        }
        if (this.slideIndex < 0){
            this.slideIndex = this.listaImagenes.length -1;
        } 
        carousel[this.slideIndex].style.display = "block";
    }
    ocultarImagenes(length, carousel){
        for (let i = 0; i < length; i++) {
            carousel[i].style.display = "none";
        }
    }
    


}


// document.addEventListener("DOMContentLoaded", () => {
//     let listaImagenes =[
//         "img/imagen1.jpg",
//         "img/imagen2.jpg",
//         "img/imagen3.jpg",
//         "img/imagen4.jpg"
        
//     ]
//     let carousel = new Carousel(listaImagenes, 'aside');
// });