class Nav {
    nav;
    nav_close = "nav";
    nav_open = "nav_open";

    loadNav() {
        this.nav = document.querySelector("main>nav");
        const p = document.querySelector("header>p")
        if (p) {
            p.addEventListener("click", function (e) {

            })
        }
        this.nav.classList.add(this.nav_close);
        this.nav.addEventListener("onclick",this.mouse_click_event)
    }

    mouse_click_event() {
        if(app.nav.classList.contains(this.nav_close)) {
            this.openNav();
        } else {
            this.closeNav();
        }
    }

    closeNav() {
        app.nav.classList.add(this.nav_close);
        app.nav.classList.remove(this.nav_open);
    }

    openNav() {
        app.nav.classList.add(this.nav_open);
        app.nav.classList.remove(this.nav_close);
    }
}