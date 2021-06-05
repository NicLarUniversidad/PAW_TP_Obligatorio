class Amb
{
    constructor()
    {
    }
    cargarModal() {
        const anchors = document.querySelectorAll("table a");
        const form = document.querySelector("form");
        const section = document.querySelector("table");
        form.classList.add("hidden_modal")
        const closeButton = document.createElement("button")
        const backModal = document.createElement("div")
        closeButton.classList.add("close_modal")
        backModal.classList.add("hidden_modal")
        closeButton.addEventListener("click", () => {
            form.classList.remove("modal")
            form.classList.add("hidden_modal")
            backModal.classList.remove("back_modal")
            backModal.classList.add("hidden_modal")
        })
        let registerButton = document. createElement("button");
        registerButton.textContent = "Agregar"
        registerButton.addEventListener("click", () => {
            form.classList.remove("hidden_modal")
            form.classList.add("modal")
            backModal.classList.remove("hidden_modal")
            backModal.classList.add("back_modal")
        })
        anchors.forEach((anchor, index) => {
            const href = anchor.href;
            anchor.addEventListener("click", (e) => {
                e.preventDefault()
                if (confirm("¿Desea borrar la entrada?")) {
                    fetch(href, {
                        method:"DELETE"
                    })
                        .then((data) => {

                        })
                        .catch(() => {
                            alert("No se pudo borrar el registro")
                        })
                }
            })
        })
        section.appendChild(registerButton)
        section.appendChild(backModal)
        form.appendChild(closeButton)
    }
}

let abm = new Amb();
document.addEventListener("DOMContentLoaded", () => {
    abm.cargarModal();
});