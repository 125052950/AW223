
document.addEventListener("DOMContentLoaded", () => {
    
//Cambiar el html desde js 
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

//Cambiar el css desde js 

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
}); 