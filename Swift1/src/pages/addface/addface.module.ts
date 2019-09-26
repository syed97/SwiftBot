import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { AddfacePage } from './addface';

@NgModule({
  declarations: [
    AddfacePage,
  ],
  imports: [
    IonicPageModule.forChild(AddfacePage),
  ],
})
export class AddfacePageModule {}
