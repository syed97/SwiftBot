import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import {PservicesProvider} from "../../providers/pservices/pservices";

/**
 * Generated class for the AddmyaddressPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage({
  name: 'add-default-location'
})
@Component({
  selector: 'page-add-default-location',
  templateUrl: 'add-default-location.html',
})
export class AddDefaultLocationPage {

   // list of locations
   public locations: any;
   locationNameSearch: string;
   locationsCopy: any;
   selectedLocationId: any;
   
   
  constructor(public navCtrl: NavController, public navParams: NavParams, public pservices: PservicesProvider) {
  }
  
  ionViewDidLoad() {
      // set sample data
      this.pservices.getUsersFromServer();
      this.locations = this.pservices.getAllLocations();
      this.locationNameSearch = ""
      this.selectedLocationId = null;

      var _this2 = this; 
      setTimeout(function(){
        _this2.updateData()
      }, 100);
  
      setTimeout(function(){
        _this2.updateData()
      }, 200);  
  
      setTimeout(function(){
        _this2.updateData()
      }, 300);
  
      setTimeout(function(){
        _this2.updateData()
      }, 500);
  
      setTimeout(function(){
            _this2.updateData()
      }, 900);
  
      setTimeout(function(){
        _this2.updateData()
      }, 1100);
  
      setTimeout(function(){
        _this2.updateData()
      }, 1300);
  
      setTimeout(function(){
        _this2.updateData()
      }, 1500);
  
    }
  
    updateData(){
      this.locations = this.pservices.getAllLocations();
      this.locationsCopy = this.locations;      
    }
  
    resetChanges(){
      //console.log("reset", this.locations, this.locationsCopy)
      this.locations = this.locationsCopy
    }
    
    searchLocation(){
      this.resetChanges();
      this.locations = this.locations.filter((item)=>{
        return item.name.toLowerCase().indexOf(this.locationNameSearch.toLowerCase())>-1;
      })
    } 

    viewlocation(location){
      //console.log('location', location)
      this.selectedLocationId = location.id;
      document.getElementById('finalResultText').innerText = location.name;
      document.getElementById('finalResult').style.display = "block";
      //this.navCtrl.push('addLocation');
    }


    toDashboard(){
      var _this = this;
           var InitiateUploadUser = function(callback) // How can I use this callback?
            {
                var request = new XMLHttpRequest();
                request.onreadystatechange = function()
                {
                    if (request.readyState == 4 && request.status == 200)
                    {
                        callback(request.responseText); // Another callback here
                    }
                    if (request.readyState == 4 && request.status == 0)
                    {
                        console.log("No Response") // Another callback here
                    }
                }; 
                request.open("POST", "https://api.anomoz.com/api/swift/post/update_user_default_location.php?userIdTag="+_this.pservices.userIdTag+"&locationId="+_this.selectedLocationId)
                request.send();
            }
            var frameUploadUser = function mycallback(data) {
              console.log("data received from server," , data)              
              //redirect to home
              _this.navCtrl.popToRoot(); 
            }
  
            InitiateUploadUser(frameUploadUser); //passing mycallback as a method  
    }


   
    
}
