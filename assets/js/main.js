// console.log('Mogul main js is loaded!');
const App = new (function () {
    // const live = false;
    const live = false;    
  })();
  let curPgName, prevPgName = '';
  let prevPgObj, curPgObj;
  let isMobileMenuOpen = false;
  let browserName = "Unknown";



  
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
({ categories, pg_slug, tags, showreelVidLink } = script_vars);


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




/////////////// ANIMATIONS START //////////////////////////////////


const homeContentAnim = () => {
  };
  
  ////////////// ANIMATIONS END ////////////////////////////////////



  ///////////////// DOCUMENT READY /////////////////////////////// 
jQuery(document).ready(function($) {

  var dw = window.innerWidth;
  var dh = window.innerHeight;

  const appBody = document.querySelector('#bodyContent');


  let pgColors = {
    'home': ['#fff', '#222'],
    'bio': ['#000', '#fff'],
    'studio': ['#b8bcbf', '#121314'],
    'work': ['#121314', '#b8bcbf'],
    'contact': ['#cfcecd', '#101010'],
  }
  let pgClrsKeys = Object.keys(pgColors);



  /////// init follow mouse function
  let workItmHover = false;
  let activWorkItmElm = null;
  let activWorkItmElmTxt = null;
  let offsetWrkTxtY = -300;

  const followMouseEl = document.getElementById('followMouse');
  const followMouse = () => {
    let mouseX = 0;
    let mouseY = 0;

    let ballX = 0;
    let ballY = 0;

    let offsetX = -25;
    let offsetY = -25;


    let speed = 0.05;

    let boundsOffsetLeft = 0;
    let boundsOffsetRight = 0;

    let wrkTxtY = 0;

    function animFollowMouse() {
      let distX = mouseX - ballX;
      let distY = mouseY - ballY;
  
      ballX = ballX + (distX * speed);
      ballY = ballY + (distY * speed);
  
      finalX = ballX + offsetX;
      finalY = ballY + offsetY;
  
      finalX = (finalX > dw - boundsOffsetRight) ? dw - boundsOffsetRight : (finalX < boundsOffsetLeft) ? boundsOffsetLeft : finalX;
      finalY = (finalY > dh - boundsOffsetRight) ? dh - boundsOffsetRight : (finalY < boundsOffsetLeft) ? boundsOffsetLeft : finalY;
      
      followMouseEl.style.left = finalX + "px";
      followMouseEl.style.top = finalY + "px";


      // hover for when mouse is hovering on a workItm
      if(workItmHover && activWorkItmElm) {
        // console.log('workItm is following mouse now...');

        let yTop = finalY + offsetWrkTxtY;

        activWorkItmElmTxt.css('top', yTop + 'px');

      }



      requestAnimationFrame(animFollowMouse);
  
    }
  
    // only animate follow mouse on large screens
    animFollowMouse();
  
    // add mousemove listener
    document.addEventListener('mousemove', function(e) {
      mouseX = e.pageX;
      mouseY = e.pageY;
    });
  }


  if(dw >= 760) followMouse();

  // document on mouse enter playDirShowreelBtn
  $(document).on('mouseenter', '#bioTopSection .bioIntro .playDirShowreelBtn', function() {
    const tl1 = gsap.timeline();
    
    tl1.to('#followMouse ._circle', { duration: 0.4, scale: 0, opacity: 0, display: 'none', ease: Expo.easeInOut } )
    .to('#followMouse ._playShowReelBtn', { duration: 0.4, scale: 1, opacity: 1, display: 'block', ease: Expo.easeInOut }, '-=0.4' );
  });
  // document on mouse leave playDirShowreelBtn
  $(document).on('mouseleave', '#bioTopSection .bioIntro .playDirShowreelBtn', function() {
    const tl1 = gsap.timeline();
    
    tl1.to('#followMouse ._playShowReelBtn', { duration: 0.4, scale: 0, opacity: 0, display: 'none', ease: Expo.easeInOut } )
    .to('#followMouse ._circle', { duration: 0.4, scale: 1, opacity: 1, display: 'block', ease: Expo.easeInOut }, '-=0.4' );
  });




  // 
$(document).on('click', "#mogulHeader1 ._right ._mobileMenu ._topArea ._toggleMMBtn", function(e) {
  let isShowingCloseBtn = $(this).hasClass('_isShowingCloseBtn');

  const tl1 = gsap.timeline();

  if(isShowingCloseBtn) {
    // is open ... close menu screen
    $(this).removeClass('_isShowingCloseBtn');
    isMobileMenuOpen = false;

    tl1.to('#mogulHeader1 ._right ._mobileMenu', 
    { duration: 1, clipPath: "polygon(0% 0%, 100% 0%, 100% 15%, 0% 15%)", ease: Expo.easeInOut })
    .to('#mogulHeader1 ._left ._mobileLogo', { duration: 1, x: 0, ease: Expo.easeInOut }, '-=1')
    .to('#mogulHeader1 ._right ._mobileMenu ._body a', 
    { duration: 1, opacity: 0, ease: Expo.easeInOut, stagger: { amount: 1 } }, '-=1.5')
    .to('#mogulHeader1 ._right ._mobileMenu ._body ._footer ._logo svg', 
    { duration: 2, y: 50, opacity: 0, ease: Expo.easeInOut }, '-=1.2')
    ;


  } else {
    // is closed ... open menu screen
    $(this).addClass('_isShowingCloseBtn');
    isMobileMenuOpen = true;

    tl1
    .to('#mogulHeader1 ._right ._mobileMenu', 
    { duration: 1, clipPath: "polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%)", ease: Expo.easeInOut })
    .to('#mogulHeader1 ._left ._mobileLogo', { duration: 1, x: -100, ease: Expo.easeInOut }, '-=1')
    .to('#mogulHeader1 ._right ._mobileMenu ._body a', 
    { duration: 1, opacity: 1, ease: Expo.easeInOut, stagger: { amount: 1 } }, '-=1.5')
    .to('#mogulHeader1 ._right ._mobileMenu ._body ._footer ._logo svg', 
    { duration: 2, y: 0, opacity: 1, ease: Expo.easeInOut }, '-=1.2')    
    ;

  }


  // console.log('Close: ', isShowingCloseBtn);
});


const playIntroAnim = () => {
const tl1 = gsap.timeline();
tl1.set('#mainIntro', { display: 'flex', clipPath: 'polygon(0 0, 100% 0, 100% 100%, 0 100%)' });

var progVal = 0;
var fakeProgressVals = [1, 1, 2,0, 0, 0, 0, 0, 2, 2, 3, 4, 5, 0, 0, 0 , 0, 0, 6, 7, 0, 0, 0, 0, 8, 9,10];
var fakeProgArrLen = fakeProgressVals.length;

const range = (start, stop) => Array.from({ length: stop - start + 1 }, (_, i) => start + i);

var fakeFreq = 30; // milliseconds

var delay1 = 100;


var progBarMaxWidth = 30; // in percent

var interVal1 = setInterval(() => {
var rnd1 = Math.floor(Math.random() * fakeProgArrLen);
progVal += fakeProgressVals[rnd1];
progVal = (progVal > 100) ? 100 : progVal;



// update progress
updProgress(progVal);

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
    // playPgEnterAnim();
  }

}, fakeFreq);


  const updProgress = (val) => {
    var v = (val < 10) ? "00" + val : (val < 100) ? "0" + val: val;
    var newWidth = progBarMaxWidth * (val / 100);

    $('#mainIntro .progressBar1').css({ 'width' : newWidth + '%' });
    
  }
  
  window.localStorage.setItem('lastIntroPlayTime', Date.now());

} // end of playintroanim



const removeIntroScreen = () => {
  const tl1 = gsap.timeline();
  tl1.to('#mainIntro', { duration: 1, delay: 0.5, clipPath: "polygon(0 100%, 100% 100%, 100% 100%, 0 100%)",
  ease: Expo.easeInOut } );
}


// function to re-init home vars & functions
const initHome = () => {  
const homeLandingVid = $('#homeTopSect .quickShowreel video');
  if(homeLandingVid) {
    setTimeout(() => {      
      homeLandingVid[0].play();
      // console.log("Video playing...");

      // update mainscroller
      updMainScroller();
    }, 100);
  }




}


////// animate pageEnd in
// const animPageEnd = ( animIn = true ) => {
//   const tl1 = gsap.timeline();

//   if(animIn) {

//     // anim in
//     tl1.fromTo( '#homeTopSect .quickShowreel', { opacity: 0 }, 
//     { delay: 2, duration: 1, display: 'flex', opacity: 1, ease: Expo.easeInOut } )
//     .fromTo( '#homeTopSect .valueProp1', { opacity: 0 }, 
//     { duration: 1, display: 'block', opacity: 1, ease: Expo.easeInOut } )
//     ;

//   } else {
//     // anim out
//     tl1.fromTo( '#homeTopSect .quickShowreel', { opacity: 0 }, 
//     { delay: 2, duration: 1, display: 'flex', opacity: 1, ease: Expo.easeInOut } )
//     .fromTo( '#homeTopSect .valueProp1', { opacity: 0 }, 
//     { duration: 1, display: 'block', opacity: 1, ease: Expo.easeInOut } )
//     ;
//   }
// }


////// page enter and page leave animations
const playPgEnterAnim = () => {
  const tl1 = gsap.timeline();

  const startX = dw * 0.8;

  // console.log('Playing page enter anim: ', curPgName); 

  // scroll to top
  // $("html, body").animate({ scrollTop: 0 }, "slow");

  if(prevPgName) playPgLeaveAnim();

  let delay2 = (playIntro) ? 2.5 : 1.5;
  console.log(playIntro);

  switch(curPgName) {
    case 'home':
      if(!$( '#homeTopSect .quickShowreel video' )) return;
      tl1.fromTo( '#homeTopSect .quickShowreel video', { opacity: 0, x: startX, display: 'none' }, 
      { delay: delay2,  duration: 2, x: 0, display: 'flex', opacity: 1, ease: "power4.out" } )
      .fromTo( '#homeTopSect .valueProp1 .line1', { opacity: 0, x: startX, display: 'none' }, 
      { duration: 1.4, display: 'block', opacity: 1, x: 0, ease: "power4.out", stagger: { amount: 0.5 } }, '-=1.5' )
      ;

      initHome();
      
    break;
    case 'work':
      if(!$( '#workTopSection .sect1._top [class*="_txt"]' )) return;
      tl1.fromTo( '#workTopSection .sect1._top [class*="_txt"]', { opacity: 0, x: startX  }, 
      { delay: delay2,  duration: 2, x: 0, display: 'block', opacity: 1, ease: "power4.out", stagger: { amount: 0.5 } } )
      ;
    break;
    case 'studio':
      if(!$( '#studioTopSection .sect1._top [class*="_txt"]' )) return;
      tl1.fromTo( '#studioTopSection .sect1._top [class*="_txt"]', { opacity: 0, x: startX  }, 
      { delay: delay2,  duration: 2, x: 0, display: 'block', opacity: 1, ease: "power4.out", stagger: { amount: 0.5 } } )
      .fromTo( '#studioTopSection .sect1._top [class*="_img"]', { opacity: 0, y: 200, clipPath: "polygon(0% 0%, 100% 0%, 100% 0%, 0% 0%)" }, 
      { duration: 1.4, clipPath: "polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%)", display: 'block', opacity: 1, y: 0, ease: "power4.out" }, '-=1.5' )
      ;

    break;
    case 'bio':
      if(!$( '#bioTopSection .sect1.bioIntro .txt1 .line1' )) return;
      tl1.fromTo( '#bioTopSection .sect1.bioIntro .txt1 .line1', { opacity: 0, x: startX  }, 
      { delay: delay2,  duration: 2, x: 0, display: 'block', opacity: 1, ease: "power4.out", stagger: { amount: 0.5 } } )
      .fromTo( '#bioTopSection .bioIntro .img1', { opacity: 0, x: -startX * 0.5,  }, 
      { duration: 1.4, display: 'block', opacity: 1, x: 0, ease: "power4.out" }, '-=2.5' )
      .fromTo( '#bioTopSection .bioIntro .playDirShowreelBtn .line1 span', { opacity: 0, y: 200,  }, 
      { duration: 1.8, display: 'block', opacity: 1, y: 0, ease: "power4.out", stagger: { amount: 0.5 } }, '-=2' )
      .fromTo( '#bioTopSection .bioIntro .scrollDown span', { opacity: 0, y: 200,  }, 
      { duration: 1.2, display: 'block', opacity: 1, y: 0, ease: "power4.out" }, '-=2' )
      ;
    break;
    case 'contact':
      if(!$( '#contactTopSection .sect1.heading1 .txt1 .line1 span' )) return;
      tl1
      .fromTo( '#contactTopSection .sect1.heading1 .txt1 .line1 span', { opacity: 0, y: 200  }, 
      { delay: delay2,  duration: 2, y: 0, display: 'block', opacity: 1, ease: "power4.out" } )
      .fromTo( '#contactTopSection .sect1.sectGrid1 ._txt1 .line1 span', { opacity: 0, y: 200  }, 
      {  duration: 2, y: 0, display: 'block', opacity: 1, ease: "power4.out", stagger: { amount: 0.5 } }, '-=2' )
      ;
    break;
    default:
    break;
  }


  updateMainMenu();
  
  
}



let fgcolor = '', bgcolor = '';

let dynCss = '';


// funtion to update dynamic css html
const updDynCssHtml = () => {

  dynCss = '<style type="text/css">';

  if (fgcolor !== '' && bgcolor !== '') {

    // ##mainHeader ._mainNavs ._itm1._maxi._activ ._navTxt
    v = `
    body {
      background: ${ bgcolor }
    } 
    `;
    dynCss += v;

    //// pageEnd Css
    v = `
      .pageEndSection .sectGrid1 {
        color: ${ fgcolor };
      }
      
  .pageEndSection .sectGrid1 ._titl1:after {
    background: ${ bgcolor };
  }
  .pageEndSection .sectGrid1 ._txt1, .pageEndSection .sectGrid1 ._content1 {

    border-top: 0.5px solid ${ fgcolor };
  }
  .pageEndSection .sectGrid1 ._content1 ._cflex2 a._flexTxt4 {
    color: ${ fgcolor };
  }
  .pageEndSection .sectGrid1 ._content1 ._cflex2 a._flexTxt4:hover {
    color: ${ fgcolor };
  }
  .pageEndSection .sectGrid1 ._content1 ._cflex2 a._flexTxt4:before {
    background: ${ fgcolor };
  }
  .pageEndSection .sectGrid1 ._content1 ._cflex2 a._flexTxt4:hover:before {
    background: ${ fgcolor };
  }

    `;
    dynCss += v;
    ///////////////////



    ///// header css
    v = `    

    #mogulHeader1 ._left ._mainLogo svg {
      fill: ${fgcolor};
    }

    #mogulHeader1 ._right ._mainMenu a {
      color: ${fgcolor};
    }
  
    #mogulHeader1 ._right ._mainMenu a::after {
      background: ${fgcolor};
    }

    #mogulHeader1 ._right ._mainMenu a:hover {
      color: ${fgcolor};
    }


    #mogulHeader1 ._left ._mobileLogo svg {
      fill: ${fgcolor};
    }
  
  
  
    #mogulHeader1 ._right ._mainMenu a._activ {
      color: ${fgcolor};
    }

    #mogulHeader1 ._right ._mobileMenu {
      background: ${bgcolor};
    }
  
    #mogulHeader1 ._right ._mobileMenu ._topArea ._toggleMMBtn span {
      background: ${fgcolor};
    }
  
    #mogulHeader1 ._right ._mobileMenu ._topArea ._toggleMMBtn:hover span {
      background: ${bgcolor};
    }
    #mogulHeader1 ._right ._mobileMenu ._body {
      background: ${bgcolor};
    }
    #mogulHeader1 ._right ._mobileMenu ._body a {
      border-bottom: 1px solid ${fgcolor};
      color: ${fgcolor};
    }

    #mogulHeader1 ._right ._mobileMenu ._body ._footer ._logo svg {
      fill: ${fgcolor};
    }
    #mogulHeader1 ._right ._mobileMenu ._body ._footer ._links {
    }
    #mogulHeader1 ._right ._mobileMenu ._body ._footer ._links a {
    }
    #mogulHeader1 ._right ._mobileMenu ._body ._footer ._txt1 {
      color: ${fgcolor};
    }



  
    #mogulFooter {
      color: ${fgcolor};
    }
    #mogulFooter ._right a {
      color: ${fgcolor};
    }
  
    #mogulFooter ._right a:hover {
      color: ${fgcolor};
    }
  
    #mogulFooter ._right a::before {
      background: ${bgcolor};
    }
  `;
  dynCss += v;
  ///////////////////



    switch(curPgName) {
      case 'home':
        break;
      default:
        break;
    }


  }

  dynCss += '</style>';
  $('#dynamicCss').html(dynCss);
}

// updDynCssHtml();



const playPgLeaveAnim = () => {
  const tl1 = gsap.timeline();

  if (browserName != 'Safari' && mainScroller != null) mainScroller.scrollTo('top');

  // console.log('Playing page leave anim: ', curPgName);

  // check if mobile is on
  console.log('Mobile menu data: ', isMobileMenuOpen, dw);
  if(dw < 760 && isMobileMenuOpen) {
    // mobile mode active and mobile menue is open....close it first
    $('#mogulHeader1 ._right ._mobileMenu ._topArea ._toggleMMBtn').trigger('click');   
    console.log('Closing mobile menu...'); 
  }

  const endX1 = dw * 0.3;
  const endX2 = dw * 0.4;

  switch(prevPgName) {
    case 'home':
      if(!$('#homeTopSect .valueProp1 .line1')) return;
      tl1.fromTo( '#homeTopSect .valueProp1 .line1', { display: 'block', opacity: 1, x: 0 }, 
      { delay: 0.3, duration: 2.4, opacity: 0, x: endX1, ease: "power4.out", stagger: { amount: 0.5 } } )
      .fromTo( '#homeTopSect .quickShowreel video', { display: 'flex', opacity: 1, x: 0 }, 
      { duration: 3, x: endX2, opacity: 0, ease: "power4.out" }, '-=1.5' )
      ;
    break;
    case 'work':
      if(!$('#workTopSection .sect1._top [class*="_txt"]')) return;
      tl1.fromTo( '#workTopSection .sect1._top [class*="_txt"]', { opacity: 1, x: 0 }, 
      { delay: 0.3, duration: 2, x: endX2, opacity: 1, ease: "power4.out", stagger: { amount: 0.3, from: 'end' } } )
      ;
    break;
    case 'studio':
      if(!$('#studioTopSection ._top [class*="_img"]')) return;
      tl1.fromTo( '#studioTopSection ._top [class*="_img"]', { opacity: 1, y: 0, clipPath: "polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%)"  }, 
      { duration: 1.4, clipPath: "polygon(0% 0%, 100% 0%, 100% 0%, 0% 0%)", display: 'block', opacity: 1, y: 200, ease: "power4.out" }, '-=1.5' )
      .fromTo( '#studioTopSection ._top [class*="_txt"]', { opacity: 1, x: 0, display: 'block' }, 
      {  duration: 2, x: endX2, opacity: 0, ease: "power4.out", stagger: { amount: 0.5 } } )
      ;
    break;
    case 'bio':
      if(!$('#bioTopSection .bioIntro .scrollDown span')) return;
      tl1
      .fromTo( '#bioTopSection .bioIntro .scrollDown span', { opacity: 1, y: 0, display: 'block' }, 
      { duration: 2, display: 'none', opacity: 0, y: 200, ease: "power4.out" } )
      .fromTo( '#bioTopSection .bioIntro .playDirShowreelBtn .line1 span', { opacity: 1, y: 0, display: 'block'  }, 
      { duration: 2, display: 'none', opacity: 0, y: 200, ease: "power4.out", stagger: { amount: 0.3 } }, '-=1.8' )
      .fromTo( '#bioTopSection .bioIntro .img1', { opacity: 1, x: 0, display: 'block' }, 
      { duration: 1.4, opacity: 0, x: -endX2, ease: "power4.out", display: 'none' }, '-=2.2' )
      .fromTo( '#bioTopSection .bioIntro .txt1 .line1', { opacity: 1, x: 0, display: 'block' }, 
      { duration: 2, x: endX2, opacity: 0, ease: "power4.out", stagger: { amount: 0.3, from: 'end' } }, '-=2.6' )
      ;
    break;
    case 'contact':
      if(!$('#contactTopSection .sect1.sectGrid1 ._txt1 .line1 span')) return;
      tl1
      .fromTo( '#contactTopSection .sect1.sectGrid1 ._txt1 .line1 span', { opacity: 1, y: 0, display: 'block'  }, 
      {  duration: 2, y: 200, display: 'none', opacity: 0, ease: "power4.out", stagger: { amount: 0.3 } } )
      .fromTo( '#contactTopSection .sect1.heading1 .txt1 .line1 span', { opacity: 1, y: 0, display: 'block'  }, 
      { duration: 2, y: 200, display: 'none', opacity: 0, ease: "power4.out" }, '-=2.4' )
      ;
    break;
    default:
    break;
  }


  // updateMainMenu();



}


// function to update mainMenu
const updateMainMenu = () => {
    // update menu
    let activInd = -1;
    $("#mogulHeader1 ._right ._mainMenu a").removeClass('_activ');
    $("#mogulHeader1 ._right ._mainMenu a").each(function(i, v) {

        let href = $(this).attr('href');
        // href = href.replace(/https\:\/\/www.ocbsa.studio\//g, '').replace(/\/$/g, '').replace(/\-/g, ' ');
        // href = href.replace(/https\:\/\/www.mogulpictures.co.za\//g, '').replace(/\/$/g, '');
        href = href.replace(/http\:\/\/localhost\/mogul\//g, '').replace(/\/$/g, '');
        let hrefArr = href.split('/');
        href = hrefArr[0];
        // console.log('updating main menu... ', i, href, pg_slug);

        if(href === pg_slug) {
          $(this).addClass('_activ');
        } else if(href === '' && pg_slug == 'home') {
          $(this).addClass('_activ');
        }

    }); 
}




///  playIntro or playPgEnterAnim
if(playIntro) {
  playIntroAnim();
} else {
  playPgEnterAnim();
}







////////////////// SMOOTH SCROLL ///////////////////////////////////
// const body = document.body;
// const scrollWrap = document.querySelector("#bodyContent main");
// let scrollWrapHeight = scrollWrap.getBoundingClientRect().height - 1;
// speed = 0.04;

// var scrollOffset = 0;

// console.log('smoothscroll...inited!');

// body.style.height = Math.floor(scrollWrapHeight) + 'px';

// function smoothScroll1() {
//   scrollOffset += (window.pageYOffset - scrollOffset) * speed;
//   var scroll1 = "translateY(-" + scrollOffset + "px) translateZ(0)";
//   scrollWrap.style.transform = scroll1;
//   requestAnimationFrame(smoothScroll1);
// }

// smoothScroll1();
let mainScroller = null
if (browserName != 'Safari') {

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
      // alert('Mainscroller scrolling...');
      // ScrollTrigger.update;
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
}


  // setTimeout(() => {
  //   if(dw <= 600) {
  //     alert('Main Scroller updated... and resized! 1n');
  //     // document.body.resizeTo(dw, mainScroller.el.clientHeight + 100);

  //     mainScroller.update();
  //     // alert('Main Scroller updated... and resized! 2b');
  //     alert(mainScroller.el.offsetHeight);
  //   }
  // }, 2000);

  // alert('Main JS loaded...');


const updMainScroller = () => {
  if (browserName != 'Safari') {    
    setTimeout(() => {   
      if(mainScroller != null) {
        console.log('Window Height: ', window.innerHeight);
        mainScroller.update();      
        // mainScroller.start();
  
        // alert(`Updated MainScroller ran on mobile ... ${mainScroller.el.clientHeight} .... ${window.innerWidth}`);
  
       
  
        // mainScroller.scrollTo({ 'offset' : 0, 'duration': 600, 'easing': [0.25, 0.00, 0.35, 1.00], 'disableLerp': false })
        // console.log(mainScroller);
  
        // mainScroller.scrollTo( 'top', {
        //   'offset': 0,
        //   'callback': function() {
        //     // do something...
        //   },
        //   'duration': 600,
        //   'easing': [0.25, 0.00, 0.35, 1.00],
        //   'disableLerp': true
        // } );
  
      }
    }, 4000);
  } 
}


////////////////// SMOOTH SCROLL END ///////////////////////////////





  //////////// FUNCTION TO GENERATE WEBSITE OVERLAY NOISE ////////////////////
  const noise = () => {
    let canvas, ctx;
  
    let wWidth, wHeight;
  
    let noiseData = [];
    let frame = 0;
  
    let loopTimeout;
  
  
    // Create Noise
    const createNoise = () => {
        const idata = ctx.createImageData(wWidth, wHeight);
        const buffer32 = new Uint32Array(idata.data.buffer);
        const len = buffer32.length;
  
        for (let i = 0; i < len; i++) {
            if (Math.random() < 0.5) {
                buffer32[i] = 0xff000000;
            }
        }
  
        noiseData.push(idata);
    };
  
  
    // Play Noise
    const paintNoise = () => {
        if (frame === 9) {
            frame = 0;
        } else {
            frame++;
        }
  
        ctx.putImageData(noiseData[frame], 0, 0);
    };
  
  
    // Loop
    const loop = () => {
        paintNoise(frame);
  
        loopTimeout = window.setTimeout(() => {
            window.requestAnimationFrame(loop);
        }, (1000 / 25));
    };
  
  
    // Setup
    const setup = () => {
        wWidth = window.innerWidth;
        wHeight = window.innerHeight;
  
        canvas.width = wWidth;
        canvas.height = wHeight;
  
        for (let i = 0; i < 10; i++) {
            createNoise();
        }
  
        loop();
    };
  
  
    // Reset
    let resizeThrottle;
    const reset = () => {
        window.addEventListener('resize', () => {
            window.clearTimeout(resizeThrottle);
  
            resizeThrottle = window.setTimeout(() => {
                window.clearTimeout(loopTimeout);
                setup();
            }, 200);
        }, false);
    };
  
  
    // Init
    const init = (() => {
        canvas = document.getElementById('overlayWebsiteNoise');
        ctx = canvas.getContext('2d');
  
        setup();
    })();
  };
  
  noise();
  //////////// FUNCTION TO GENERATE WEBSITE OVERLAY NOISE END ////////////////////





       
const animEnter = (container) => {

  const tl8 = gsap.timeline();

    // console.log('AnimEnter 1...');
	// console.log("Anim Enter 1: ", prevPgObj.container, curPgObj.container, categories);

  ///// PAGE CLIPPATH ANIMATION //////////
  gsap.set(curPgObj.container, { clipPath: 'polygon(100% 0%, 100% 0%, 100% 100%, 100% 100%)'});
  ///// PAGE CLIPPATH ANIMATION ENDS //////////



  ///// UPDATE COLORS //////////
  let pgClrKey = (pgClrsKeys.includes(curPgName)) ? curPgName : 'home';
  // console.log(pgClrKey, pgClrsKeys);
  // console.log(pgClrsKeys['work']);
  // if(prevPgObj.container) prevPgObj.container.parentNode.style.background = 'red';
  // if(curPgObj.container) curPgObj.container.parentNode.style.background = pgColors[pgClrKey][0];
  bgcolor = pgColors[pgClrKey][0];
  fgcolor = pgColors[pgClrKey][1];
  updDynCssHtml();
  ///// UPDATE COLORS END //////////

  ///// PAGE CLIPPATH ANIMATION //////////
  tl8.to(curPgObj.container, { duration: 1, clipPath: 'polygon(90% 0%, 100% 0%, 100% 100%, 90% 100%)',
  ease: "power4.out" })
  .to(prevPgObj.container, { duration: 1, clipPath: 'polygon(0% 0%, 90% 0%, 90% 100%, 0% 100%)',
  ease: "power4.out" }, "-=1")
  .to(curPgObj.container, { duration: 1, clipPath: 'polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%)',
  ease: Expo.easeInOut })
  .to(prevPgObj.container, { duration: 1, clipPath: 'polygon(0% 0%, 0% 0%, 0% 100%, 0% 100%)',
  ease: Expo.easeInOut }, "-=1")
  ;
  ///// PAGE CLIPPATH ANIMATION ENDS //////////



  playPgEnterAnim();

  // tl8.to( container,
  //   { duration: 1.8, clipPath: "polygon(0 0, 0 0, 0 100%, 0 100%)", ease: Expo.easeInOut } 
  //   ); playIntro


    return new Promise((resolve, reject) => {
        setTimeout(() => {
            // console.log("Anim Enter 2...");
            resolve();
        }, 1000);	
    });
  };

const animLeave = (container, done) => {
//   console.log("AnimLeave 1: ", prevPgObj, curPgObj, categories);
  // console.log("AnimLeave 1: ", container);

  const tl7 = gsap.timeline();

  playPgLeaveAnim();

  // tl7.to( container,
  //   { duration: 1.8, clipPath: "polygon(0 0, 0 0, 0 100%, 0 100%)", ease: Expo.easeInOut } 
  //   );

    return new Promise((resolve, reject) => {
        setTimeout(() => {
            // console.log("Anim Leave 2...");
            done();
            resolve();
        }, 1000);		
    });
};


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
   pg_slug = next.namespace;

   // Set <body> classes for the 'next' page
   //   if (current.container) {
   //     // // only run during a page transition - not initial load
   //     let nextHtml = next.html;
   //     let response = nextHtml.replace(
   //       /(<\/?)body( .+?)?>/gi,
   //       "$1notbody$2>",
   //       nextHtml
   //     );
   //     let bodyClasses = jQuery(response).filter("notbody").attr("class");
   //     jQuery("body").attr("class", bodyClasses);
   //   }
 });

 // update the scroll after entering a page
