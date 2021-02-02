from app import app

@app.route('/')
@app.route('/mysteam')
def mysteam():
    return "Nothing here yet"