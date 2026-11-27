from flask import Blueprint, request, jsonify
from Models.modelEstudiante import *


#Primer objeto controlador con constructor "name", sirve para aplicar y utilizar las rutas
controladorAlumnoBP = Blueprint('controladorAlumno', __name__)

#Cambiamos la ruta de app para agregar el controlador como objeto de las rutasx
@controladorAlumnoBP.route('/')
def inicio():
    return "Hola soy el backend de Alumno"

#Ruta para insert
@controladorAlumnoBP.route('/guardarAlumno', methods=['POST'])
def guardar():
    nombreReq = request.form.get('txtNombre', '').strip()
    carreraReq = request.form.get('txtCarrera', '').strip()
    try:
        insertEstudiante(nombreReq, carreraReq)
        return jsonify({"Completado":"Estudiante guardado"}),200
    except Exception as e:
        return jsonify({"Error": str(e)}),500

#Ruta para consulta
@controladorAlumnoBP.route('/consultatodo')
def consultatodo():
    try:
        datos = selectAll()
        lista_alumnos = []
        for fila in datos:
            lista_alumnos.append({
                "id":fila[0],
                "nombre":fila[1],
                "carrera":fila[2],
                "state":fila[3]
            })
        return jsonify({"alumnos": lista_alumnos}),200
    except Exception as e:
        return jsonify({"Error": str(e)}),500

#Ruta para actualizar
@controladorAlumnoBP.route('/actualizarAlumno', methods=['PUT'])
def actualizar():
    idReq = request.form.get('txtId', '').strip()
    nombreReq = request.form.get('txtNombre', '').strip()
    carreraReq = request.form.get('txtCarrera', '').strip()
    try:
        actualizarEstudiante(idReq, nombreReq, carreraReq)
        return jsonify({"Completado": "Se actualizo el alumno"}), 200
    except Exception as e:
        return jsonify({"Error": str(e)}), 500

#Ruta para eliminar
@controladorAlumnoBP.route('/eliminarAlumno', methods=['DELETE'])
def eliminar():
    idReq = request.form.get('txtId', '').strip()
    try:
        softDeleteEstudiante(idReq)
        return jsonify({"Completado": "Se borró el alumno"}), 200
    except Exception as e:
        return jsonify({"Error": str(e)}), 500

#Ruta para consulta por id
@controladorAlumnoBP.route('/consultarAlumno')
def consultaId():
    idReq = request.form.get('txtId', '').strip()
    try:
        datos = consultarEstudianteId(idReq)
        alumno = []
        for fila in datos:
            alumno.append({
                "id":fila[0],
                "nombre":fila[1],
                "carrera":fila[2],
                "state":fila[3]
            })
        return jsonify({"Alumno": alumno}),200
    except Exception as e:
        return jsonify({"Error": str(e)}), 500