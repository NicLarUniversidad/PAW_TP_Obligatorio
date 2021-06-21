class appPAW{
    constructor(){
        //Inicializar la funcionalidad menu
        document.addEventListener("DOMContentLoaded",()=>{
        PAW.cargarScript("Menu", "js/components/paw-menu.js", () => {
                let menu = new PAWMenu("nav");
            });
        });


        //Inicializar la funcionalidad carrousell
        document.addEventListener("DOMContentLoaded",()=>{
         PAW.cargarScript("Carousel", "js/components/Carousel.js", () => {             
                let listaImagenes =[
                    "img/imagen1.jpg",
                    "img/imagen2.jpg",
                    "img/imagen3.jpg",
                    "img/imagen4.jpg"
                ]
                let carousel = new Carousel(listaImagenes, 'aside');
             })
         });

    }

    nuevoElemento(tag, contenido, atributos = {}){
        let elemento = document.createElement(tag);
        for (const atributo in atributos){
            elemento.setAttribute(atributo,atributos[atributo]);
        }
        if(contenido.tagName){
            elemento.appendChild(contenido);
        }else{
            elemento.appendChild(document.createTextNode(contenido));
        }
        return elemento;
    }

    cargarScript(nombre, url, fnCallback){
        let elemento = document.querySelector("script#"+nombre)
        if (!elemento){

            //creo el tag script
            elemento = this.nuevoElemento("script","", {src: url, id: nombre});


            //funcion callback
            if (fnCallback)
                elemento.addEventListener("load", fnCallback);


            document.head.appendChild(elemento);
        }

        return elemento;
    }
}

let app = new appPAW();