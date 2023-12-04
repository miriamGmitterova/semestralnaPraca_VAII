document.addEventListener("DOMContentLoaded", () => {
    const navbar = document.getElementById("navBarTop");
    const searchBarTop = document.getElementById("searchBarTop");

    // Nefunguje, opraviť
    /*
    navbar.addEventListener('resize', (e) => {
        e.preventDefault();
        searchBarTop.classList.add("hidden");
        if (navbar.innerWidth < 500 && !searchBarTop.classList.contains("hidden")) {
            searchBarTop.classList.add("hidden");
        } else if (navbar.clientWidth > 500 && searchBarTop.classList.contains("hidden")) {
            searchBarTop.classList.remove("hidden")
        }
    });
    */
    const loginButton = document.getElementById("prihlasitSa");
    const cancelButton = document.getElementById("loginCloseButton");
    const mainLoginDiv = document.getElementById("login-popup");
    const smallLoginDiv = document.getElementById("mainLoginWindow")

    if (loginButton != null) {
        loginButton.addEventListener("click", (e) => {
            e.preventDefault();
            mainLoginDiv.classList.add("show");
            setTimeout(function (){
                smallLoginDiv.classList.add("show");
            }, 100);
        });
    }

    if (cancelButton != null) {
        cancelButton.addEventListener("click", (e) => {
            e.preventDefault();
            smallLoginDiv.classList.remove("show");
            setTimeout(function (){
                mainLoginDiv.classList.remove("show");
            }, 100);
        });
    }

    const userButton = document.getElementById("userButton");
    const userDropdownMenu = document.getElementById("userDropdownMenu");

    userButton.addEventListener("click", (e) => {
        e.preventDefault();
        userDropdownMenu.classList.toggle("show");
        userButton.classList.toggle("active");
    });




    const sidebar = document.getElementById("sidebar");
    const btnSidebarToggler = document.getElementById("btnSidebarToggler");
    const navClosed = document.getElementById("navClosed");
    const navOpen = document.getElementById("navOpen");

    btnSidebarToggler.addEventListener("click", (e) => {
        e.preventDefault();
        sidebar.classList.toggle("show");
        navClosed.classList.toggle("hidden");
        navOpen.classList.toggle("hidden");
    });

    const btnPrihlasitSa = document.getElementById("prihlasitSa");
    if (btnPrihlasitSa != null) {
        btnPrihlasitSa.addEventListener("click", (e) => {
            e.preventDefault();
            document.getElementById("testLoginForm").submit();
        });
    }
    //sidebar.style.top = parseInt(navbar.clientHeight) - 1 + "px";
});