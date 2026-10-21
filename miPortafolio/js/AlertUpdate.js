const parametros = new URLSearchParams(window.location.search);
const estado = parametros.get("estadoActualizar");

if (estado === "exitoActualizar") {
    alert("Éxito, tu mensaje fue editado");
} 
else if(estado === "errorActualizar") {
    alert("Algo fallo, intentalo nuevamente");
}

if(estado === "exitoActualizar" || estado === "errorActualizar"){
    window.history.replaceState({}, document.title, window.location.pathname);
}