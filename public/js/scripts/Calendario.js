class Calendario {

    constructor(tagPadre) {
        this.padre = tagPadre;
    }

    generarTabla(diasQueAtiende, horarioInicio, horarioFin, duracionTurno){
        let nuevaTabla = app.nuevoElemento("table","",{class:'CalendarModal'});
        let diasAtiende = app.nuevoElemento("tr","",{class:''});
        let dia = app.nuevoElemento("th","",{class:""});

        diasAtiende.appendChild(dia);
        diasQueAtiende.forEach(obj =>{
            let dia = app.nuevoElemento("th",obj,{class:''+obj});
            diasAtiende.appendChild(dia);
        });
        nuevaTabla.appendChild(diasAtiende);

        let dIndex = new Date();
        dIndex.setHours(horarioInicio["horas"]);
        dIndex.setMinutes(horarioInicio["minutos"]);

        let dFin = new Date();
        dFin.setHours(horarioFin["horas"]);
        dFin.setMinutes(horarioFin["minutos"]);

        while (dIndex<=dFin ){
            let tr = app.nuevoElemento("tr","",{class: dIndex.getHours()+':'+dIndex.getMinutes()});
            let thHora = app.nuevoElemento("th",dIndex.getHours()+':'+dIndex.getMinutes(),{hora:dIndex.getHours(),min:dIndex.getMinutes()});
            tr.appendChild(thHora);

            diasQueAtiende.forEach(obj =>{
                let diaTurno  =app.nuevoElemento("td","disponible",{dia:obj, hora:dIndex.getHours(), min:dIndex.getMinutes(), estado: "disponible"});

                tr.appendChild(diaTurno);
            });

            nuevaTabla.appendChild(tr);

            dIndex.setMinutes(dIndex.getMinutes()+duracionTurno);
        }
        return nuevaTabla;
    }

    setTurnosTomados(tabla, turnosTomados){
        turnosTomados.forEach(obj =>{
            let dia =obj['dia'];
            let hora = obj['horas'];
            let minutos = obj['minutos'];
            let selector = "td[dia='"+dia+"'][hora='"+hora+"'][min='"+minutos+"']";
            let turno = tabla.querySelector(selector);
            turno.setAttribute("estado","ocupado");
            turno.textContent = "Ocupado";
        });
    }

    generarSelect(){
        let select = document.querySelector("form>fieldset>label>select")
        select.addEventListener("change", ()=>{this.updateTable();})
        select.classList.add("Calendar-Select")
    }

    getInformationOfSelectedMedico(){
        let result = null;
        let found = false;
        let select = this.padre.querySelector(".Calendar-Select");
        let matricula = select.value;
        this.listaTurnos["especialistas"].forEach(element => {
            if(element["matricula"] == parseInt(matricula))
            {
                if(found == false){
                    result = element;
                    found = true;
                }
            }

        });
        return result;
    }

    generarButton(){
        let boton = document.createElement("button");
        boton.classList.add("CalendarButton");
        boton.type="button";
        boton.innerText="Abrir calendario";
        boton.addEventListener("click", ()=>{this.handleButtonEvent()});
        this.padre.appendChild(boton);
    }

    generarContenedor(){
        let contenedor  = document.createElement("div");
        contenedor.classList.add("PreCalendario");
        contenedor.classList.add("cerrado");
        this.padre.appendChild(contenedor);
        return contenedor;
    }

    handleButtonEvent(){
        this.updateTable();
        this.changeContenedorClass();
        this.manejoDeSeleccionTurno();
    }

    updateTable(){
        this.removeTableIfExists();
        let informationOfSelectedMedico = this.getInformationOfSelectedMedico();
        let tabla = this.generarTabla(informationOfSelectedMedico["diasQueAtiende"],
            informationOfSelectedMedico["horarioInicio"],
            informationOfSelectedMedico["horarioFinalizacion"],
            informationOfSelectedMedico["duracionTurno"])
        this.setTurnosTomados(tabla, informationOfSelectedMedico["turnosTomados"]);
        this.contenedor.appendChild(tabla);
    }

    changeContenedorClass(){
        if (this.contenedor.classList.contains("cerrado")) {
            this.contenedor.classList.remove("cerrado");
            this.contenedor.classList.add("abierto");
        }else{
            this.contenedor.classList.remove("abierto");
            this.contenedor.classList.add("cerrado");
        }
    }

    removeTableIfExists(){
        let table = this.contenedor.querySelector("table");
        if(table)
            this.contenedor.removeChild(table);
    }

    remplazarInputHidden(padre, name, value){
        let input = padre.querySelector("input[name='"+name+"']");
        console.log(input);
        input.setAttribute("value", value);
    }

    manejoDeSeleccionTurno(){
        let table = this.contenedor.querySelector("table");
        if (table){
            let tdLibres= table.querySelectorAll("td[estado='disponible']");
            tdLibres.forEach(obj=>{
                obj.addEventListener("click", event=>{
                    let boton = document.querySelector(".CalendarButton");
                    let padreBoton = boton.parentElement;
                    let hora = obj.getAttribute("hora") + ""
                    let minuto = obj.getAttribute("min") + ""
                    if (obj.getAttribute("hora") < 10) {
                        hora = "0" + obj.getAttribute("hora")
                    }
                    if (obj.getAttribute("min") < 10) {
                        minuto = "0" + obj.getAttribute("min")
                    }
                    this.remplazarInputHidden(padreBoton, "fecha-turno", obj.getAttribute("dia"));
                    this.remplazarInputHidden(padreBoton, "horario-turno", hora + ":" + minuto);
                    this.changeContenedorClass()
                });
            });
        }
    }

    setListaTurnosConJson(json) {
        this.listaTurnos = json
        console.log(this.listaTurnos)
        this.generarSelect()
        this.contenedor = this.generarContenedor()
        this.generarButton()
    }
}

document.addEventListener("DOMContentLoaded",()=>{
    let fieldset = document.getElementById("field-set-turno").parentElement;
    let calendario = new  Calendario(fieldset);
    //TODO: Descomentar y generar JSON desde el back, luego llamar estas líneas desde la vista (.html, .php)
    const json = {
        "especialistas":
            [{
                "matricula": "1",
                "nombre": "Esteban Nicolás",
                "apellido": "Larena",
                "diasQueAtiende": ["25/05/2021", "26/05/2021", "27/05/2021", "28/05/2021"],
                "horarioInicio": {
                    "horas": 9,
                    "minutos": 0
                },
                "horarioFinalizacion": {
                    "horas": 12,
                    "minutos": 0
                },
                "duracionTurno": 30,
                "turnosTomados":
                    [
                        {
                            "dia": "25/05/2021",
                            "horas": 10,
                            "minutos": 0
                        }
                    ]
                },
                {
                    "matricula": "2",
                    "nombre": "Federico",
                    "apellido": "Ledesma",
                    "diasQueAtiende": ["25/05/2021", "26/05/2021", "27/05/2021", "28/05/2021"],
                    "horarioInicio": {
                        "horas": 9,
                        "minutos": 0
                    },
                    "horarioFinalizacion": {
                        "horas": 12,
                        "minutos": 0
                    },
                    "duracionTurno": 30,
                    "turnosTomados":
                        [
                            {
                                "dia": "26/05/2021",
                                "horas": 10,
                                "minutos": 0
                            }
                        ]
                }
            ]
        };
    calendario.setListaTurnosConJson(json)
})