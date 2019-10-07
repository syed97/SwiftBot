import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
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
  
  constructor(public navCtrl: NavController, public navParams: NavParams, public pservices: PservicesProvider) {
  }

  ionViewDidLoad() {
    // set sample data
    this.receivers = this.pservices.getAll();
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
    this.receivers = this.pservices.getAll();
    this.receiversCopy = this.receivers;      
  }

  resetChanges(){
    //console.log("reset", this.receivers, this.receiversCopy)
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
    this.pservices.createBooking.receiver = this.selectedLocationId;
    //document.getElementById('finalResult').style.display = "block";
    //this.navCtrl.push('addLocation');
  }

  send(){
    var dateTime = (new Date().getTime() / 1000).toString();
    console.log("dateTime", dateTime)
    this.pservices.createBooking.timeAdded = dateTime;
    console.log("this.pservices.createBooking", this.pservices.createBooking)

  }
  
}
