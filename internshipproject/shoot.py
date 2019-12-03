#!/usr/bin/python3
from flask import Flask, request
from OpenSSL import SSL
from flask_cors import CORS
import os
import cookieVideo as CV
from werkzeug import serving
 
context = SSL.Context(SSL.SSLv23_METHOD)
cer = os.path.join(os.path.dirname(__file__), 'udara.com.crt')
key = os.path.join(os.path.dirname(__file__), 'udara.com.key')
 
app = Flask(__name__)
CORS(app)
 
@app.route('/yourMethod',methods=['POST'])
def yourMethod():
    name=request.form["employee_name"]
    #sale_id=request.form["sale_id"]
    #empcode=request.form["employee_code"]
    
    #returnos.system('sudo python3 /home/pi/html/cookieVideo.py')
    k=CV.doit(name)
    #print(sale_id)
    
    return k
context=(cer,key)
serving.run_simple("0.0.0.0",5005,app,ssl_context=context)
"""
if __name__ == '__main__':
    context = (cer, key)
    app.run( host='0.0.0.0', port=5005, debug = True, ssl_context="adhoc")"""