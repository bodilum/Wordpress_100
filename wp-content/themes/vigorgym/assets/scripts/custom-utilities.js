 /////////////////// IMPORT VARIABLES & FUNCTIONS ////////////////////////////////
 import { App } from "./main.js";
 /////////////////// IMPORT VARIABLES & FUNCTIONS END ////////////////////////////////

const delayFunc = (n) => {
    n = n || 2000;
    return new Promise (done => {
      const tmOut1 = () => {
        setTimeout(() => {
          done();
        }, n);
      }
    });
};
      
      
jQuery(window).on("resize", () => {
    setBodySize();
});

function setBodySize() {

App.dw = jQuery(window).width();
App.dh = jQuery(window).height();

// jQuery("#bodyContent").css({ 'width': dw + 'px', 'height': dh + 'px !important' });
jQuery("#bodyContent").width( App.dw );
jQuery("#bodyContent").height( App.dh );
// console.log('width: ' + dw + 'px', 'height: ' + dh + 'px');

}


///////////////// DOCUMENT READY /////////////////////////////// 

// console.log('Custom Utilities Script loaded!');
jQuery(document).ready(function($) {
    // console.log('Browser Name from utilities: ', browserName);
 });




