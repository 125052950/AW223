const parametros1 = new URLSearchParams(window.location.search);
const estado1 = parametros1.get("estadoBorrar");

if (estado1 === "exitoBorrar") {
    alert("Éxito, tu mensaje fue eliminado");
} 
else if(estado1 === "errorBorrar") {
    alert("Algo fallo, intentalo nuevamente");
}

if(estado1 != null){
    window.history.replaceState({}, document.title, window.location.pathname);
}