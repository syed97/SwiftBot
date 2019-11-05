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
   resturantNameSearch: string;
   bookingsCopy: any;

  constructor(public storage: Storage, public app: App, public nav: NavController, public navParams: NavParams, public pservices: PservicesProvider, public platform: Platform, public actionSheetController: ActionSheetController) {
   
  }

  ionViewWillEnter() {
    console.log("ionViewWillEnter")
    this.storage.get('userBasicInfo').then((val) => {
      //console.log("account value found", val)
      if (val===null){
        //console.log("no account found. Error!!!", val);
        this.nav.push('signup');
      }
    
      });

  }

  ionViewWillLoad() {
       // set sample data
       //console.log("ionViewWillLoad home")
       this.pservices.getallBookingsFromServer(this.pservices.userIdTag)
       this.bookings = this.pservices.getAllBookings();
       this.resturantNameSearch = ""

       var _this2 = this; 
       setInterval(function(){ _this2.fetchFromDB(); }, 5000);
         
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
  
  
      this.storage.get('userBasicInfo').then((val) => {
        //console.log("account value found", val)
      if (val===null){
        //console.log("no account found. Error!!!", val);
        this.nav.push('signup');
      }
     
    });
  
    }
  
    updateData(){
      this.bookings = this.pservices.getOnGoingDeliveries();
      this.bookingsCopy = this.bookings;      
    }
   
    viewbookings() {
      this.nav.push('view-booking');
    }

    resetChanges(){
      this.bookings = this.bookingsCopy
    }
    
    searchResturants(){
      this.resetChanges();
      this.bookings = this.bookings.filter((item)=>{
        return item.name.toLowerCase().indexOf(this.resturantNameSearch.toLowerCase())>-1;
      })
    }

    sendPackage(){
      this.nav.push('addmyaddress');
    }

    createPost(){
      this.nav.push('createpost');
    }
  
    viewBooking(booking){
      this.nav.push('delivery-details',{
        'booking': booking,
      });
    }

    about(){
      this.nav.push('about');
    }

    allDeliveries(){
      this.nav.push('history');
    }

    fetchFromDB(){
      //console.log("fetchFromDB")
      this.pservices.getOngoingDeliveriesFromServer(this.pservices.userIdTag);
      ;
      if(JSON.stringify(this.bookings)!=JSON.stringify(this.pservices.getOnGoingDeliveries())){
        this.bookings = this.pservices.getOnGoingDeliveries();
        console.log("change detected")
      }
    }
}
