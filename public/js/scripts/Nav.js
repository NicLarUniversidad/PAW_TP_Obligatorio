class Nav {
    nav;
    nav_close = "nav";
    nav_open = "nav_open";

    loadNav() {

        function closeModal(modal) {
            modal.classList.add("hidden_modal");
            modal.classList.remove("modal");
        }

        function openModal(modal) {
            modal.classList.add("modal");
            modal.classList.remove("hidden_modal");
        }

        this.nav = document.querySelector("main>nav");
        const p = document.querySelector("header>button")
        const adminNavs = document.getElementsByClassName("pre-modal")
        const adminNav = adminNavs.item(0)
        adminNav.classList.add("hidden_modal")
        if (p) {
            p.addEventListener("click", function (e) {
                if (adminNavs.length > 0) {
                    if (adminNav.classList.contains("hidden_modal")) {
                        openModal(adminNav)
                    } else {
                        closeModal(adminNav)
                    }
                }
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