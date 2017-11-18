# by Orvalho
# script para popular tabelas BD
X = raw_input("Introduza o numero de Reservas/Ofertas que deseja: ")
f = open("populate"+X+".sql", "w+")
X = eval(X)
Y = X/10
# users
f.write("INSERT INTO user(nif, nome, telefone) VALUES \n")
for i in range(0, Y):
    f.write("("+str(i)+", 'Joao" + str(i)+"', "+str(i*i)+")")
    if i < Y-1:
        f.write(",\n")
f.write(";\n")
#  fiscais
f.write("INSERT INTO fiscal(id, empresa) VALUES \n")
for i in range(0,Y):
    f.write("( "+str(i)+", 'FBI" + str(i)+"')")
    if i < Y-1:
        f.write(",\n")
f.write(";\n")

# edificios
f.write("INSERT INTO edificio(morada) VALUES \n")
for i in range(0,Y):
    f.write("('IST"+str(i)+"')")
    if i < Y-1:
        f.write(",\n")
f.write(";\n")

# alugaveis, espacos, postos, arrenda, fiscaliza
f.write("INSERT INTO alugavel(morada, codigo, foto) VALUES \n")
for i in range(0,X):
    f.write("( 'IST"+ str(i%Y) + "', 'IST-codigo" + str(i) +"', 'foto"+str(i)+"')")
    if i < X-1:
        f.write(",\n")
f.write(";\n")

f.write("INSERT INTO espaco(morada, codigo) VALUES \n")
for i in range(0,X):
    f.write("( 'IST"+ str(i%Y) + "', 'IST-codigo" + str(i)+"')")
    if i < X-1:
        f.write(",\n")
f.write(";\n")

f.write("INSERT INTO arrenda(morada, codigo, nif) VALUES \n")
for i in range(0,X):
    f.write("( 'IST"+ str(i%Y) + "', 'IST-codigo" + str(i) +"', " + str(i%Y) +")")
    if i < X-1:
        f.write(",\n")
f.write(";\n")

f.write("INSERT INTO fiscaliza(id, morada, codigo) VALUES \n")
for i in range(0,X):
    f.write("( "+ str(i%Y) +", 'IST"+ str(i%Y) + "', 'IST-codigo" + str(i) +"')")
    if i < X-1:
        f.write(",\n")
f.write(";\n")

f.write("INSERT INTO alugavel(morada, codigo, foto) VALUES \n")
for i in range(0,X):
    if(i%2==0):
        f.write("( 'IST"+ str(i%Y) + "', 'IST-codigoposto" + str(i) +"', 'foto"+str(i)+"')")
        if i < X-2:
            f.write(",\n")
f.write(";\n")

f.write("INSERT INTO posto(morada, codigo, codigo_espaco) VALUES \n")
for i in range(0,X):
    if(i%2==0):
        f.write("( 'IST"+ str(i%Y) + "', 'IST-codigoposto" + str(i) +"', 'IST-codigo"+ str(i)+"')")
        if i < X-2:
            f.write(",\n")
f.write(";\n")

f.write("INSERT INTO arrenda(morada, codigo, nif) VALUES \n")
for i in range(0,X):
    if(i%2==0):
        f.write("( 'IST"+ str(i%Y) + "', 'IST-codigoposto" + str(i) +"', " + str(i%Y) +")")
        if i < X-2:
            f.write(",\n")
f.write(";\n")

f.write("INSERT INTO fiscaliza(id, morada, codigo) VALUES \n")
for i in range(0,X):
    if(i%2==0):
        f.write("( "+ str(i%Y) +", 'IST"+ str(i%Y) + "', 'IST-codigoposto" + str(i) +"')")
        if i < X-2:
            f.write(",\n")
f.write(";\n")

# Ofertas, reservas, estados, aluga

f.write("INSERT INTO reserva(numero) VALUES \n")
for i in range(0, 2*X):
    f.write("("+ str(i) +")")
    if i < 2*X-1:
        f.write(",\n")
f.write(";\n")

f.write("INSERT INTO estado(numero, time_stamp, estado) VALUES \n")
for i in range(0, 2*X):
    f.write("( " + str(i)+ ", '" + str(2016 + i%21) + "-" + str(i%11 + 1) + "-" + str(i%26 + 1)+ " " +  str(i%24) + ":"
    + str(i%60) + ":" + str(i%60) + "', 'Aceite')")
    if i < 2*X-1:
        f.write(",\n")
f.write(";\n")

f.write("INSERT INTO paga(numero, data, metodo) VALUES \n")
for i in range(0, X):
    f.write("( " + str(i)+ ", '" + str(2016 + 1 + i%20) + "-" + str(i%11 + 2) + "-" + str(i%26 + 2)+ " " +  str(i%24) + ":"
    + str(i%60) + ":" + str(i%60) + "', 'MB')")
    if i < X-1:
        f.write(",\n")
f.write(";\n")

f.write("INSERT INTO estado(numero, time_stamp, estado) VALUES \n")
for i in range(0, X):
    f.write("( " + str(i)+ ", '" + str(2016 + 1+ i%20) + "-" + str(i%11 + 2) + "-" + str(i%26 + 2)+ " " +  str(i%24) + ":"
    + str(i%60) + ":" + str(i%60) + "', 'Paga')")
    if i < X -1 :
        f.write(",\n")
f.write(";\n")

f.write("INSERT INTO oferta(morada, codigo, data_inicio, data_fim, tarifa) VALUES \n")
for i in range(0,X-300):
    if (i%2 == 0):
        f.write("( 'IST" + str(i%Y) + "', 'IST-codigoposto" + str(i) +"', '"+ str(2016+(i*i*i)%21)+ "-"+ str(i%12 + 1) + "-"+ str(i%27 + 1)+ "', '"
         + str(2017+(i*i*i)%21)+"-"+  str(i%12 + 1) + "-"+ str(i%27 + 1) + "', "+ str(i%50) +")")
        if i < X-2:
            f.write(",\n")
f.write(";\n")

f.write("INSERT INTO aluga(morada, codigo, data_inicio, nif, numero) VALUES \n")
for i in range(0,X-300):
    if (i%2 == 0):
        f.write("( 'IST" + str(i%Y) + "', 'IST-codigoposto" + str(i) +"', '"+ str(2016+(i*i*i)%21)+ "-"+ str(i%12 + 1) + "-"+ str(i%27 + 1)
        +"', "+ str(i%Y) + ", "+ str(i) +")")
        if i < X-2:
            f.write(",\n")
f.write(";\n")

f.write("INSERT INTO oferta(morada, codigo, data_inicio, data_fim, tarifa) VALUES \n")
for i in range(0,X):
    f.write("( 'IST" + str(i%Y) + "', 'IST-codigo" + str(i) +"', '"+ str(2016+(i*i*i)%21)+ "-"+ str(i%12 + 1) + "-"+ str(i%27 + 1) + "', '"
     + str(2017+(i*i*i)%21) + "-" + str(i%12 +1) + "-" + str(i%30 + 1) + "', " + str(i%50) + ")" )
    if i < X-1:
        f.write(",\n")
f.write(";\n")

f.write("INSERT INTO aluga(morada, codigo, data_inicio, nif, numero) VALUES \n")
for i in range(0,X):
    f.write("( 'IST" + str(i%Y) + "', 'IST-codigo" + str(i) +"', '"+ str(2016+(i*i*i)%21)+ "-"+ str(i%12 + 1) + "-"+ str(i%27 + 1)
    +"', "+ str(i%Y) + ", "+ str(i+X) +")")
    if i < X-1:
        f.write(",\n")
f.write(";\n")

f.close()