barba.hooks.after(() => {
  if (browserName != 'Safari') {
    if(mainScroller != null) updMainScroller();
  }
  playIntro = false;
});

// lock the scroll to prevent further animations when transitioning
barba.hooks.before(() => {
  if (browserName != 'Safari') {
    // if(mainScroller) mainScroller.stop();
  }
});


// reset scroll position and update the scroll when the next page is fetched
barba.hooks.enter(() => {
  updMainScroller();
  if (browserName != 'Safari') {
    if(mainScroller != null) {
      mainScroller.scrollTo('top', {
        offset: 800,
        smooth: true,
        disableLerp: true,
        duration: 600
      });
    
    }
  }
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
         //   console.log("Once...");
   
         return animEnter(next.container);
       },
       async enter({ next }) {
         //   console.log('Enter...');
         if (browserName != 'Safari' && mainScroller != null) {
            mainScroller.init();
         }
         return animEnter(next.container);
       },
       async beforeLeave(data) {
           console.log('Before Leave...');
       },
       async afterLeave(data) {
           console.log('After Leave...');
           if (browserName != 'Safari' && mainScroller != null) {
              mainScroller.destroy();
           }
       },
       async leave({ current, next, trigger }) {
         console.log("Leaving...0");

          current.container.style.position = 'absolute';
          current.container.style.top = 0;
          current.container.style.left = 0;
          current.container.style.width = '100%';


          console.log("Leaving...1");
          const done = this.async();
        await animLeave(current.container, done);
        //  await animLeave(current.container);

        //  done();
       },
       async after(data) {
         console.log("After...1");         
//           let parser = new DOMParser();
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
          initStudioPg();
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




//////////// Studio Page Scripts /////////////////////
const initStudioPg = () => {

  // studioPg swiper
  const studioPgSwiper = new Swiper('#studioTeamSlide', {
    // Default parameters
    slidesPerView: 4.5,
    spaceBetween: 0,
    // centeredSlides: true,
    loop: true,
    // Responsive breakpoints
    breakpoints: {
      // when window width is >= 320px
      320: {
        slidesPerView: 2.2,
        spaceBetween: 0
      },
      // when window width is >= 480px
      // 480: {
      //   slidesPerView: 4,
      //   spaceBetween: 0
      // },
      // // when window width is >= 640px
      // 640: {
      //   slidesPerView: 5,
      //   spaceBetween: 0
      // }
    }
  });


  // studioPg autoplay video
  const studioPgVid = $('#studioTopSection .sect1._top ._img1 video');
  if(studioPgVid) {
    setTimeout(() => {      
      studioPgVid[0].play();

      // update mainscroller
      updMainScroller();
    }, 100);
  }
  
}
//////////// Studio Page Scripts end /////////////////////




//////////// Work Page Scripts /////////////////////
const initWorkPg = () => {

  $(document).on('mouseover', '#workTopSection .sect1.workList1 .workItm1', function(e) {
    const uid = $(this).attr('uid');
    const selImg = $('.workList1 .wrkItm-' + uid + " .preview img");

    activWorkItmElm = $(this);
    activWorkItmElmTxt = $('.workList1 .wrkItm-' + uid + " .moreInfo .mouseFollowTxt");
    workItmHover = true;

    // fade out cover img
    selImg.css({ 'opacity': 0 });

    // fade in mouse follow text
    if(activWorkItmElmTxt) activWorkItmElmTxt.css({ 'opacity': 1 });

    // play preview video
    const vidInst = $('.workList1 .wrkItm-' + uid + " .preview video");
    const timeOut1 = setTimeout(() => {
      vidInst[0].play();
      clearTimeout(timeOut1);
    }, 100);

    // add mouse follow
    $(this).addClass('canFollowMouse');

    // console.log('Event: ', e);





    // console.log('We just mouse over a work item...', selImg);
  });

  $(document).on('mouseleave', '#workTopSection .sect1.workList1 .workItm1', function() {
    const uid = $(this).attr('uid');
    const selImg = $('.workList1 .wrkItm-' + uid + " .preview img");

    // fade in cover img
    selImg.css({ 'opacity': 1 });

    // fade out mouse follow text
    if(activWorkItmElmTxt) activWorkItmElmTxt.css({ 'opacity': 0 });

    // stop preview video
    const vidInst = $('.workList1 .wrkItm-' + uid + " .preview video");
    vidInst[0].pause();
    // vidInst[0].currentTime = 0;

    // console.log('We just mouse out of a work item...', selImg);


    // remove mouse follow
    $(this).removeClass('canFollowMouse');

    workItmHover = false;
    activWorkItmElm = null;
    activWorkItmElmTxt = null;
  });


  

  // update .workItm1 heights on resize
  //   const updVidDims = () => {
  //     let w = jQuery(window).width();
  //     let new_h = w * 0.45;
      
  //     $('.workItm1').height(new_h);

  //     console.log(w, new_h);
  //   }
  //   updVidDims();
  //   window.addEventListener('resize', () => {
  //     // console.log('New width: ', jQuery(window).width());
  //     updVidDims();
  // }, false);



}


//////////// Work Page Scripts end /////////////////////






});
//////////////// DOCUMENT READY END ///////////////////////////   