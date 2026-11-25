from flask import Blueprint

#Primer objeto controlador con constructor "name", sirve para aplicar y utilizar las rutas
controladorAlumnoBP = Blueprint('controladorAlumno', __name__)

#Cambiamos la ruta de app para agregar el controlador como objeto de las rutasx
@controladorAlumnoBP.route('/')
def inicio():
    return "Hola soy el backend de Alumno"

#Ruta para insert
@controladorAlumnoBP.route('/guardarAlumno', methods=['POST'])
def guardar():
    return 'Se guardó el alumno'

#Ruta para consulta
@controladorAlumnoBP.route('/consultatodo')
def consultatodo():
    return 'Se consulto todo'

#Ruta para actualizar
@controladorAlumnoBP.route('/actualizarAlumno', methods=['PUT'])
def actualizar():
    return 'Se actualizo el alumno'

#Ruta para actualizar
@controladorAlumnoBP.route('/eliminarAlumno', methods=['DELETE'])
def eliminar():
    return 'Se borro el alumno'