import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, ToastController } from 'ionic-angular';
import {PservicesProvider} from "../../providers/pservices/pservices";

/**
 * Generated class for the AddreceiverPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage({
  name: 'addreceiver'
})
@Component({
  selector: 'page-addreceiver',
  templateUrl: 'addreceiver.html',
})
export class AddreceiverPage {

  // list of receivers
  public receivers: any;
  receiverNameSearch: string;
  receiversCopy: any;
  selectedLocationId: any;
  
  constructor(public navCtrl: NavController, public navParams: NavParams, public pservices: PservicesProvider, public toastCtrl: ToastController) {
  }

  ionViewDidLoad() {
    // set sample data
    this.receivers = this.pservices.getAllUsers();
    this.receiverNameSearch = ""
     
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
    this.receivers = this.pservices.getAllUsers();
    this.receiversCopy = this.receivers;      
  }

  resetChanges(){
    this.receivers = this.receiversCopy
  }
  
  searchReceiver(){
    this.resetChanges();
    this.receivers = this.receivers.filter((item)=>{
      return item.name.toLowerCase().indexOf(this.receiverNameSearch.toLowerCase())>-1;
    })
  } 

  viewReceiver(location){
    console.log('location', location)
    this.selectedLocationId = location.id;
    document.getElementById("finalResultTextRec").innerHTML = "Send to "+ location.name;
    this.pservices.createBooking.receiverId = this.selectedLocationId;
  }

  send(){
    console.log("this.pservices.createBooking", this.pservices.createBooking)
    this.InsertBookingToServer(this.pservices.createBooking)
  }
  
  InsertBookingToServer(aboutUser){
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
                      console.log("no respinse for creating account") // Another callback here
                  }
              }; 
              request.open("POST", "https://api.anomoz.com/api/swift/post/insert_booking.php")
              request.send(JSON.stringify(aboutUser));
          }
          var frameUploadUser = function mycallback(data) {
            console.log("Response received from server," , data)
            
            //redirect to home
            _this.showToast();
          }

          InitiateUploadUser(frameUploadUser); //passing mycallback as a method  
  }

  showToast(){
    let toast = this.toastCtrl.create({
      showCloseButton: true,
      cssClass: 'profile-bg',
      message: 'Booking Successfull!',
      duration: 3000,
      position: 'bottom'
    });
    toast.present();
    this.navCtrl.popToRoot();
  }

}
