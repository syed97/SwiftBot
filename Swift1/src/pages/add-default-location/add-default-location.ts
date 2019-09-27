import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import {PservicesProvider} from "../../providers/pservices/pservices";
import { MyApp } from '../../app/app.component';

/**
 * Generated class for the AddDefaultLocationPage page.
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
   
   
  constructor(public navCtrl: NavController, public navParams: NavParams, public pservices: PservicesProvider, private MyApp: MyApp) {
  }
  
  ionViewDidLoad() {
      // set sample data
      this.locations = this.pservices.getAll();
      this.locationNameSearch = ""
       
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
      this.locations = this.pservices.getAll();
      this.locationsCopy = this.locations;      
    }
  
    resetChanges(){
      console.log("reset", this.locations, this.locationsCopy)
      this.locations = this.locationsCopy
    }
    
    searchLocation(){
      this.resetChanges();
      this.locations = this.locations.filter((item)=>{
        return item.name.toLowerCase().indexOf(this.locationNameSearch.toLowerCase())>-1;
      })
    } 

    viewlocation(location){
      console.log('location', location)
      this.selectedLocationId = location.name;
      document.getElementById('finalResultText').innerText = location.name;
      document.getElementById('finalResult').style.display = "block";
      //this.navCtrl.push('addLocation');
    }

    addNewLocation(){
      console.log("addNewLocation")
      this.navCtrl.push('newlocation')
    }

    toDashboard(){
      //this.navCtrl.setRoot('addreceiver');
      //this.MyApp.setRoot()

      this.navCtrl.popToRoot()
      //this.navCtrl.setRoot(HomePage);
      
    }
    
}
