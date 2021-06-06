class appPAW{
    constructor(){
        //Inicializar la funcionalidad menu
        document.addEventListener("DOMContentLoaded",()=>{
        PAW.cargarScript("PAW-Menu", "js/components/paw-menu.js", () => {            
                let menu = new PAWMenu("nav");
            });
        });


        //Inicializar la funcionalidad carrousell
        // PAW.cargarScript("PAW-Menu", "/paw-menu.js", () => {
        //     document.addEventListener("DO MContentLoaded",()=>{
        //         let menu = new PAWMenu();
        //     })
        // });


    }
}

let app = new appPAW();