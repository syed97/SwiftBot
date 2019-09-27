import { Component } from '@angular/core';
import { IonicPage, NavController, Platform, LoadingController } from 'ionic-angular';
import {Camera,CameraOptions} from '@ionic-native/camera';
import { PservicesProvider } from '../../providers/pservices/pservices';
import { FileTransfer, FileUploadOptions, FileTransferObject } from '@ionic-native/file-transfer/ngx';

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
  base64img:string='';
  constructor(public imgpov:PservicesProvider, public nav: NavController,private platform: Platform,private camera:Camera,public loadingCtrl: LoadingController,private transfer: FileTransfer ) {
  }

  imageCaptured(){
    const options:CameraOptions={
      quality:70,
      destinationType:this.camera.DestinationType.DATA_URL,
      encodingType:this.camera.EncodingType.JPEG,
      mediaType:this.camera.MediaType.PICTURE
    }
    this.camera.getPicture(options).then((ImageData=>{
       this.base64img="data:image/jpeg;base64,"+ImageData;
    }),error=>{
      console.log(error);
    })
  }

  imageCapturedGallery(){
    const options:CameraOptions={
      quality:70,
      destinationType:this.camera.DestinationType.DATA_URL,
      sourceType:this.camera.PictureSourceType.PHOTOLIBRARY,
      saveToPhotoAlbum:false
    }
    this.camera.getPicture(options).then((ImageData=>{
       this.base64img="data:image/jpeg;base64,"+ImageData;
    }),error=>{
      console.log(error);
    })
  }
  nextPage(){
    //this.imgpov.setImage(this.base64img);
    //this.nav.push('IdentifyphotoPage');
    this.uploadPic();
  }

  clear(){
    this.base64img='';
  }

  uploadPic() {
    /**
    this.base64img = this.imgpov.getImage();
    let loader = this.loadingCtrl.create({
      content: "Uploading...."
    });
    loader.present();

    const fileTransfer: FileTransferObject = this.transfer.create();

    let options: FileUploadOptions = {
      fileKey: "photo",
      fileName: "test3.jpg",
      chunkedMode: false,
      mimeType: "image/jpeg",
      headers: {}
    }

    fileTransfer.upload(this.base64img, 'https://projects.anomoz.com/fooPan/imageUpload.php', options).then(data => {
      //alert(JSON.stringify(data));
      loader.dismiss();
      this.nav.push('IdentifyphotoPage');
    }, error => {
      alert("error");
      alert("error" + JSON.stringify(error));
      loader.dismiss();
    });
     */
  }
}
