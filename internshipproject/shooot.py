import os
from OpenSSL import SSL
from flask import Flask
 
app = Flask(__name__)

@app.route('/',methods=['GET','POST','PUT','DELETE'])
def hello_world():
    #return 'Custom Hello from Flask!'
    os.system('sudo python3 /home/pi/html/cookieVideo.py')
    return "Video Recorded"
if __name__=="__main__":
    app.run(debug=True,host="10.0.0.204", port=5005,ssl_context="adhoc")