document.addEventListener('DOMContentLoaded', function () {
    PAW.cargarScript("PAW-Menu", "js/components/paw-menu.js", () => {            
        let menu = new PAWMenu("nav");
    }); 
    console.log("turnos");
});
   
    function deleteRow (row) {
        row.parentNode.removeChild(row);
    };
    function llamar(idTurno, consultorio){
        let url= "/misTurnos";
        data = { "idTurno" : idTurno, "consultorio": consultorio,"paciente": "Roberto Carlos", "horario":"08:00","estado":"llamando"};
        let button_llamar = document.getElementById("button-llamar-"+idTurno);
        let button_atendido= document.getElementById("button-atendido-"+idTurno);
        let button_posponer= document.getElementById("button-posponer-"+idTurno);

        //Cambiar clase de boton llamar
        button_llamar.classList.remove('mostrar');
        button_llamar.classList.add("oculto");
        ocultarBotones("button-llamar");
        ocultarBotones("button-atendido");
        ocultarBotones("button-posponer");
        
        
        button_atendido.classList.remove('oculto');
        button_atendido.classList.add("mostrar");

        button_posponer.classList.remove('oculto');
        button_posponer.classList.add("mostrar");

        console.log(JSON.stringify(data));
        //Envio al backend el cambio de estado para avisar que esta en sala de espera el paciente
        fetch(url, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)  
            })
            .then((response) => response.json())
            .then((respuesta) => {
                                           
                console.log(respuesta);
            }).catch(function(error){
                console.log(error);
            });
    }

    function atendido(idTurno, consultorio){
        let button_atendido= document.getElementById("button-atendido-"+idTurno);
        //TODO: Enviar al backend el cambio de estado a atendido
        ocultarBotones("button-atendido");
        ocultarBotones("button-posponer");
        mostrarBotones("button-llamar");
        //TODO: Eliminar turno de la lista
    }

    function posponer(idTurno, consultorio){
        //TODO: Enviar al back el cambio de estado a pendiente
        ocultarBotones("button-atendido");
        ocultarBotones("button-posponer");
        mostrarBotones("button-llamar");
    }

    function ocultarBotones(className){
        botones= document.getElementsByClassName(className);
        for (let i = 0; i < botones.length; i++) {
            botones[i].classList.remove("mostrar");
            botones[i].classList.add("oculto");
        }
    }

    function mostrarBotones(className){
        botones= document.getElementsByClassName(className);
        for (let i = 0; i < botones.length; i++) {
            botones[i].classList.remove("oculto");
            botones[i].classList.add("mostrar");
        }
    }