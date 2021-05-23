class App
{
    nav;
    constructor()
    {
        document.addEventListener("DOMContentLoaded", () => {
            this.cargarScript("nav_script","/js/scripts/Nav.js" ,() => {
                this.nav = new Nav();
                this.nav.loadNav();
            })
        });
    }

    nuevoElemento(tag, contenido, atributos = {})
    {
        let elemento = document.createElement(tag);
        for(const atributo in atributos)
            elemento.setAttribute(atributo, atributos[atributo])
        if(contenido.tagName)
            elemento.appendChild(contenido);
        else
            elemento.appendChild(document.createTextNode(contenido));
        return elemento;
    }

    cargarScript(nombre, url, fnCallback = null)
    {
        let elemento = document.querySelector("script#" + nombre);
        if(!elemento){
            elemento = this.nuevoElemento("script", "", {src: url, name: nombre});
            if(fnCallback)
                elemento.addEventListener("load", fnCallback);
            document.head.appendChild(elemento);
        }
        return elemento
    }
}

app = new App();