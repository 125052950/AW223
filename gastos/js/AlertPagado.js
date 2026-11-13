const parametros = new URLSearchParams(window.location.search);
const estado = parametros.get("estadoActualizar");

if (estado === "exitoActualizar") {
    alert("Éxito, tu mensaje fue guardado");
} 
else if(estado === "errorActualizar") {
    alert("Algo fallo, intentalo nuevamente");
}

if(estado != null){
    window.history.replaceState({}, document.title, window.location.pathname);
}