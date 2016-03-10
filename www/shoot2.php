import sys, os, time, datetime
import subprocess
from time import sleep

tlfreq = int(sys.argv[1])
tltime = int(sys.argv[2])
dir = '/var/www/img/' + sys.argv[3]

if not os.path.exists(dir):
    os.makedirs(dir)

#date = datetime.datetime.fromtimestamp(time.time()).strftime("_%Y-%m-%d_%H-%M-%S")

cmd = ('raspistill -t ' + str(tltime) + " -tl " + str(tlfreq) + " -o " + dir + "/photo_%04d.jpg")
subprocess.call(cmd, shell=True)
print args

#print "Pictures are now being taken every" , tlfreq/1000 , "second/s for a total of", tltime/3600000 , "hours. These are being stored in", dir
