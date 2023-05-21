// console.log('SIANA main js is loaded!');

  let curPgName, prevPgName = '';
  let prevPgObj, curPgObj;
  let isMobileMenuOpen = false;
  let mobileMode = false;
  let browserName = "Unknown";
  let playedIntro = false; // just to know if intro was played when viewing this page
  let prev_pg_slug = ''; // variable to hold the previous page slug for checks and classes
  let post_type = '';
  let body_class = '';
  let isLeaving = false;
  let isEntering = false;

  let ScrollTriggerInstance = null;



  
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
({ categories, pg_slug, ajaxurl, nonce, tags, showreelVidLink, post_type, num_of_courses } = script_vars);


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






///////////////////// JAVASCRIPT EVENT LISTENERS //////////////////
document.addEventListener( 'DOMContentLoaded', () => {});

///////////////////// JAVASCRIPT EVENT LISTENERS END //////////////////




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


    // if (isLeaving) {          
    //   tl
    //   .fromTo(curPgObj.container, { duration: 6, display: 'block', opacity: 1 }, 
    //   { display: 'none', opacity: 0, ease: "power4.out" })
    //   ;
    // }
    // if (isEntering) {
    //   tl
    //   .fromTo(curPgObj.container, { duration: 6, display: 'none', opacity: 0 }, 
    //   { display: 'block', opacity: 1, ease: "power4.out" })
    //   ;
    // }



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
      case 'footerMenuEnter':

        tl
        .fromTo("#mainFooter span", { display: 'none', y: 200, opacity: 0 }, 
          { delay, duration: 2.2, y: 0, display: 'block', opacity: 1, ease: Expo.easeInOut, stagger: { amount: 0.8 } })
        ;
      break;
      case 'footerMenuLeave':
        tl
        .fromTo("#mainFooter span", { display: 'block', y: 0, opacity: 1 }, 
          { delay, duration: 2.2, y: 200, display: 'none', opacity: 0, ease: Expo.easeInOut, stagger: { amount: 0.8 } })
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
          { duration: 1.4, y: 0, opacity: 1, stagger: { amount: 0.4 }, onComplete: () => {
            if(mainScroller) updMainScroller();
          } }, "-=3.5" )
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
      case 'coursesPageEnter':
        tl
        .fromTo(".courses .courseItm", { y: 200, opacity: 0 }, 
          { duration: 1, opacity: 1, y: 0, stagger: { amount: 2 } } )
        // .fromTo(".courses .coursesPgSection", { y: 200, opacity: 0, display: "none" }, 
        //   { duration: 2.4, opacity: 1, y: 0, display: "block" }, "-=2" )
        ;
      break;
      case 'coursesPageLeave':
        tl
        .fromTo(".courses .courseItm", { y: 0, opacity: 1 }, 
        { duration: 1, opacity: 0, y: 200, stagger: { amount: 3 } } )
        // .fromTo(".courses .coursesPgSection", { y: 0, opacity: 1, display: "block" }, 
        //   { duration: 2.4, opacity: 0, display: "none", y: 100 } )      
        ;
      break;
      case 'coursePageEnter':

         tl
        .fromTo(".single-course .pg-content .top_section .course_title .txt1 .bx span", { y: 200  }, 
          { delay, duration: 1, y: 0, ease: "power4.out", stagger: { amount: 0.4 } })
        .fromTo(".single-course .pg-content .top_section .course_title .super_txt1", { opacity: 0  }, 
          { duration: 2, opacity: 1, ease: "power4.out" }, "-=1")
        .fromTo(".single-course .pg-content .top_section .course_title .super_txt1 span", { x: 100  }, 
          { duration: 1, x: 0, ease: "power4.out", stagger: { amount: 0.2 } }, "-=2");

        
        const tl1 = gsap.timeline( { scrollTrigger: {
          trigger: ".single-course .pg-content .top_section .course_desc_img .desc",
          scroller: '[data-scroll-container]',
        }});        
        tl1
        .fromTo(".single-course .pg-content .top_section .course_desc_img .desc", { y: 200, opacity: 0 }, 
          { duration: 2.5, y: 0, opacity: 1, ease: "power4.out" })
        .fromTo(".single-course .pg-content .top_section .course_desc_img .img img", { y: 200, opacity: 0, scale: 2 }, 
        { duration: 2.5, y: 0, opacity: 1, scale: 1, ease: "power4.out" }, "-=2.0");

        // const tl2 = gsap.timeline({ scrollTrigger: {
        //   trigger: ".single-course .pg-content .top_section .course_desc_img .img img",
        //   scroller: '[data-scroll-container]',
        // }});
        // tl2        



        const tl2 = gsap.timeline( { scrollTrigger: {
          trigger: ".single-course .pg-content .course_syllabus .heading .txt1",
          scroller: '[data-scroll-container]',
        } } );
        tl2
        .fromTo(".single-course .pg-content .course_syllabus .heading .txt1 span", { y: 100, opacity: 0 }, 
          { duration: 1, y: 0, opacity: 1, ease: "power4.out" })
        .fromTo(".single-course .pg-content .course_syllabus .heading .txt2", { x: -50, opacity: 0 }, 
          { duration: 1, x: 0, opacity: 1, ease: "power4.out" }, "-=0.5")
        .fromTo(".single-course .pg-content .body .content .item span", { y: 100 }, 
        { duration: 1, y: 0, ease: "power4.out", stagger: { amount: 0.8 } }, "-=0.8")
        .fromTo(".single-course .pg-content .body .content .itemNo span", { x: 10, opacity: 0 }, 
        { duration: 1, x: 0, opacity: 1, ease: "power4.out", stagger: { amount: 0.6 } } )
        ;   


        const tl3 = gsap.timeline( { scrollTrigger: {
          trigger: ".single-course .pg-content .pg_footer .heading1 span",
          scroller: '[data-scroll-container]',
        } } );
        tl3
        .fromTo(".single-course .pg-content .pg_footer .heading1 span", { y: 100, opacity: 0 }, 
          { duration: 1.5, y: 0, opacity: 1, ease: "power4.out" })
        .fromTo(".single-course .pg-content .pg_footer a", { y: 100, opacity: 0 }, 
          { duration: 1.5, y: 0, opacity: 1, ease: "power4.out", stagger: { amount: 0.4 } }, '-=1.5')      
        ;    
        
        // console.log('Played course page enter animation!');
        
      break;
      case 'coursePageLeave':

        tl
        .fromTo(".single-course .pg-content .top_section .course_title .txt1 .bx span", { y: 0,  }, 
          { duration: 1.4, y: 200, ease: "power4.out", stagger: { amount: 0.2 } })
        .fromTo(".single-course .pg-content .top_section .course_title .super_txt1", { opacity: 1  }, 
          { duration: 2, opacity: 0, ease: "power4.out" }, "-=1")
        .fromTo(".single-course .pg-content .top_section .course_title .super_txt1 span", { x: 0  }, 
          { duration: 1, x: 100, ease: "power4.out", stagger: { amount: 0.2 } }, "-=2")
        // .fromTo(".single-course .pg-content .top_section .course_desc_img .desc", { y: 0, opacity: 1 }, 
        // { duration: 2.5, y: 200, opacity: 0, ease: "power4.out" })
        // .fromTo(".single-course .pg-content .top_section .course_desc_img .img img", { y: 0, opacity: 1, scale: 1 }, 
        // { duration: 2.5, y: 200, opacity: 0, scale: 2, ease: "power4.out" }, "-=2.0");
        .fromTo(curPgObj.container, { duration: 2, opacity: 1 }, 
          { opacity: 0, ease: "power4.out" }, "-=3")
        ;  
        
        // console.log('Played course page leave animation!');
        
      break;
      default:
        if (isLeaving) {          
          tl
          .fromTo(curPgObj.container, { duration: 2, opacity: 1 }, 
          { opacity: 0, ease: "power4.out" })
          ;
        }
        if (isEntering) {
          tl
          .fromTo(curPgObj.container, { duration: 4, opacity: 0 }, 
          { opacity: 1, ease: "power4.out" })
          ;
        }
      break;
    }

  }
  /////// ANIMATION LIBRARY END ////////




