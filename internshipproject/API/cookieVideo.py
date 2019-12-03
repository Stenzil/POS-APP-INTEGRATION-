import picamera
from time import sleep
import datetime
from subprocess import call
import os
now=datetime.datetime.now()
ti=now.strftime("%m-%d-%Y %H:%M:%S")
ti=ti.split()
# Setup the camera
with picamera.PiCamera() as camera:
    # Start recording
    camera.start_recording("pythonVideo.h264")
    sleep(15)
    # Stop recording
    camera.stop_recording()

# The camera is now closed.

print("We are going to convert the video.")
# Define the command we want to execute.
command = "MP4Box -add pythonVideo.h264 convertedVideo.mp4"
# Execute our command
call([command], shell=True)
# Video converted.
print("Video converted.")
os.remove("pythonVideo.h264")
os.rename("convertedVideo.mp4","Date-"+ti[0]+"Time-"+ti[1]+".mp4")
