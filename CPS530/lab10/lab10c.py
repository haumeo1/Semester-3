from flask import Flask, render_template
app = Flask(__name__)

@app.route("/")
def home():
    return """
    <!DOCTYPE html>
    <html>
    <head>
        <title>Framework Example</title>
    </head>
    <body>
        <h1>Building with Flask</h1>
        <p>Installing Flask: Used pip to install Flask.</p>
        <p>Page Creation: Used Python to define routes and render HTML.</p>
        <p>Difficulties: Debugging deployment errors, solved by checking logs.</p>
    </body>
    </html>
    """
if __name__ == "__main__":
    app.run(debug=True)
