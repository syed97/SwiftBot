import {Component, OnInit} from "@angular/core";
import {FormGroup, Validators, FormBuilder} from '@angular/forms';
import {IonicPage, NavController} from "ionic-angular";
import {PservicesProvider} from "../../providers/pservices/pservices";
import { App } from 'ionic-angular';
import {MyApp} from "../../app/app.component";

/**
 * Generated class for the SignupPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage({
  name: 'signup',
})

@Component({
  selector: 'page-signup',
  templateUrl: 'signup.html',
})
export class SignupPage implements OnInit {
  public onRegisterForm: FormGroup;
  name = ""
  email = ""
  password = ""
  userIdTag = ""

  constructor(public app: App, private _fb: FormBuilder, public nav: NavController, private hotelService: PservicesProvider, public myApp: MyApp) {

  }

  ngOnInit() {
    this.onRegisterForm = this._fb.group({
      fullName: ['', Validators.compose([
        Validators.required
      ])],
      email: ['', Validators.compose([
        Validators.required
      ])],
      password: ['', Validators.compose([
        Validators.required
      ])]
    });
  }

  // register and go to home page
  register(fullName, email, password) {
    
    //upload user
    var d = new Date();
    var userIdTag = ((d.getTime()).toString()+fullName);
    
    var aboutUser = {
      "name":fullName,
      "email":email,
      "password":password,
      "userIdTag": userIdTag,
      "address": ""
      }
       
     console.log("value", fullName ,email, password, userIdTag )
     this.uploadUserToDatabase(aboutUser);

     this.name = fullName
     this.email = email
     this.password = password
     this.userIdTag = userIdTag;
  }

  // go to login page
  login() {
    this.app.getRootNav().setRoot('login');
  }

  uploadUserToDatabase(aboutUser){
    var _this = this;
         var InitiateUploadUser = function(callback) // How can I use this callback?
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
                      console.log("no respinse for creating account") // Another callback here
                      //document.getElementById("noInternet").style.display = "block";
                  }
              }; 
              request.open("POST", "https://api.anomoz.com/api/swift/post/user_create.php")
              request.send(JSON.stringify(aboutUser));
          }
          var frameUploadUser = function mycallback(data) {
            console.log("user received from server," , data)
            
            _this.hotelService.storeSignupData(_this.name, _this.email, _this.password, _this.userIdTag);
            //redirect to home
            _this.addFace(); 
          }

          InitiateUploadUser(frameUploadUser); //passing mycallback as a method  
  }

  addFace(){
    this.nav.push('addface');
  }
 
}
