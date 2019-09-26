import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';

/**
 * Generated class for the NewlocationPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage({
  name: 'newlocation'
})
@Component({
  selector: 'page-newlocation',
  templateUrl: 'newlocation.html',
})
export class NewlocationPage {

  locationName: any;

  constructor(public navCtrl: NavController, public navParams: NavParams) {
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad NewlocationPage');
  }

  enterLocation(){
    console.log("locationName", this.locationName)
  }

  addName(){
    this.locationName
  }

  addFinalLocation(){
    
  }

}
