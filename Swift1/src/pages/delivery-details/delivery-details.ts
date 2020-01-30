import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';

/**
 * Generated class for the DeliveryDetailsPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage({
  name: 'delivery-details'
})
@Component({
  selector: 'page-delivery-details',
  templateUrl: 'delivery-details.html',
})
export class DeliveryDetailsPage {

  booking: any;
  id: number;
  toLocation: string;
  fromLocation: string;
  toPerson: string;
  fromPerson: string;
  date: string;
  timeStarted: string;
  timeReceived: string;
  status: string;

  constructor(public navCtrl: NavController, public navParams: NavParams) {
    
    this.booking = navParams.get('booking'); 
    console.log("booking", this.booking)
    this.id = this.booking.id
    this.toLocation = this.booking.toLocation
    this.fromLocation = this.booking.fromLocation
    this.toPerson = this.booking.toPerson
    this.fromPerson = this.booking.fromPerson
    this.date = this.booking.date
    this.timeStarted = this.booking.time
    this.timeReceived = this.booking.time
    this.status = this.booking.status
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad DeliveryDetailsPage');
  }

  unlockContainer(){
    this.navCtrl.push('authenticate',{
      'bookingId':this.id
    })
  }

}
