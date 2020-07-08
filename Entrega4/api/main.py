from flask import Flask, render_template, request, abort, json
from pymongo import MongoClient
import pandas as pd
import matplotlib.pyplot as plt
import os

# Para este ejemplo pediremos la id
# y no la generaremos automáticamente
USER_KEYS = ['uid', 'name', 'last_name',
            'occupation', 'follows', 'age']

USER = "grupo77"
PASS = "grupo77"
DATABASE = "grupo77"

# El cliente se levanta en la URL de la wiki
# URL = "mongodb://grupoXX:grupoXX@gray.ing.puc.cl/grupoXX"
URL = f"mongodb://{USER}:{PASS}@gray.ing.puc.cl/{DATABASE}"
client = MongoClient(URL)

# Utilizamos la base de datos del grupo
db = client["grupo77"]
db.messages.create_index([("message", "text")])
# Seleccionamos la collección de usuarios
users = db.users
messages = db.messages

'''
Usuarios:
  "uid": <id del usuario>,
  "name": <nombre>,
  "last_name": <apellido>,
  "age": <edad>,
  "occupation": <a qué se dedica>,
  "follows": [<arreglo con una lista de ids de usuarios>]
'''

# Iniciamos la aplicación de flask
app = Flask(__name__)

@app.route("/")
def home():
    '''
    Página de inicio
    '''
    return "<h1>¡Hola!</h1>"

# Mapeamos esta función a la ruta '/plot' con el método get.


@app.route("/users")
def get_users():
    '''
    Obtiene todos los usuarios
    '''
    # Omitir el _id porque no es json serializable
    resultados = list(users.find({}, {"_id": 0}))
    return json.jsonify(resultados)

@app.route("/users/<int:uid>")
def get_user(uid):
    '''
    Obtiene el usuario de id entregada
    '''
    usuarios = list(users.find({"uid": uid}, {"_id": 0}))
    if len(usuarios) == 0:
        return "no existe el usuario con ese id"
    return json.jsonify(usuarios)



@app.route("/messages")
def get_messages():
    '''
    Obtiene todos los usuarios
    '''
    id1 = int(request.args.get('id1', False))
    id2 = int(request.args.get('id2', False))

    if not id1:
        resultados = list(messages.find({}, {"_id": 0}))
        return json.jsonify(resultados)
    if not id2:
        resultados = list(messages.find({}, {"_id": 0}))
        return json.jsonify(resultados)

    usuarios1 = list(users.find({"uid": id1}, {"_id": 0}))
    if len(usuarios1) == 0:
        return "no existe el usuario con ese id"

    usuarios2 = list(users.find({"uid": id2}, {"_id": 0}))
    if len(usuarios2) == 0:
        return "no existe el usuario con ese id"

    query1 = list(messages.find({"sender": id1, "receptant": id2}, {"_id": 0, "message": 1}))
    query2 = list(messages.find({"sender": id2, "receptant": id1}, {"_id": 0, "message": 1}))
    resultado = query1 + query2
    return json.jsonify(resultado)

@app.route("/messages/<int:mid>")
def get_message(mid):
    '''
    Obtiene el usuario de id entregada
    '''

    mensajes = list(messages.find({"mid": mid}, {"_id": 0}))
    if len(mensajes) == 0:
        return "no existe el mensaje con ese id"
    return json.jsonify(mensajes)




