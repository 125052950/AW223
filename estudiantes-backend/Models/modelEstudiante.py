from app import mysql

#Función para consultar todo
def selectAll():
    cursor = mysql.connection.cursor()
    cursor.execute("SELECT * FROM tb_alumnos WHERE state = 1")
    consulta = cursor.fetchall()
    cursor.close()
    return consulta

#Función para insertar
def insertEstudiante(nombre, carrera):
    cursor = mysql.connection.cursor()
    cursor.execute("INSERT INTO tb_alumnos (nombre, carrera) VALUES (%s, %s)",(nombre, carrera))
    mysql.connection.commit()
    cursor.close()

#Función para eliminar(softDelete)
def softDeleteEstudiante(id):
    cursor = mysql.connection.cursor()
    cursor.execute("UPDATE tb_alumnos SET state = 0 WHERE id = %s", (id))
    mysql.connection.commit()
    cursor.close()

#Función para actualizar
def actualizarEstudiante(id, nombre, carrera):
    cursor = mysql.connection.cursor()
    cursor.execute("UPDATE tb_alumnos SET nombre = %s, carrera = %s WHERE id = %s", (nombre, carrera, id))
    mysql.connection.commit()
    cursor.close()

#Función para consultar por id
def consultarEstudianteId(id):
    cursor = mysql.connection.cursor()
    cursor.execute("SELECT * FROM tb_alumnos WHERE id = %s", (id))
    consulta = cursor.fetchall()
    cursor.close()
    return consulta

