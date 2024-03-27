from flask import Flask, render_template, request, redirect, url_for
from flask_sqlalchemy import SQLAlchemy

app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = 'sqlite:///estoque.db'
db = SQLAlchemy(app)

class Material(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    nome = db.Column(db.String(100), nullable=False)
    qr_code = db.Column(db.String(100), unique=True, nullable=False)

@app.route('/')
def index():
    materiais = Material.query.all()
    return render_template('index.html', materiais=materiais)

@app.route('/adicionar_material', methods=['POST'])
def adicionar_material():
    if request.method == 'POST':
        nome = request.form['nome']
        qr_code = request.form['qr_code']
        material = Material(nome=nome, qr_code=qr_code)
        db.session.add(material)
        db.session.commit()
        return redirect(url_for('index'))

if __name__ == '__main__':
    db.create_all()
    app.run(debug=True)