@app.route("/messages", methods=['POST'])
def create_message():

    data = {}

    if request.json["message"] == '':
        return "faltan datos"
    else:
        data["message"] = request.json["message"]

    if request.json["sender"] == '':
        return "faltan datos"
    else:
        data["sender"] = request.json["sender"]

    if request.json["receptant"] == '':
        return "faltan datos"
    else:
        data["receptant"] = request.json["receptant"]

    if request.json["lat"] == '':
        return "faltan datos"
    else:
        data["lat"] = request.json["lat"]

    if request.json["long"] == '':
        return "faltan datos"
    else:
        data["long"] = request.json["long"]

    if request.json["date"] == '':
        return "faltan datos"
    else:
        data["date"] = request.json["date"]

    
    contador = list()
    for x in messages.find({},{ "_id": 0, "mid": 1}):
        contador.append(x["mid"])

    maximo =  max(contador) + 1   
    #return str(max(contador))
    #return str(maximo)
    data["mid"] = int(maximo)

    messages.insert_one(data)
    return json.jsonify({'success': True, 'message': 'Mensaje creado'})




@app.route("/messages/<int:id>", methods=['DELETE'])
def delete_message(id):

    query = { "mid": id }

    contador = list()
    for x in messages.find({},{ "_id": 0, "mid": 1}):
        contador.append(x["mid"])

    if int(id) not in contador:
        return "el id no existe"


    messages.delete_one(query)
    return json.jsonify({'success': True, 'message': 'Mensaje borrado'})


@app.route("/text-search", methods=['POST'])
def get_text_search():
    '''
    Obtiene todos los usuarios
    '''
    # Omitir el _id porque no es json serializable
    #db.messages.createIndex({"message": "text"})

    data = {}

    try:                                                # SE PROBARA CASO POR CASO
        dato = request.json
        print(f"data es=====================================: {dato}")


        if "desired" in dato:
            data["desired"] = request.json["desired"]
            resultados = []
            for i in data["desired"]:
                resultado = list(messages.find({"$text": {"$search": i}}, {"_id": 0}))
                print(f"---los resultados son: {resultado}")
                for j in resultado:
                    resultados.append(j)
            data_deseada = {"desired": resultados}
            return json.jsonify(data_deseada)




        if "required" in dato:
            data["required"] = request.json["required"]
            resultados = []
            for i in data["required"]:
                resultado = list(messages.find({"$text": {"$search": "\""+i+"\""}}, {"_id": 0}))
                print(f"---los resultados son: {resultado}")
                for j in resultado:
                    resultados.append(j)
            print(f"\n>>la lista resultados:{resultados}")
            data_deseada = {"required": resultados}


            return json.jsonify(data_deseada)




        if "forbidden" in dato:
            data["forbidden"] = request.json["forbidden"]

            resultados = []
            for i in data["forbidden"]:
                resultado = list(messages.find({"$text": {"$search": "\"" + i + "\""}}, {"_id": 0}))
                print(f"---los resultados son: {resultado}")
                for j in resultado:
                    resultados.append(j)
            #print(f"\n>>la lista resultados:{resultados}")


            resultado2 = list(messages.find({}, {"_id": 0}))
            print("\n\n=========================================================================================")
            #print(f"lista resultados:{resultados}")
            #print(f"el tipo de resultado2 es: {type(resultado2)},\n\n y el de resultado: {type(resultados)} ")
            resultadoFinal = resultado2
            RF = resultado2
            for i in resultadoFinal:
                for j in resultados:
                    #print(f"\n\n\n\n$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$len de {len(resultados)}")
                    if i == j and i in RF:
                        print(f"\n\ni = {i} y j={j}")
                        RF.remove(i)
            #print(f"\n\n>>>>>>>>>la nueva lista resultados 2 es: {RF} ")
            data_deseada = {"forbidden": RF}
            return json.jsonify(data_deseada)



        if "userId" in dato:
            data["userId"] = request.json["userId"]
            resultado = resultados = list(messages.find({"sender":data["userId"] }, {"_id": 0}))

            data_deseada = {"resultados de ID": resultados}


            return json.jsonify(data_deseada)


    except TypeError:
        resultados = list(messages.find({}, {"_id": 0}))
        return json.jsonify(resultados)





            
if __name__ == "__main__":
    #app.run()
    app.run(debug=True) # Para debuggear!
# ¡Mucho ánimo y éxito! ¡Saludos! :D
