console.log('SIANA main js is loaded!');


const App = new (function () {
    // const live = false;
    const live = false;    
  })();
  let curPgName, prevPgName = '';
  let prevPgObj, curPgObj;
  let isMobileMenuOpen = false;
  let mobileMode = false;
  let browserName = "Unknown";
  let playedIntro = false; // just to know if intro was played when viewing this page
  let prev_pg_slug = ''; // variable to hold the previous page slug for checks and classes
  let post_type = '';
  let body_class = '';



  
gsap.registerPlugin(ScrollTrigger);

// ScrollTrigger.normalizeScroll(true);

gsap.config({
  autoSleep: 60,
  // force3D: false,
  nullTargetWarn: false,
  trialWarn: false,
  // units: {left: "%", top: "%", rotation: "rad"}
});


function getBrowserName() {
  
  if(navigator.userAgent.indexOf("MSIE")!=-1){
      browserName = "MSIE";
  }
  else if(navigator.userAgent.indexOf("Firefox")!=-1){
      browserName = "Firefox";
  }
  else if(navigator.userAgent.indexOf("Opera")!=-1){
      browserName = "Opera";
  }
  else if(navigator.userAgent.indexOf("Chrome") != -1){
      browserName = "Chrome";
  }
  else if(navigator.userAgent.indexOf("Safari")!=-1){
      browserName = "Safari";
  }
  return browserName;   
}

if( getBrowserName() == "Safari" ){
  console.log("You are using Safari");
}else{
  console.log("You are surfing on " + getBrowserName(browserName));
}

  

  /////////////////////////////////////////////// JQUERY EASING //////////////// 
jQuery.easing["jswing"] = jQuery.easing["swing"];

