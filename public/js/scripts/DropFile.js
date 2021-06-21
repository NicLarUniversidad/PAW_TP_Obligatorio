class DropFile {

    constructor(dropZone) {
        const zona = document.getElementsByClassName(dropZone).item(0);
        console.log(zona);
        function toggleDropBox() {
            const dropBox = document.getElementsByClassName("dropBox");
            if (dropBox.classList.contains("cerrado")) {
                dropBox.classList.add("abierto")
                dropBox.classList.remove("cerrado")
            } else {
                dropBox.classList.add("cerrado")
                dropBox.classList.remove("abierto")
            }
        }
        function comenzar() {
            zona.addEventListener("dragenter",function (e) {
                e.preventDefault();
            } ,false);
            zona.addEventListener("dragover",function (e) {
                e.preventDefault()
            },false);
            zona.addEventListener("drop",soltar,false);
            function soltar(e) {
                e.preventDefault();
                let entrada = document.querySelector("input[name='archivo']");
                entrada.files=e.dataTransfer.files;
                toggleDropBox()
            }
        }
        comenzar();
    }
}

document.addEventListener("DOMContentLoaded", () => {
    let contenedor  = document.createElement("section");
    contenedor.classList.add("dropBox");
    contenedor.classList.add("cerrado");
    const main = document.querySelector("main");
    main.appendChild(contenedor);

    let botonArchivo = document.querySelector("input[type='file']");
    botonArchivo.addEventListener("click", (e) => {
        e.preventDefault()
        if (contenedor.classList.contains("cerrado")) {
            contenedor.classList.add("abierto")
            contenedor.classList.remove("cerrado")
        } else {
            contenedor.classList.add("cerrado")
            contenedor.classList.remove("abierto")
        }
    })
    let dd = new DropFile("dropBox");
});