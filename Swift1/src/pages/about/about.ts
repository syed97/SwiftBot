import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { App } from 'ionic-angular';
import { Storage } from '@ionic/storage';

/**
 * Generated class for the AboutPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage({
  name: 'about'
})
@Component({
  selector: 'page-about',
  templateUrl: 'about.html',
})
export class AboutPage {

  constructor(public navCtrl: NavController, public navParams: NavParams, public app: App, public storage : Storage) {
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad AboutPage');
  }

  rate(){
    
  }

  logout(){
    this.storage.set('userBasicInfo', null);
    //this.navCtrl.setRoot("login")
    this.app.getRootNav().setRoot('login');
  }

}
