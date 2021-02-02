from app import app
from flask import url_for

fallback_image = url_for("static", filename="fallback.gif")
fallback_name = "Mr. Testman"
steamlogin_image = url_for("static", filename="steamlogin.png")

#todo: move hardcoded html into templates/mysteam.html
@app.route('/')
@app.route('/mysteam')
def mysteam():
    user= {"steamname" : fallback_name, "steampic" : fallback_image}
    return """
<html>
    <head>
        <title>Lars Erik Grambo - Good Games test task 3</title>
    </head>
    <body>
        
        <h1>Hello, """ + user["steamname"] + """!</h1>
        <p>"""+ user["steampic"] +"""</p>
        <img src=" """+ user["steampic"] +""" " alt="steam profile picture">

        <p>hello world</p>
    </body>
</html>
"""

