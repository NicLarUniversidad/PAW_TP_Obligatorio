class PAWMenu{
    constructor(pContenedor){

        let contenedor = pContenedor.tagName
            ? pContenedor 
            : document.querySelector(pContenedor);
        
        if(contenedor) {
            contenedor.classList.add("PAW-Menu");
            contenedor.classList.add("PAW-MenuCerrado");

            document.head.appendChild(PAW.nuevoElemento("link","",{rel:"stylesheet", type: "text/css" ,href: "js/components/styles/menu-style.css"}));

            PAW.nuevoElemento("link",
                {href: "paw-menu.js"}
            );
            
            let boton = PAW.nuevoElemento("button", "", {
                class: "PAW-MenuCerrar",
            });
            let buttonMenu= document.getElementById("button-menu");
            buttonMenu.addEventListener("click", (event)=>{
                event.target.classList.remove("PAW-Menu-Abrir");
                event.target.classList.add("PAW-Menu-Oculto")
                contenedor.classList.add("PAW-MenuAbierto");
                contenedor.classList.remove("PAW-MenuCerrado");
                   
                console.log(event);
            });
            boton.addEventListener("click", (event)=>{
                buttonMenu.classList.add("PAW-Menu-Abrir");
                buttonMenu.classList.remove("PAW-Menu-Oculto")
                contenedor.classList.remove("PAW-MenuAbierto");
                contenedor.classList.add("PAW-MenuCerrado");
                console.log(event);
            });

            contenedor.prepend(boton);
        }else{
            console.error("Elemento no encontrado");
        }

    }

}