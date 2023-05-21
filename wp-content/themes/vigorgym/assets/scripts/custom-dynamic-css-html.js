 /////////////////// IMPORT VARIABLES & FUNCTIONS ////////////////////////////////
 import { App } from "./main.js";
 /////////////////// IMPORT VARIABLES & FUNCTIONS END ////////////////////////////////


let updDynCssHtml;
let activeContainer;
let fgcolor = '', bgcolor = '';
let dynCss = '';



///////////////// DOCUMENT READY /////////////////////////////// 
  // console.log('Dynamic Css & HTML Script loaded!');
jQuery(document).ready(function($) {

//////////// IF WE NEED DYNAMIC CSS ON THE WEBSITE ///////////////////



// funtion to update dynamic css html
updDynCssHtml = () => {

  // activeContainer = App.curPgObj ? App.curPgObj : App.prevPgObj;

  if(activeContainer) {
    let pgColors = activeContainer.container.querySelector('.pg-content').getAttribute('data-colors');

    if( pgColors ) {

      // console.log('Page Colors: ', pgColors);
  
      let pgClrsArr = pgColors.split(',');
  
      // console.log('Page Colors: ', pgClrsArr);
  
      if( pgClrsArr.length > 0 ) {
  
        fgcolor = pgClrsArr [0];
        bgcolor = pgClrsArr [1];
  
      }

    } else {
      fgcolor = '#f7f7f7';
      bgcolor = '#000402';
    }


  }
  let fgClr = tinycolor(fgcolor);
  let bgClr = tinycolor(bgcolor);
  let fgClr1, fgClr2, fgClr3;
  let bgClr1, bgClr2, bgClr3;
  let clrAmt = 3;

  let fgClrB1 = fgClr.getBrightness();
  let bgClrB1 = bgClr.getBrightness();

  if(bgClr.isDark()) {    
    bgClr1 = (bgClrB1 == 0) ? tinycolor(bgcolor).brighten(clrAmt) : tinycolor(bgcolor).darken(clrAmt);
    bgClr2 = (bgClrB1 == 0) ? tinycolor(bgcolor).brighten(clrAmt * 6) : tinycolor(bgcolor).darken(clrAmt * 6);
  } else if(bgClr.isLight()) { 
    bgClr1 = (bgClrB1 == 255) ? tinycolor(bgcolor).darken(clrAmt) : tinycolor(bgcolor).brighten(clrAmt);
    bgClr2 = (bgClrB1 == 255) ? tinycolor(bgcolor).darken(clrAmt * 6) : tinycolor(bgcolor).brighten(clrAmt * 6);
  }

  fgClr1 = (bgClrB1 <= 180) ? fgClr.brighten(clrAmt * 4) : fgClr.darken(clrAmt * 4);
  fgClr2 = (bgClrB1 <= 180) ? fgClr.brighten(clrAmt * 6) : fgClr.darken(clrAmt * 6);
  fgClr3 = (bgClrB1 <= 180) ? bgClr.brighten(clrAmt * 4) : bgClr.darken(clrAmt * 4);


  dynCss = '<style type="text/css">';

  if (fgcolor !== '' && bgcolor !== '') {
    
    v = `
    body {  
      background: ${ bgcolor } !important;
    }
    
    #mainApp {
      color: ${ fgcolor };
    }



    `;
    dynCss += v;



    switch(curPgName) {
      case 'home':
        break;
      default:
        break;
    }



    dynCss += v;


  }

  dynCss += '</style>';
  $('#dynamicCss').html(dynCss);
}

  });

///////////////// DOCUMENT READY ENDS ///////////////////////////////  




//////////// IF WE NEED DYNAMIC CSS ON THE WEBSITE END ///////////////////


 /////////////////// EXPORT VARIABLES & FUNCTIONS ////////////////////////////////
 export { updDynCssHtml, activeContainer, fgcolor, bgcolor };
 /////////////////// EXPORT VARIABLES & FUNCTIONS END ////////////////////////////////

