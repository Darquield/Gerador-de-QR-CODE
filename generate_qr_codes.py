import os
import qrcode
import mysql.connector

# Informações de conexão com o banco de dados
db_config = {
    "host": "localhost",
    "user": "Wagner",
    "password": "123",
    "database": "gerenciador"
}

# Conectar ao banco de dados
conn = mysql.connector.connect(**db_config)
cursor = conn.cursor()

# Criar diretório para salvar os QR codes
output_dir = "qr_codes"
os.makedirs(output_dir, exist_ok=True)

# Consulta para obter os materiais e seus IDs
query = "SELECT ID, Material FROM Materiais"
cursor.execute(query)
materiais = cursor.fetchall()

# URL da página de informações do material
info_url = "http://localhost/fibersail/interface.php?material_id="

# Gerar QR codes para cada material e salvá-los como imagens
for material_id, material_nome in materiais:
    # Criar o conteúdo do QR code (URL da página de informações do material)
    qr_content = f"{info_url}{material_id}"

    # Criar o QR code
    qr = qrcode.QRCode(
        version=1,
        error_correction=qrcode.constants.ERROR_CORRECT_L,
        box_size=10,
        border=4,
    )
    qr.add_data(qr_content)
    qr.make(fit=True)

    # Criar uma imagem do QR code
    qr_image = qr.make_image(fill_color="black", back_color="white")

    # Salvar a imagem do QR code
    output_path = os.path.join(output_dir, f"material_{material_id}.png")
    qr_image.save(output_path)

    print(f"QR code gerado para o material ID {material_id}")

# Fechar conexão com o banco de dados
cursor.close()
conn.close()
