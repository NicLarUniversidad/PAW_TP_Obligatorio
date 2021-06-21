document.addEventListener('DOMContentLoaded', function () {
    PAW.cargarScript("PAW-Menu", "js/components/paw-menu.js", () => {            
        let menu = new PAWMenu("nav");
    }); 
    console.log("turnos");
    
   
    setInterval("postData('/turnoActual')",10000);
  
});



function example2() {
    // For a single value you can pass in a Number rather than an Array
    
    Notification.vibrate(500);
    alert("hola");
  }
function vibrate() {
    if (!window) {
        return;
    }

    if (!window.navigator) {
        return;
    }

    if (!window.navigator.vibrate) {
        return;
    }

    navigator.vibrate(5000);
}
// Ejemplo implementando el metodo POST:
    function postData(url = '') {
        fetch(url, {
        method: 'PUT', 
        headers: {
            'Content-Type': 'application/json'
        } 
        })
        .then((response) => response.json())
        .then((respuesta) => {
            //elimino la tabla con turnos actuales
            var table = document.getElementsByTagName('table')[0]
            var row = document.getElementsByTagName('tbody')[0];
            console.log(respuesta);
            deleteRow(row);
            //Actualizo la tabla
            var tblBody = document.createElement("tbody");
            
            //Bandera para verificar si el siguiente es mi turno
            let b = false;
            let miTurno = document.getElementById("miTurno").innerHTML;
            console.log(miTurno);
            //agrego todos los pacientes a la tabla
            respuesta.turnos.forEach(turno => {
                console.log(turno);
                let r =document.createElement('tr');
                let paciente = document.createElement('td');
                let consultorio = document.createElement('td');
                let horario = document.createElement('td');
                paciente.innerHTML = turno.paciente;
                consultorio.innerHTML = turno.consultorio;
                horario.innerHTML = turno.horario;
                r.appendChild(paciente);
                r.appendChild(consultorio);
                r.appendChild(horario);
                tblBody.appendChild(r);

                //Si aun no se encontro el turno
                if (!b && (turno.id == miTurno)){
                    b=true;
                }
            });
            console.log(tblBody);            
            table.appendChild(tblBody);

            console.log(respuesta);
            //debo guardar mi numero de turno en el front
            if (b){
                //Notificacion al celu
                navigator.vibrate(500);
                if(window.confirm("Es mi turno. ¿Asistir?")){
                    console.log("Confirmo asistencia");

                }
                console.log("Es mi turno");
                //Cambiar el estado a atendiendo
                
                
            }
            
        }).catch(function(error){
            console.log(error);
        });
    };
    
    function deleteRow (row) {
        row.parentNode.removeChild(row);
    };
 
    function confirmarAsistencia(){
        //Enviar al back confirmacion, el turno debe pasar de llamando a atendiendo.
        
    }
    //Pantalla de doctor para actualizar turnos 
    //notificacion al telefono