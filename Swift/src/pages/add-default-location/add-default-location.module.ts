import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { AddDefaultLocationPage } from './add-default-location';

@NgModule({
  declarations: [
    AddDefaultLocationPage,
  ],
  imports: [
    IonicPageModule.forChild(AddDefaultLocationPage),
  ],
})
export class AddDefaultLocationPageModule {}
