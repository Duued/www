from distutils import extension
import os, uuid, bcrypt
from flask import *
from typing import Union
from io import BytesIO
from werkzeug import datastructures

app = Flask(__name__)

token_hash = b'$2b$12$qF/uFdUfcS.pjf9NkYSTGupgThqW9qXfVm0FsXGlI3aE25rbCt3A.'

@app.route('/')
def index():
    # redirect('https://zanderp25.com')
    return "Hi"

@app.route('/<path:path>')
def media(path):
    return send_from_directory('media', path)

@app.route('/favicon.ico')
def favicon():
    return send_file("../public/assets/ZP25 Circle.png")

@app.route('/upload', methods=['POST'])
def upload():
    token = request.headers.get('Authorization')
    if token:
        if not bcrypt.checkpw(token.encode(), token_hash):
            return 'Unauthorized', 401
    else:
        return 'Unauthorized', 401
    file = request.files.get('file')
    if file is None:
        return 'No file', 400
    filename = save_file(file)
    return get_path(filename)

def save_file(file: datastructures.FileStorage):
    '''creates a unique filename and saves the file'''
    media_extensions = ['.mp4', '.webm', '.mkv', '.avi', '.mov', '.mp3', '.wav', '.flac', '.ogg', '.m4a', '.jpg', '.jpeg', '.png', '.gif', '.bmp', '.svg', '.webp']
    if file:
        name = os.path.splitext(file.filename)[0]
        ext = os.path.splitext(file.filename)[1]
        if ext in media_extensions:
            filename = str(uuid.uuid4())[:6] + ext
            while os.path.exists(os.path.join('media', filename)):
                filename = str(uuid.uuid4())[:6] + ext
        else:
            filename = f"{name}_{str(uuid.uuid4())[:6]}{ext}"
            while os.path.exists(os.path.join('media', filename)):
                filename = f"{name}_{str(uuid.uuid4())[:6]}{ext}"
        file.save(os.path.join('media', filename))
    else:
        raise Exception('File is None')
    return filename

def get_path(filename):
    return f"https://media.zanderp25.com/{filename}"

if __name__ == '__main__':
    app.run(port=3500)