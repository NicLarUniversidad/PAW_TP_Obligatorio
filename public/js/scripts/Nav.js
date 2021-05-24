class Nav {
    nav;
    nav_close = "nav";
    nav_open = "nav_open";

    loadNav() {

        function closeModal(modal) {
            modal.classList.add("hidden_admin_menu");
            modal.classList.remove("visible_admin_menu");
        }

        function openModal(modal) {
            modal.classList.add("visible_admin_menu");
            modal.classList.remove("hidden_admin_menu");
        }

        this.nav = document.querySelector("main>nav");
        const p = document.querySelector("header>p")
        const adminNav = document.querySelector("body>header>nav")
        // const adminNav = adminNavs.item(0)
        adminNav.classList.add("hidden_admin_menu")
        const lis = document.querySelectorAll("body>header>nav>ul")
        if (p) {
            p.addEventListener("click", function (e) {
                //if (adminNavs.length > 0) {
                    if (adminNav.classList.contains("hidden_admin_menu")) {
                        openModal(adminNav)
                    } else {
                        closeModal(adminNav)
                    }
                //}
            })
        }
        this.nav.classList.add(this.nav_close);
        this.nav.addEventListener("onclick",this.mouse_click_event)
        lis.forEach((node, index, pepe) => {
            try {
                node.classList.add("hidden_submenu")
            } catch (e) {

            }
        })
       /* lis.childNodes.item(1).
        lis.addEventListener("enter", () => {

        })*/
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