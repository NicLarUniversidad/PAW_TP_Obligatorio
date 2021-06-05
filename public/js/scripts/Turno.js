class Turno {
    cargarComponentes() {
        const buttons = document.getElementsByClassName("success")
        if (buttons.length > 0 ) {
            const button = buttons.item(1)
            button.addEventListener("click", (e) => {
                e.preventDefault()
                const promesa = fetch("/nuevoTurno", {
                        method: 'PUT'
                })
                promesa.then((data) => {
                    if (data.body === "OK") {

                    } else {
                        alert(data.body)
                    }
                }).catch(() => {
                    alert("Se ha producido un error en el servidor")
                })
            })
        }
    }
}


let turno = new Turno();
document.addEventListener("DOMContentLoaded", () => {
    turno.cargarComponentes();
});