document.addEventListener("DOMContentLoaded", function () {

    const themeToggle = document.getElementById("themeToggle");

    if (!themeToggle) return;

    const icon = themeToggle.querySelector("i");

    // Verifica tema salvo
    const temaSalvo = localStorage.getItem("tema");

    if (temaSalvo === "claro") {
        document.body.classList.add("tema-claro");

        if (icon) {
            icon.classList.remove("bi-sun-fill");
            icon.classList.add("bi-moon-fill");
        }
    }

    themeToggle.addEventListener("click", function () {

        document.body.classList.toggle("tema-claro");

        const modoClaro = document.body.classList.contains("tema-claro");

        localStorage.setItem(
            "tema",
            modoClaro ? "claro" : "escuro"
        );

        if (icon) {

            if (modoClaro) {
                icon.classList.remove("bi-sun-fill");
                icon.classList.add("bi-moon-fill");
            } else {
                icon.classList.remove("bi-moon-fill");
                icon.classList.add("bi-sun-fill");
            }

        }

    });

});