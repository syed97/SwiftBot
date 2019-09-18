import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';

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

  constructor(public navCtrl: NavController, public navParams: NavParams) {
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad AddmyaddressPage');
  }

  addReceiver(){
    this.navCtrl.push('addreceiver');
  }

}
