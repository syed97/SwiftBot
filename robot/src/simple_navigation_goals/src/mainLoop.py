import requests
import json, os

currentBookingInfo = "";
currentLocation = [1,1];
 
def getNextBookingDetails(currentBookingId):
    URL = "http://ventoms.com/anomoz/swift/post/read_new_booking.php?currentBookingId="+str(currentBookingId)
    r = requests.get(url = URL) 
    # extracting data in json format 
    data = r.json()
    info = (data[0])
    return info

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
    startNavigator(currentLocation, dropoffLocation)

    #openlock for dropoff

    return [currentBookingInfo, currentLocation]
    
    
def main():
    #generateExe()

    bothvar = runSingleCycle()
    currentBookingInfo = bothvar[0]
    currentLocation = bothvar[1]
    
        
    

    #get next booking Status


main()