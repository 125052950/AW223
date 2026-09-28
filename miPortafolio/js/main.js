document.addEventListener("DOMContentLoaded", () => {
    
 /* Cambiar el html desde js */
    const header = document.querySelector("header");
    if (header) {
        const textoBienvenida = header.querySelector("p") || header.querySelector("h2");
        
        const btnCambiarMensaje = document.createElement("button");
        btnCambiarMensaje.textContent = "Cambiar Mensaje";
        
        btnCambiarMensaje.addEventListener("click", () => {
            if (textoBienvenida) {
                textoBienvenida.textContent = "¡Hola! Bienvenido a mi Portafolio ahora con JS";
            }
        });

        header.appendChild(btnCambiarMensaje);
    }

/* Cambiar el css desde js */

    const seccionHabilidades = document.querySelector(".lista-habilidades");
    
    if (seccionHabilidades) {
        const btnColor = document.createElement("button");
        btnColor.textContent = "Cambiar color";
        
        const btnTipografia = document.createElement("button");
        btnTipografia.textContent = "Cambiar tipo de letra";

        const cajasHabilidades = seccionHabilidades.querySelectorAll("li");

        btnColor.addEventListener("click", () => {
            cajasHabilidades.forEach(caja => {
                caja.style.backgroundColor = "#e8f4f8";
                caja.style.color = "#0277bd";
            });
        });

        btnTipografia.addEventListener("click", () => {
            cajasHabilidades.forEach(caja => {
                caja.style.fontFamily = "Georgia, serif";
            });
        });

        seccionHabilidades.appendChild(btnColor);
        seccionHabilidades.appendChild(btnTipografia);
    }

/* Validar campos con alert */

    const formulario = document.querySelector("form");
    
    if (formulario) {
        formulario.addEventListener("submit", (evento) => {
            evento.preventDefault(); 

            const inputNombre = formulario.querySelectorAll('input')[0];
            const inputCorreo = formulario.querySelectorAll('input')[1];

            if (!inputNombre || !inputNombre.value.trim()) {
                alert("Por favor, escribe tu nombre");
                if (inputNombre) inputNombre.focus();
                return;
            }

            if (!inputCorreo || !inputCorreo.value.trim()) {
                alert("El correo es obligatorio");
                if (inputCorreo) inputCorreo.focus();
                return;
            }

            alert("Formulario enviado correctamente");
            formulario.reset();
        });
    }
});