jQuery.extend(jQuery.easing, {
  def: "easeOutQuad",
  swing: function (x, t, b, c, d) {
    //alert(jQuery.easing.default);
    return jQuery.easing[jQuery.easing.def](x, t, b, c, d);
  },
  easeInQuad: function (x, t, b, c, d) {
    return c * (t /= d) * t + b;
  },
  easeOutQuad: function (x, t, b, c, d) {
    return -c * (t /= d) * (t - 2) + b;
  },
  easeInOutQuad: function (x, t, b, c, d) {
    if ((t /= d / 2) < 1) return (c / 2) * t * t + b;
    return (-c / 2) * (--t * (t - 2) - 1) + b;
  },
  easeInCubic: function (x, t, b, c, d) {
    return c * (t /= d) * t * t + b;
  },
  easeOutCubic: function (x, t, b, c, d) {
    return c * ((t = t / d - 1) * t * t + 1) + b;
  },
  easeInOutCubic: function (x, t, b, c, d) {
    if ((t /= d / 2) < 1) return (c / 2) * t * t * t + b;
    return (c / 2) * ((t -= 2) * t * t + 2) + b;
  },
  easeInQuart: function (x, t, b, c, d) {
    return c * (t /= d) * t * t * t + b;
  },
  easeOutQuart: function (x, t, b, c, d) {
    return -c * ((t = t / d - 1) * t * t * t - 1) + b;
  },
  easeInOutQuart: function (x, t, b, c, d) {
    if ((t /= d / 2) < 1) return (c / 2) * t * t * t * t + b;
    return (-c / 2) * ((t -= 2) * t * t * t - 2) + b;
  },
  easeInQuint: function (x, t, b, c, d) {
    return c * (t /= d) * t * t * t * t + b;
  },
  easeOutQuint: function (x, t, b, c, d) {
    return c * ((t = t / d - 1) * t * t * t * t + 1) + b;
  },
  easeInOutQuint: function (x, t, b, c, d) {
    if ((t /= d / 2) < 1) return (c / 2) * t * t * t * t * t + b;
    return (c / 2) * ((t -= 2) * t * t * t * t + 2) + b;
  },
  easeInSine: function (x, t, b, c, d) {
    return -c * Math.cos((t / d) * (Math.PI / 2)) + c + b;
  },
  easeOutSine: function (x, t, b, c, d) {
    return c * Math.sin((t / d) * (Math.PI / 2)) + b;
  },
  easeInOutSine: function (x, t, b, c, d) {
    return (-c / 2) * (Math.cos((Math.PI * t) / d) - 1) + b;
  },
  easeInExpo: function (x, t, b, c, d) {
    return t == 0 ? b : c * Math.pow(2, 10 * (t / d - 1)) + b;
  },
  easeOutExpo: function (x, t, b, c, d) {
    return t == d ? b + c : c * (-Math.pow(2, (-10 * t) / d) + 1) + b;
  },
  easeInOutExpo: function (x, t, b, c, d) {
    if (t == 0) return b;
    if (t == d) return b + c;
    if ((t /= d / 2) < 1) return (c / 2) * Math.pow(2, 10 * (t - 1)) + b;
    return (c / 2) * (-Math.pow(2, -10 * --t) + 2) + b;
  },
  easeInCirc: function (x, t, b, c, d) {
    return -c * (Math.sqrt(1 - (t /= d) * t) - 1) + b;
  },
  easeOutCirc: function (x, t, b, c, d) {
    return c * Math.sqrt(1 - (t = t / d - 1) * t) + b;
  },
  easeInOutCirc: function (x, t, b, c, d) {
    if ((t /= d / 2) < 1) return (-c / 2) * (Math.sqrt(1 - t * t) - 1) + b;
    return (c / 2) * (Math.sqrt(1 - (t -= 2) * t) + 1) + b;
  },
  easeInElastic: function (x, t, b, c, d) {
    var s = 1.70158;
    var p = 0;
    var a = c;
    if (t == 0) return b;
    if ((t /= d) == 1) return b + c;
    if (!p) p = d * 0.3;
    if (a < Math.abs(c)) {
      a = c;
      var s = p / 4;
    } else var s = (p / (2 * Math.PI)) * Math.asin(c / a);
    return (
      -(
        a *
        Math.pow(2, 10 * (t -= 1)) *
        Math.sin(((t * d - s) * (2 * Math.PI)) / p)
      ) + b
    );
  },
  easeOutElastic: function (x, t, b, c, d) {
    var s = 1.70158;
    var p = 0;
    var a = c;
    if (t == 0) return b;
    if ((t /= d) == 1) return b + c;
    if (!p) p = d * 0.3;
    if (a < Math.abs(c)) {
      a = c;
      var s = p / 4;
    } else var s = (p / (2 * Math.PI)) * Math.asin(c / a);
    return (
      a * Math.pow(2, -10 * t) * Math.sin(((t * d - s) * (2 * Math.PI)) / p) +
      c +
      b
    );
  },
  easeInOutElastic: function (x, t, b, c, d) {
    var s = 1.70158;
    var p = 0;
    var a = c;
    if (t == 0) return b;
    if ((t /= d / 2) == 2) return b + c;
    if (!p) p = d * (0.3 * 1.5);
    if (a < Math.abs(c)) {
      a = c;
      var s = p / 4;
    } else var s = (p / (2 * Math.PI)) * Math.asin(c / a);
    if (t < 1)
      return (
        -0.5 *
          (a *
            Math.pow(2, 10 * (t -= 1)) *
            Math.sin(((t * d - s) * (2 * Math.PI)) / p)) +
        b
      );
    return (
      a *
        Math.pow(2, -10 * (t -= 1)) *
        Math.sin(((t * d - s) * (2 * Math.PI)) / p) *
        0.5 +
      c +
      b
    );
  },
  easeInBack: function (x, t, b, c, d, s) {
    if (s == undefined) s = 1.70158;
    return c * (t /= d) * t * ((s + 1) * t - s) + b;
  },
  easeOutBack: function (x, t, b, c, d, s) {
    if (s == undefined) s = 1.70158;
    return c * ((t = t / d - 1) * t * ((s + 1) * t + s) + 1) + b;
  },
  easeInOutBack: function (x, t, b, c, d, s) {
    if (s == undefined) s = 1.70158;
    if ((t /= d / 2) < 1)
      return (c / 2) * (t * t * (((s *= 1.525) + 1) * t - s)) + b;
    return (c / 2) * ((t -= 2) * t * (((s *= 1.525) + 1) * t + s) + 2) + b;
  },
  easeInBounce: function (x, t, b, c, d) {
    return c - jQuery.easing.easeOutBounce(x, d - t, 0, c, d) + b;
  },
  easeOutBounce: function (x, t, b, c, d) {
    if ((t /= d) < 1 / 2.75) {
      return c * (7.5625 * t * t) + b;
    } else if (t < 2 / 2.75) {
      return c * (7.5625 * (t -= 1.5 / 2.75) * t + 0.75) + b;
    } else if (t < 2.5 / 2.75) {
      return c * (7.5625 * (t -= 2.25 / 2.75) * t + 0.9375) + b;
    } else {
      return c * (7.5625 * (t -= 2.625 / 2.75) * t + 0.984375) + b;
    }
  },
  easeInOutBounce: function (x, t, b, c, d) {
    if (t < d / 2)
      return jQuery.easing.easeInBounce(x, t * 2, 0, c, d) * 0.5 + b;
    return (
      jQuery.easing.easeOutBounce(x, t * 2 - d, 0, c, d) * 0.5 + c * 0.5 + b
    );
  },
});
/////////////////////////////////////////////// JQUERY EASING ENDS ////////////////
//
//
//
//



var playIntro = false;
const lastIntroPlayTime = window.localStorage.getItem('lastIntroPlayTime');
const introPlayFreq = 2; // in hours

var timenow = Date.now();

if(!lastIntroPlayTime) {
  playIntro = true;
} else {  
  var lastIntroPlay = new Date(parseInt(lastIntroPlayTime));
  var divider = 3600000; // milliseconds to hours
  var diff = ((timenow - lastIntroPlay) / divider).toFixed(2);

  if (diff > introPlayFreq) playIntro = true;
}


// init App

console.log("Script vars: ", script_vars);
({ categories, pg_slug, tags, showreelVidLink, post_type, num_of_courses } = script_vars);


