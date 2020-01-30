import { Component, OnInit } from '@angular/core';
import { IonicPage, NavController, NavParams, ToastController } from 'ionic-angular';
import { Validators, FormGroup, FormBuilder } from '@angular/forms';
import { PservicesProvider } from '../../providers/pservices/pservices';

/**
 * Generated class for the AuthenticatePage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage({
  name:'authenticate'
})
@Component({
  selector: 'page-authenticate',
  templateUrl: 'authenticate.html',
})


export class AuthenticatePage implements OnInit{

  password = "";
  bookingId = "";

  public onLoginForm: FormGroup;

  constructor(private _fb: FormBuilder, public navCtrl: NavController, public navParams: NavParams,  public nav: NavController, public toastCtrl: ToastController, public data: PservicesProvider) {
    this.bookingId = navParams.get('bookingId'); 
  }

  ngOnInit() {
    this.onLoginForm = this._fb.group({
      password: ['', Validators.compose([
        Validators.required
      ])]
    });
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad AuthenticatePage');
  }

  login(password) {
    //this.nav.setRoot('page-home');
    console.log("--", password)
    if(password==this.data.password){
      this.getUserFromServer(1, password);
    }else{
      let toast = this.toastCtrl.create({
        showCloseButton: true,
        cssClass: 'profile-bg',
        message: 'Authentication Failed!',
        duration: 3000,
        position: 'bottom'
      });
      toast.present();
    }
    
  }

  getUserFromServer(bookingId, password){
    var InitiateGetTransactions = function(callback) // How can I use this callback?
     {
         var request = new XMLHttpRequest();
         request.onreadystatechange = function()
         {
             if (request.readyState == 4 && request.status == 200)
             {
                callback(request.responseText); // Another callback here
             }
             if (request.readyState == 4 && request.status == 0)
             {
                
             }
         }; 
         request.open("POST", "https://api.anomoz.com/api/swift/post/set_door_auth.php?bookingId="+bookingId+"&password="+password);
         request.send();
     }
     
     var _this = this;
     var frameTransactions = function mycallback(data) {
       console.log("door auth received from server," , data)
       var dataParsed
       dataParsed = JSON.parse(data);
       if(dataParsed.message=="none"){
         console.log("no user")
       }
       else{
          _this.showToast();
          _this.nav.popToRoot();  
        }
       }
     InitiateGetTransactions(frameTransactions); //passing mycallback as a method 
  }

  showToast(){
    let toast = this.toastCtrl.create({
      showCloseButton: true,
      cssClass: 'profile-bg',
      message: 'Container Opened!',
      duration: 3000,
      position: 'bottom'
    });
    toast.present();
    //this.navCtrl.popToRoot();
  }

}
