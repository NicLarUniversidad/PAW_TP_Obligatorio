class Carousel{
    constructor(listaImagenes, tagPadre)
    {
        document.head.appendChild(PAW.nuevoElemento("link","",{rel:"stylesheet", type: "text/css" ,href: "js/components/styles/carousel.css"}));
        // document.head.appendChild(PAW.nuevoElemento("link","",{rel:"stylesheet", type: "text/css" ,href: "js/components/styles/pawcarousel.css"}));

        this.listaImagenes = listaImagenes;
        let index = 0;
        let padre = document.querySelector(tagPadre);
        this.loadedImages=0;
        this.imageCount=listaImagenes.length;
        console.log(padre);
        let contenedorThumbs = PAW.nuevoElemento("div","",{"name":"contenedorThumbs","class":"contenedorThumbs"});

        let progressBar = PAW.nuevoElemento("div", "", {"class": "progressBar"});
        let actualProgress = PAW.nuevoElemento("div", "", {"class": "progress"});

        padre.appendChild(progressBar);
        listaImagenes.forEach(imagen => {
            console.log(imagen);

            let elemento = PAW.nuevoElemento('img','',{"src": imagen, "class": "carousel loading","style": "width:100%;height:100%","index":index });
            elemento.addEventListener("load", event=>{
                elemento.classList.remove("loading");
                this.loadedImages++;
                let averageOfLoad = (this.loadedImages / this.imageCount) * 100;
                if(averageOfLoad == 100){
                    padre.removeChild(progressBar);
                }
                else
                    actualProgress.style.setProperty("--ancho", averageOfLoad+"vw");
            });
            //console.log(elemento);

            //circulo

            let nuevoCirculo = PAW.nuevoElemento("img","",{"src": imagen, "class":"circuloCarousel","index":index, "width":60, "height":60});
            nuevoCirculo.addEventListener("load", ()=>{
                console.log("Circulo loaded");
            });

            if (index == 0){
                nuevoCirculo.classList.add("active");
                elemento.classList.add("active");
            }
            //------------------------------------

            padre.appendChild(elemento);
            contenedorThumbs.appendChild(nuevoCirculo);
            /**Progress */
        
                progressBar.appendChild(actualProgress);
            //---------------------
            index++;
        });
        padre.appendChild(contenedorThumbs);

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
        //Imagenes
        let circulos= document.getElementsByClassName("circuloCarousel");
        console.log(circulos);
        for (let i = 0; i < circulos.length; i++) {
            circulos[i].addEventListener("click",(event)=>{
                this.mostrarImagen(i-this.slideIndex);                
            });
            
        }
        this.mostrarImagen(this.slideIndex);
    }

    mostrarImagen(n){
        let carousel = document.getElementsByClassName("carousel");
        let circulos= document.getElementsByClassName("circuloCarousel");
        circulos[this.slideIndex].classList.remove("active");


        this.slideIndex = this.slideIndex + n;
        this.ocultarImagenes(this.listaImagenes.length, carousel);
        if( this.slideIndex >= this.listaImagenes.length){
            this.slideIndex=0;
        }
        if (this.slideIndex < 0){
            this.slideIndex = this.listaImagenes.length -1;
        }
        circulos[this.slideIndex].classList.add("active");
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