// 
//// CAPTURE BROWSER REFRESH OR NAVIGATE EVENTS ///////////////////////////////////// 
// browser refreshed
//check for Navigation Timing API support
if (window.performance) {
  // console.info("window.performance works fine on this browser");
  if (performance.navigation.type == performance.navigation.TYPE_RELOAD) {
    // console.info( "This page is reloaded" );
    playIntro = true;
  } else {
    // console.info( "This page is not reloaded");
  }
} else {
  let navType = performance
    ? performance.getEntriesByType("navigation")[0].type
    : "";
  if (navType === "reload") {
    // console.info( "This page is reloaded" );
    playIntro = true;
  } else {
    // console.info( "This page is not reloaded");
  }
}



//////// CAPTURE BROWSER REFRESH OR NAVIGATE EVENTS END /////////////////////////////////////








  ///////////////// DOCUMENT READY /////////////////////////////// 
jQuery(document).ready(function($) {

  var dw = window.innerWidth;
  var dh = window.innerHeight;

  const appBody = document.querySelector('#bodyContent');

  // check if we're in mobile mode
  mobileMode = (dw < 920) ? true : false;


  let pgColors = {
    'home': ['#fff', '#222'],
    'bio': ['#000', '#fff'],
    'studio': ['#b8bcbf', '#121314'],
    'work': ['#121314', '#b8bcbf'],
    'contact': ['#cfcecd', '#101010'],
  }
  let pgClrsKeys = Object.keys(pgColors);



  /// set mobile menu height
  $("#mainHeader .mainMenuHolder ._mobileMenu").css({ 'height': dh + 50 });

  // update number of courses on the courses menu
  if( num_of_courses ) $("#mainHeader .mainMenuHolder .fullMenu .mainMenu a span .super_cap, #mainHeader .mainMenuHolder ._mobileMenu ._body a span .super_cap").text( num_of_courses );




  /////////////////////// USER INTERACTION EVENTS //////////////////////////////////
  $(document).on('click', '._mobileMenu ._toggleMMBtn', function() {
    let toggleBtnHasClass = $('._mobileMenu ._toggleMMBtn').hasClass('_isShowingCloseBtn');
    if (toggleBtnHasClass) {
      // menu is opened so close
      $('._mobileMenu ._toggleMMBtn').removeClass('_isShowingCloseBtn');

      // close menu
      $('._mobileMenu').removeClass('menuOpen');

      isMobileMenuOpen = false;
      
    } else {
      // menu is closed so open
      $('._mobileMenu ._toggleMMBtn').addClass('_isShowingCloseBtn');

      // open menu
      $('._mobileMenu').addClass('menuOpen');

      isMobileMenuOpen = true;
    }
  });
  /////////////////////// USER INTERACTION EVENTS END //////////////////////////////////




  /////////////// ANIMATIONS START //////////////////////////////////


const homeContentAnim = () => {
};



// PLAY INTRO ANIMATION
const playIntroAnim = () => {

var progVal = 0;
var fakeProgressVals = [1, 1, 2,0, 0, 0, 0, 0, 2, 2, 3, 4, 5, 0, 0, 0 , 0, 0, 6, 7, 0, 0, 0, 0, 8, 9,10];
var fakeProgArrLen = fakeProgressVals.length;

const range = (start, stop) => Array.from({ length: stop - start + 1 }, (_, i) => start + i);

var fakeFreq = 30; // milliseconds

var delay1 = 100;


var progBarMaxWidth = 100; // in percent

const tl1 = gsap.timeline();
tl1
.set('#mainIntro', { display: 'flex', clipPath: 'polygon(0 0, 100% 0, 100% 100%, 0 100%)' })
.fromTo('#mainIntro .content .introLogo', { y: 200, opacity: 0, display: 'none' }, 
{ duration: 1, y: 0, opacity: 1, display: 'block', ease: Expo.easeInOut }, "-=0.5")
.fromTo('#mainIntro .content .progress', { y: 200, opacity: 0, display: 'none' }, 
{ duration: 1, y: 0, opacity: 1, display: 'block', ease: Expo.easeInOut }, "-=0.8")
.fromTo('#mainIntro .content .progressPercent', { y: 200, opacity: 0, display: 'none' }, 
{ duration: 1, y: 0, opacity: 1, display: 'block', ease: Expo.easeInOut, onComplete: function() { 

  var interVal1 = setInterval(() => {
  var rnd1 = Math.floor(Math.random() * fakeProgArrLen);
  progVal += fakeProgressVals[rnd1];
  progVal = (progVal > 100) ? 100 : progVal;



  // update progress
  updProgress(progVal);

  // console.log('Progress: ', progVal);

  if(progVal == 100) {
    // clear interval
    clearInterval(interVal1);
    
    // hide progress
    // show intro logo animation
    var timeOut1 = setTimeout(() => {
      const tl1 = gsap.timeline();
      
      clearTimeout(timeOut1);
    }, delay1);


    // 
    removeIntroScreen();
    playPgEnterAnim();    
  }

  }, fakeFreq);

} }, "-=0.8")
;




const updProgress = (val) => {
var v = (val < 10) ? "00" + val : (val < 100) ? "0" + val: val;
var newWidth = progBarMaxWidth * (val / 100);

$('#mainIntro .progressBar1 span').css({ 'width' : newWidth + '%' });
$('#mainIntro .progressPercent span').text( parseInt(newWidth) + '%' );

}

window.localStorage.setItem('lastIntroPlayTime', Date.now());

} // end of playintroanim


  

  ////// page enter and page leave animations
  const playPgEnterAnim = () => {
    const tl1 = gsap.timeline();
    animLibrary('headerMenuEnter', 0.1);
  }

  const playPgLeaveAnim = () => {
    const tl1 = gsap.timeline();
  }

  const removeIntroScreen = () => {
    const tl1 = gsap.timeline();
    tl1
    .to('#mainIntro .content .introLogo', { delay: 0.5, duration: 1.2, y: -200, opacity: 0, display: 'none', ease: Expo.easeInOut })
    .to('#mainIntro .content .progress', { duration: 1.2, y: -200, opacity: 0, display: 'none', ease: Expo.easeInOut }, "-=1.1")
    .to('#mainIntro .content .progressPercent', { duration: 1.2, y: -200, opacity: 0, display: 'none', ease: Expo.easeInOut }, "-=1.1")
    .to('#mainIntro', { duration: 1, clipPath: "polygon(0 0, 100% 0, 100% 0, 0 0)", ease: Expo.easeInOut }, "-=0.8" )
    ;
  }

  //function to get active main logo element based on current mobile mode
  function getMainLogoElm() {
    return (mobileMode) ? '#mainHeader ._mobileMenu ._topArea .mainLogo .mask-bx' : '#mainHeader .fullMenu .mainLogo .mask-bx';
  }
  //function to get active menu links based on current mobile mode
  function getMenuLinksElm() {
    return (mobileMode) ? '#mainHeader ._mobileMenu ._body a span' : '#mainHeader .fullMenu .mainMenu a span';
  }

  /////// ANIMATION LIBRARY ////////
  function animLibrary (animName, delay = 0) {
    const tl = gsap.timeline();
    let logoEl = '', menuEls = '';

    // console.log("Playing animLibrary with name: ", animName);

    switch( animName ) {
      case 'headerMenuEnter':
        logoEl = getMainLogoElm();
        menuEls = getMenuLinksElm();
        menuDelay = playedIntro ? "" : "-=1.5";

        // console.log('MenuEls: ', menuEls);

        tl
        .set(menuEls, { y: 100, display: 'none', opacity: 0 })
        .fromTo(".pgBg_top", { backgroundSize: '300%', opacity: 0 }, 
          { delay, duration: 4.2, backgroundSize: '100%', opacity: 1, ease: Expo.easeInOut })
        .fromTo(logoEl, { y: 100, display: 'none', opacity: 0 }, 
          { duration: 2.5, y: 0, opacity: 1, display: 'block', ease: Expo.easeInOut }, "-=3.5")
        .to(menuEls, { duration: 3.5, y: 0, opacity: 1, display: 'block', ease: Expo.easeInOut, stagger: { amount: 0.8 } }, menuDelay)
        ;
      break;
      case 'headerMenuLeave':
        logoEl = getMainLogoElm();
        menuEls = getMenuLinksElm();

        tl
        .fromTo(menuEls, { y: 0, opacity: 1, display: 'block' }, 
        { duration: 2.5, y: 100, opacity: 0, display: 'none', ease: Expo.easeInOut, stagger: { amount: 0.8 } })
        .fromTo(logoEl, { y: 0, opacity: 1, display: 'block' }, 
          { duration: 1.5, y: 100, display: 'none', opacity: 0, ease: Expo.easeInOut }, "-=2.5")
        .fromTo(".pgBg_top", { backgroundSize: '100%', opacity: 1 }, 
        { duration: 1.2, backgroundSize: '150%', opacity: 0, ease: Expo.easeInOut }, "-=3.5")
        ;

      break;
      case 'headerMenuEnterCourse':
        logoEl = getMainLogoElm();
        menuEls = getMenuLinksElm();
        menuDelay = playedIntro ? "" : "-=1.5";

        tl
        .set(menuEls, { y: 100, display: 'none', opacity: 0 })
        .fromTo(logoEl, { y: 100, display: 'none', opacity: 0 }, 
          { duration: 2.5, y: 0, opacity: 1, display: 'block', ease: Expo.easeInOut })
        .to(menuEls, { duration: 3.5, y: 0, opacity: 1, display: 'block', ease: Expo.easeInOut, stagger: { amount: 0.8 } }, menuDelay)
        ;
      break;
      case 'headerMenuLeaveCourse':
        logoEl = getMainLogoElm();
        menuEls = getMenuLinksElm();

        tl
        .fromTo(menuEls, { y: 0, opacity: 1, display: 'block' }, 
        { duration: 2.5, y: 100, opacity: 0, display: 'none', ease: Expo.easeInOut, stagger: { amount: 0.8 } })
        .fromTo(logoEl, { y: 0, opacity: 1, display: 'block' }, 
          { duration: 1.5, y: 100, display: 'none', opacity: 0, ease: Expo.easeInOut }, "-=2.5")
        ;

      break;
      case 'footerMenuEnter':
        
      break;
      case 'footerMenuLeave':
      break;
      case 'homePageEnter':
        tl
        // .set(menuEls, { y: 100, display: 'none', opacity: 0 })
        .fromTo(".homePgSection .topSection .txt1 span", { paddingTop: 200 }, 
          { delay, duration: 3.2, paddingTop: 0, ease: "power4.out", stagger: { amount: 0.9 } })
        .fromTo(".homePgSection .topSection .txt2 span", { y: 200 }, 
          { duration: 2.2, y: 0, ease: "power4.out" }, "-=3")
        .fromTo(".homePgSection .topSection .cta [class*='btn']", {opacity: 0, y: 100 }, 
          { duration: 1.4, y: 0, opacity: 1, stagger: { amount: 0.4 } }, "-=3.5" )
        ;
      break;
      case 'homePageLeave':

        tl
        .fromTo(".homePgSection .topSection .cta [class*='btn']", { y: 0, opacity: 1, }, 
          { duration: 1.4, opacity: 0, y: 100, stagger: { amount: 0.4 } }, "-=3.5" )
        .fromTo(".homePgSection .topSection .txt2 span", { y: 0 }, 
        { duration: 2.2, y: 200, ease: "power4.out" }, "-=3")
        .fromTo(".homePgSection .topSection .txt1 span", { paddingTop: 0 }, 
        { delay, duration: 3.2, paddingTop: 200, ease: "power4.out", stagger: { amount: 0.9 } })
        ;
        
        
      break;
      default:
      break;
    }

  }
  /////// ANIMATION LIBRARY END ////////




///  playIntro or playPgEnterAnim
if(playIntro) {
  playIntroAnim();
  playedIntro = true;
} else {
  // playPgEnterAnim();
  playedIntro = false;
}




////////////// ANIMATIONS END ////////////////////////////////////





//////////// IF WE NEED DYNAMIC CSS ON THE WEBSITE ///////////////////
let fgcolor = '', bgcolor = '';
let dynCss = '';


// funtion to update dynamic css html
const updDynCssHtml = () => {

  let activeContainer = curPgObj ? curPgObj : prevPgObj;

  // console.log('Got here...');
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


    #mainHeader .mainMenuHolder .fullMenu .mainLogo .mask-bx svg {
      fill: ${ fgcolor };
    }
    #mainHeader .mainMenuHolder .fullMenu .mainMenu { }
    #mainHeader .mainMenuHolder .fullMenu .mainMenu a {  
      color: ${ fgcolor };
    }
    #mainHeader .mainMenuHolder .fullMenu .mainMenu a span {
      color: ${ fgcolor };
    }


    #mainHeader .mainMenuHolder .fullMenu .mainMenu a span::after {
      background: ${ fgClr1 };
    }
  
    #mainHeader .mainMenuHolder .fullMenu .mainMenu a:hover span {
      color: ${ fgClr1 };
    }
  
  
  
    #mainHeader .mainMenuHolder .fullMenu .mainMenu a._activ span {
      color: ${ fgcolor };
    }
    #mainHeader .mainMenuHolder .fullMenu .mainMenu a._activ span::after {
      background: ${ fgcolor };
    }

    #mainHeader .mainMenuHolder .fullMenu .mainMenu a span .super_cap {
      color: ${ fgcolor };
    }
    #mainHeader .mainMenuHolder .fullMenu .mainMenu a:hover span .super_cap { }





    #mainHeader .mainMenuHolder ._mobileMenu { }
  
    #mainHeader .mainMenuHolder ._mobileMenu ._topArea {
      background: ${ bgcolor }7f;
    }
    #mainHeader .mainMenuHolder ._mobileMenu ._topArea .mainLogo { }
  
    #mainHeader .mainMenuHolder ._mobileMenu ._topArea .mainLogo .mask-bx { }
    #mainHeader .mainMenuHolder ._mobileMenu ._topArea .mainLogo .mask-bx svg { 
      fill: ${ fgcolor };
    }
  
    #mainHeader .mainMenuHolder ._mobileMenu ._topArea ._toggleMMBtn { }
  
    #mainHeader .mainMenuHolder ._mobileMenu ._topArea ._toggleMMBtn span {
      background: ${ fgcolor };
    }

    #mainHeader .mainMenuHolder ._mobileMenu ._topArea span._bar1 { }
    #mainHeader .mainMenuHolder ._mobileMenu ._topArea span._bar2 { }
  
    #mainHeader .mainMenuHolder ._mobileMenu ._topArea ._toggleMMBtn:hover span {      
      background: ${ fgClr2 };
    }
  
    
    #mainHeader .mainMenuHolder ._mobileMenu ._topArea ._toggleMMBtn._isShowingCloseBtn span._bar1 { }
    #mainHeader .mainMenuHolder ._mobileMenu ._topArea ._toggleMMBtn._isShowingCloseBtn span._bar2 { }
  
  
    #mainHeader .mainMenuHolder ._mobileMenu ._body {
      background: ${ bgcolor };
    }
    #mainHeader .mainMenuHolder ._mobileMenu ._body a {
      border-bottom: 1px solid ${ bgClr1 };
      color: ${ fgClr1 };
    }
    #mainHeader .mainMenuHolder ._mobileMenu ._body a:last-of-type { }
  
  
    #mainHeader .mainMenuHolder ._mobileMenu ._body ._footer { }
    #mainHeader .mainMenuHolder ._mobileMenu ._body ._footer ._logo { }
    #mainHeader .mainMenuHolder ._mobileMenu ._body ._footer ._links { }
    #mainHeader .mainMenuHolder ._mobileMenu ._body ._footer ._links a { }
    #mainHeader .mainMenuHolder ._mobileMenu ._body ._footer ._txt1 { }



    `;
    dynCss += v;



    switch(curPgName) {
      case 'home':
        break;
      default:
        break;
    }



    switch(post_type) {
      case 'course':

        v = `

        .single-course .pg_section {  }
    
        .single-course .top_section .course_title .txt1 {
          color: ${ fgClr1 };
        }
    
        .single-course .top_section .course_title .super_txt1 div {
        }
        .single-course .top_section .course_title .super_txt1 div:after {
          border-top: 1px solid ${ fgClr3 };
        }
        .single-course .top_section .course_title .super_txt1 div span {
        }
        .single-course .top_section .course_desc_img .desc {
        }
    
        .single-course .course_syllabus {
          border-bottom: 1px solid ${ fgClr3 };
        }
        .single-course .course_syllabus .heading {
          border-top: 1px solid ${ fgClr3 };
          border-bottom: 1px solid ${ fgClr3 };
        }
        .single-course .course_syllabus .heading .txt1 { }
        .single-course .course_syllabus .heading .txt2 { }
        .single-course .course_syllabus .body { }
        .single-course .course_syllabus .body .content { }
        .single-course .course_syllabus .body .content .itemNo { }
        .single-course .course_syllabus .body .content .itemNo span { 
          color: #aaaaaa;
        }
        .single-course .course_syllabus .body .content { }
        .single-course .course_syllabus .body .content .item { 
          border-bottom: 0.5px solid ${ fgClr3 };
          color: ${ fgClr2 };
        }
    
    
        .single-course .pg_footer { }
        .single-course .pg_footer .heading1 { }
        .single-course .pg_footer a { 
          color: ${ fgcolor };
        }
        .single-course .pg_footer a:hover { 
          color: ${ fgClr1 };
        }
        .single-course .pg_footer a.apply_now { }
        .single-course .pg_footer a.apply_now:hover {
          color: ${ bgClr3 };
        }
        .single-course .pg_footer a.apply_now div { }
    
        .single-course .pg_footer a.apply_now div svg { 
          fill: ${ fgcolor };
        }
        .single-course .pg_footer a.apply_now:hover div svg { 
          fill: ${ fgClr1 };
        }
        .single-course .pg_footer a.more_courses { }
        `;

        break;
      default:
        break;
    }

    dynCss += v;


  }

  dynCss += '</style>';
  $('#dynamicCss').html(dynCss);
}


//////////// IF WE NEED DYNAMIC CSS ON THE WEBSITE END ///////////////////



////////////////// SMOOTH SCROLL ///////////////////////////////////
let mainScroller = null;
// if (browserName != 'Safari') {

  mainScroller = new LocomotiveScroll({
      el: document.querySelector('[data-scroll-container]'),
      smooth: true, getSpeed: true,	getDirection: true,
      lerp: 0.04, // Linear Interpolation, 0 > 1 // Try 0.01
      multiplier: 1.4, // Effect Multiplier
      reloadOnContextChange: true,
      touchMultiplier: 2,
      // smoothMobile: 0,
      // smartphone: {
      //   // smooth: !0,
      //   breakpoint: 760
      // },
      // tablet: {
      //   // smooth: !1,
      //   breakpoint: 1024
      // },
    });
    
    ScrollTrigger.addEventListener('refresh', () => mainScroller.update());
    ScrollTrigger.refresh();
    
    mainScroller.on('scroll', () => {
      console.log('Mainscroller scrolling...');
      ScrollTrigger.update;
    });
    
    ScrollTrigger.scrollerProxy(
      '#mainApp', {
          scrollTop(value) {
              return arguments.length ?
              mainScroller.scrollTo(value, 0, 0) :
              mainScroller.scroll.instance.scroll.y
          },
          getBoundingClientRect() {
              return {
                  left: 0, top: 0, 
                  width: window.innerWidth,
                  height: mainScroller.el.clientHeight
              }
          }
      }
    );
// }



const updMainScroller = () => {
  // if (browserName != 'Safari') {    
    setTimeout(() => {   
      if(mainScroller != null) {
        console.log('Window Height: ', window.innerHeight);
        mainScroller.update();      
        // mainScroller.start();
  
        // alert(`Updated MainScroller ran on mobile ... ${mainScroller.el.clientHeight} .... ${window.innerWidth}`);
  
  
      }
    }, 4000);
  // } 
}

updMainScroller();


////////////////// SMOOTH SCROLL END ///////////////////////////////


////////////////// GENERAL ANIMATIONS ////////////////////
// enter
function playGeneralEnterAnim() {

  switch(post_type) {
    case 'course':
      animLibrary( 'headerMenuEnterCourse' , -2 );  
    break;
    default: 
      animLibrary( 'headerMenuEnter' , -2 );  
    break;
  }

}


// leave
function playGeneralLeaveAnim() {

  switch(post_type) {
    case 'course':
      animLibrary( 'headerMenuLeaveCourse');  
    break;
    default: 
      animLibrary( 'headerMenuLeave');  
    break;
  }
  
}
////////////////// GENERAL ANIMATIONS END ////////////////////



//////////////// ANIM ENTER //////////////////////////// 

const animEnter = (container) => {

  // update page colors
  updDynCssHtml();

  const tl8 = gsap.timeline();

  // console.log('AnimEnter 1...');
	// console.log("Anim Enter 1: ", prevPgObj.container, curPgObj.container, categories);
  /**
   * if you have page specific animations that is quite different from general page animations,
   * use switch function to target the page namespace or pg_slug and put all default or general or common
   * animations in the default case of the switch function
   */


  // play enter animations
  let animNameSpace = pg_slug + 'PageEnter';
  playGeneralEnterAnim();
  animLibrary( animNameSpace, 4);  


  // tl8.fromTo( container, { opacity: 0, display: 'none', y: 200 },
  //   { duration: 1, opacity: 1, display: 'table', y: 0, ease: "power4.out" }
  // );


  if(pg_slug == '' || pg_slug == 'home') {
    console.log('PLaying home enter animation...');
  }


  return new Promise((resolve, reject) => {
      setTimeout(() => {
          console.log("Anim Enter 2...");
          resolve();
      }, 2500);	
  });

};

//////////////// ANIM ENTER END ////////////////////////////



//////////////// ANIM LEAVE ////////////////////////////
const animLeave = (container, done) => {

  // check if mobile menu is open and close if true
  if(isMobileMenuOpen) $('._mobileMenu ._toggleMMBtn').trigger('click');
    // console.log("AnimLeave 1: ", prevPgObj, curPgObj, categories);
    // console.log("AnimLeave 1: ", container);

    const tl7 = gsap.timeline();


  /**
   * if you have page specific animations that is quite different from general page animations,
   * use switch function to target the page namespace or pg_slug and put all default or general or common
   * animations in the default case of the switch function
   */


    // play all leave animations
    let animNameSpace = pg_slug + 'PageLeave';
    animLibrary(animNameSpace);
    playGeneralLeaveAnim(); 


    // tl7.fromTo( container, { opacity: 1, display: 'table', y: 0 },
    //   { duration: 1, opacity: 0, display: 'none', y: 200, ease: "power4.out" }
    // );  
  
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            // console.log("Anim Leave 2...");
            done();
            resolve();
        }, 2500);		
    });
    
  };
//////////////// ANIM LEAVE END //////////////////////////// aspirational desires from the skills they learn from being a beauty professional


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
    dw = jQuery(window).width();
    dh = jQuery(window).height();

    // jQuery("#bodyContent").css({ 'width': dw + 'px', 'height': dh + 'px !important' });
    // jQuery("#bodyContent").width(dw);
    jQuery("#bodyContent").height(dh);
    // console.log('width: ' + dw + 'px', 'height: ' + dh + 'px');
}




// function to set the current page classes
function setPgMainClass() {
  let bodyClasses = $('body').attr('class');
  // console.log('All Classes: ', bodyClasses);
  let bodyClassesArr = bodyClasses.split(' ');
  // console.log('All Classes Arr: ', bodyClassesArr, pg_slug, prev_pg_slug);


  // remove prev_pg_slug if avaialable in the bodyClassesArr
  let ind = bodyClassesArr.indexOf(prev_pg_slug);
  if(ind !== -1 ) bodyClassesArr.splice( ind, 1 );

  // add new class to bodyClassesArr
  bodyClassesArr = [ pg_slug, ...bodyClassesArr ];

  // console.log("New BodyClasses: ", bodyClassesArr);

  // replace the current body classes with the new body classes
  $('body').attr("class", bodyClassesArr.join(' '));

  
}

// updated function to set body Class
function setPgBodyClass() {
  // if( body_class == '' ) return;
  // console.log('Body Class: ', body_class);

  // Set <body> classes for the 'next' page
  if (prevPgObj.container) {
    // // only run during a page transition - not initial load
    let curPgHtml = curPgObj.html;

    // console.log('Current Html: ', curPgHtml);

    let response = curPgHtml.replace(
      /(<\/?)body( .+?)?>/gi,
      "$1notbody$2>",
      curPgHtml
    );
    let bodyClasses = jQuery(response).filter("notbody").attr("class");
    jQuery("body").attr("class", bodyClasses);
  }


}





////////////////// BARBA JS //////////////////////////////////


// tell Barba to use the prefetch module
// barba.use(barbaPrefetch);


// This function helps add and remove js and css files during a page transition

barba.hooks.beforeEnter(({ current, next }) => {
  // console.log("Running...1 ... current: ", current.namespace, "  next: ", next.namespace);
  prevPgObj = current;
  curPgObj = next;

  // set current page name
  curPgName = curPgObj.namespace;
  prevPgName = prevPgObj.namespace;

  // set pg_slug
  prev_pg_slug = pg_slug;
  pg_slug = next.namespace;

  // set pg main class / Body class
  // setPgMainClass();
  setPgBodyClass();


  runBeforeEnterSetup();

  // let postTitle = curPgObj.container.querySelector(".pg-content").getAttribute("post-title");
  // console.log('Post title: ', postTitle);


});

// update the scroll after entering a page
barba.hooks.after(() => {
//  if (browserName != 'Safari') {
   if(mainScroller != null) console.log('updating scroller......'); updMainScroller();
//  }
 playIntro = false;
});

// lock the scroll to prevent further animations when transitioning
barba.hooks.before(() => {
//  if (browserName != 'Safari') {
   if(mainScroller) mainScroller.stop();
//  }
});


// reset scroll position and update the scroll when the next page is fetched
barba.hooks.enter(() => {

  // update page color palette
  updDynCssHtml();


  updMainScroller();
  //  if (browserName != 'Safari') {
    if(mainScroller != null) {
      mainScroller.scrollTo('top', {
        //  offset: 800,
        smooth: true,
        disableLerp: true,
        duration: 600
      });
    
    }
  //  }
});

// unlock the scroll, in order to let the user be able to scroll again
// barba.hooks.after(() => {
//   if(mainScroller) mainScroller.start();
//   // if(mainScroller) mainScroller.update();
//   // alert('barba.hooks.after...1');
// });




barba.init({
  debug: true,
  timeout: 15000,
  requestError: (trigger, action, url, response) => {
   debugger
   // go to a custom 404 page if the user click on a link that return a 404 response status
   if (action === 'click' && response.status && response.status === 404) {
       barba.go( '/404' );
   }
   // prevent Barba from redirecting the user to the requested URL
   // this is equivalent to e.preventDefault()
   return false;
 },
 cacheIgnore: false,
 prefetchIgnore: false,
  transitions: [
    {
      sync: false,
      name: "transition-1",
      async beforeEnter(data) {
        // console.log("Before Enter: ");

      },
      async once({ next }) {
          console.log("Once...");

          if( !curPgObj ) curPgObj = next;
  
        return animEnter(next.container);
      },
      async enter({ next }) {
          console.log('Enter...');

          if( !curPgObj ) curPgObj = next;

        // if (browserName != 'Safari' && mainScroller != null) {
           mainScroller.init();
        // }
        return animEnter(next.container);
      },
      async beforeLeave(data) {
          console.log('Before Leave...');
      },
      async afterLeave(data) {
          console.log('After Leave...');
          // if (browserName != 'Safari' && mainScroller != null) {
             mainScroller.destroy();
          // }
      },
      async leave({ current, next, trigger }) {

         current.container.style.position = 'absolute';
         current.container.style.top = 0;
         current.container.style.left = 0;
         current.container.style.width = '100%';

        console.log("Leaving...1");
        const done = this.async();
        await animLeave(current.container, done);

      },
      async after(data) {
        console.log("After...1");         
        // let parser = new DOMParser();
        // let htmlDoc = parser.parseFromString(
        //   data.next.html.replace(
        //     /(<\/?)body( .+?)?>/gi,
        //     "$1notbody$2>",
        //     data.next.html
        //   ),
        //   "text/html"
        // );
        // let bodyClasses = htmlDoc
        //   .querySelector("notbody")
        //   .getAttribute("class");
        // body.setAttribute("class", bodyClasses);

        // console.log("Body Classes: ", bodyClasses);
        // scripts.init();

         return;
      },
    },
  ],
  views: [
    {
      namespace: "home",
      beforeEnter() {},
      afterEnter() {},
    },
    {
      namespace: "work",
      beforeEnter() {
       initWorkPg();
      },
      afterEnter() {},
    },
    {
      namespace: "studio",
      beforeEnter() {
       //  console.log("Init before enter studio team slider...");
       },
       afterEnter() {
       // console.log("Init after enter studio team slider...");

      },
    },
    {
      namespace: "bio",
      beforeEnter() {          
      },
      afterEnter() {},
    },
    {
      namespace: "contact",
      beforeEnter() {},
      afterEnter() {},
    },
    {
      namespace: "showcase-work",
      beforeEnter() {
       console.log('Running script for showcasing work...');
      },
      afterEnter() {},
    },
    {
      namespace: "showcase-videos",
      beforeEnter() {
       console.log('Running script for showcasing video...');
      },
      afterEnter() {},
    },
  ],
});




///////////////// BARBA JS END ///////////////////////////////

// function to runBeforeEnterSetup()
function runBeforeEnterSetup() {
  switch(post_type) {
    case 'course': 
      // let src = $(".pg-content").attr('data-img-src');
      // console.log('SRC: ', src);
      // $("#mainApp .pgBg_top").css({ backgroundImage: `url(${ src })`  });
    break;
    default: 
    break;
}
}

});
//////////////// DOCUMENT READY END ///////////////////////////   