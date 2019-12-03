import picamera
from time import sleep
import datetime
from subprocess import call
import os
def doit(s):
    now=datetime.datetime.now()
    ti=now.strftime("%Y-%m-%d %H:%M:%S")
    ti=ti.split()
    # Setup the camera
    with picamera.PiCamera() as camera:
        # Start recording
        camera.start_recording("/home/pi/html/pythonVideo.h264")
        sleep(15)
        # Stop recording
        camera.stop_recording()

# The camera is now closed.

#print("We are going to convert the video.")
# Define the command we want to execute.
    command = "MP4Box -add /home/pi/html/pythonVideo.h264 /home/pi/html/convertedVideo.mp4"
# Execute our command
    call([command], shell=True)
# Video converted.
    os.remove("/home/pi/html/pythonVideo.h264")
    os.rename("/home/pi/html/convertedVideo.mp4","/home/pi/html/Footage:"+ti[0]+"T"+ti[1]+"_By_"+s+".mp4")
    return ("Footage:"+ti[0]+"T"+ti[1]+"_By_"+s+".mp4")

