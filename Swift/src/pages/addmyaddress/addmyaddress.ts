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
   nPeople: string;
   resturantNameSearch: string;
   locationsCopy: any;
   
   // Map
   lat: number = -22.9068;
   lng: number = -43.1729;

   
  constructor(public navCtrl: NavController, public navParams: NavParams, public pservices: PservicesProvider) {
  }

  addReceiver(){
    this.navCtrl.push('addreceiver');
  }

  
  ionViewDidLoad() {
    //window.open("https://anomoz.com", '_system');
       // set sample data
       this.locations = this.pservices.getAll();
       this.nPeople = "2";
       this.resturantNameSearch = ""
       //Maintain a copy of data on which needs a search
       //this.locationsCopy = this.locations;
         
      // init map
      // this.initializeMap();
      var _this2 = this; 
      setTimeout(function(){
        _this2.updateData1_4()
      }, 100);
  
      setTimeout(function(){
        _this2.updateData1_4()
      }, 200);  
  
      setTimeout(function(){
        _this2.updateData1_4()
      }, 300);
  
      setTimeout(function(){
        _this2.updateData1_4()
      }, 500);
  
      setTimeout(function(){
            _this2.updateData1_4()
      }, 900);
  
      setTimeout(function(){
        _this2.updateData1_4()
      }, 1100);
  
      setTimeout(function(){
        _this2.updateData1_4()
      }, 1300);
  
      setTimeout(function(){
        _this2.updateData1_4()
      }, 1500);
  
    }
  
    updateData1_4(){
      //console.log("locations data", this.locations);
      this.locations = this.pservices.getAll();
      this.locationsCopy = this.locations;
      //console.log("this.pservices.getAcountStatus()", this.pservices.getAcountStatus())
      
    }
    
  
    nPeopleChanged(){
      this.pservices.setNPeople(this.nPeople)
    }
  
    // view hotel detail
    viewHotel(hotel) {
      // console.log(hotel.id)
      this.pservices.setResturantId(hotel.id);
      this.navCtrl.push('page-trips', {
        'id': hotel.id
      });
    }

    // view all locations
    viewlocations() {
      this.navCtrl.push('page-hotel');
    }
  
    changeNPeople(){
      console.log("changeNPeople called")
    }
  
    changeNPeopleMain(nPeople){
      console.log("changeNPeopleMain called")
      this.nPeople = nPeople
      this.pservices.setNPeople(nPeople);
    }
  
    resetChanges(){
      console.log("reset", this.locations, this.locationsCopy)
      this.locations = this.locationsCopy
    }
    
    searchResturants(){
      //console.log("keywords", this.resturantNameSearch)
      this.resetChanges();
      this.locations = this.locations.filter((item)=>{
        return item.name.toLowerCase().indexOf(this.resturantNameSearch.toLowerCase())>-1;
      })
    } 
}
