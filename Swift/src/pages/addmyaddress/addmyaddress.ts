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
  name: 'addmyaddress'
})
@Component({
  selector: 'page-addmyaddress',
  templateUrl: 'addmyaddress.html',
})
export class AddmyaddressPage {

   // list of locations
   public locations: any;
   locationNameSearch: string;
   locationsCopy: any;
   
   
  constructor(public navCtrl: NavController, public navParams: NavParams, public pservices: PservicesProvider) {
  }

  addReceiver(){
    this.navCtrl.push('addreceiver');
  }

  
  ionViewDidLoad() {
    //window.open("https://anomoz.com", '_system');
       // set sample data
       this.locations = this.pservices.getAll();
       this.locationNameSearch = ""
       //Maintain a copy of data on which needs a search
       //this.locationsCopy = this.locations;
         
      // init map
      // this.initializeMap();
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
      //console.log("locations data", this.locations);
      this.locations = this.pservices.getAll();
      this.locationsCopy = this.locations;
      //console.log("this.pservices.getAcountStatus()", this.pservices.getAcountStatus())
      
    }
  
    resetChanges(){
      console.log("reset", this.locations, this.locationsCopy)
      this.locations = this.locationsCopy
    }
    
    searchLocation(){
      //console.log("keywords", this.locationNameSearch)
      this.resetChanges();
      this.locations = this.locations.filter((item)=>{
        return item.name.toLowerCase().indexOf(this.locationNameSearch.toLowerCase())>-1;
      })
    } 
}
