import mysql.connector
from datetime import date

# Conectar ao banco de dados
conexao = mysql.connector.connect(
    host="localhost",
    user="Wagner",
    password="123",
    database="gerenciador"
)
cursor = conexao.cursor()

def registrar_entrada(material_id, quantidade):
    data_atual = date.today()
    query = "INSERT INTO Entradas (MaterialID, Quantidade, DataEntrada) VALUES (%s, %s, %s)"
    dados = (material_id, quantidade, data_atual)
    cursor.execute(query, dados)
    conexao.commit()
    print(f"Registro de entrada de {quantidade} unidades do material ID {material_id} inserido com sucesso.")

def registrar_saida(material_id, quantidade):
    data_atual = date.today()
    query = "INSERT INTO Saidas (MaterialID, Quantidade, DataSaida) VALUES (%s, %s, %s)"
    dados = (material_id, quantidade, data_atual)
    cursor.execute(query, dados)
    conexao.commit()
    print(f"Registro de saída de {quantidade} unidades do material ID {material_id} inserido com sucesso.")

# Exemplo de uso
material_id = 1
quantidade_entrada = 10
quantidade_saida = 5

registrar_entrada(material_id, quantidade_entrada)
registrar_saida(material_id, quantidade_saida)

# Fechar conexão com o banco de dados
conexao.close()
