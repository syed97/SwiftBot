import {Component} from "@angular/core";
import { NavController, NavParams, Platform, ActionSheetController} from "ionic-angular";
import {PservicesProvider} from "../../providers/pservices/pservices";
import { IonicPage, App } from 'ionic-angular';
import { Storage } from '@ionic/storage';

@Component({
  selector: 'page-home',
  templateUrl: 'home.html'
})
export class HomePage {
   // list of bookings
   public bookings: any;
   nPeople: string;
   resturantNameSearch: string;
   bookingsCopy: any;

  constructor(public storage: Storage, public app: App, public nav: NavController, public navParams: NavParams, public pservices: PservicesProvider, public platform: Platform, public actionSheetController: ActionSheetController) {
   
  }

  ionViewWillLoad() {
       // set sample data
       console.log("ionViewWillLoad home")
       this.bookings = this.pservices.getAll();
       this.nPeople = "2";
       this.resturantNameSearch = ""
       //Maintain a copy of data on which needs a search
       //this.bookingsCopy = this.bookings;
         
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
  
  
      this.storage.get('userBasicInfo').then((val) => {
        console.log("account value found", val)
      if (val===null){
        console.log("no account found. Error!!!", val);
        this.nav.setRoot('signup');
      }
     
    });
  
  
    }
  
    updateData1_4(){
      //console.log("bookings data", this.bookings);
      this.bookings = this.pservices.getAll();
      this.bookingsCopy = this.bookings;
      //console.log("this.pservices.getAcountStatus()", this.pservices.getAcountStatus())
      
    }
   
    // view hotel detail
    viewHotel(hotel) {
      // console.log(hotel.id)
      this.pservices.setResturantId(hotel.id);
      this.nav.push('hotel-details', {
        'id': hotel.id
      });
    }

    // view all bookings
    viewbookings() {
      this.nav.push('view-booking');
    }

    resetChanges(){
      console.log("reset", this.bookings, this.bookingsCopy)
      this.bookings = this.bookingsCopy
    }
    
    searchResturants(){
      //console.log("keywords", this.resturantNameSearch)
      this.resetChanges();
      this.bookings = this.bookings.filter((item)=>{
        return item.name.toLowerCase().indexOf(this.resturantNameSearch.toLowerCase())>-1;
      })
    }

    sendPackage(){
      console.log("viewClicked", screen)
      this.nav.push('addmyaddress');
    }

    createPost(){
      this.nav.push('createpost');
    }
  
    viewBooking(booking){
      this.nav.push('delivery-details',{
        'delId': booking.name
      });
    }

    about(){
      this.nav.push('about');
    }

    allDeliveries(){
      this.nav.push('history');
    }

    test(){
      this.nav.push('addface');
    }

}