///  playIntro or playPgEnterAnim
if(playIntro) {
  playedIntro = true;
  playIntroAnim();
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

  // console.log('Updating background colors...');

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

    console.log('Updating page theme colors...', fgcolor, bgcolor);


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




    #mainFooter { color: ${ fgcolor };  }
    #mainFooter .footerNull { }
    #mainFooter .footerNull ._left { }
    #mainFooter .footerNull ._center { }
    #mainFooter .footerNull ._right {  }
    #mainFooter .footerNull ._right a {
      color: ${ fgClr1 }; 
     }
    #mainFooter .footerNull ._right a:hover {
      color: ${ fgClr2 };
     }

     #mainFooter .footerNull ._right a.sicons { }
     #mainFooter .footerNull ._right a.sicons svg {
      fill: ${ fgClr1 }; 
     }
     #mainFooter .footerNull ._right a.sicons:hover svg {
      fill: ${ fgClr2 };
     }



    `;
    dynCss += v;



    switch(curPgName) {
      case 'home':
        break;
      default:
        break;
    }


    

    if (document.body.classList.contains( 'single-course' )) {

      console.log('We on a single course post page... ');

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
          color: ${ fgClr3 };
        }
        .single-course .course_syllabus .body .content { }
        .single-course .course_syllabus .body .content .item { 
          border-bottom: 0.5px solid ${ fgClr3 };
          color: ${ fgClr2 };
        }



        .single-course .course_syllabus .body .content .itemNo span { 
          color: ${ fgClr2 };
        }
        .single-course .course_syllabus .body .content .item { 
          border-bottom: 0.5px solid ${ fgClr3 };
          color: ${ fgClr2 };
        }
        .single-course .course_syllabus .body .content .item .heading1 { 
          border-bottom: 0.5px solid ${ fgClr3 };
        }
    
        .single-course .course_syllabus .body .content .item .body .sub-item { 
          border-bottom: 0.5px solid ${ fgClr3 };
          color: ${fgcolor};
        }
        .single-course .course_syllabus .body .content .item .heading1 button svg { 
          fill: ${ fgClr3 };
        }
        .single-course .course_syllabus .body .content .item .heading1:hover button svg { 
          fill: ${ fgClr2 };
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
    
  // each time the window updates, we should refresh ScrollTrigger and then update LocomotiveScroll. 
  ScrollTrigger.addEventListener('refresh', () => mainScroller.update());
  // after everything is set up, refresh() ScrollTrigger and update LocomotiveScroll because padding may have been added for pinning, etc.
  ScrollTrigger.refresh();



    
  mainScroller.on('scroll', () => {
    try {

      ScrollTrigger.update;
      // console.log('Mainscroller scrolling...', ScrollTrigger);
      // console.log('ScrollTrigger updated!');
    } catch(err) {
      // console.log('ScrollTrigger update error...', err);
    }
  });
    
    ScrollTrigger.scrollerProxy(
      '[data-scroll-container]', {
          scrollTop(value) {
              return arguments.length ?
              mainScroller.scrollTo(value, 0, 0) :
              mainScroller.scroll.instance.scroll.y
          },
          getBoundingClientRect() {
              return {
                  left: 0, top: 0, 
                  width: window.innerWidth,
                  // height: mainScroller.el.clientHeight
                  height: window.innerHeight
              }
          },
          pinType: document.querySelector('[data-scroll-container]').style.transform ? "transform" : "fixed"
      }
    );
// }

ScrollTrigger.defaults({ toggleActions: "play complete none none", 
start: "top 80%"
// end: "100% center" 
});



const updMainScroller = () => {
  // if (browserName != 'Safari') {    
    setTimeout(() => {   
      if(mainScroller != null) {
        console.log('Window Height: ', window.innerHeight);
        mainScroller.update();     
        ScrollTrigger.refresh(); 
        // mainScroller.start();
        // console.log('Scroll Trigger & mainScroller refreshed...', ScrollTrigger);
  
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
      animLibrary( 'footerMenuEnter');  
    break;
    default: 
      animLibrary( 'headerMenuEnter' , -2 );  
      animLibrary( 'footerMenuEnter' );  
    break;
  }

}


// leave
function playGeneralLeaveAnim() {

  switch(post_type) {
    case 'course':
      animLibrary( 'headerMenuLeaveCourse');  
      animLibrary( 'footerMenuLeave' );  
    break;
    default: 
      animLibrary( 'headerMenuLeave');  
      animLibrary( 'footerMenuLeave' );  
    break;
  }
  
}
////////////////// GENERAL ANIMATIONS END ////////////////////



//////////////// ANIM ENTER //////////////////////////// 

const animEnter = (container) => {
  isEntering = true;

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
  let delay = 4;

  playGeneralEnterAnim();

  // check if post type is course and let's play a single animEnter animation type for all course post types
  console.log('PlayedIntro: ', playedIntro);
  if (post_type == 'course') animNameSpace = "coursePageEnter"; delay = (playedIntro) ? 5.2 : 2;

  animLibrary( animNameSpace, delay);  

  // console.log('Animation Enter: ', animNameSpace);


  // tl8.fromTo( container, { opacity: 0, display: 'none', y: 200 },
  //   { duration: 1, opacity: 1, display: 'table', y: 0, ease: "power4.out" }
  // );


  if(pg_slug == '' || pg_slug == 'home') {
    console.log('PLaying home enter animation...');
  }


  return new Promise((resolve, reject) => {
      setTimeout(() => {
          console.log("Anim Enter 2...");
          isEntering = false;
          playedIntro = false;
          resolve();
      }, 2500);	
  });

};

//////////////// ANIM ENTER END ////////////////////////////



//////////////// ANIM LEAVE ////////////////////////////
const animLeave = (container, done) => {

  isLeaving = true;

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

    // check if post type is course and let's play a single animLeave animation type for all course post types
    if (post_type == 'course') animNameSpace = "coursePageLeave";

    animLibrary(animNameSpace);
    playGeneralLeaveAnim(); 




    // tl7.fromTo( container, { opacity: 1, display: 'table', y: 0 },
    //   { duration: 1, opacity: 0, display: 'none', y: 200, ease: "power4.out" }
    // );  
  
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            // console.log("Anim Leave 2...");
            isLeaving = false;
            playedIntro = false;
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



// function to setup event listeners
function setupEventListeners() {
    // let body_classes = document.body.getAttribute( 'class' );
    
    if (document.body.classList.contains( 'single-course' )) {
      let tl9 = gsap.timeline();
      let single_course_item_set_height = (dw < 960) ? 40 : 60;
      let single_course_heads = document.querySelectorAll( '.single-course .course_syllabus .body .content .item .heading1');
      let single_course_body_open = false;

      single_course_heads.forEach(function(single_course_head) {

        // set height
        // let sub_itms_uid = parseInt( single_course_head.getAttribute('uid') );
        // let sub_itms_no = parseInt( single_course_head.getAttribute('sub-item-no') );
        // let new_single_course_body_height = sub_itms_no * 40;
        // let single_course_body_el = single_course_head.parentNode.querySelector( '.body' );
        // single_course_body_el.style.height = new_single_course_body_height + 'px';

        // console.log( '...', single_course_body_el );
        
        single_course_head.addEventListener( 'click', function() {

        let sub_itms_no = parseInt( this.getAttribute('sub-item-no') );
        let new_single_course_body_height = sub_itms_no * single_course_item_set_height;

        let sub_itms_uid = single_course_head.getAttribute('uid');
        let single_course_body_el = this.parentNode.querySelector( '.body' );
        let single_course_body_btn_el = single_course_head.querySelector( 'button' );

        // capture click events on .single-course .course_syllabus .body .content .item .heading1   
        single_course_body_open = !single_course_body_open;
        
        if(single_course_body_open) {
          // this.classList.add( 'accordion-is-open' );
          tl9
          .to(single_course_body_btn_el, { duration: 1, rotation: 180, ease: 'power4.out' } )
          .to(single_course_body_el, { duration: 1, display: 'block', opacity: 1, height: new_single_course_body_height, ease: 'power4.out', onComplete: () => { 
            if(mainScroller != null) updMainScroller();
          } }, '-=1');
        } else {
          // this.classList.remove( 'accordion-is-open' );
          tl9
          .to(single_course_body_btn_el, { duration: 1, rotation: 0, ease: 'power4.out' } )
          .to(single_course_body_el, { duration: 1, display: 'none', opacity: 0, height: 0, ease: 'power4.out', onComplete: () => { 
            if(mainScroller != null) updMainScroller();
          } }, '-=1');
        }
      
        
        });

      });
    }
    
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

  let initSlideInd = 0;

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


// init sidebar swiper
  const sideBarSwiper = new Swiper('.sideBarSwiper', {
    // Optional parameters
    // height: 100,
    direction: 'vertical',
    slideToClickedSlide: true,
    updateOnWindowResize: true,
    grabCursor: true,
    centeredSlides: true,
    // centeredSlidesBounds: true,
    initialSlide: 0,
    speed: 400,
    // loop: true,   
    slidesPerView: 8.5,
    spaceBetween: 4,
    // mousewheelControl: true,     
    freeMode: true,
    mousewheel: {
      forceToAxis: true,
      sensitivity: 1,
      releaseOnEdges: true,
    },
    // mousewheel: true,
  
    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  
    // And if we need scrollbar
    // scrollbar: {
    //   el: '.swiper-scrollbar',
    // },

    on: {
      click: function (swpr, ev) {
        // console.log('Side thumb clicked: ', ev);
        setTimeout(() => {         
          // slideMainSlideToActiveSlide();     
          scrollHighlighterToActiveSlide(swpr);
        }, 500);
      },
        slideChange: function () { },
        slideChangeTransitionEnd: function() {},
        transitionEnd: function(swpr) {
          // slideMainSlideToActiveSlide()
          scrollHighlighterToActiveSlide(swpr);
      },
        scrollbarDragEnd: function(swpr, ev) {
          // slideMainSlideToActiveSlide();
          scrollHighlighterToActiveSlide(swpr);
      }, 
      scroll: function(swpr, ev) {
        // console.log('Mouse Scroll: ', ev);
        $(".ocbsa-works #ocbSingleWorkSwiperSideBar ._highlighter").css({ opacity: 0.2 });
        if(mouseSideBarScrollTimeout1) clearTimeout(mouseSideBarScrollTimeout1);

        mouseSideBarScrollTimeout1 = setTimeout(() => {
          // slideMainSlideToActiveSlide();
          scrollHighlighterToActiveSlide(swpr);
          $(".ocbsa-works #ocbSingleWorkSwiperSideBar ._highlighter").css({ opacity: 1 });
          clearTimeout(mouseSideBarScrollTimeout1);
        }, 400);

      },  
    },

  });



// function to initialise all the scripts for apply now page
function initApplyNow() { 
  let first_name, last_name, date_of_birth_val, gender_val, email_val, id_num, phone_num, addr1, addr2, city_val, state_province_val, postal_code_val, student_address;

  let errors = {};
  let error_keys = [];

  let application_step = 0;
  
  const apply_screens = document.querySelectorAll('.form_screen');
  const apply_status_screen = document.querySelector('.applicationForm .status_screen');
  const apply_form_header = document.querySelector('.applicationForm .form_header');

  const apply_form_select_course_label = document.getElementById('select-study-courses-title');
  const apply_form_select_course_title = apply_form_select_course_label.textContent;

  let selected_country = 'South Africa';
  let selected_courses = [];
  let prev_selected_courses = [];
  let selected_prices = [];
  let is_selecting_course = false;
  let  = '';

  let local_store_student_info = '';

  let all_error_bxs = document.querySelectorAll('.form-errors');
  let gen_status_bx = document.querySelector('.form-errors.form-status');

  // function to clear errors
  const clear_all_errors = () => {
    all_error_bxs.forEach((v, i) => {
      v.textContent = '';
      v.style.cssText = "display: none";
    });

    errors = {};
  }

  // function to get sum of values in an array
  const get_sum = (arr_of_vals) => arr_of_vals.reduce((prev, cur) => prev + cur, 0);

  let delay2 = 2000;

  let promiseDelayTime1 = 2000;
  const promiseDelay1 = new Promise((resolve, reject) => {
    setTimeout(() => {
      resolve();
    }, promiseDelayTime1);

  });

  const select_study_courses_el = document.getElementById('select-study-courses');
  const select_study_courses = new lc_select(select_study_courses_el, {
    wrap_width: '100%',
    enable_search : true,
    addit_classes : ['lcslt-light'],
    // min_for_search: 3,
    pre_placeh_opt: true,  
    on_change: function (new_val, target_field) {
      

      // lcslt-multi-selected
      const all_selected_trigger_btns = document.querySelectorAll('.student-courses .lcslt-multi-selected');
      const all_selected_trigger_btn_els = [].slice.call(all_selected_trigger_btns);
      const all_dd_opts_btns = document.querySelectorAll('.lcslt-dd-opt');
      let all_sel_dd_opts_btns = document.querySelectorAll('.lcslt-dd-opt.lcslt-selected');      

      const total_packages = 9;
      
      // console.log('Prev courses: ', prev_selected_courses);
      // console.log('New & Prev Courses: ', new_val, prev_selected_courses);


      const showFullPackageOnly = () => {
        all_sel_dd_opts_btns = document.querySelectorAll('.lcslt-dd-opt.lcslt-selected');

        if(all_sel_dd_opts_btns.length <= 1) return;

        // deselect all selected
        all_sel_dd_opts_btns.forEach((v, i) => { 
          if (v.getAttribute('data-val') != 'full-package-r22000') {
            v.click();
          }
        });     
       
        // select the first one   
        if (all_dd_opts_btns) all_dd_opts_btns[0].click();

        new_val = [];
        new_val.push('full-package-r22000');

        prev_selected_courses = [];
      }

      const sel_itm = (new_val.length > prev_selected_courses.length) ? new_val.filter((v) => !prev_selected_courses.includes(v)) : prev_selected_courses.filter((v) => !new_val.includes(v));

      if(sel_itm.includes( 'full-package-r22000' ) && new_val.includes( 'full-package-r22000' )) {
        // show only full package if not already added

        showFullPackageOnly();


      } else {
        all_sel_dd_opts_btns = document.querySelectorAll('.lcslt-dd-opt.lcslt-selected');
        // if all other package except full package has been selected then select full package
        if( (total_packages - 1) == all_sel_dd_opts_btns.length && !all_dd_opts_btns[0].classList.contains('lcslt-selected')) {
          // console.log('show full package course & deselect others...');
          showFullPackageOnly();
        } else {
          // deselect full package if selected
          if(all_dd_opts_btns[0] && new_val.includes( 'full-package-r22000' ) && prev_selected_courses.length != 0) {

            if( all_dd_opts_btns[0].classList.contains('lcslt-selected') ) {
              all_dd_opts_btns[0].click();
              // console.log('deselect full package clicked!', new_val, prev_selected_courses);
            }
            
          }          

          // remove 'full-package-r22000' from new_val
          let ind = new_val.indexOf('full-package-r22000');
          if ( ind > -1 ) {
            new_val.splice(ind, 1);
            // console.log('new_val: ', new_val, ind);
          }

        }

        

      }

      
      

      selected_courses = [];
      selected_prices = [];

      // console.log('New val 2: ', new_val);
      new_val.forEach((v, i) => {

        let arr = v.split('-');
        let price_str = arr[arr.length - 1];
        price_str = price_str.substring(1);
        arr.pop();
        let course_str = arr.join(' ');

        selected_courses.push(course_str);
        selected_prices.push(parseInt(price_str));

      });


      if (selected_courses.length > 0) {

        let total = get_sum(selected_prices);
        let courses_txt = (selected_courses.length > 1) ? 'courses' : 'course';

        // console.log(selected_courses, selected_prices);

        if( selected_courses.length == 1 && selected_courses[0] == 'full package') {
           // custom text for full package
           apply_form_select_course_label.textContent = `Full courses package selected!. Your total fees: R${ total } (You're saving R8300)`;
        } else {
          apply_form_select_course_label.textContent = `You've selected ${ selected_courses.length } ${ courses_txt }. Your total fees: R${ total }`;
        }

        // console.log(apply_form_select_course_label.textContent);

      } else {
        apply_form_select_course_label.textContent = apply_form_select_course_title;
      }


      // set previously selected courses
      prev_selected_courses = [ ...new_val ];


    }  
  });

  const select_study_country_el = document.getElementById('select-study-country');
  const select_study_country = new lc_select(select_study_country_el, {
    wrap_width: '100%',
    enable_search : false,
    pre_placeh_opt: true,
    max_opts : 1,
    on_change: function (new_val, target_field)  { 
      // console.log('Selected Country: ', new_val);
      selected_country = new_val[0];
    }
  });


  const date_of_birth = datepicker('#date-of-birth');

    // new lc_select('select[name="multiple"]', {
    //     wrap_width : '100%',
    //     enable_search : false,
    //     max_opts : 2,
    // });

  
  // function to show apply status screen
  function show_apply_status_screen () {
    gsap.fromTo(apply_status_screen, { display: 'none', opacity: 0 }, 
    { duration: 1, ease: 'power4.out', display: 'block', opacity: 1, onComplete: () => {
      if(mainScroller) updMainScroller();
    } });
  }
  // function to hide apply status screen
  function hide_apply_status_screen () {
    gsap.fromTo(apply_status_screen, { display: 'block', opacity: 1 }, 
      { duration: 1, ease: 'power4.out', display: 'none', opacity: 0 });
  }

  // function to scroll to form element '.applicationForm' is default
  function scroll_to_form_el(el='.applicationForm') {
    if(mainScroller) {
      updMainScroller();
      setTimeout(() => {
        mainScroller.scrollTo(`${ el }`, {
          offset: -200,
          smooth: true,
          disableLerp: true,
          duration: 600
        });
      }, 500);
    }
  }


  // function to set the application step leve
  async function setApplicationStep(step = -1) {
    step = ( step > 2 ) ? 2 : ( step < 0 ) ? 0 : step;
 
    // check if we got previous student date in local storage
    local_store_student_info = window.localStorage.getItem('studentRegInfo');

    // if student info is available let's set appropriate application screen either way
    if(!local_store_student_info && step < 0) {
      step = 0;
    } else {
      // parse json studentRegInfo
      studentRegInfo = JSON.parse(local_store_student_info);
      // console.log('Stored student Info: ', studentRegInfo);
      // extract info
    }


    
    show_apply_status_screen();

    setTimeout(() => {          
      apply_form_header.classList.remove('step-1__active');
      apply_form_header.classList.remove('step-2__active');
      apply_form_header.classList.remove('step-3__active');  
      apply_screens[0].style.cssText = `display: none`;
      apply_screens[1].style.cssText = `display: none`;
      apply_screens[2].style.cssText = `display: none`;

      apply_form_header.classList.add(`step-${ step + 1 }__active`); 
      apply_screens[step].style.cssText = `display: block`;
  
      hide_apply_status_screen();


    }, delay2);


  }

  // application_step = 2;
  setApplicationStep(0);



  //////////// Application form  Validation //////////////
  // Form elements
  const fname = document.getElementById('first-name');
  const lname = document.getElementById('last-name');
  const dob = document.getElementById('date-of-birth');
  let gender;
  // document.querySelector('input[name="genderS"]:checked')?.value

  // selected_courses;
  // selected_prices;

  // ;

  const email = document.getElementById('email');
  const id_number = document.getElementById('id-number');
  const phone_number = document.getElementById('phone-number');
  const address_line_1 = document.getElementById('address-line-1');
  const address_line_2 = document.getElementById('address-line-2');
  const city = document.getElementById('city');
  const state_province = document.getElementById('state-province-region');
  const postal_code = document.getElementById('postal-code');
  const submit_btn = document.getElementById('submit-application');



  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;


  /// View Info Elements
  const view_fname = document.getElementById('view-student-info__first-name');
  const view_lname = document.getElementById('view-student-info__last-name');
  const view_dob = document.getElementById('view-student-info__dob');
  const view_gender = document.getElementById('view-student-info__gender');
  const view_selected_courses = document.getElementById('view-student-info__selected-courses');
  const view_fees = document.getElementById('view-student-info__fees');
  const view_email = document.getElementById('view-student-info__email');
  const view_id_number = document.getElementById('view-student-info__id-number');
  const view_phone_number = document.getElementById('view-student-info__phone-number');
  const view_address = document.getElementById('view-student-info__address');

  

  //// Step 2 buttons
  const confirm_n_pay_btn = document.getElementById('confirm_n_pay_btn');
  const go_back_to_apply_form_btn = document.getElementById('go_back_to_apply_form_btn');
  const not_me_reset_apply_form_btn = document.getElementById('not_me_reset_apply_form_btn');


  /// function to reset form
  function reset_form() {

    // clear all fields
    fname.value = '';
    lname.value = '';
    dob.value = '';
    document.querySelector('.student-gender input[name="gender"]:checked').checked = false;  
    email.value = '';
    id_number.value = '';
    phone_number.value = '';
    address_line_1.value = '';
    address_line_2.value = '';
    city.value = '';
    state_province.value = '';
    postal_code.value = '';

    // deselect all previously selected courses lcslt-dd-opt lcslt-selected
    let sel_dd_el = document.getElementById('select-study-courses');
    let sel_dd_options = sel_dd_el.selectedOptions;
    

    // console.log('Selected: ', sel_dd_el.selectedOptions, sel_dd_el );

    // deselect all selected
    if(sel_dd_options.length > 0) {
      [...sel_dd_options].forEach((v, i) => {
        v.selected = false;
      });   

    // clear lc_selected contents
    const resyncEvent = new Event('lc-select-refresh');
    sel_dd_el.dispatchEvent(resyncEvent);

    // reset select label content
    apply_form_select_course_label.textContent = apply_form_select_course_title;

    }


    selected_courses = [];
    selected_prices = [];
    selected_country = [];

    scroll_to_form_el();
    // show processing box
    show_apply_status_screen ();
    // promiseDelayTime1
    promiseDelay1.then(() => {
      setApplicationStep(0);
    });
  }


  // ajax call to submit form data
  
  const submit_form_data = ( student_data ) => {
    return new Promise (async (resolve, reject) => {

      let result = {};
      // console.log('Ajaxurl: ', ajaxurl, student_data);
      await $.ajax({
          url: ajaxurl, // domain/wp-admin/admin-ajax.php
          // url: "/siana/wp-admin/admin-ajax.php",
          async: true,
          dataType : "json",      
          type: "POST",              
          data: student_data,
          success:function( response ) {
            // success
            if (response.success) {
  
              // console.log('Form successfully submitted! ' );            
              if( response.data && typeof(response.data) === 'object' && response.data !== null && !Array.isArray(response.data)) {
                result = JSON.parse(response?.data)
              } else if( response.data && typeof(response.data) === 'string') {
                result = response;
              }
  
              // console.log('Form successfully submitted! ', result ); 
  
            } else {
              // fail
              // console.log('Form submission failed! ', response );
  
              result = { success: false};
              reject(result);
            }
          },
          error: function( error ){
            console.log('SERVER ERROR: ', error );
            result = { success: false, message: 'Server Error'};
            reject(result);
          }
      });
  
  
      console.log('Submitted data!');
      resolve(result);

    });
    
    // .done( function( response ) { // response from the PHP action
    //     console.log('Form successfully submitted...! ', response );
    // })
    
    // // something went wrong  
    // .fail( function( error ) {
    //   console.log('SERVER ERROR... : ', error );                 
    // })

    // // after all this time?
    // .always( function() {
    //     event.target.reset();
    // });
  }


  confirm_n_pay_btn.addEventListener('click', async () => {

    scroll_to_form_el();
    // show processing box
    show_apply_status_screen ();

    // JSONfy user info
    let student_info = { 
      action: 'submit_apply_form',
      first_name, 
      last_name, 
      date_of_birth: date_of_birth_val, 
      selected_courses: selected_courses.join(),
      fees: get_sum(selected_prices),
      email: email_val,
      id_number: id_num,
      phone_number: phone_num,
      address: student_address,
      nonce
    }    

    // store in localstorage
    window.localStorage.setItem('studentRegInfo', JSON.stringify(student_info));

    // promiseDelayTime1
    // promiseDelay1.then(() => {
    //   setApplicationStep(2); 
    // });


    
    // submit student info to server Stored student Info
    // const application_results = await Promise.allSettled([
      
    // ]);


    submit_form_data( student_info ).then( async (form_submit_results) => {
      // console.log('Form Submit result: ', form_submit_results);  
      
      // promiseDelayTime1
      setApplicationStep(2);
      // console.log('Now completing payment...');
      // promiseDelay1.then(() => {
      // });

      const payment_result = await complete_payment();

      // console.log('Submit Form result: ', form_submit_results);

      if (payment_result.data) {
        let ozow_pay = JSON.parse(payment_result.data);

        // console.log('Ozow Pay Credientials: ', ozow_pay);

        // {
        //   "paymentRequestId": "550bed2c-2437-48ec-a5cb-aded47d42b01",
        //   "url": "https://pay.ozow.com/550bed2c-2437-48ec-a5cb-aded47d42b01/Secure",
        //   "errorMessage": null
        // }

        window.setTimeout(function() {			
				url = ozow_pay.result.url;
				location.href=url;
			  }, 6000);

      }

    });
      



    // const [ form_submit_results, payment_results ] = application_results;


    // do something with form_submit_results

    // do something with payment_results
    
    // show payment page for user to complete payment

    


  });


  go_back_to_apply_form_btn.addEventListener('click', () => {
    scroll_to_form_el();
    // show processing box
    show_apply_status_screen ();
    // promiseDelayTime1
    promiseDelayTime1 = 2500;
    promiseDelay1.then(() => {
      setApplicationStep(0);
    });
  });
  not_me_reset_apply_form_btn.addEventListener('click', () => {
    reset_form();
    clear_all_errors();
  });



  // function for student to complete payment
  const complete_payment = async () => {
      let result = {};
  
      await $.ajax({
        url: ajaxurl, 
        async: true,
        dataType : "json",      
        type: "POST",              
        data: {
          action: 'ozow_pay',
          first_name, 
          last_name, 
          date_of_birth: date_of_birth_val, 
          selected_courses: selected_courses.join(),
          fees: get_sum(selected_prices),
          email: email_val,
          id_number: id_num,
          phone_number: phone_num,
          address: student_address,
          nonce
        },
  
        success:function( response ) {
          // success
          if (response.success) {
  
            // console.log('Payment process started! ', response );            
            if( response.data && typeof(response.data) === 'object' && response.data !== null && !Array.isArray(response.data)) {
              result = JSON.parse(response?.data)
            } else if( response.data && typeof(response.data) === 'string') {
              result = response;
            }
  
          } else {
            // fail
            // console.log('Payment process aborted! ', response );
  
            result = { success: false};
            // reject(result);
          }
        },
        error: function( error ){
          console.log('SERVER ERROR: ', error );
          result = { success: false, message: 'Server Error'};
          // reject(result);
        }
    });
  
      return result;
  }

  



  let error_bx = {
    fname: document.querySelector('.student-names-errors'),
    lname: document.querySelector('.student-names-errors'),
    dob: document.querySelector('.dob-errors'),
    gender: document.querySelector('.student-gender-errors'), 
    student_courses: document.querySelector('.student-courses-errors'),
    email: document.querySelector('.student-email-errors'),
    id_number: document.querySelector('.student-id-num-errors'),
    phone_number: document.querySelector('.student-phone-num-errors'),
    city: document.querySelector('.student-address-errors'),
    state: document.querySelector('.student-address-errors'),
   };



  /// submit application form ///////
  submit_btn.addEventListener('click', (e) => {   

    // clear all previous errors
    clear_all_errors();

    // check validation

    // check fname
    if(fname.value.trim() != '') {
      first_name = fname.value.trim();
    } else {
      errors.fname = "Enter your first name";
    }
    // check lname
    if(lname.value.trim() != '') {
      last_name = lname.value.trim();
    } else {
      errors.lname = "Enter your last name";
    }

    // check dob
    if(dob.value.trim() != '') {
      date_of_birth_val = dob.value.trim();
    } else {
      errors.dob = "Enter your date of birth";
    }

    // check gender
    gender = document.querySelector('.student-gender input[name="gender"]:checked');
    // console.log('gender: ', gender.value);
    if(gender) {
      gender_val = gender.value;
    } else {
      errors.gender = "Select an option for your gender";
    }


    // check selected courses
    if ( selected_courses.length == 0 ) {
      errors.student_courses = "Please select the Beauty course(s) you'll like to study";
    }




    // check email
    if(email.value.trim() != '') {
      if(!emailRegex.test(email.value.trim())) {
        errors.email = "Seems your email is invalid. Please enter a valid email";
      } else {
        email_val = email.value.trim();
      }      
    } else {
      errors.email = "Enter your email";
    }


    // check id_number
    if(id_number.value.trim() != '') {
      id_num = id_number.value.trim();
    } else {
      errors.id_number = "Enter your ID Number";
    }
    // check phone_number
    if(phone_number.value.trim() != '') {
      phone_num = phone_number.value.trim();
    } else {
      errors.phone_number = "Enter your Phone Number";
    }
    // check address_line_1
    if(address_line_1.value.trim() != '') {
      addr1 = address_line_1.value.trim();
    } 
    // check address_line_2
    if(address_line_2.value.trim() != '') {
      addr2 = address_line_2.value.trim();
    } 
    // check city
    if(city.value.trim() != '') {
      city_val = city.value.trim();
    } else {
      errors.city= "Enter your city";
    }
    // check state_province
    if(state_province.value.trim() != '') {
      state_province_val = state_province.value.trim();
    } else {
      errors.state = "Enter your state / province / region";
    }
    // check postal_code
    if(postal_code.value.trim() != '') {
      postal_code_val = postal_code.value.trim();
    } 

    student_address = `${ addr1 }, ${ addr2 }, ${ city_val }, ${ (postal_code_val) ? postal_code_val + ',' : '' } ${ state_province_val }, ${ selected_country }`;





    // check for errors and show it
    error_keys = Object.keys(errors);
    if( error_keys.length > 0) {

      // error_bx

      // clear all previous errors
      // clear_all_errors();

      // show general form status box
      gen_status_bx.textContent = "There are errors in your form submission. Please update the fields with errors.";
      gen_status_bx.style.cssText = "display: block";

      
      error_keys.forEach((v, i) => {
        error_bx[v].textContent += (error_bx[v].textContent == '') ? errors[v] : `.  ${ errors[v] }`;
        error_bx[v].style.cssText = "display: block";
      });

      scroll_to_form_el('.form-errors.form-status');

      return;
    }


    //////// Everything is ok change screen to view info summary and confirm payment
    scroll_to_form_el();
    // show processing box
    show_apply_status_screen ();
    // promiseDelayTime1
    promiseDelay1.then(() => {

      view_fname.textContent = first_name;
      view_lname.textContent = last_name;
      view_dob.textContent = date_of_birth_val;
      view_gender.textContent = gender_val;
      view_selected_courses.textContent = selected_courses.join(', ');
      view_fees.textContent = "R " + get_sum(selected_prices);
      view_email.textContent = email_val;
      view_id_number.textContent = id_num;
      view_phone_number.textContent = phone_num;
      view_address.textContent = student_address;

      setApplicationStep(1);
    });
    

  });

  //////////// Application form  Validation Ends //////////////

  
} // end of initApply




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

  // setup event listeners for this page
  setupEventListeners();

  // update page color palette
  updDynCssHtml();

  // scrolltrigger
  // create instance each time you enter the page
  // ScrollTriggerInstance = ScrollTrigger.create({
  //   animation: timeline,
  //   trigger: element,
  //   start: 'center 75%',
  //   markers: true
  // });

  // let postTitle = curPgObj.container.querySelector(".pg-content").getAttribute("post-title");
  // console.log('Post title: ', postTitle);


});

// update the scroll after entering a page
barba.hooks.after(() => {
//  if (browserName != 'Safari') {
   if(mainScroller != null) updMainScroller();
//  }
 playIntro = false;
});

// lock the scroll to prevent further animations when transitioning
barba.hooks.before(() => {
  // updDynCssHtml();
//  if (browserName != 'Safari') {
   if(mainScroller) mainScroller.stop();
//  }
});


// reset scroll position and update the scroll when the next page is fetched
barba.hooks.enter(() => {

  // update page color palette
  // updDynCssHtml();

  


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
   // debugger
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
      namespace: "apply-now",
      beforeEnter() {},
      afterEnter() {
        initApplyNow();
      },
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