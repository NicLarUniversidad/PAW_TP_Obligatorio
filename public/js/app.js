class appPAW{
    constructor(){
        //Inicializar la funcionalidad menu
        document.addEventListener("DOMContentLoaded",()=>{
        PAW.cargarScript("PAW-Menu", "js/components/paw-menu.js", () => {            
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
}

let app = new appPAW();