#!/usr/bin/env python
import requests
import json, os
import cv2
from new import funct
headers={'content-type' : 'image/jpg'}
currentBookingInfo = "";
currentLocation = [1,1];

URL='http://192.168.43.28:5000/upload'
def send_nodes(img_file):
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



def runSingleCycle():
    
    currentBookingInfo = getNextBookingDetails(0)
    #currentBookingInfo = {'bookingId': '187', 'timeAdded': '1573634449', 'fromLocation': 'Auditorium', 'toLocation': 'Auditorium', 'fromPerson': 'Dr. taj', 'toPerson': 'Dddx', 'status': 'waiting', 'fromLocation_lat': '-9.656250', 'fromLocation_lng': '5.750000', 'toLocation_lat': '-9.656250', 'toLocation_lng': '5.750000'}
    print("currentBookingInfo updated: ", currentBookingInfo)
    
    #go to pickup location
    pickupLocation = getPickupLocation(currentBookingInfo)
    startNavigator(currentLocation, pickupLocation) #program stops until

    #open lock for pickup
        
    
    #to to destination
    dropoffLocation = getFinalLocation(currentBookingInfo)
    print("dropoffLocation", dropoffLocation)
    #startNavigator(currentLocation, dropoffLocation)

    #openlock for dropoff

    #mark booking
    markBookingAsEnded(currentBookingInfo['bookingId'])


    return 
    
    
def main():
    #generateExe()

    runSingleCycle()
    #verifyUser()
    #pass
        
    

    #get next booking Status

print(send_nodes(funct()))
#main()