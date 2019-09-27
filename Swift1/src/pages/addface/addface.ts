import { Component } from '@angular/core';
import { IonicPage, NavController, Platform, LoadingController } from 'ionic-angular';
import {Camera,CameraOptions} from '@ionic-native/camera';
import { PservicesProvider } from '../../providers/pservices/pservices';
//import { FileTransfer, FileUploadOptions, FileTransferObject } from '@ionic-native/file-transfer/ngx';
//import { MediaCapture, MediaFile, CaptureError, CaptureVideoOptions } from '@ionic-native/media-capture/ngx';
import { DomSanitizer } from '@angular/platform-browser';
/**
 * Generated class for the AddfacePage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage({
  name: 'addface'
})
@Component({
  selector: 'page-addface',
  templateUrl: 'addface.html',
})

export class AddfacePage {
  my_url: any;

  constructor(public imgpov:PservicesProvider, public nav: NavController,private platform: Platform,private camera:Camera,public loadingCtrl: LoadingController, private sanitize: DomSanitizer ) {
  }

  urlpaste(){
    this.my_url = "https://projects.anomoz.com/swift/addFace.php";
    return this.sanitize.bypassSecurityTrustResourceUrl(this.my_url);
  }

  addMyLocation(){
    this.nav.push('add-default-location');
  }
}
