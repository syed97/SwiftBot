import requests
import json, os


def getNextBookingDetails(currentBookingId):
    URL = "http://ventoms.com/anomoz/swift/post/read_new_booking.php?currentBookingId="+str(currentBookingId)
    r = requests.get(url = URL) 
    # extracting data in json format 
    data = r.json()
    info = (data[0])
    return info

def getPickupLocation(currentBookingInfo):
    print("getPickupLocation set: ", [currentBookingInfo["fromLocation_lng"], currentBookingInfo["toLocation_lng"]])
    return([currentBookingInfo["fromLocation_lng"], currentBookingInfo["fromLocation_lng"]])

def getFinalLocation(currentBookingInfo):
    print("getFinalLocation set: ", [currentBookingInfo["toLocation_lng"], currentBookingInfo["toLocation_lng"]])
    return([currentBookingInfo["toLocation_lng"], currentBookingInfo["toLocation_lng"]])
    
def startNavigator(currentLocation, destination):
    if os.system("g++ -g foo.cpp -o foo") == 0:
        print ("exe compiled")
        programCommand = "foo.exe "
        if os.system(programCommand) == 0:
            print("program launched")
        else:
            print("launch failed")
    else:
        print ("Failed")
        
def main():
    currentBookingInfo = "";
    currentLocation = [1,1];

    #getNextBookingDetails(0)
    currentBookingInfo = {'bookingId': '187', 'timeAdded': '1573634449', 'fromLocation': 'Auditorium', 'toLocation': 'Auditorium', 'fromPerson': 'Dr. taj', 'toPerson': 'Dddx', 'status': 'waiting', 'fromLocation_lat': '-9.656250', 'fromLocation_lng': '5.750000', 'toLocation_lat': '-9.656250', 'toLocation_lng': '5.750000'}

    #go to pickup location
    pickupLocation = getPickupLocation(currentBookingInfo)
    startNavigator(currentLocation, pickupLocation)

    #to to destination
    dropoffLocation = getFinalLocation(currentBookingInfo)
    startNavigator(currentLocation, dropoffLocation)

    
    
    

    
    
    
    
    ## move to 1st location


    
    #while (True):
        #get new booking details

main()

