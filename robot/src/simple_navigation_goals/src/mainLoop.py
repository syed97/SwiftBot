#!/usr/bin/env python
import requests
import json, os
import cv2
import rospy
from std_msgs.msg import String
import random
# from new import funct #uncomment this when on pi

headers={'content-type' : 'image/jpg'}

currentBookingInfo = ""
currentLocation = [1,1]
customerId = None

pub = rospy.Publisher('locker', String, queue_size=10)
rospy.init_node('talker', anonymous=True)

URL='https://d521ec1a.ngrok.io/upload'

def send_nodes(img_file=None):
    f=open("Gray.jpg","rb")
    img={'file': f}
    response=requests.post(URL,files=img)
    return response

def getNextBookingDetails(currentBookingId):
    URL = "http://ventoms.com/anomoz/swift/post/read_new_booking.php?currentBookingId="+str(currentBookingId)
    r = requests.get(url = URL) 
    # extracting data in json format 
    data = r.json()
    info = (data[0])
    return info

def markBookingAsEnded(currentBookingId):
    URL = "http://ventoms.com/anomoz/swift/post/mark_booking_as_ended.php?currentBookingId="+str(currentBookingId)
    r = requests.get(url = URL) 
    return True

def getPickupLocation(currentBookingInfo):
    print("getPickupLocation set: ", [currentBookingInfo["fromLocation_lat"], currentBookingInfo["fromLocation_lng"]])
    return([currentBookingInfo["fromLocation_lat"], currentBookingInfo["fromLocation_lng"]])

def getFinalLocation(currentBookingInfo):
    print("getFinalLocation set: ", [currentBookingInfo["toLocation_lat"], currentBookingInfo["toLocation_lng"]])
    return([currentBookingInfo["toLocation_lat"], currentBookingInfo["toLocation_lng"]])
    
def startNavigator(currentLocation, destination):
    programCommand = "rosrun simple_navigation_goals simple_navigation_goals  _param_x:="+str(destination[0])+" _param_y:="+str(destination[1])
    if os.system(programCommand) == 0:
        print("program finished successfully")
    else:
        print("launch failed")
    
def generateExe():
    if os.system("g++ -g foo.cpp -o foo") == 0:
        print ("exe compiled")
    else:
        print ("exe compiling Failed")

def open_lock(data):    
    pub.publish(data)
    rospy.init_node('listener', anonymous=True)
    rospy.Subscriber("open_lock", String, callback)
    rospy.spin()

def callback(data):
    if data.data=="open":
        rospy.sleep(60.0)
        open_lock("close")
    if data.data=="close":
        rospy.sleep(30.0)
        rospy.signal_shutdown("The lid has been closed")

def Get_pin():
    #send the number as a callback to customer to enter pin
    #get callback from app that the pin has been entered successfully

def runSingleCycle():
    
    currentBookingInfo = getNextBookingDetails(0)
    #currentBookingInfo = {'bookingId': '187', 'timeAdded': '1573634449', 'fromLocation': 'Auditorium', 'toLocation': 'Auditorium', 'fromPerson': 'Dr. taj', 'toPerson': 'Dddx', 'status': 'waiting', 'fromLocation_lat': '-9.656250', 'fromLocation_lng': '5.750000', 'toLocation_lat': '-9.656250', 'toLocation_lng': '5.750000'}
    print("currentBookingInfo updated: ", currentBookingInfo)
    customerId=currentBookingInfo['toPerson']
    #go to pickup location
    pickupLocation = getPickupLocation(currentBookingInfo)
    startNavigator(currentLocation, pickupLocation) #program stops until

    #open lock for pickup
    open_lock("open")    
    
    #to to destination
    dropoffLocation = getFinalLocation(currentBookingInfo)
    print("dropoffLocation", dropoffLocation)
    startNavigator(currentLocation, dropoffLocation)

    #openlock for dropoff
    x=0
    if(Get_pin()==False):
        while (send_nodes(funct())!=customerId) or x==3:
            if(Get_pin()==True):
                break
            x+=1
    
    if(x==3):
        rosinfo("Need pin to unlock")
        while(True):
            if(Get_pin()==True):
                break

        open_lock("open")
    else:
        open_lock("open")    
    #mark booking
    markBookingAsEnded(currentBookingInfo['bookingId'])
    
    runSingleCycle() 
    
    
def main():
    #generateExe()

    runSingleCycle()
    #verifyUser()
    #pass
        
    

    #get next booking Status
# print(send_nodes(funct())) #uncomment this when on pi
# print(send_nodes())

main()
