class Amb
{
    constructor()
    {
    }
    cargarModal() {
        const form = document.querySelector("form");
        form.classList.add("hidden_modal")
        const closeButton = document. createElement("button")
        closeButton.classList.add("close_modal")
        closeButton.addEventListener("click", () => {
            form.classList.remove("modal")
            form.classList.add("hidden_modal")
        })
        form.appendChild(closeButton)
        const section = document.querySelector("section");
        let registerButton = document. createElement("button");
        registerButton.textContent = "Registrar"
        registerButton.addEventListener("click", () => {
            form.classList.remove("hidden_modal")
            form.classList.add("modal")
        })
        section.appendChild(registerButton)
    }
}


document.addEventListener("DOMContentLoaded", () => {
    let abm = new Amb();
    abm.cargarModal();
});