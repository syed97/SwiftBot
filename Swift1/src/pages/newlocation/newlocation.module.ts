import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { NewlocationPage } from './newlocation';

@NgModule({
  declarations: [
    NewlocationPage,
  ],
  imports: [
    IonicPageModule.forChild(NewlocationPage),
  ],
})
export class NewlocationPageModule {}
