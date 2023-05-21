const App = new (function () {
  // const live = false;
  const live = false;
})();

gsap.registerPlugin(ScrollTrigger);



////////////////////////// CROSS BROWSER TOUCH EVENT LISTENING ///////////////////////////

// const hasTouchEvents = 'ontouchstart' in window;
// const hasPointerEvents = window.PointerEvent;
// const hasTouch = hasTouchEvents || window.DocumentTouch && document instanceof DocumentTouch || navigator.maxTouchPoints; // IE >=11

// const pointerDown = !hasTouch ? 'mousedown' : `mousedown ${hasTouchEvents ? 'touchstart' : 'pointerdown'}`;
// const pointerMove = !hasTouch ? 'mousemove' : `mousemove ${hasTouchEvents ? 'touchmove' : 'pointermove'}`;
// const pointerUp = !hasTouch ? 'mouseup' : `mouseup ${hasTouchEvents ? 'touchend' : 'pointerup'}`;
// const pointerEnter = hasTouch && hasPointerEvents ? 'pointerenter' : 'mouseenter';
// const pointerLeave = hasTouch && hasPointerEvents ? 'pointerleave' : 'mouseleave';

////////////////////////// CROSS BROWSER TOUCH EVENT LISTENING END ///////////////////////////




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
// maxi
//
//
//





let activPgTitle = '';

var playIntro = false;
const lastIntroPlayTime = window.localStorage.getItem('lastIntroPlayTime');

let maxiMainNavMode = false;
let pgNavMainClass = '_featuredWorks';
let isSingleWorkPost = false;
let isSingleWorkPostInit = false;
let canShowSingleWorkPost = false;

let justPreviewedSingleWork = false;

let notMainNavPagesLinkRegex = /^(https:\/\/www\.ocbsa\.studio\/)(?!works|why-us|home|creators|contact-us)/i;
let homePageLinkRegex = /^(https:\/\/www\.ocbsa\.studio\/?)$/i;


// mainNavJsonData
let mainNavJsonData = {
  "home": {},
  "works": {},
  "creators": {}
};




// init App
// console.log("Script vars: ", script_vars);
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

// CAPTURE BROWSER REFRESH OR NAVIGATE EVENTS END /////////////////////////////////////


var now = Date.now();



/////////////// ANIMATIONS START //////////////////////////////////


const homeContentAnim = () => {
  // const tl = gsap.timeline();
  // tl.from('#bgMain ._scrn1 div', { duration: 1.5, y: 200, opacity: 0, display:"none", stagger: 0.1 });
  // console.log('Playing home content animation enter ...');
};

////////////// ANIMATIONS END ////////////////////////////////////





///////////////// DOCUMENT READY /////////////////////////////// 
jQuery(document).ready(function($) {

var dw = window.innerWidth;
var dh = window.innerHeight;

var showMainNav = true;

const activNavWidth = (dw <= 600) ? dw * 0.6 : dw * 0.4;



let acc = 0;
let activNavId = 0;
let prevActivNavId = activNavId;
let mainNavActivCat = '';
let moveX = 500;

let navNewPosX = dw * 0.5;  
let navPosX = 0;
let finalNavXPos = 0;




let fgcolor = '', bgcolor = '';

let dynCss = '';


// Single OCBSA Work Post Vars
let bgTxtElm, bgTxtElm_, bgTxtElm1, bgTxtElm2;
let offsetY_slide1, offsetY_slide2;
let activMainNavEl, mainMediaNavArrBefore, mainMediaNavArrAfter;


// function to animate single slides out
function animateSingleSlidesOut () {
  const tlIn = gsap.timeline();

  const visitSiteEl = $(".ocbsa-works #visitSiteBtn")
  const visitSite = (visitSiteEl.length > 0) ? true : false;



  if(visitSite) {
    // console.log('Animating single slides in...');
    tlIn
    // .fromTo('.ocbsa-works #ocbSingleWorkSwiper .allSlides .slide0', { y: offsetY_slide1, opacity: 0, display: 'none' }, 
    // { delay, duration: 2, y: offsetY_slide2, opacity: 1, display: 'block', ease: 'power4.out' })
    .fromTo('.ocbsa-works #visitSiteBtn', { y: -30, opacity: 1, display: 'block' }, 
    { duration: 2, y: 250, opacity: 0, display: 'none', ease: 'power4.out' })
    .fromTo(".ocbsa-works #ocbSingleWorkSwiperSideBar ._holder .swiper-slide", {  y: 0, opacity: 1 }, 
    {  duration: 2, y: 200, opacity: 0, ease: 'power4.out', stagger: { amount: 0.8 } }, "-=1.6")  
    .fromTo(".ocbsa-works #ocbSingleWorkSwiperSideBar ._highlighter", {  y: 0, opacity: 1 }, 
    {  duration: 2, y: 200, opacity: 0, ease: 'power4.out' }, "-=1.6") 
    .fromTo('.ocbsa-works #backToProject', { y: 20, opacity: 1, display: 'block' }, 
    { duration: 2, y: -150, opacity: 0, display: 'none', ease: 'power4.out' }, "-=1.8")
    .fromTo(".ocbsa-works #ocbSingleWorkSwiperSideBar ._holder", {  y: 0, opacity: 1 }, 
    {  duration: 2, y: offsetY_slide1, opacity: 0, ease: 'power4.out' }, "-=1.8")
    
    
         
    
    ;
  } else {
    tlIn
    // .fromTo('.ocbsa-works #ocbSingleWorkSwiper .allSlides .slide0', { y: offsetY_slide1, opacity: 0, display: 'none' }, 
    // { delay, duration: 2, y: offsetY_slide2, opacity: 1, display: 'block', ease: 'power4.out' })
    .fromTo(".ocbsa-works #ocbSingleWorkSwiperSideBar ._holder .swiper-slide", {  y: 0, opacity: 1 }, 
    {  duration: 2, y: 200, opacity: 0, ease: 'power4.out', stagger: { amount: 0.8 } })  
    .fromTo(".ocbsa-works #ocbSingleWorkSwiperSideBar ._highlighter", {  y: 0, opacity: 1 }, 
    {  duration: 2, y: 200, opacity: 0, ease: 'power4.out' }, "-=1.6") 
    .fromTo('.ocbsa-works #backToProject', { y: 20, opacity: 1, display: 'block' }, 
    { duration: 2, y: -150, opacity: 0, display: 'none', ease: 'power4.out' }, "-=1.8")
    .fromTo(".ocbsa-works #ocbSingleWorkSwiperSideBar ._holder", {  y: 0, opacity: 1 }, 
    {  duration: 2, y: offsetY_slide1, opacity: 0, ease: 'power4.out' }, "-=1.8")
    ;
  }

}


////////////////////////////////////


// funtion to update dynamic css html
const updDynCssHtml = () => {

    // let color = tinycolor("red");
  // console.log('Color: ', color);
  let fgClr = tinycolor(fgcolor);
  let bgClr = tinycolor(bgcolor);
  let fgClr1, fgClr2, fgClr3;
  let bgClr1, bgClr2, bgClr3;
  let clrAmt = 3;

  let fgClrB1 = fgClr.getBrightness();
  let bgClrB1 = bgClr.getBrightness();

  // console.log('Bg brightness: ', bgClr.getBrightness());

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

  // _maxi._activ
  let v = `#mainMediaNav ._mainContents.${pgNavMainClass} ._itmCard._maxi._activ {
    width: ${ activNavWidth }px !important;
    opacity: 1;
  } `;
  dynCss += v;


  if (fgcolor !== '' && bgcolor !== '') {

    // ##mainHeader ._mainNavs ._itm1._maxi._activ ._navTxt
    v = `
    #mainHeader ._null2 ._left1 ._mainLogo1 svg {
      fill: ${fgcolor};
    } 
    #mainHeader ._null2 ._center1 ._mainNavs ._itm1._maxi._activ {
      color: ${fgcolor};
      border: 4px solid ${fgcolor};
    } 
    #mainHeader ._null2 ._center1 ._mainNavs ._itm1 {
      border-left: 2px solid ${bgClr2.toString()};
    }  
    #mainHeader ._null2 ._center1 ._mainNavs ._itm1:hover {
      border-left: 2px solid ${fgClr1.toString()};    
    }  
  
    #mainHeader ._null2 ._center1 ._mainNavs ._itm1._maxi._activ:hover {
      border: 4px solid ${fgClr1.toString()};    
    }



    #mainHeader ._null2 ._right1 ._mainMenu a, #mainFooter ._null1 a {
      color: ${fgcolor}; 
    }
    #mainHeader ._null2 ._right1 ._mainMenu a:hover, #mainFooter ._null1 a:hover {
      color: ${fgClr1.toString()}; 
    }

    #mainHeader ._null2 ._right1 ._mainMenu a._activ, #mainFooter ._null1 a._activ {
      color: ${fgClr1.toString()}; 
    }
    #mainHeader ._null2 ._right1 ._mainMenu a._activ:hover, #mainFooter ._null1 a._activ:hover {
      color: ${fgClr2.toString()}; 
    }
    #mainHeader ._null2 ._right1 ._mainMenu a span svg, #mainFooter ._null1 a svg {
      fill: ${fgcolor}; 
    }
    #mainHeader ._null2 ._right1 ._mainMenu a:hover span svg, #mainFooter ._null1 a:hover svg {
      fill: ${fgClr1.toString()}; 
    }
  
    #mainHeader ._mainNavs ._itm1._maxi._activ ._navTxt {
    margin: 0 auto; margin-top: -3px; width: 100%; height: 100%; display: block; 
    font-weight: bolder; text-align: center; padding-left: 5px;
    } 
    #mainHeader ._mainNavs ._itm1._maxi._activ:hover ._navTxt {
      border: none;
    }
    #mainHeader ._mainNavs ._itm1._maxi._activ ._navTxt .txtBx {
      width: 10px; height: auto; display: block; float: left; overflow: hidden;
    }
    #mainHeader ._mainNavs ._itm1._maxi._activ:hover ._navTxt .txtBx {
      border: none;
    }
    #mainHeader ._mainNavs ._itm1._maxi._activ ._navTxt .txtBx span {}
    #mainHeader ._mainNavs ._itm1._maxi._activ:hover ._navTxt .txtBx span { border: none; }


    #mainHeader ._extraHeaderInfos ._closeBtn span { color: ${fgcolor}; }
    #mainHeader ._extraHeaderInfos:hover ._closeBtn span { ${ bgClr1.toString() }; }
    
    #mainHeader ._extraHeaderInfos ._backToProjectsBtn { color: ${fgcolor};  }
    #mainHeader ._extraHeaderInfos:hover ._backToProjectsBtn { color: ${ bgClr1.toString() };  }
    

    #mainHeader ._extraFooterInfos ._body { color: ${fgcolor}; }

    #mainHeader ._extraFooterInfos ._body ._center ._exploreBtn ._line span {
      border-left: 1px solid ${fgcolor};
    }
    #mainHeader ._extraFooterInfos ._body ._center ._exploreBtn { color: ${fgcolor}; }


    #mainMediaNavMoreInfo .bigTxt .itm {
      color: ${fgcolor};
    }


    #mainMediaNav ._topArrow span { color: ${fgcolor}; }
    `;
    dynCss += v;
  
    // $('#mainHeaderBgTxt').css({ 'background' : bgcolor });
    v = `#mainHeaderBgTxt {
      background: ${bgcolor}; color: ${ bgClr1.toString() }; 
    } 
    `;
    dynCss += v;
  }



  dynCss += '</style>';
  $('#dynamicCss').html(dynCss);
}

updDynCssHtml();


var toggleMainNavVisibility = () => {
  if(showMainNav) {
    $("#mainMediaNav").show();
    $("#mainHeader ._mainNavs").show();
    resetMainNavVars();

    // initialize homeMainNavSwiper
    //  initHomeMainNavSwiper();


    initHomeFuncs1();

    initHomeMainNavScripts();


  } else {
    $("#mainMediaNav").hide();
    $("#mainHeader ._mainNavs").hide();
  }
}

let hideMainNavPages = ['why-us', 'creators', 'contact', 'ocb-films', 'ocb-works', 'works', 'films'];
let mainNavPages = ['why-us', 'creators', 'contact', 'home', 'works'];




/////////////////////////// FULLSCREEN SHOWREEL VIDEO PLAY /////////////////////

// var vidPlayer, done = false;
// const utubVidStr = 'PYfx8HT8kHg';
// const vidTitl = 'OCBSA Studio Showreel 2022';

// window.onYouTubeIframeAPIReady = function() {
//     vidPlayer = new YT.Player('fsVidplayer', {
//         height: '390',
//         width: '640',
//         videoId: `${utubVidStr}`,
//         playerVars: { 'autoplay': 0, 'controls': 0 },
//         host: 'https://www.youtube.com',
//         events: {
//             'onReady': onPlayerReady,
//             'onStateChange': onPlayerStateChange
//         }
//     });
// }    

// function onPlayerReady(event) {
//     // event.target.playVideo();
//     console.log('Player ready!');
// }

// function onPlayerStateChange(event) {
//   console.log('Player state changed!');
//     // if (event.data == YT.PlayerState.PLAYING && !done) {
//     //     setTimeout(stopVideo, 6000);
//     //     done = true;
//     // }
// }

// function playVideo() {
//     vidPlayer.playVideo();
// }

// function pauseVideo() {
//     vidPlayer.pauseVideo();
// }

// function stopVideo() {
//     vidPlayer.stopVideo();
// }

// function loadVideoById(val) {
//     vidPlayer.loadVideoById(val, 0, "large");
// } includes




let fsPlayVidinterval1, timeInterval = 50;
function setVidVolume(turnOn = true, val = 0.5, player) {
  let vol = turnOn ? 0 : val;
  let canRemove = false;

  fsPlayVidinterval1 = setInterval(() => {
    if(turnOn) {
      // gradually increase volume
      vol += 0.01;
      if (vol > val) {
        vol = val;  
        canRemove = true;
      }

      // console.log("Increasing volume...", vol);
    } else {
      // console.log("Decreasing volume 1...", vol);
      // gradually decrease volume
      vol -= 0.05;
      if (vol < 0) {
        vol = 0;
        canRemove = true;        
      }

      // console.log("Decreasing volume...", vol);
    }

    if(canRemove) {
      clearInterval(fsPlayVidinterval1);    
    }
    player.volume = parseFloat(vol.toFixed(2));



  }, timeInterval);

 



}

function introFullScreenVid() {

  const regexMp4 = /^https:\/\/(w{3})*\.ocbsa\.studio\/.+\.(mp4)$/ig;
  const isMp4Vid = regexMp4.test(showreelVidLink);

  if (!isMp4Vid) {
    // console.log('Invalid Showreel Video Link!');
    return;
  }

  const vidPlayStr = `<video autoplay loop controls> <source src="${showreelVidLink}" type="video/mp4">Your browser does not support the video tag.</video>`;
  const vidContainers = $('#fsVidplayer').html(vidPlayStr);

  let vol = 1.0;

  setTimeout(() => {    
    if(fsPlayVidinterval1) clearInterval(fsPlayVidinterval1);
    const vidPlayer = $("#fsVidplayer video");
    // console.log(vidPlayer[0]);
    vidPlayer[0].volume = 0;
    vidPlayer[0].play();
    setVidVolume(true, vol, vidPlayer[0]);
  }, 1);


  const tlVid1 = gsap.timeline();

  tlVid1.to("#fullScreenVideo", { display: 'flex', opacity: 1, ease: "power4.out", duration: 0.6 })
  .to("#fullScreenVideo .videoContent", { display: 'flex', width: '100vw', height: '100vh', ease: "power4.out", duration: 2 }, "-=0.6")
  .to("#fullScreenVideo ._content video", { scale: 1, opacity: 1, ease: "power4.out", duration: 2.2 }, "-=1.9")
  ;

  // console.log('Intro fullscreen vid...'); 

  // const vidPlayStr = `<iframe src="https://www.youtube.com/embed/${utubVidStr}" title="${vidTitl}" frameborder="0" 
  // allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`; mainMediaNav



}

function outroFullScreenVid() {
  const tlVid1 = gsap.timeline();
  const vol = 0;
  // console.log('Outro fullscreen vid...');
  tlVid1.to("#fullScreenVideo ._content video", { scale: 2, opacity: 0, ease: "power4.out", duration: 1.8 })
  .to("#fullScreenVideo .videoContent", { display: 'flex', width: '0vw', height: '0vh', ease: "power4.out", duration: 1.2 }, "-=1.8")  
  .to("#fullScreenVideo", { display: 'none', opacity: 0, ease: "power4.out", duration: 0.8, onComplete: function (){
    const vidPlayer = $("#fsVidplayer video");
    if(fsPlayVidinterval1) clearInterval(fsPlayVidinterval1);
    setVidVolume(false, parseFloat(vidPlayer[0].volume), vidPlayer[0]);
  } }, "-=0.2")
  ;
  
}


/////////////////////////// FULLSCREEN SHOWREEL VIDEO PLAY END /////////////////////



//////////// Play Showreel Clicks ////////////////
$(document).on('click', '#playShowreelTxt', () => {
  // console.log('Playing Showreel...'); intro
  introFullScreenVid();
});
$(document).on('click', '#fullScreenVideo .closeBtn', () => {
  // console.log('Closing Showreel...');
  outroFullScreenVid();
});
//////////// Play Showreel Clicks End ////////////////



////////////// Animate outs /////////////////
const navPgSlug = ['home', 'works', 'creators'];
////////////// Animate outs End /////////////////


// console.log(dw, dh);
  
var progVal = 0;
var fakeProgressVals = [1, 1, 2,0, 0, 0, 0, 0, 2, 2, 3, 4, 5, 0, 0, 0 , 0, 0, 6, 7, 0, 0, 0, 0, 8, 9,10];
var fakeProgArrLen = fakeProgressVals.length;

const range = (start, stop) => Array.from({ length: stop - start + 1 }, (_, i) => start + i)

var fakeFreq = 10; // milliseconds

var delay1 = 100;

const updProgress = (val) => {
  var v = (val < 10) ? "00" + val : (val < 100) ? "0" + val: val;
  jQuery("#mainLoadingScreen ._bg span").text(v);
  jQuery("#mainLoadingScreen ._body ._null1 ._progress ._percent").text(v);
  jQuery("#mainLoadingScreen ._body ._null1 ._progress ._bar2").css({"width" : v + "%"});
}





/////// Color Pallette
// var colorPals = [
//   ["#cc9933", "#fff"], ["#1a1a1a", "#c4c4c4"], ["#31343c", "#b08972"], ["#f7eed6", "#cb473b"], ["#0e0e0e", "#e0e0e0"], ["#ededed", "#151515"],
//   ["#222222", "#d7d7d7"], ["#f7f7f7", "#0e0e0e"], ["#e3a3a9", "#505459"], ["#686459", "#e1cdae"], ["#e54932", "#101010"], ["#eceae5", "#838383"],
//   ["#a5918c", "#eee7e5"], ["#d09ba1", "#1b1a22"], ["#232321", "#e6e1d4"], ["#1a1d29", "#dbedff"], ["#dddad3", "#536074"], ["#ec877a", "#1f1f22"],
//   ["#187b8d", "#cad5d4"], ["#4b9471", "#c9c6bc"], ["#1a1b24", "#c2a499"], ["#8065cd", "#d5dae0"], ["#d64639", "#313131"], ["#f0e0d1", "#494c4a"],
//   ["#211828", "#cfc1cc"], ["#de9e89", "#ced0d9"], ["#f0efdb", "#76878a"], ["#d1d5de", "#2f3549"], ["#a44b84", "#d6f0fa"], ["#eedab7", "#383935"],
//   ["#43312a", "#d3d3d3"], 
// ];
///////


activPreviewNav = -1; // -1 for no top nav is currently previewed and this is the default
activPreviewPg = -1; // -1 for no page is currently previewed and this is the default
pgsLen = 34;

prevInd = -1;
curInd = -1;
intensity = 0; // normalized to 0 - 1;
maxIntensity = 0.75; // value to clamp how max intensity effect will be applied
maxNumOfBars = 16;


const initHeader = () => { }
const initFooter = () => { }


const initMainNav = () => { }

const setActivPg = () => {
  if(activPreviewPg <= -1) return;

  $('#mainHeader ._null2 ._center1 ._mainNavs ._itm1').removeClass("_activ");
  
  $('#mainHeader ._null2 ._center1 ._mainNavs ._itm1').each((i, v) => {
    if(i == activPreviewPg) {
      // $('#mainHeader ._null2 ._center1 ._mainNavs ._itm1')[i].addClass("_activ");
      $(v).addClass("_activ");
    }
  });
}

const setPreviewTopNavActiv = () => {
  if(activPreviewNav <= -1) return;

  // console.log(activPreviewNav, "...3");

  $('#mainHeader ._null2 ._center1 ._mainNavs ._itm1').removeClass("_prevActiv");
  $('#mainHeader ._null2 ._center1 ._mainNavs ._itm1').each((i, v) => {
    // console.log('Index: ', i, "  Elem: ", v);
    if(i == activPreviewNav) {
      // $('#mainHeader ._null2 ._center1 ._mainNavs ._itm1')[i].addClass("_prevActiv");
      $(v).addClass("_prevActiv");
    }
  });
}


const animNavbarWave = (ind) => {
  prevInd = activPreviewNav <= -1 ? 0 : activPreviewNav;
  activPreviewNav = ind;
  curInd = ind;

  diff = Math.abs(curInd - prevInd);

  intensity = diff / pgsLen; // normalized ... 0 to 1
  semiNumOfBars = Math.floor(intensity * maxNumOfBars * 0.5); // 0.5 to indicate half the wave spectrum

  // gsap.to($('#mainHeader ._null2 ._center1 ._mainNavs ._itm1'), 
  // { duration: 0.3, scaleY: 2, repeat: 1, yoyo: true, stagger: { amount: 1.5 } });

  // selElmsInd = [...Array(diff+1).keys()];
  var arr1 = (curInd > prevInd) ? range(prevInd, curInd) : range(curInd, prevInd);
  selElmsInd = [...arr1];
  var selElmLen = selElmsInd.length;

  // console.log(selElmsInd, curInd, prevInd);
  
  if(curInd < prevInd) selElmsInd.reverse();
  // console.log(selElmsInd);

  
  // var tl3 = gsap.timeline();

  // console.log('intensity: ', intensity);

  let newScaleY = 1;
  let factor = 1;
  let reducer;
  // let halfPgLen = Math.ceil(pgsLen / 2);

  let cnt = 0;

  selElmsInd.forEach((v, i) => {
    reducer = (cnt >= semiNumOfBars) ? selElmLen - (cnt + 1) : cnt + 1;

    // console.log('Reducer: ', reducer, i, semiNumOfBars, selElmLen);

    factor = (1 / semiNumOfBars) * reducer;

    newScaleY = 1 + (intensity * factor);

    console.log(maxNumOfBars, semiNumOfBars, cnt);

    // console.log('Reducer: ', newScaleY, factor, semiNumOfBars, reducer);

    gsap.to($('#mainHeader ._null2 ._center1 ._mainNavs ._itm1')[v], { duration: 0.6, scaleY: newScaleY, 
      repeat: 1, yoyo: true, ease: "power4.out" }); 

    cnt++;
  }); 

  // console.log("Semi Num Of Bars: ", semiNumOfBars );

}


//////////////




////////////// CLICK EVENTS //////////////


// single work post back button press
$(document).on('click', '#backToProject', function() {
  window.history.go(-1);
});

/// mobile menu
var mobileMenuState = false;

$(document).on('click', "#mainHeader ._null2 ._right1 ._mobileMenu ._topArea ._toggleMMBtn", () => {

  var tl4 = gsap.timeline();

  if (!mobileMenuState) { // mobile menu is closed so open
    tl4.to("#mainHeader ._null2 ._right1 ._mobileMenu", { duration: 0.9, background: '#111', width: "100vw", height: "100vh",
    ease: Expo.easeInOut })
    .to("#mainHeader ._null2 ._right1 ._mobileMenu ._topArea ._toggleMMBtn", { duration: 0.5, y: 20, ease: Expo.easeInOut }, "-=0.8")
    .to("#mainHeader ._null2 ._right1 ._mobileMenu ._topArea ._toggleMMBtn ._bar1", { duration: 0.5, rotation: 45, ease: Expo.easeInOut }, "-=0.9")
    .to("#mainHeader ._null2 ._right1 ._mobileMenu ._topArea ._toggleMMBtn ._bar2", { duration: 0.5, rotation: -45, y: -10, ease: Expo.easeInOut }, "-=1.2")
    
    .to("#mainHeader ._null2 ._right1 ._mobileMenu ._body", { duration: 0.9, opacity: 1, display: "block", ease: Expo.easeInOut }, "-=2.2")
    .from("#mainHeader ._null2 ._right1 ._mobileMenu ._body a", { duration: 0.5, opacity: 0, x: "100%", 
    stagger: { amount: 0.5 } , ease: Expo.easeInOut }, "-=2.2")
    ;




    mobileMenuState = true;
  } else { // mobile menu is opened so close
    tl4.to("#mainHeader ._null2 ._right1 ._mobileMenu", { duration: 1.5, background: 'rgba(17, 17, 17, 0)', width: "60px", height: "60px",
    ease: Expo.easeInOut })
    .to("#mainHeader ._null2 ._right1 ._mobileMenu ._topArea ._toggleMMBtn", { duration: 0.5, y: 0, ease: Expo.easeInOut }, "-=0.8")
    .to("#mainHeader ._null2 ._right1 ._mobileMenu ._topArea ._toggleMMBtn ._bar1", { duration: 0.5, rotation: 0, ease: Expo.easeInOut }, "-=0.9")
    .to("#mainHeader ._null2 ._right1 ._mobileMenu ._topArea ._toggleMMBtn ._bar2", { duration: 0.5, rotation: 0, y: 0, ease: Expo.easeInOut }, "-=1.2")
     ;



    mobileMenuState = false;
  } 
});



////////////// CLICK EVENTS END //////////////




  // introAnim
const playIntroAnim = () => {
  // console.log("play intro anim...");

  // console.log('Window: ', window.createjs.LoadQueue);

  // var queue1 = new createjs.LoadQueue(false);

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
        tl1.to('#mainLoadingScreen ._progScreen', { duration: 0.5, opacity: 0, scale: 0.9, display:"none" })
        .to('#mainLoadingScreen ._logoIntroScreen', { duration: 1.5, opacity: 1, scale: 1, display:"table", ease: Expo.easeInOut, }, '-=1.1')
        .from('#mainLoadingScreen ._logoIntroScreen ._logoImg span', { duration: 2, opacity: 0, y: 300, display:"none", ease: Expo.easeInOut, }, '-=1.6')
        .from('#mainLoadingScreen ._logoIntroScreen ._logoFooter ._itm', { duration: 2.5, opacity: 0, y: -30, display:"none", stagger: 0.1, ease: Expo.easeInOut, }, '-=1.8');

        clearTimeout(timeOut1);
      }, delay1);


      // 
      // introPgContents();
      // removeIntroScreen();

      animClipPath();
      animPgContentsIn();

    }

  }, fakeFreq);

  const tl = gsap.timeline();
  tl.to('#mainLoadingScreen ._ovly1', { duration: 1.5, opacity: 0, display:"none" });

  playIntro = false;
  window.localStorage.setItem('lastIntroPlayTime', Date.now());
}


const lastIntroPlayTime = window.localStorage.getItem('lastIntroPlayTime');
var introPlayFreq = 2; // in hours 0.01; 

    
if(!lastIntroPlayTime) {
    playIntro = true;	
} else {
    timeNow = Date.now();
    lastIntroPlay = new Date(parseInt(lastIntroPlayTime));
    divider = 3600000; // to convert milliseconds to hours
    diff = ((timeNow - lastIntroPlay) / divider).toFixed(2);
    
// 	console.log('Time: ', diff, introPlayFreq);

    // check if it's time to show intro again
    if (diff > introPlayFreq) {
      playIntro = true;
//       console.log("Yeah it's time to play intro again!");
    }
    
}




// remove introScreen    [ocbworkslist] mainMediaNav'

const removeIntroScreen = () => {
  var timeOut1 = setTimeout(() => {
    const tl1 = gsap.timeline();

    tl1.set("#mainPgClip", { clipPath: "polygon(0 100%, 100% 100%, 100% 100%, 0 100%)" })
    .to('#mainPgClip', { duration: 0.4, clipPath: "polygon(0 95%, 100% 95%, 100% 100%, 0 100%)" })
    .to('#mainPgClip', { duration: 1, clipPath: "polygon(0 0%, 100% 0%, 100% 100%, 0 100%)", ease: Expo.easeInOut })
    .set("#mainLoadingScreen", { opacity: 0, display:"none" })
    // jQuery("#mainLoadingScreen").css({"display": "none"});
    .to('#mainPgClip', { duration: 0.4, clipPath: "polygon(0 0%, 100% 0%, 100% 0%, 0 0%)", ease: Expo.easeOut })    

    .fromTo("#mainHeader ._mainLogo1", { x: -200, opacity: 0, display: 'none' }, 
    { duration: 1.4, x: 0, opacity: 1, display: 'block', ease: "power4.out" })    
    .fromTo("#mainHeader ._mainNavs ._itm1", { y: 20, opacity: 0, display: 'none' }, { duration: 1, y: 0, ease: "power4.out", 
    opacity: 1, display: 'block',  stagger: { amount: 0.3 } }, "-=1.2")
    .fromTo("#mainHeader ._mainMenu", {  y: 5, opacity: 0, display: 'none' }, 
    { duration: 1.2, y: 0,  ease: Expo.easeOut, opacity: 1, display: 'block'}, "-=1.8")
    .fromTo("#mainFooter ._left1 a", {  y: 30, opacity: 0, display: 'none' }, 
    { duration: 1.2, y: 0,  ease: "power4.out", opacity: 1, display: 'block' }, "-=1.2")
    .fromTo("#mainFooter ._right1 a", { y: 30, opacity: 0, display: 'none' }, 
    { duration: 1.8, y: 0, opacity: 1, display: 'block', ease: "power4.out" }, "-=1")
    .fromTo("#mainMediaNav ._mainContents." + pgNavMainClass, { x: +dw, opacity: 0 }, { duration: 3, x: 0, opacity: 1, ease: Expo.easeOut }, "-=4")
    .fromTo("#mainMediaNav ._mainContents." + pgNavMainClass + " ._itmCard", { x: +100, }, { duration: 0.2, x: 0,  ease: Expo.easeOut,  
      stagger: { each: 0.1,   } }, "-=4")
    .fromTo("#mainHeaderBgTxt span", { x: 0, opacity: 1, display: 'block' }, 
    { duration: 1.4, x: -100, opacity: 0, display: 'none', ease: "power4.out" }, "-=3")
    .then(() => {
      $("#mainMediaNav ._mainContents." + pgNavMainClass + " ._itmCard:nth-of-type(1)").addClass('hoverMainMediaNav');
    })    
    ;

    // #mainFooter ._right1 a

    // .fromTo("#mainHeaderBgTxt", { x: -100, opacity: 1, display: 'block' }, 
    // { duration: 1.4, x: 0, opacity: 0, display: 'none', ease: "power4.out" })

    // .from("#mainMediaNav ._mainContents." + pgNavMainClass + " ._itmCard", { duration: 4, x: +40, delay: 0.5, ease: Expo.easeOut, opacity: 0,
    // stagger: { amount: 3 } }, "-=2");

    clearTimeout(timeOut1);
  }, delay1);
}


// function to animate clip box to cover the page and wipe out
const animClipPath = () => {
  const tl1 = gsap.timeline();
  tl1.set("#mainPgClip", { clipPath: "polygon(0 100%, 100% 100%, 100% 100%, 0 100%)" })
    .to('#mainPgClip', { duration: 0.4, clipPath: "polygon(0 95%, 100% 95%, 100% 100%, 0 100%)" })
    .to('#mainPgClip', { duration: 1, clipPath: "polygon(0 0%, 100% 0%, 100% 100%, 0 100%)", ease: Expo.easeInOut })
    .set("#mainLoadingScreen", { opacity: 0, display:"none" })
    // jQuery("#mainLoadingScreen").css({"display": "none"});
    .to('#mainPgClip', { duration: 0.4, clipPath: "polygon(0 0%, 100% 0%, 100% 0%, 0 0%)", ease: Expo.easeOut });   
  
}


// function to animate general page contents in
const animGenPgContentsIn = () => {
  const tl1 = gsap.timeline();

  var timeOut1 = setTimeout(() => {
    
    tl1
    .set("#mainHeader ._mainNavs", { display: 'none' })
    .set("#mainHeader ._mainNavs." + pgNavMainClass, { display: 'table' })
    .fromTo("#mainHeader ._mainLogo1", { x: -200, opacity: 0, display: 'none' }, 
    { duration: 1.4, x: 0, delay: 1.4, opacity: 1, display: 'block', ease: "power4.out" })    
    .fromTo("#mainHeader ._mainNavs." + pgNavMainClass + " ._itm1", { y: 20, opacity: 0, display: 'none' }, { duration: 1, y: 0, ease: "power4.out", 
    opacity: 1, display: 'block',  stagger: { amount: 0.3 } }, "-=1.2")
    .fromTo("#mainHeader ._mainMenu a", {  y: 15, opacity: 0, display: 'none' }, 
    { duration: 1.2, y: 0,  ease: "power4.out", opacity: 1, display: 'block', stagger: { amount: 0.4 } }, "-=0.8")
    .fromTo("#mainFooter ._left1 a", {  y: 30, opacity: 0, display: 'none' }, 
    { duration: 1.2, y: 0,  ease: "power4.out", opacity: 1, display: 'block' }, "-=1.2")
    .fromTo("#mainFooter ._right1 a", { y: 30, opacity: 0, display: 'none' }, 
    { duration: 1.8, y: 0, opacity: 1, display: 'block', ease: "power4.out", stagger: { amount: 0.4 }  }, "-=1")
    .fromTo("#mainMediaNav ._selCat span", { x: -100, opacity: 0 }, 
    { duration: 1.8, x: 0, opacity: 1, ease: "power4.out", stagger: { amount: 0.4 } }, "-=2")
    .fromTo("#mainMediaNav ._topArrow", { y: -10, opacity: 0, display: 'none' }, 
    { duration: 0.8, y: 0, opacity: 1, display: 'block', ease: "power4.out" }, "-=1")
    .fromTo("#mainMediaNav ._mainContents." + pgNavMainClass, { x: +dw, opacity: 0 }, { duration: 3, x: 0, opacity: 1, ease: Expo.easeOut }, "-=4")
    .fromTo("#mainMediaNav ._mainContents." + pgNavMainClass + " ._itmCard", { x: +100, }, { duration: 0.2, x: 0,  ease: Expo.easeOut,  
      stagger: { each: 0.1,   } }, "-=4")
    .fromTo("#mainHeaderBgTxt span", { x: -100, opacity: 0, display: 'none' }, 
    { duration: 1.4, x: 0, opacity: 1, display: 'block', ease: "power4.out" }, "-=3")
    .then(() => {
      $("#mainMediaNav ._mainContents." + pgNavMainClass + " ._itmCard:nth-of-type(1)").addClass('hoverMainMediaNav');
    })    
    ;

    // .fromTo("#mainHeaderBgTxt", { x: -100, opacity: 1, display: 'block' }, 
    // { duration: 1.4, x: 0, opacity: 0, display: 'none', ease: "power4.out" })

    // .from("#mainMediaNav ._mainContents." + pgNavMainClass + " ._itmCard", { duration: 4, x: +40, delay: 0.5, ease: Expo.easeOut, opacity: 0,
    // stagger: { amount: 3 } }, "-=2");

    clearTimeout(timeOut1);
  }, delay1);

} 


const animPgContentsIn = () => {
  const tl1 = gsap.timeline();

  // console.log('Animating pg contents in: ', pg_slug);
  animGenPgContentsIn();

  switch(pg_slug) {
    case 'home':
    case 'works':

    totalNumOfNavItms = getTotalNumOfNavItms();

      if(pg_slug == 'home') {

      } else{
        
      }

      
    break;
    case 'creators':
      totalNumOfNavItms = getTotalNumOfNavItms();

    break;
    case 'why-us':

      tl1
      .set('#aboutPgSects2', { display: 'block', opacity: 1, y: 0 })
      .fromTo('#aboutPgSects1 p', 
      { opacity: 0, display: 'none', y: 200 }, { delay: 2, duration: 2, ease: 'power4.out', opacity: 1, display: 'block', y: 0,
    stagger: { amount: 1 } })
      .fromTo('#aboutPgSects2 h3', 
      { opacity: 0, display: 'none', y: 150 }, { duration: 2, ease: 'power4.out', opacity: 1, display: 'block', y: 0,
      stagger: { amount: 1 } }, "-=2")
      .fromTo('#aboutPgSects2 ._div1', 
      { opacity: 0, display: 'none', y: 100 }, { duration: 2, ease: 'power4.out', opacity: 1, display: 'block', y: 0,
      stagger: { amount: 1 } }, "-=3")
      .fromTo('#aboutPgSects2 ul li', 
      { opacity: 0, display: 'none', y: 50 }, { duration: 2, ease: 'power4.out', opacity: 1, display: 'block', y: 0,
      stagger: { amount: 1 } }, "-=3")
      .fromTo('#aboutPgSects2 ._head1', 
      { borderColor: "rgba(170, 170, 170, 0)" }, { duration: 2.5, ease: 'power4.out', borderColor: "rgba(170, 170, 170, 1)" }, "-=2")
      .fromTo('#aboutPgSects2 ._body1 ._itm:not(#aboutPgSects2 ._body1 ._itm:last-of-type)', 
      { borderColor: "rgba(153, 153, 153, 0)" }, { duration: 2.5, ease: 'power4.out', borderColor: "rgba(153, 153, 153, 1)",
      stagger: { amount: 1 } }, "-=2")
      ;
      
    break;
    default:
    break;
  }
  
  
}



// function to reset navs 1
function resetNavs1() {
  console.log('Resetting navs...')
  
  maxiMainNavMode = false;
  $('#mainMediaNavMoreInfo').fadeOut("slow");  

  /////// MainNavs
  $(`#mainMediaNav ._mainContents.${ pgNavMainClass } ._itmCard, #mainHeader ._mainNavs.${ pgNavMainClass } ._itm1`).removeClass('_maxi');
  $(`#mainMediaNav ._mainContents.${ pgNavMainClass } ._itmCard, #mainHeader ._mainNavs.${ pgNavMainClass } ._itm1`).addClass('_mini _canHover');

  ///////// MiniNavs
  $(`#mainHeader ._mainNavs.${ pgNavMainClass } ._itm1`).removeClass('_maxi _activ');
  $(`#mainHeader ._mainNavs.${ pgNavMainClass } ._itm1:eq(${activNavId})`).addClass('_prevActiv');
}




// function to animate general page contents out
const animGenPgContentsOut = () => {

  // exit maxi mode if maxi mode is on
  if(maxiMainNavMode) $("#mainMediaNavMoreInfo .backToHome").trigger('click');

  const tl1 = gsap.timeline();

  var timeOut1 = setTimeout(() => {   

    tl1    
    .fromTo("#mainHeader ._mainLogo1", { x: 0, opacity: 1, display: 'block' }, 
    { duration: 1.4, x: -100, ease: "power4.out", opacity: 0, display: 'none' })
    .fromTo("#mainHeader ._mainNavs." + pgNavMainClass + " ._itm1", { y: 0, opacity: 1, display: 'block' }, 
    { duration: 1, y: 20, ease: "power4.out", opacity: 0, display: 'none', stagger: { amount: 0.3 } }, "-=1.2")
    .fromTo("#mainHeader ._mainMenu a", { opacity: 1, display: 'block' },
    { duration: 1.2, y: 5,  ease: Expo.easeOut, opacity: 0, display: 'none', stagger: { amount: 0.6 } }, "-=1.8")  
    .fromTo("#mainHeaderBgTxt span", { x: 0, opacity: 1, display: 'block' }, 
    { duration: 1.4, x: -100, opacity: 0, display: 'none', ease: "power4.out" })
    .fromTo("#mainFooter ._left1 a", { y: 0, opacity: 1, display: 'block' }, 
    { duration: 1.2, y: 10,  opacity: 0, display: 'none', ease: "power4.out", stagger: { amount: 0.6 }  }, "-=1.2")
    .fromTo("#mainFooter ._right1 a", { y: 0, opacity: 1, display: 'block' }, 
    { duration: 1.8, y: 30, display: 'none', opacity: 0, ease: "power4.out", stagger: { amount: 0.6 } }, "-=1")
    .fromTo("#mainMediaNav ._selCat span", { x: -100, opacity: 0 }, 
      { duration: 1.8, x: 0, opacity: 1, ease: "power4.out", stagger: { amount: 0.4 } }, "-=2")
    .fromTo("#mainMediaNav ._topArrow", { y: 0, opacity: 1, display: 'block' }, 
    { duration: 0.8, y: 5, opacity: 0, display: 'none', ease: "power4.out" }, "-=1")
    .fromTo("#mainMediaNav ._mainContents." + pgNavMainClass, { x: 0, opacity: 1, }, { duration: 3, x: +dw, opacity: 0, ease: Expo.easeOut }, "-=4")
    .fromTo("#mainMediaNav ._mainContents." + pgNavMainClass + " ._itmCard", { x: 0, }, { duration: 0.2, x: -100 ,  ease: Expo.easeOut,  
      stagger: { each: 0.1, } }, "-=4")
    .fromTo("#mainHeaderBgTxt span", { x: 0, opacity: 1, display: 'block' }, 
    { duration: 1.4, x: -100, opacity: 0, display: 'none', ease: "power4.out" }, "-=3")   
    ;
  
      clearTimeout(timeOut1);
    }, delay1);

}


const animPgContentsOut = () => {
  const tl1 = gsap.timeline();

  resetNavs1();

  

  console.log('Animating pg contents out: ', pg_slug);
  animGenPgContentsOut();

  switch(pg_slug) {
    case 'home':
    case 'works':

      if(pg_slug == 'home') {

      } else{
          
        
      }    
    break;
    case 'creators':
    break;
    case 'why-us':
      tl1
      .fromTo('#aboutPgSects2', { display: 'block', opacity: 1 }, 
      { duration: 3, ease: 'power4.out', display: 'none', opacity: 0, y: 200 })
      .fromTo('#aboutPgSects2 ._body1 ._itm:not(#aboutPgSects2 ._body1 ._itm:last-of-type)', 
      { borderColor: "rgba(153, 153, 153, 1)" }, { duration: 1.5, ease: 'power4.out', borderColor: "rgba(153, 153, 153, 0)",
      stagger: { amount: 1 } }, "-=3")
      .fromTo('#aboutPgSects2 ._head1', 
      { borderColor: "rgba(170, 170, 170, 1)" }, { duration: 1.5, ease: 'power4.out', borderColor: "rgba(170, 170, 170, 0)" }, "-=3")
      .fromTo('#aboutPgSects2 ul li', 
      { opacity: 1, display: 'block', y: 0 }, { duration: 1, ease: 'power4.out', opacity: 0, display: 'none', y: 50,
      stagger: { amount: 1 } }, "-=3")
      .fromTo('#aboutPgSects2 ._div1', 
      { opacity: 1, display: 'block', y: 0 }, { duration: 1, ease: 'power4.out', opacity: 0, display: 'none', y: 100,
      stagger: { amount: 1 } }, "-=3")
      .fromTo('#aboutPgSects2 h3', 
      { opacity: 1, display: 'block', y: 0 }, { duration: 1, ease: 'power4.out', opacity: 0, display: 'none', y: 150,
      stagger: { amount: 1 } }, "-=3")
      .fromTo('#aboutPgSects1 p', 
      { opacity: 1, display: 'block', y: 0 }, { duration: 1, ease: 'power4.out', opacity: 0, display: 'none', y: 200,
    stagger: { amount: 1 } }, "-=3")      
      ;
      
    break;
    default:
    break;
  }
  
  
}


    
const animEnter = (container) => {
    // console.log('AnimEnter 1...');
    // 	console.log("AnimEnter 1: ", curPgObj, nextPgObj, categories); ocbsa

    // load json data if not available or time is due for a reload
    switch(pg_slug) {
      case 'home':
      break;
      case 'works':
        // $.ajax('https://ocbsa.studio/wp-json/wp/v2/posts',
        // {
        //   type: "GET",
        //   dataType: 'json', // type of response data
        //   timeout: 5000,     // timeout milliseconds
        //   success: function (data,status,xhr) {   // success callback function
        //     console.log('Sucess! interaction with wordpress restapi: ', data);
        //   },
        //   error: function (jqXhr, textStatus, errorMessage) { // error callback 
        //     console.log('Error interacting with wordpress restapi...');
        //   }
        // });
      break;
      case 'creators':
      break;
      case 'why-us':
      break;
      default:
      break;
    }

    if(playIntro) { 
      playIntroAnim();
    } else {
      animClipPathRemove();
      animPgContentsIn();
    }

    return new Promise((resolve, reject) => {
        setTimeout(() => {
            console.log("Anim Enter 2...");
            resolve();
        }, 2000);	
    });
  };


const animClipPathCover = () => {
  const tl1 = gsap.timeline();
  tl1.set("#mainPgClip", { display: 'block', opacity: 1, clipPath: "polygon(0 100%, 100% 100%, 100% 100%, 0 100%)" })
    .to('#mainPgClip', { duration: 0.4, clipPath: "polygon(0 95%, 100% 95%, 100% 100%, 0 100%)" })
    .to('#mainPgClip', { duration: 1, clipPath: "polygon(0 0%, 100% 0%, 100% 100%, 0 100%)", ease: Expo.easeInOut });

    console.log('Anim ClipPath Cover...');
}

const animClipPathRemove = () => {
  const tl1 = gsap.timeline();
  tl1.set("#mainLoadingScreen", { opacity: 0, display:"none" })
    // jQuery("#mainLoadingScreen").css({"display": "none"});
    .fromTo('#mainPgClip', { clipPath: "polygon(0 0%, 100% 0%, 100% 100%, 0 100%)" }, 
    { duration: 0.4, clipPath: "polygon(0 0%, 100% 0%, 100% 0%, 0 0%)", ease: Expo.easeOut });  
    
    console.log('Anim ClipPath Remove...');
  
}

const animLeave = (container, done) => {
//   console.log("AnimLeave 1: ", curPgObj, nextPgObj, categories);
  

  animPgContentsOut();
  animClipPathCover();

    return new Promise((resolve, reject) => {
        setTimeout(() => {
            console.log("Anim Leave 2...");
            done();
            resolve();
        }, 2000);		
    });
};



const animEnterSingleOCBWork = (container) => {
  const tl1 = gsap.timeline();

  ////// show playShowreelTxt & select Categories area
  $('#playShowreelTxt, #mainMediaNav ._selCat').hide();
  // togglePlayShowReel(true);
  

  // if we're just coming from a single work post preview then play this animation
  if(justPreviewedSingleWork) {

    tl1
    .set(`#mainHeader ._mainNavs:not(.${ pgNavMainClass })`, { display: 'none', opacity: 0 })
    .fromTo('#mainHeader ._extraFooterInfos ._body ._center ._exploreBtn', { display: 'none', opacity: 0, y: -100 }, 
    { duration: 2, ease: 'power4.out', display: 'block', opacity: 1, y: 0 })
    // .fromTo('#mainHeader ._extraFooterInfos ._body ._center ._visitSiteBtn', { display: 'none', opacity: 0, y: 100 }, 
    // { duration: 2, ease: 'power4.out', display: 'block', opacity: 1, y: 0 })
    .fromTo(`#mainHeader ._mainNavs.${ pgNavMainClass }`, { opacity: 0 }, 
    { duration: 1, y: 20, ease: "power4.out", y: 0, opacity: 1 }, "-=1.2")
    .fromTo("#mainHeader ._extraHeaderInfos", { opacity: 1, display: 'block' }, 
    { duration: 1, y: 0, ease: "power4.out", y: -100, opacity: 0, display: 'none' }, "-=1.2")
    ;

  } else {

    tl1
    .set(`#mainHeader ._mainNavs:not(.${ pgNavMainClass })`, { display: 'none', opacity: 0 })
    .fromTo('#mainHeader ._extraFooterInfos ._body ._center ._exploreBtn', { display: 'block', opacity: 1, y: 0 }, 
    { duration: 2, ease: 'power4.out', display: 'none', opacity: 0, y: -100 })
    // .fromTo('#mainHeader ._extraFooterInfos ._body ._center ._visitSiteBtn', { display: 'none', opacity: 0, y: 100 }, 
    // { duration: 2, ease: 'power4.out', display: 'block', opacity: 1, y: 0 })
    .fromTo(`#mainHeader ._mainNavs.${ pgNavMainClass }`, { y: 0, opacity: 1 }, 
    { duration: 1, y: 20, ease: "power4.out", opacity: 0, display: 'none' }, "-=1.2")
    .fromTo("#mainHeader ._extraHeaderInfos", { y: -100, opacity: 0, display: 'none' }, 
    { duration: 1, y: 0, ease: "power4.out", opacity: 1, display: 'block' }, "-=1.2")
    ;
  }





  // console.log('Just played anim enter single ocbwork animation ', pgNavMainClass);
  

  return new Promise((resolve, reject) => {
    setTimeout(() => {
      resolve();
    }, 1500);
  });

}

const animLeaveSingleOCBWork1 = (container, done) => {
  const tl1 = gsap.timeline();
  
  // backToProject Url
  // console.log('Current url: ', window.location.href, $('#backToProject'));

  // console.log('Active Nav Id: ', activNavId);
  bgTxtElm = `#mainMediaNavMoreInfo .bigTxt.${ pgNavMainClass } [class*="itm"]:eq(${ activNavId })`;
  bgTxtElm_ = `#mainMediaNavMoreInfo .bigTxt.${ pgNavMainClass } .itm:nth-of-type(${ activNavId + 1 })`;
  bgTxtElm1 = `#mainMediaNavMoreInfo .bigTxt.${ pgNavMainClass } .itm:nth-of-type(${ activNavId + 1 }) ._top .txtBx`;
  bgTxtElm2 = `#mainMediaNavMoreInfo .bigTxt.${ pgNavMainClass } .itm:nth-of-type(${ activNavId + 1 }) ._btm .txtBx`;
  // const bgTxtElm2 = `#mainMediaNavMoreInfo .bigTxt.${ pgNavMainClass } [class*="itm"] .txtBx._sp1, #mainMediaNavMoreInfo .bigTxt.${ pgNavMainClass } [class*="itm"] .txtBx._sp2`;

  const txt1 = $(bgTxtElm).attr('txt1');
  const txt2 = $(bgTxtElm).attr('txt2');

  const txt1Arr = txt1.split('');
  const txt2Arr = txt2.split('');  

  //
  const activMediaNavLength = $(`#mainMediaNav ._mainContents.${ pgNavMainClass } ._itmCard`).length;
  let start = 0; let stop = activNavId; let step = 1;
  mainMediaNavArrBefore = (activNavId <= start) ? [] : Array.from( { length: (stop - start) / step }, (v, i) => {
    let ind = start + i * step; 
    let el = $(`#mainMediaNav ._mainContents.${ pgNavMainClass } ._itmCard:nth-of-type(${ ind + 1})`);
    return el;
  });

  start = ( activNavId < activMediaNavLength ) ? (activNavId + 1) : activMediaNavLength; 
  stop = activMediaNavLength;

  mainMediaNavArrAfter = Array.from( { length: (stop - start) / step }, (v, i) => {
    let ind = start + i * step; 
    let el = $(`#mainMediaNav ._mainContents.${ pgNavMainClass } ._itmCard:nth-of-type(${ ind + 1 })`);
    return el;
  } );
 
  activMainNavEl = $(`#mainMediaNav ._mainContents.${ pgNavMainClass } ._itmCard:nth-of-type(${ activNavId + 1 })`);

  // console.log(Array.from( {length: (8 - 1) / 2 }, (v, i) => 1 + i * 2  ));

  // console.log('Main Media Nav Arrays... ', activMediaNavLength, mainMediaNavArrBefore, activNavId, mainMediaNavArrAfter);
  // console.log('Main Media Nav Arrays... ', activMediaNavLength, mainMediaNavArrBefore, activMainNavEl, mainMediaNavArrAfter);



  // console.log(txt1Arr, txt2Arr);

  // console.log(gsap.utils.toArray(bgTxtElm1), txt1, txt2);

  // console.log('BgTxtElm1: ', $(bgTxtElm1).length);

  // $('#mainMediaNavMoreInfo .bigTxt [class*="itm"] .txtBx').css({ "margin-right": '2px' });
  // $('#mainMediaNavMoreInfo .bigTxt [class*="itm"] .txtBx._sp1, #mainMediaNavMoreInfo .bigTxt [class*="itm"] .txtBx._sp2').css({ "width": 0 });

  let leftX = -1;
  let leftX1 = -1;

  tl1
  .to(bgTxtElm_, { duration: 1, textAlign: 'left', ease: 'expo.out'})
  .to('#mainMediaNavMoreInfo .backToHome', { duration: 1, x: 100, opacity: 0, display: 'none', ease: 'expo.out'}, '-=1')
  .to(bgTxtElm1, { 
    duration: 1,    
    left: (i, v) => {
      // console.log('BgTxtElm1: ', i, v);

      // if(v.classList.contains('_sp1')) v.style.width = 0;
      if(v.classList.contains('_sp1')){
        leftX -= 4.5;
      } else {
        leftX -= 2;
      }
      return leftX + "%";
    },
    ease: 'expo.out', 
    stagger: { amount: 0.4 }
  }, '-=1.0' )
  // .to(bgTxtElm1, { duration: 0.8, marginRight: 2, ease: "power4.out" })
  // .to(bgTxtElm2, { duration: 0.8, marginRight: 2, ease: "power4.out" })
  // .fromTo('#mainHeader ._extraFooterInfos ._body ._center ._visitSiteBtn', { display: 'block', opacity: 1, y: 0 }, 
  // { duration: 2, ease: 'power4.out', display: 'none', opacity: 0, y: -100 })
  // .fromTo('#mainHeader ._extraFooterInfos ._body ._center ._exploreBtn', { display: 'block', opacity: 1, y: 0 }, 
  // { duration: 2, display: 'none', opacity: 0, y: 200, ease: 'power4.out' })

  .to(bgTxtElm2, { 
    duration: 1,
    left: (i, v) => {
      // console.log('BgTxtElm2: ', i, v);

      if(v.classList.contains('_sp1')){
        leftX1 -= 4.5;
      } else {
        leftX1 -= 2;
      }
      return leftX1 + "%";
    },
    ease: 'expo.out', 
    stagger: { amount: 0.4 }
  }, '-=1.0' )

  .to(activMainNavEl, { duration: 1.5, y: -dh, ease: 'expo.out' }, "-=2")
  .to(mainMediaNavArrBefore, { duration: 1.5, x: -dw, ease: 'expo.out', stagger: { amount: 0.8 } }, "-=2")
  .to(mainMediaNavArrAfter, { duration: 1.5, x: dw, ease: 'expo.out', stagger: { amount: 0.8 } }, "-=2")


  ;

  return new Promise((resolve, reject) => {
    setTimeout(() => {
      // console.log('Leave SingleOCBWork Animation...');
      done();
      resolve();
    }, 1500);
  })
}


let overlayMainSliderActiveInd = 0;
const animLeaveSingleOCBWork2 = (container, done) => {

  tl = gsap.timeline();
  tl1 = gsap.timeline();
  let offsetY_slide1 = dh * 1.2;

  isSingleWorkPost = false;
  justPreviewedSingleWork = true;
  // console.log('Single Post Mode display is now off!', bigTxtInitLeftVars1, bigTxtInitLeftVars2);

  /////////////// slide out overlay main slider
  overlayMainSliderActiveElm = $(`.ocbsa-works #ocbSingleWorkSwiper .allSlides .slide${ overlayMainSliderActiveInd }`);
  tl1
  .to( overlayMainSliderActiveElm, { duration: 2, y: offsetY_slide1, opacity: 0, display: 'none' , ease: 'power4.out' })
  ;
  //////////////////////////////////////////////////

  // call the anim single slides out if available
  if( animateSingleSlidesOut ) console.log('anim single slide out available'); animateSingleSlidesOut();


  tl  
  .to(bgTxtElm_, { duration: 1, textAlign: 'center', ease: 'expo.out'})
  .to(bgTxtElm1, { 
    duration: 1,    
    left: 0,
    ease: 'expo.out', 
    stagger: { amount: 0.4 }
  }, '-=1.0' )

  .to(bgTxtElm2, { 
    duration: 1,
    left: 0,
    ease: 'expo.out', 
    stagger: { amount: 0.4 }
  }, '-=1.0' )
  .to('#mainMediaNavMoreInfo .backToHome', { duration: 1, x: 0, opacity: 1, display: 'block', ease: 'expo.out'}, '-=1')

  .to(activMainNavEl, { duration: 1.5, y: 0, ease: 'expo.out' }, "-=2")
  .to(mainMediaNavArrBefore, { duration: 1.5, x: 0, ease: 'expo.out', stagger: { amount: 0.8 } }, "-=2")
  .to(mainMediaNavArrAfter, { duration: 1.5, x: 0, ease: 'expo.out', stagger: { amount: 0.8 } }, "-=2")

  .set(`#mainHeader ._mainNavs:not(.${ pgNavMainClass })`, { display: 'none', opacity: 0 })
  .fromTo('#mainHeader ._extraFooterInfos ._body ._center ._exploreBtn', { display: 'none', opacity: 0, y: -100 }, 
  { duration: 2, ease: 'power4.out', display: 'block', opacity: 1, y: 0 })
  // .fromTo('#mainHeader ._extraFooterInfos ._body ._center ._visitSiteBtn', { display: 'none', opacity: 0, y: 100 }, 
  // { duration: 2, ease: 'power4.out', display: 'block', opacity: 1, y: 0 })
  .fromTo(`#mainHeader ._mainNavs.${ pgNavMainClass }`, { y: 20, opacity: 0 }, 
  { duration: 1, y: 0, ease: "power4.out", opacity: 1, display: 'block' }, "-=1.2")
  .fromTo("#mainHeader ._extraHeaderInfos", { y: 0, opacity: 1, display: 'block' }, 
  { duration: 1, y: -100, ease: "power4.out", opacity: 0, display: 'none' }, "-=1.2")
  ;



  // console.log('Anim leave 2... canShowSingleWorkPost: ', canShowSingleWorkPost, curPgObj.container);
  if( !canShowSingleWorkPost ) animLeave(curPgObj, done);

  // we're done showing single work post let's reset the priviledge
  canShowSingleWorkPost = false;

  return new Promise((resolve, reject) => {
    setTimeout(() => {
      done();
      resolve();
    }, 1500);
  });

}




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
    // setBodySize();
});


function setBodySize() {
    dw = jQuery(window).width();
    dh = jQuery(window).height();

    // jQuery("#bodyContent").css({ 'width': dw + 'px', 'height': dh + 'px !important' });
    // jQuery("#bodyContent").width(dw);
    jQuery("#bodyContent").height(dh);
    // console.log('width: ' + dw + 'px', 'height: ' + dh + 'px');
}

    
    
////////////////// BARBA JS ////////////////////////////////// stagger:
let curPgObj, nextPgObj;

 // This function helps add and remove js and css files during a page transition

 barba.hooks.beforeLeave(({ current, next, trigger }) => {
  if(maxiMainNavMode) {

    // isSingleWorkPost = true;
    // initSingleOCBSAWork();
    // console.log('MaxiMainNavMode: ', maxiMainNavMode, initSingleOCBSAWork);
  }

  // console.log('Trigger: ', trigger.href, trigger.getAttribute('href'));
  return false;
 });

  barba.hooks.beforeEnter(({ current, next }) => {

    // console.log("Running...1 ... current: ", current.namespace, "  next: ", next.namespace);

    // set pg_slug
    pg_slug = next.namespace;
    
    
    // remove home scrolling text
    $('#playShowreelTxt').css({ 'display' : 'none' });

    // update menu
    let activInd = -1;
    $("#mainHeader ._mainMenu a").removeClass('_activ');
    $("#mainHeader ._mainMenu a").each(function(i, v) {

        let href = $(this).attr('href');
        // href = href.replace(/https\:\/\/www.ocbsa.studio\//g, '').replace(/\/$/g, '').replace(/\-/g, ' ');
        href = href.replace(/https\:\/\/www.ocbsa.studio\//g, '').replace(/\/$/g, '');
        let hrefArr = href.split('/');
        href = hrefArr[0];
        // console.log(i, href, pg_slug);

        if(href === pg_slug) {
          $(this).addClass('_activ');
          activPgTitle = href.replace(/\-/g, ' ');
        } else if(href === '' && pg_slug == 'home') {
          $(this).addClass('_activ');

          activPgTitle = 'home';

          // show home scrolling text
          $('#playShowreelTxt').css({ 'display' : 'table' });
        }

    });  
    
    // update page title 
    $("#mainHeaderBgTxt span").text(activPgTitle);

    curPgObj = current;
    nextPgObj = next;

    // do we have ocbsa works in the categories
    allCatNames = [];
    categories.filter((v) => { allCatNames.push(v.name); });

    // console.log(allCatNames);
    // isOCBworksArr = categories.filter(v => v.name === 'ocbsa works');    
    // isOCBworks = Array.isArray(isOCBworksArr) ? (isOCBworksArr.length > 0 ? true : false) : false;

    // console.log('OCBSA STATUS: ', isOCBworksArr, isOCBworks) 

    // check and toggle main nav
    if((hideMainNavPages.includes(next.namespace) || 
    allCatNames.includes('ocbsa films') || 
    allCatNames.includes('ocbsa works') || 
    allCatNames.includes('featured work') ||
    allCatNames.includes('ocbsa creator')) && pg_slug !== 'home') {

      // // Check if we're dealing with a single post first
      // if(allCatNames.length > 0 && allCatNames.includes('ocbsa works')) {

      // } else {
        
      // }
      showMainNav = false;
    } else {
      showMainNav = true;
    }


    if( isSingleWorkPost ) {
      return;
    }



    toggleMainNavVisibility();

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


    // animClipPathRemove();
    // animPgContentsIn();

  });


// function to initialize every ocbsa work single post
const initSingleOCBSAWork = () => {
  
  const tl1 = gsap.timeline();

  offsetY_slide1 = dh * 1.2;
  offsetY_slide2 = (offsetY_slide1 * 0.4) - 200;

  tl1
  .set('.ocbsa-works #ocbSingleWorkSwiper', { display: 'block' })
  .set('.ocbsa-works #ocbSingleWorkSwiper .allSlides [class^="slide"]', { y: offsetY_slide1 })
  .set('.ocbsa-works #backToProject', { y: -150, display: 'block', opacity: 1 })

  // .set('.ocbsa-works #visitSiteBtn', { y: 250, display: 'block', opacity: 1 })
  // .set('.ocbsa-works #ocbSingleWorkSwiperSideBar', { y: dh, display: 'block', opacity: 0 })

  ;

  // single page + ocbsa works post active
  isSingleWorkPost = true;
  // console.log('Its a single page and its the ocbsa work post...');

  let slideWidth = dw <= 1000 ? dw * 0.8 :  800;
  let slideHeight = dw <= 1000 ? dh * 0.8 :  400;
  let allSlidesLeft = dw <= 1000 ? dw * 0.1 :  (dw - 800) * 0.5;

  // set slide width & height
  // $(".ocbsa-works #ocbSingleWorkSwiper").css({ width: dw, height: dh, 'border': "10px solid yellow" });
  // $(".ocbsa-works #ocbSingleWorkSwiper").css({'border': "10px solid yellow" });
  $(".ocbsa-works #ocbSingleWorkSwiperSideBar ._holder").css({ height: dh * 0.6 });
  $(".ocbsa-works #ocbSingleWorkSwiper .allSlides").css({ left: allSlidesLeft + 'px' });
  $(".ocbsa-works #ocbSingleWorkSwiper .allSlides [class^='slide']").css({ display: 'none', width: slideWidth + 'px', height: slideHeight + 'px' });
  // $(".ocbsa-works #ocbSingleWorkSwiper, .ocbsa-works #ocbSingleWorkSwiperSideBar, .ocbsa-works #backToProject").css( { 'z-index' : 10002 });

  $("#barba-wrapper").css( { 'z-index' : 10002, width: 'auto', height: 'auto', 'pointer-events' : 'none' });
  $(".ocbsa-works #ocbSingleWorkSwiperSideBar, .ocbsa-works #backToProject, .ocbsa-works #visitSiteBtn").css( { 'pointer-events' : 'auto' });




  // get first slide image
  // let slideImg1 = $(".ocbsa-works #ocbSingleWorkSwiper .allSlides .slide1")

  let initSlideInd = 0;
  let mainSliderActiveInd = 0;
  let mainSliderNextInd = 0;
  let mainSliderActiveElm, mainSliderNextElm;
  
  let slideImg0_url = $(".ocbsa-works #ocbSingleWorkSwiperSideBar ._thumb[uid='" + initSlideInd + "']").attr('imgurl');

  if(slideImg0_url) {
    // console.log('SlideImg Url: ', slideImg0_url);
    $(".ocbsa-works #ocbSingleWorkSwiper .allSlides .slide0").css({ 'background-image': `url(${ slideImg0_url })` });
    $(".ocbsa-works #ocbSingleWorkSwiper .allSlides .slide0").addClass('has-bg-image');
  }


  // mouseSideBarScrollTimeout1
  let mouseSideBarScrollTimeout1;


  // tl1
  // .to('#ocbSingleWorkSwiper .allSlides .slide1', { y: 0, onComplete: () => {}})
  // ;





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
    initialSlide: initSlideInd,
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





    // Animate slides in
    animateSingleSlidesIn(1);  
    


    // function to animate single slides in
function animateSingleSlidesIn (delay = 0) {
  const tlIn = gsap.timeline();
  const visitSiteEl = $(".ocbsa-works #visitSiteBtn")
  const visitSite = (visitSiteEl.length > 0) ? true : false;



  if(visitSite) {
    // console.log('Animating single slides in...');
    tlIn
    .fromTo('.ocbsa-works #ocbSingleWorkSwiper .allSlides .slide0', { y: offsetY_slide1, opacity: 0, display: 'none' }, 
    { delay, duration: 2, y: offsetY_slide2, opacity: 1, display: 'block', ease: 'power4.out' })
    .fromTo(".ocbsa-works #ocbSingleWorkSwiperSideBar ._holder", {  y: offsetY_slide1, opacity: 0 }, 
    {  duration: 2, y: 0, opacity: 1, ease: 'power4.out' }, "-=1.8")
    .fromTo('.ocbsa-works #backToProject', { y: -150, opacity: 0, display: 'none' }, 
    { duration: 2, y: 20, opacity: 1, display: 'block', ease: 'power4.out' }, "-=1.8")
    .fromTo(".ocbsa-works #ocbSingleWorkSwiperSideBar ._highlighter", {  y: 200, opacity: 0 }, 
    {  duration: 2, y: 0, opacity: 1, ease: 'power4.out' }, "-=1.6")
    .fromTo(".ocbsa-works #ocbSingleWorkSwiperSideBar ._holder .swiper-slide", {  y: 200, opacity: 0 }, 
    {  duration: 2, y: 0, opacity: 1, ease: 'power4.out', stagger: { amount: 0.8 } }, "-=1.6")        
    .fromTo('.ocbsa-works #visitSiteBtn', { y: 250, opacity: 0, display: 'none' }, 
    { duration: 2, y: -30, opacity: 1, display: 'block', ease: 'power4.out' }, "-=3")
    ;
  } else {
    tlIn
    .fromTo('.ocbsa-works #ocbSingleWorkSwiper .allSlides .slide0', { y: offsetY_slide1, opacity: 0, display: 'none' }, 
    { delay, duration: 2, y: offsetY_slide2, opacity: 1, display: 'block', ease: 'power4.out' })
    .fromTo(".ocbsa-works #ocbSingleWorkSwiperSideBar ._holder", {  y: offsetY_slide1, opacity: 0 }, 
    {  duration: 2, y: 0, opacity: 1, ease: 'power4.out' }, "-=1.8")
    .fromTo('.ocbsa-works #backToProject', { y: -150, opacity: 0, display: 'none' }, 
    { duration: 2, y: 20, opacity: 1, display: 'block', ease: 'power4.out' }, "-=1.8")
    .fromTo(".ocbsa-works #ocbSingleWorkSwiperSideBar ._highlighter", {  y: 200, opacity: 0 }, 
    {  duration: 2, y: 0, opacity: 1, ease: 'power4.out' }, "-=1.6")
    .fromTo(".ocbsa-works #ocbSingleWorkSwiperSideBar ._holder .swiper-slide", {  y: 200, opacity: 0 }, 
    {  duration: 2, y: 0, opacity: 1, ease: 'power4.out', stagger: { amount: 0.8 } }, "-=1.6")
    ;
  }

  
  sideBarSwiper.update();

}


  // slide thumb clicks
  // $(document).on('click', '#ocbSingleWorkSwiperSideBar ._thumb', function(e) {
  //   // console.log('Side thumb clicked: ', e);
  //   scrollHighlighterToActiveSlide(sideBarSwiper);
  // });

  // function to scroll highlighter to active slide position
  function scrollHighlighterToActiveSlide(swpr) {
    const index_currentSlide = swpr.realIndex;

    mainSliderNextInd = index_currentSlide;
    overlayMainSliderActiveInd = mainSliderNextInd;

    slideMainSlideToActiveSlide();

    const currentSlide = swpr.slides[index_currentSlide];
    const curSlideTopOffset = 145;
    // const curSlideTop = currentSlide.getBoundingClientRect().top + (window.scrollY || window.pageYOffset) - curSlideTopOffset;
    const curSlideTop = currentSlide.getBoundingClientRect().top - curSlideTopOffset;
    // console.log('Current slide index: ', index_currentSlide);
    // console.log('Current slide index: ', currentSlide.getBoundingClientRect().top + (window.scrollY || window.pageYOffset));


    // console.log('Current slide index: ', currentSlide.getBoundingClientRect().top);

    $(".ocbsa-works #ocbSingleWorkSwiperSideBar ._highlighter").css({ top: curSlideTop });
  }


  // function to scroll main slide from previous to current slide
  function slideMainSlideToActiveSlide() {
    if(mainSliderNextInd == mainSliderActiveInd) return;

    const tlIn = gsap.timeline();

    // set slide direction
    let slideUp = ( mainSliderNextInd > mainSliderActiveInd ) ? true : false;

    // let curSlideHtmls = $("")

    // console.log('Sliding main slider to active slide...', mainSliderActiveInd, mainSliderNextInd);

    // set slider current active element
    mainSliderActiveElm = $(`.ocbsa-works #ocbSingleWorkSwiper .allSlides .slide${ mainSliderActiveInd }`);

    // set slider next element if we're not sliding out
    if ( mainSliderNextInd > -1 ) {

      mainSliderNextElm = $(`.ocbsa-works #ocbSingleWorkSwiper .allSlides .slide${ mainSliderNextInd }`);

      // append next slide if not available
      if ( !mainSliderNextElm ) {
        let nextSlideElm = `<div class="slide${ mainSliderNextInd }" style="display: 'none'; width: ${ slideWidth } + 'px'; height: ${ slideHeight } + 'px';"></div>`;
        $(".ocbsa-works #ocbSingleWorkSwiper .allSlides").innerHTML += nextSlideElm;
  
        mainSliderNextElm = $(`.ocbsa-works #ocbSingleWorkSwiper .allSlides .slide${ mainSliderNextInd }`);
      }

      // add background image to next slide if not present
      let hasBgImage = mainSliderNextElm.hasClass('has-bg-image');
      if ( !hasBgImage ) {
        // get image url
        let imgUrl = $(`.ocbsa-works #ocbSingleWorkSwiperSideBar ._thumb[uid='${ mainSliderNextInd }']`).attr('imgurl');
        // add bg image
        if (imgUrl) {
          mainSliderNextElm.css({ 'background-image': `url(${ imgUrl })` });
          mainSliderNextElm.addClass('has-bg-image');
        }
      }
    }



    



    if( slideUp ) {

      // position next slide, slide active index slide away, slide next index slide in
      tlIn
      .to( mainSliderActiveElm, { duration: 2, y: -1 * offsetY_slide1, opacity: 0, display: 'none' , ease: 'power4.out' })
      .fromTo( mainSliderNextElm, { y: offsetY_slide1, opacity: 0, display: 'none' }, 
      { duration: 2, y: offsetY_slide2, opacity: 1, display: 'block', ease: 'power4.out' }, "-=1.8")
      ;

    } else {
      if ( mainSliderNextInd > -1 ) {

        // position next slide, slide active index slide away, slide next index slide in
        tlIn
        .to( mainSliderActiveElm, { duration: 2, y: offsetY_slide1, opacity: 0, display: 'none' , ease: 'power4.out' })
        .fromTo( mainSliderNextElm, { y: -1 * offsetY_slide1, opacity: 0, display: 'none' }, 
        { duration: 2, y: offsetY_slide2, opacity: 1, display: 'block', ease: 'power4.out' }, "-=1.8")
        ;

      } else {
        tlIn
        .to( mainSliderActiveElm, { duration: 2, y: offsetY_slide1, opacity: 0, display: 'none' , ease: 'power4.out' }, "-=1.8")
        ;
      }
    }

    // update active index slide
    mainSliderActiveInd = mainSliderNextInd;

  }

}
////////// end of initSingOCBSAWork ////////////////

// check if link is same url
//  $(document).on('click', 'a', function(e) {
//   const url = $(this).attr('href');
//   e.preventDefault();
//   console.log('Link pressed: ', $(this).attr('href'), window.location.href);
//   if(url == window.location.href) return;
// });




barba.hooks.enter(({ current, next }) => {
  
  ///////////////////////// for single pages /////////////////
  // setTimeout(() => {
    let postSingleOrNot = $('main').attr('data-post-type');
    if(postSingleOrNot == 'single') {
      // console.log('This post is single');

      // #ocbSingleWorkSwiper

      // isSingleWorkPost = true;

    } else {
      // console.log('This post is not single');
    }
  // }, 500);

});


barba.hooks.afterEnter(({ current, next }) => {
  
  ///////////////////////// for single pages /////////////////
  // setTimeout(() => {
    if ( maxiMainNavMode ) {
    }

});



barba.init({
    debug: true,
    timeout: 15000,
    // prevent: ({ el }) => el.classList && el.classList.contains('prevent-barba'),
    // prevent: ({ el }) => el.target.getAttribute('href') && el.target.getAttribute('href') == window.location.href,
    transitions: [
      {
        sync: false,
        name: "transition-1",
        async beforeEnter(data) {
          // console.log("Before Enter: ");
        },
        async once({ next }) {
            

            // add pg_slug as class to the body class
            let bodyClasses = $('body').attr('class');
            // does this bodyClasses contain pg_slug class
            let containsPgClass = bodyClasses.includes(pg_slug);
            if ( !containsPgClass ) {
              bodyClasses = pg_slug + " " + bodyClasses;
            }

            $('body').attr('class', bodyClasses);
            // console.log("Once...", pg_slug, containsPgClass, bodyClasses);
            console.log("Once...", pg_slug, maxiMainNavMode);
          
          // only play this enter animation if user is not visiting a single works post
          if(maxiMainNavMode) {
            // play anim enter for single ocbsa works post
            // console.log('Playing anim enter for single ocbsa work post...');
            animEnterSingleOCBWork(next.container);
          } else {
            // play anim enter for other pages
            return animEnter(next.container);
          }
        },
        async enter({ next }) {
          console.log("enter...", pg_slug, maxiMainNavMode, isSingleWorkPost);
          // only play this enter animation if user is not visiting a single works post
          if(maxiMainNavMode) {
            // play anim enter for single ocbsa works post
            // console.log('Playing anim enter for single ocbsa work post...');
            animEnterSingleOCBWork(next.container);

            // single page + ocbsa works post active
            // isSingleWorkPost = true;

          } else {
            // play anim enter for other pages
            return animEnter(next.container);
          }
        },
        async beforeLeave({ current, next, trigger }) {   
          
          try {

            // console.log('Before Leave...', pg_slug, maxiMainNavMode, current, next, trigger.getAttribute('href'));    
            let url = trigger.getAttribute('href').trim(); 
            
            // we assuming if page is not included in this array: mainNavPages, it's a single work post
            canShowSingleWorkPost = (notMainNavPagesLinkRegex.test(url) && !homePageLinkRegex.test(url)) ? true : false;

            console.log('Can Show Single Work Post beforeleave: ',notMainNavPagesLinkRegex.test(url), homePageLinkRegex.test(url), url);
            // console.log('Can Show Single Work Post beforeleave: ', current.namespace, next.namespace, trigger, url);
            // console.log('Can Show Single Work Post beforeleave: ', canShowSingleWorkPost, pg_slug, next.namespace);
          } catch(e) {

          }
        
        },
        async leave({ current, next, trigger }) {
          // let triggerHref = trigger.getAttribute('href');

          console.log('Can Show Single Work Post leave: ', canShowSingleWorkPost, pg_slug, next.namespace);


          // console.log("Leaving...0", pg_slug, maxiMainNavMode, isSingleWorkPost, triggerHref, singleWorkLinkRegex.test(triggerHref));
          
          // console.log("Leaving...1", current, next);

          // next.namespace, next.container
          // next.container.getAttribute('data-post-type')


//           current.container.style.position = 'absolute';
//           current.container.style.top = 0;
//           current.container.style.left = 0;
//           current.container.style.width = '100%';




          const done = this.async();

          // _itmCard _mini _canHover art enos featured-work films ocbsa-creators ocbsa-works short-films tv-shows webisodes swiper-slide hoverMainMediaNav

          // itmCard _mini _canHover art enos featured-work films ocbsa-creators ocbsa-works short-films tv-shows webisodes swiper-slide hoverMainMediaNav

          // _itmCard art documentaries enos featured-work films ocbsa-creators ocbsa-works short-films webisodes swiper-slide _mini _canHover
          

          // only play this leave animation if user is not visiting a single works post or if maxiMainMode is true
          if( maxiMainNavMode ) {
            // play anim leave for single ocbsa works post
            // console.log('Playing anim leave for single ocbsa work post...');

            if( !isSingleWorkPost && canShowSingleWorkPost ) {
              // we not in single mode and we can show single work post
              console.log('Is not single work ... ', pg_slug, trigger)
              await animLeaveSingleOCBWork1(next.container, done);

            } else if( !isSingleWorkPost && !canShowSingleWorkPost ) {
              // we not in single mode but we can not show single work post
              await animLeave(current.container, done);
            }
            else {
              // we already in single mode...user wants to leave so come out of single mode
              await animLeaveSingleOCBWork2(next.container, done);              
            }
            
            // destroy singleSwiper if available
            // if( typeof (singleSwiper) !== 'undefined' ) singleSwiper.destroy(true, true);
            
          } else {
            // do a quick check if the link is trying to open a single work post for the first time... if true initialize single work post
            // let post_type = $("#mainHeader ._extraFooterInfos ._body ._center ._exploreBtn").attr('post-type');
            
            // if( post_type && post_type == 'ocbsa-works' ) { 
            //   console.log('Post Type: ', post_type)
              
            //   animLeaveSingleOCBWork1(next.container, done);
            // } else {

            // }

            // play anim leave for other pages animEnter
            await animLeave(current.container, done);
            
          }


          // console.log("Leaving...1");
          // await animLeave(current.container);

          // done();
        },
        async after(data) {

          console.log("After...1", pg_slug, isSingleWorkPost);

          let parser = new DOMParser();
          let htmlDoc = parser.parseFromString(
            data.next.html.replace(
              /(<\/?)body( .+?)?>/gi,
              "$1notbody$2>",
              data.next.html
            ),
            "text/html"
          );
          let bodyClasses = htmlDoc
            .querySelector("notbody")
            .getAttribute("class");

          // does this bodyClasses contain pg_slug class
          let containsPgClass = bodyClasses.includes(pg_slug);
          if ( !containsPgClass ) {
            bodyClasses = pg_slug + " " + bodyClasses;
          }

          $("body").attr("class", bodyClasses);



          //////////////////////// SINGLE POST (OCBSA WORKS) ////////////////////////////

          if( !isSingleWorkPost && maxiMainNavMode && !justPreviewedSingleWork ) { // show only if we are not already in single work post mode
            
            initSingleOCBSAWork();
            
          }
          //////////////////////// SINGLE POST (OCBSA WORKS) END ////////////////////////////

          else { 
            if (justPreviewedSingleWork) {
              navWidth = (dw <= 600) ? dw * 0.4 : dw * 0.3;
              offsetNavX = (navWidth * 0.5) + navMaxiMarginX;
              $(`#mainMediaNav ._mainContents.${ pgNavMainClass } ._itmCard`).css({ 'width' : navWidth + 'px' });

              mainNavWidth = (navWidth + navMaxiMarginX) * totalNumOfNavItms;

              mainNavRightWidthAllowed = -1 * (mainNavWidth - (dw * 0.5));    
              boundsLeftX = mainNavRightWidthAllowed + offsetNavX;
              boundsRightX = (dw - activNavWidth) * 0.5;

              boundsDistance = boundsRightX + Math.abs(boundsLeftX);

              justPreviewedSingleWork = false;
            } else {

              // movNavXVals(boundsRightX); 
  
              movMainNavToSlide () 
              // nwPos = boundsRightX - ((boundsDistance / totalNumOfNavItms) * parseInt(slideInd));
            }
             

          }



          // console.log("Body Classes: ", pg_slug, containsPgClass, bodyClasses);
          // scripts.init();

//           return;
        },
        async afterEnter(data) { 
          console.log("After Enter...1", pg_slug, isSingleWorkPost, maxiMainNavMode);         
        },
        async afterLeave(data) {  },
      },
    ],
    views: [
      {
        namespace: "home",
        beforeEnter() {          
          $("#mainHeader ._mainNavs").css({ 'display' : 'none'});
          $("#mainHeader ._mainNavs._featuredWorks").css({ 'display' : 'table'});
          $("#mainMediaNav ._selCat, #mainMediaNav ._topArrow").css({ "display": "block" });
          $("#mainMediaNav ._selCat ._selCatNull1").css({ "display": "table" });
          $("#mainMediaNav ._topArrow").css({ "top": "25%" });
          $("#mainMediaNav ._selCat").css({ "top": "20%" });
          setActivMainNav();
          resetMainNavVars();

          console.log('Home Page Status: ', maxiMainNavMode, isSingleWorkPost);
        },
        afterEnter() {},
      },
      {
        namespace: "about",
        beforeEnter() {
        },
        afterEnter() {},
      },
      {
        namespace: "works",
        beforeEnter() {
          initWorkFuncs();
          $("#mainHeader ._mainNavs").css({ 'display' : 'none'});
          $("#mainHeader ._mainNavs._allWorks").css({ 'display' : 'table'});
          $("#mainMediaNav ._selCat, #mainMediaNav ._topArrow").css({ "display": "block" });
          $("#mainMediaNav ._selCat ._selCatNull1").css({ "display": "table" });
          $("#mainMediaNav ._topArrow").css({ "top": "20%" });
          $("#mainMediaNav ._selCat").css({ "top": "16%" });
          $("#mainHeaderBgTxt").css({ "height": "200vh" });
          setActivMainNav();
          resetMainNavVars();
          showMainNav = true;
          toggleMainNavVisibility();
        },
        afterEnter() { },
      },
      {
        namespace: "ocb-films",
        beforeEnter() {
          $("#mainHeaderBgTxt").css({ "height": "1000vh" });
        },
        afterEnter() {},
      },
      {
        namespace: "creators",
        beforeEnter() {          
          // initialise scripts 
          $("#mainHeader ._mainNavs").css({ 'display' : 'none'});
          $("#mainHeader ._mainNavs._allCreators").css({ 'display' : 'table'});
          $("#mainMediaNav ._selCat ._selCatNull1").css({ "display": "none" });
          $("#mainMediaNav ._topArrow").css({ "top": "15%" });
          $("#mainHeaderBgTxt").css({ "height": "200vh" });
          setActivMainNav();
          showMainNav = true;
          toggleMainNavVisibility();
        },
        afterEnter() {},
      },
      {
        namespace: "contact",
        beforeEnter() {},
        afterEnter() {},
      },
    ],
  });

///////////////// BARBA JS END ///////////////////////////////



////////////////////////////////////// MAIN NAV START ////////////////////////////////////



const activNavIdListenerTrigger = () => {

  if(!activNavId) activNavId = 0;

  updTopNavs();
  updMainNavs();
  prevActivNavId = activNavId;

  /// maxi mode must be on for this to work
  if(maxiMainNavMode) updateFooterMoreInfo();
}

const updTopNavs = () => {

  let classToModify = (!maxiMainNavMode) ? '_prevActiv' : '_activ';
  let activMiniMaxiNavEl, activMiniMaxiNavElTxt, navTopTxt = totalNavNumTxt = '';

  $(`#mainHeader ._mainNavs.${ pgNavMainClass } ._itm1`).removeClass(classToModify);
  
  // hide text area
  $(`#mainHeader ._mainNavs.${ pgNavMainClass } ._itm1 ._navTxt`).css({ 'display': 'none' });
  
  if(mainNavActivCat == '') {
    activMiniMaxiNavEl = $(`#mainHeader ._mainNavs.${ pgNavMainClass } ._itm1:nth-of-type(${ activNavId + 1 })`);
    activMiniMaxiNavElTxt = $(`#mainHeader ._mainNavs.${ pgNavMainClass } ._itm1:nth-of-type(${ activNavId + 1 }) ._navTxt`);
  } else {
    activMiniMaxiNavEl = $(`#mainHeader ._mainNavs.${ pgNavMainClass } ._itm1.${mainNavActivCat}:eq(${ activNavId })`);
    activMiniMaxiNavElTxt = $(`#mainHeader ._mainNavs.${ pgNavMainClass } ._itm1.${mainNavActivCat}:eq(${ activNavId }) ._navTxt`);
  }  
  activMiniMaxiNavEl.addClass(classToModify);


  if (!maxiMainNavMode) return;

  // $('#mainHeader ._mainNavs.${ pgNavMainClass } ._itm1').removeClass('_prevActiv _activ');
  dispCatId = parseInt(activNavId) + 1;
  navTopTxt = (dispCatId < 10) ? '0' + dispCatId : dispCatId;
  totalNavNumTxt = (totalNumOfNavItms < 10) ? '0' + totalNumOfNavItms : totalNumOfNavItms;

  navTopTxt += ' / ' + totalNavNumTxt;
  let navHtml = '';
  Array.from(navTopTxt).forEach((v, i) => {
    navHtml += ( v.trim() == '' ) ? ' ' : `<span class="txtBx"><span>${v}</span></span>`;
  });

  // show activ _navTxt
  activMiniMaxiNavEl.html( `<div class="_navTxt">${navHtml}</div>`);
  activMiniMaxiNavElTxt.css({ 'display' : 'block' });



  let allMiniNavTxt = `#mainHeader ._mainNavs.${ pgNavMainClass } ._itm1._maxi._activ ._navTxt .txtBx span`;
  if(prevActivNavId < activNavId) { // we going right
    gsap.fromTo(allMiniNavTxt, { x: -20 }, { x: 0, duration: 0.8, ease: 'power4.out', stagger: { amount: 0.8 } } );
  } else { // we going left
    gsap.fromTo(allMiniNavTxt, { x: 20 }, { x: 0, duration: 0.8, ease: 'power4.out', stagger: { amount: 0.8 } } );
  }


}

const updMainNavs = () => {

  if (!maxiMainNavMode) return; // only _maxi mode allowed

  // if(!$('#mainMediaNav ._mainContents." + pgNavMainClass + " ._itmCard').hasClass('_maxi')) return;

  let activElm;

  $(`#mainMediaNav ._mainContents.${ pgNavMainClass } ._itmCard`).removeClass('_activ');

  if(mainNavActivCat == '') {
    activElm = $(`#mainMediaNav ._mainContents.${ pgNavMainClass } ._itmCard:nth-of-type(${ activNavId + 1 })`);
  } else {
    activElm = $(`#mainMediaNav ._mainContents.${ pgNavMainClass } ._itmCard.${mainNavActivCat}:eq(${ activNavId })`);
  }

  activElm.addClass('_activ');
  
  ///////////
  updAllColors(activElm);


  ///// update BigTxt area
  showBigTxt(activNavId, prevActivNavId);



}


const updAllColors = (srcElm) => {
  //////// update Colors
  bgcolor = srcElm.attr('bgcolor');
  fgcolor = srcElm.attr('fgcolor');

  updDynCssHtml();

  // bg  
  // $('#mainHeaderBgTxt').css({ 'background' : bgcolor });
  // console.log('Background color updated! ', bgcolor);

  // fg
  // const fgElms = "#mainHeader ._null2 ._left1 ._mainLogo1 svg, "
  // const fgElmSvg = "#mainHeader ._null2 ._left1 ._mainLogo1 svg, "
  // $('#mainHeader').css({ 'backcground' : '#fff5e7' });


  // update text
}


// function to show big text in maxi mode
let prevBigTxtId = -1;
const showBigTxt = (catid, previd = -1) => {
  if(!maxiMainNavMode) return;



  const tl1 = gsap.timeline();
  gsap.defaults({overwrite: true});

  $(`#mainMediaNavMoreInfo .bigTxt .itm`).hide();
  // $('#mainMediaNavMoreInfo').fadeIn('fast'); // bigTxt
  $('#mainMediaNavMoreInfo').show(); // bigTxt

  let parentElm = '#mainMediaNavMoreInfo';
  let activElm1, activElm1a, activElm2, activElm2a;
  let prevElm1, prevElm1a, prevElm2, prevElm2a;

  $('#mainMediaNavMoreInfo .bigTxt itm').removeClass('_activ');

  if(mainNavActivCat == '') {
    activElm1 = $(`#mainMediaNavMoreInfo .bigTxt .itm:eq(${ catid })`);
    activElm1a = $(`#mainMediaNavMoreInfo .bigTxt .itm:eq(${ catid }) ._top .txtBx span`);

    activElm2 = $(`#mainMediaNavMoreInfo .bigTxt .itm:eq(${ catid })`);
    activElm2a = $(`#mainMediaNavMoreInfo .bigTxt .itm:eq(${ catid }) ._btm .txtBx span`);


    if(previd >= 0) {
      prevElm1 = $(`#mainMediaNavMoreInfo .bigTxt .itm:eq(${ previd })`);
      prevElm1a = $(`#mainMediaNavMoreInfo .bigTxt .itm:eq(${ previd }) ._top .txtBx span`);
  
      prevElm2 = $(`#mainMediaNavMoreInfo .bigTxt .itm:eq(${ previd })`);
      prevElm2a = $(`#mainMediaNavMoreInfo .bigTxt .itm:eq(${ previd }) ._btm .txtBx span`);
    }
    
  } else {
    activElm1 = $(`#mainMediaNavMoreInfo .bigTxt .itm.${mainNavActivCat}:eq(${ catid })`);
    activElm1a = $(`#mainMediaNavMoreInfo .bigTxt .itm.${mainNavActivCat}:eq(${ catid }) ._top .txtBx span`);

    activElm2 = $(`#mainMediaNavMoreInfo .bigTxt .itm.${mainNavActivCat}:eq(${ catid })`);
    activElm2a = $(`#mainMediaNavMoreInfo .bigTxt .itm.${mainNavActivCat}:eq(${ catid }) ._btm .txtBx span`);


    if(previd >= 0) {
      prevElm1 = $(`#mainMediaNavMoreInfo .bigTxt .itm.${mainNavActivCat}:eq(${ previd })`);
      prevElm1a = $(`#mainMediaNavMoreInfo .bigTxt .itm.${mainNavActivCat}:eq(${ previd }) ._top .txtBx span`);
  
      prevElm2 = $(`#mainMediaNavMoreInfo .bigTxt .itm.${mainNavActivCat}:eq(${ previd })`);
      prevElm2a = $(`#mainMediaNavMoreInfo .bigTxt .itm.${mainNavActivCat}:eq(${ previd }) ._btm .txtBx span`);
    }
  }


  if(prevActivNavId < activNavId) { // we going right

    // gsap.killTweensOf(prevElm1, prevElm1a, activElm1, activElm1a, activElm2a); showNav


    if(previd >= 0) {
      tl1
      .fromTo(prevElm1, { opacity: 1, display: 'block' }, { duration: 0.8, ease: 'power4.out', opacity: 0, display: 'none'})
      .fromTo(prevElm1a, { opacity: 1, display: 'block', x: 0 }, {x: -50, duration: 1.4, ease: 'power4.out', opacity: 0, display: 'none'}, "-=0.6")
      .fromTo(activElm1, { opacity: 0, display: 'none' }, { duration: 0.8, ease: 'power4.out', opacity: 1, display: 'block'}, "-=1.0")
      .fromTo(activElm1a, { opacity: 0, display: 'none', x: 50 }, {x: 0, duration: 1.4, ease: 'power4.out', opacity: 1, display: 'block'}, "-=1.2")
      .fromTo(activElm2a, { opacity: 0, display: 'none', x: 50 }, {x: 0, duration: 1.4, ease: 'power4.out', opacity: 1, display: 'block'}, "-=1.4")
      ;
    } else {
      tl1.fromTo(activElm1, { opacity: 0, display: 'none' }, { duration: 0.8, ease: 'power4.out', opacity: 1, display: 'block'})
      .fromTo(activElm1a, { opacity: 0, display: 'none', x: 50 }, {x: 0, duration: 1.4, ease: 'power4.out', opacity: 1, display: 'block'}, "-=0.6")
      .fromTo(activElm2a, { opacity: 0, display: 'none', x: 50 }, {x: 0, duration: 1.4, ease: 'power4.out', opacity: 1, display: 'block'}, "-=1.8")
      ;
    }
  } else {
    if(previd >= 0) {
      tl1.fromTo(prevElm2, { opacity: 1, display: 'block' }, { duration: 0.8, ease: 'power4.out', opacity: 0, display: 'none'})
      .fromTo(prevElm2a, { opacity: 01, display: 'block', x: 0 }, {x: 50, duration: 1.4, ease: 'power4.out', opacity: 0, display: 'none'}, "-=0.6")
      .fromTo(activElm1, { opacity: 0, display: 'none' }, { duration: 0.8, ease: 'power4.out', opacity: 1, display: 'block'}, "-=1.0")
      .fromTo(activElm1a, { opacity: 0, display: 'none', x: -50 }, {x: 0, duration: 1.4, ease: 'power4.out', opacity: 1, display: 'block'}, "-=1.2")
      .fromTo(activElm2a, { opacity: 0, display: 'none', x: -50 }, {x: 0, duration: 1.4, ease: 'power4.out', opacity: 1, display: 'block'}, "-=1.4")
      ;
    } else {      
      tl1.fromTo(activElm1, { opacity: 0, display: 'none' }, { duration: 0.8, ease: 'power4.out', opacity: 1, display: 'block'})
      .fromTo(activElm1a, { opacity: 0, display: 'none', x: -50 }, {x: 0, duration: 1.4, ease: 'power4.out', opacity: 1, display: 'block'}, "-=0.6")
      .fromTo(activElm2a, { opacity: 0, display: 'none', x: -50 }, {x: 0, duration: 1.4, ease: 'power4.out', opacity: 1, display: 'block'}, "-=1.8")
      ;
    }
  }
  
}


/// function to exit maxi mode
$(document).on('click', '#mainMediaNavMoreInfo .backToHome', function() {
  // console.log('Exiting maxi mode...')

  navWidth = 60;
  offsetNavX = (navWidth * 0.5) + navMiniMarginX;
  $('#mainMediaNav ._mainContents.' + pgNavMainClass + ' ._itmCard').css({ 'width' : navWidth + 'px' });

  mainNavWidth = (navWidth + navMiniMarginX) * totalNumOfNavItms;

  mainNavRightWidthAllowed = -1 * (mainNavWidth - (dw * 0.5));    
  boundsLeftX = mainNavRightWidthAllowed + offsetNavX;
  boundsRightX = dw * 0.5;
  boundsDistance = boundsRightX + Math.abs(boundsLeftX);
  moveX = 500;


  // reset navs
  resetNavs1();


  ////// show playShowreelTxt & select Categories area
  $('#playShowreelTxt, #mainMediaNav ._selCat').fadeIn();
  togglePlayShowReel(true);

  // reset nav slider to 0 position;
  movNavXVals(boundsRightX);

  // close footer more info area
  updateFooterMoreInfo(true);


fgcolor = '#dfdfdf';
bgcolor = '#000000';
updDynCssHtml();

});



// function to slide main nave to an item
const slideMainNavTo = (targetInd) => {}







// let mainNavEl = $("#mainMediaNav ._mainContents." + pgNavMainClass); navXPos
let mainNavEl = document.querySelector("#mainMediaNav ._mainContents." + pgNavMainClass);
let mainNavWidth = $("#mainMediaNav ._mainContents." + pgNavMainClass).width();
// console.log('MainContents Width: ',  mainNavWidth, dw);
let mainNavRightWidthAllowed = -1 * (mainNavWidth - (dw * 0.5)); // we expect the nav to end in the center of the screen

let boundsLeftX = mainNavRightWidthAllowed;
let boundsRightX = dw * 0.5;
let boundsDistance = boundsRightX + Math.abs(boundsLeftX);



const resetMainNavVars = () => {
  mainNavActivCat = '';
  totalNumOfNavItms = getTotalNumOfNavItms();
  mainNavEl = document.querySelector("#mainMediaNav ._mainContents." + pgNavMainClass);
  mainNavWidth = $("#mainMediaNav ._mainContents." + pgNavMainClass).width();
  mainNavRightWidthAllowed = -1 * (mainNavWidth - (dw * 0.5));        
  boundsLeftX = mainNavRightWidthAllowed;
  boundsDistance = boundsRightX + Math.abs(boundsLeftX);  

  // console.log('Total Num Of Nav Itms: ', totalNumOfNavItms);

  switch(pg_slug) {
    case '':
    case 'home':
    default:
      moveX = 500;    
    break;
    case 'works':
      moveX = 800;
    break;
    case 'creators':
      moveX = 600;
    break;
  }

}



let getTotalNumOfNavItms = () => {
  
  switch(pg_slug) {
    case '':
    case 'home':
    default:
      pgNavMainClass = '_featuredWorks';      
    break;
    case 'works':
      pgNavMainClass = '_allWorks';
    break;
    case 'creators':
      pgNavMainClass = '_allCreators';
    break;
  }

  return $("#mainMediaNav ._mainContents." + pgNavMainClass + " ._itmCard").length;
}

let totalNumOfNavItms = getTotalNumOfNavItms();
// console.log('Total Navs: ', totalNumOfNavItms);


// function to set active mainNav
const setActivMainNav = () => {

  $("#mainMediaNav ._mainContents").css('display', 'none');

  switch(pg_slug) {
    case '':
    case 'home':
    default:
      pgNavMainClass = '_featuredWorks';      
    break;
    case 'works':
      pgNavMainClass = '_allWorks';
    break;
    case 'creators':
      pgNavMainClass = '_allCreators';
    break;
  }

  // set active main nav
  $("#mainMediaNav ._mainContents." + pgNavMainClass).css('display', 'block');

  // set total number of nave items for active main nav
  totalNumOfNavItms = getTotalNumOfNavItms();
}



let navMaxiMarginX = 50;
let navMiniMarginX = 10;


// function to 
const movNavXVals = (tempVal) => {
  navNewPosX = (tempVal < boundsLeftX) ? boundsLeftX : (tempVal > boundsRightX) ? boundsRightX : tempVal;
  finalNavXPos = navNewPosX;

}

// function to move main nav to a slide
const movMainNavToSlide = (slideInd) => {
  nwPos = boundsRightX - ((boundsDistance / totalNumOfNavItms) * parseInt(slideInd));
  movNavXVals(nwPos);
}


$(document).on('click', '#mainMediaNav ._selCat span', function() {
  const selCat = $(this).attr('cat')?.trim();

  // update active class
  $('#mainMediaNav ._selCat span').removeClass('_active');
  $(this).addClass('_active');

  const tl = gsap.timeline();

  if(selCat == 'all') {
    allCatEls = `#mainMediaNav ._mainContents.${ pgNavMainClass } ._itmCard, #mainHeader ._mainNavs ._itm1`;
    tl.fromTo(allCatEls, { display: 'none', opacity: 0, x: -60 }, 
    { display: 'block', opacity: 1, x: 0, stagger: {
      amount: 0.5, from: 'random' }, duration: 0.8, ease: "power4.out", onComplete: function() {

        mainNavActivCat = '';
        totalNumOfNavItms = $("#mainMediaNav ._mainContents." + pgNavMainClass + " ._itmCard").length;
        mainNavWidth = $("#mainMediaNav ._mainContents." + pgNavMainClass).width();
        mainNavRightWidthAllowed = -1 * (mainNavWidth - (dw * 0.5));        
        boundsLeftX = mainNavRightWidthAllowed;
        boundsDistance = boundsRightX + Math.abs(boundsLeftX);
        moveX = 500;

      } });

      // console.log('Main Nav Width: ', $("#mainMediaNav ._mainContents." + pgNavMainClass).width());


  } else {

    // console.log('Selected main nav cat: ', selCat); itmCard
    // hide all classes that does not belong to the currently selected category

    hideCatEls = `#mainMediaNav ._mainContents.${ pgNavMainClass } ._itmCard:not(.${selCat}), #mainHeader ._mainNavs ._itm1:not(.${selCat})`;
    showCatEls = `#mainMediaNav ._mainContents.${ pgNavMainClass } ._itmCard.${selCat}, #mainHeader ._mainNavs ._itm1.${selCat}`;

    tl.to(hideCatEls, { display: 'none', opacity: 0, duration: 0.8, ease: "power4.out" })
    .fromTo(showCatEls, { display: 'none', opacity: 0, x: -60 },
    { display: 'block', opacity: 1, x: 0, duration: 1, ease: "power4.out", stagger: {
      amount: 0.5, from: 'random', onComplete: function() {

        mainNavActivCat = selCat;
        totalNumOfNavItms = $(`#mainMediaNav ._mainContents.${ pgNavMainClass } ._itmCard.${selCat}`).length;
        mainNavWidth = $("#mainMediaNav ._mainContents." + pgNavMainClass).width();
        mainNavRightWidthAllowed = -1 * (mainNavWidth - (dw * 0.5));        
        boundsLeftX = mainNavRightWidthAllowed;
        boundsDistance = boundsRightX + Math.abs(boundsLeftX);
        moveX = 5 * totalNumOfNavItms;

        console.log('MoveX: ', moveX);

        $(`#mainHeader ._mainNavs ._itm1`).removeClass('_prevActiv');
        $(`#mainHeader ._mainNavs ._itm1.${mainNavActivCat}:eq(0)`).addClass('_prevActiv');


        $(`#mainMediaNav ._mainContents.${ pgNavMainClass } ._itmCard.${mainNavActivCat}`).each(function(i, v) {
          $(`#mainMediaNav ._mainContents.${ pgNavMainClass } ._itmCard.${mainNavActivCat}:eq(${i})`).attr('catid', i);
          $(`#mainHeader ._mainNavs ._itm1.${mainNavActivCat}:eq(${i})`).attr('catid', i);
        });
        
      } } }, "-=0.6")
    ;

    // console.log('Main Nav Width: ', $("#mainMediaNav ._mainContents." + pgNavMainClass).width());

  }

  // reset colors
  fgcolor = '#dfdfdf'; bgcolor = '#111111';
  updDynCssHtml();

  // reset nav slider to 0 position;
  movNavXVals(boundsRightX);
});




// click slides in minmised state

let homeSwiperZoomState = false;
// $(document).on('click', '#mainHeader ._mainNavs ._itm1._minimised', function(e) {

//   // activNavId = (totalNumOfNavItms - 1) - Math.floor(moveFraction * totalNumOfNavItms);

//   console.log('Active nav id: ', activNavId);


//     // if(!homeSwiperZoomState) {
//     //   $("#mainMediaNav ._mainContents.swiper").addClass("zoomIn1");
//     //   homeSwiperZoomState = true;

//     //   showOvlyNavInfo();
//     // }

//     // animateMainNavMoreTxt(activSlideInd);

//     // togglePlayShowReel();

// });




////// when you click on to navs in _maxi mode
$(document).on('click', '#mainHeader ._mainNavs ._itm1._maxi:not(._activ)', function() {
  // console.log('Clicking on topnavs in maxi mode!');

  // return if we're in maxiMainNavMode && also in a single post ocbsa work mode
  if (maxiMainNavMode && isSingleWorkPost) return;

  let catid = -1;

  if(mainNavActivCat !== '') {
    catid = $(this).attr('catid'); 
  } else {
    catid = $(this).index();
  }

  nwPos = boundsRightX - (moveX * parseInt(catid));
  movNavXVals(nwPos);
  updateFooterMoreInfo();

});

////// when you click on to main navs in _maxi mode
// $(document).on('click', '#mainMediaNav ._mainContents._featuredWorks ._itmCard._maxi:not(._activ)', function() {
$(document).on('click', `#mainMediaNav ._mainContents.${ pgNavMainClass } ._itmCard._maxi:not(._activ)`, function() {
  // console.log('Clicking on main navs in maxi mode!');

  // return if we're in maxiMainNavMode && also in a single post ocbsa work mode
  if (maxiMainNavMode && isSingleWorkPost) return;

  

  let catid = -1;;

  if(mainNavActivCat !== '') {
    catid = $(this).attr('catid'); 
  } else {
    catid = $(this).index();
  }

  nwPos = boundsRightX - (moveX * parseInt(catid));
  movNavXVals(nwPos);
  updateFooterMoreInfo();
});




$(document).on('click', `#mainHeader ._mainNavs ._itm1._mini`, function(e) {

  let catid = -1;

  if(mainNavActivCat !== '') {
    catid = $(this).attr('catid');
    // catItmLen = $(`#mainHeader ._mainNavs ._itm1.${mainNavActivCat}`).length;    
  } else {
    catid = $(this).index();
  }

  movMainNavToSlide(parseInt(catid));

  updateFooterMoreInfo();

});


$(document).on('click', `#mainMediaNav ._mainContents._featuredWorks ._itmCard._mini:not(.ocbsa-team), #mainMediaNav ._mainContents._allWorks ._itmCard._mini:not(.ocbsa-team), #mainMediaNav ._mainContents._allCreators ._itmCard._mini:not(.ocbsa-team)`, function() {

  console.log(`Mini nav clicked...${ pgNavMainClass }`);

  // _itmCard _mini _canHover art enos featured-work films ocbsa-creators ocbsa-works short-films tv-shows webisodes swiper-slide hoverMainMediaNav

  // _itmCard _mini _canHover art enos featured-work films ocbsa-creators ocbsa-works short-films tv-shows webisodes swiper-slide hoverMainMediaNav

  maxiMainNavMode = true;

  let activMaxiNavEl, activMiniMaxiNavEl;
  let navTopTxt = '', totalNavNumTxt = '';
  let offsetNavX = 0, navWidth = 0;

  if(mainNavActivCat !== '') {
    catid = $(this).attr('catid'); 
    activMaxiNavEl = $(`#mainMediaNav ._mainContents.${ pgNavMainClass } ._itmCard.${mainNavActivCat}:eq(${catid})`);
    activMiniMaxiNavEl = $(`#mainHeader ._mainNavs ._itm1.${mainNavActivCat}:eq(${catid})`);
  } else {
    catid = $(this).index();
    activMaxiNavEl = $(`#mainMediaNav ._mainContents.${ pgNavMainClass } ._itmCard:eq(${catid})`);
    activMiniMaxiNavEl = $(`#mainHeader ._mainNavs ._itm1:eq(${catid})`);
  }


  ///////////////// MAIN NAV
  // set width and height of each nav
  navWidth = (dw <= 600) ? dw * 0.4 : dw * 0.3;
  offsetNavX = (navWidth * 0.5) + navMaxiMarginX;
  $(`#mainMediaNav ._mainContents.${ pgNavMainClass } ._itmCard`).css({ 'width' : navWidth + 'px' });

  // console.log('Main Nav Width Previous: ', mainNavWidth);
  // calculate slide dependencies & slide to activ slide
  // mainNavWidth = $("#mainMediaNav ._mainContents." + pgNavMainClass).width();

  mainNavWidth = (navWidth + navMaxiMarginX) * totalNumOfNavItms;

  mainNavRightWidthAllowed = -1 * (mainNavWidth - (dw * 0.5));    
  boundsLeftX = mainNavRightWidthAllowed + offsetNavX;
  boundsRightX = (dw - activNavWidth) * 0.5;
  // console.log('BoundsRightX: ', boundsRightX);

  // boundsRightX -= offsetNavX;
  boundsDistance = boundsRightX + Math.abs(boundsLeftX);
  moveXVal1 = ((activNavWidth * 0.5) + (navWidth * 0.5) + navMaxiMarginX) * 0.86;
  moveX = parseFloat(moveXVal1.toFixed(2));

  // console.log('MoveX: ', moveX);



  // console.log('Maximising slide...');
  $(`#mainMediaNav ._mainContents.${ pgNavMainClass } ._itmCard, #mainHeader ._mainNavs ._itm1`).removeClass('_mini _canHover');
  $(`#mainMediaNav ._mainContents.${ pgNavMainClass } ._itmCard, #mainHeader ._mainNavs ._itm1`).addClass('_maxi');

  ////// hide playShowreelTxt & select Categories area
  $('#playShowreelTxt, #mainMediaNav ._selCat').fadeOut();


  ////////////////// MINI NAV
  $('#mainHeader ._mainNavs ._itm1').removeClass('_prevActiv _activ');
  activMiniMaxiNavEl.addClass('_activ');
  dispCatId = parseInt(catid) + 1;
  navTopTxt = (dispCatId < 10) ? '0' + dispCatId : dispCatId;
  totalNavNumTxt = (totalNumOfNavItms < 10) ? '0' + totalNumOfNavItms : totalNumOfNavItms;

  navTopTxt += ' / ' + totalNavNumTxt;
  let navHtml = '';
  Array.from(navTopTxt).forEach((v, i) => {
    navHtml += ( v.trim() == '' ) ? ' ' : `<span class="txtBx"><span>${v}</span></span>`;
  });

  activMiniMaxiNavEl.html( `<div class="_navTxt">${navHtml}</div>`);

  gsap.fromTo('#mainHeader ._mainNavs ._itm1._activ ._navTxt', { opacity: 0, display: 'none', y: 20 }, 
  { opacity: 1, display: 'block', y: 0, delay: 0.2, duration: 0.8 });


  ////// setup bigTxt html
  $('#mainMediaNavMoreInfo .bigTxt .itm').each(function(i, v) {
    // console.log('mainMediaNavMoreInfo Index: ', i);

    let txt1 = $(`#mainMediaNavMoreInfo .bigTxt .itm:eq(${i})`).attr('txt1').trim();
    let txt2 = $(`#mainMediaNavMoreInfo .bigTxt .itm:eq(${i})`).attr('txt2').trim();

    // console.log(i, txt1, txt2);

    let txt1Arr = txt1.split(',');
    let txt2Arr = txt2.split(',');

    let topHtml = '', btmHtml = '';

    let itmElmTop = $(`#mainMediaNavMoreInfo .bigTxt .itm:eq(${i}) ._top`);
    let itmElmBtm = $(`#mainMediaNavMoreInfo .bigTxt .itm:eq(${i}) ._btm`);

    

    // for topHtml
    if(txt1Arr.length > 0) {

      txt1Arr.forEach((val,ind) => {
  
        let tmpHtml = '';
  
        Array.from(val).forEach((v1) => {
          tmpHtml += ( v1.trim() == '' ) ? `<span class="txtBx _sp2"></span>` : `<span class="txtBx"><span>${v1}</span></span>`;
        });

        let addSpHtml = (ind < txt1Arr.length) ? '<span class="txtBx _sp1"></span>' : '';
  
        topHtml += tmpHtml + addSpHtml;
  
      });
      itmElmTop.html(topHtml);
    }


    // for btmHtml
    if(txt2Arr.length > 0) {
      txt2Arr.forEach((val,ind) => {

        let tmpHtml = '';

        Array.from(val).forEach((v1) => {
          tmpHtml += ( v1.trim() == '' ) ? `<span class="txtBx _sp2"></span>` : `<span class="txtBx"><span>${v1}</span></span>`;
        });

        let addSpHtml = (ind < txt1Arr.length) ? '<span class="txtBx _sp1"></span>' : '';

        btmHtml += tmpHtml + addSpHtml;

      });
      itmElmBtm.html(btmHtml);
    }



  });

  showBigTxt(catid);

  // update footer link



  ///// update theme colors based on active maxi nav elment
  updAllColors(activMaxiNavEl);


  // set active class maxi slide
  $(`#mainMediaNav ._mainContents.${ pgNavMainClass } ._itmCard`).removeClass('_activ');
  activMaxiNavEl.addClass('_activ');
  // setTimeout(() => {
  //   movMainNavToSlide(parseInt(catid));
  // }, 300);
  nwPos = boundsRightX - (moveX * parseInt(catid));
  movNavXVals(nwPos);

  updateFooterMoreInfo();
  
});


//// function to show, hide and update footer more info when nav is in maxi mode
let navFooterMoreInfoStatus = false; // is the footer more infor open or not
const updateFooterMoreInfo = (closeAfter = false) => {

  // console.log('Active Nav ID: ', activNavId);

  const tl1 = gsap.timeline();

  const activEl = $(`#mainMediaNav ._mainContents.${ pgNavMainClass } ._itmCard:eq(${activNavId})`);

  let url = activEl.attr('url');
  let client = activEl.attr('client');
  let type = activEl.attr('type');
  let workrole = activEl.attr('workrole');
  let completed = activEl.attr('completed');
  let workdesc = activEl.attr('workdesc');

  // console.log('Attributes: ', client, type, workrole, completed, workdesc);
 

  // if open do animate out the previous info first
  if(navFooterMoreInfoStatus) {
    tl1
    .fromTo("#mainHeader ._extraFooterInfos ._body ._center ._exploreBtn ._txt1 span", { y: 0 }, 
    { delay: 0.5, duration: 1.5, y: -50, ease: "power4.out" })
    .fromTo("#mainHeader ._extraFooterInfos ._body ._center ._exploreBtn ._line span", { y: 0 }, 
    { duration: 1.5, y: 60, ease: "power4.out" }, "-=1.3")
    .fromTo("#mainHeader ._extraFooterInfos ._body ._center ._exploreBtn ._arrow span", { y: 0 }, 
    { duration: 1.5, y: 60, ease: "power4.out" }, "-=1.5")
    .fromTo("#mainHeader ._extraFooterInfos ._body ._right ._itm span", { y: 0 }, 
    { duration: 1.5, y: -100, ease: "power4.out" }, "-=2")
    .fromTo("#mainHeader ._extraFooterInfos ._body ._itm span", { y: 0 }, { duration: 1.5, y: -30, ease: "power4.out",
    onComplete: () => {


      ///// close the footer more info if closeAfter is true
      if(closeAfter) {
        $("#mainHeader ._extraFooterInfos ._body").css( { 'display' : 'none' } );
        navFooterMoreInfoStatus = false;
      } else {
        updFooterMoreInfo(url, client, type, workrole, completed, workdesc);
        animInNewFooterMoreInfo();
      }
    } }, "-=1.5")
    ;

  } else {
    $("#mainHeader ._extraFooterInfos ._body").css( { 'display' : 'flex' } );
    navFooterMoreInfoStatus = true;
    console.log('NavFooterMoreInfoStatus: ', true);

    updFooterMoreInfo(url, client, type, workrole, completed, workdesc);
    animInNewFooterMoreInfo();
  }

}


const updFooterMoreInfo = (url, client, type, workrole, completed, workdesc) => {
  // clear fields first
  $("#mainHeader ._extraFooterInfos ._body ._left ._content ._itm span").text( '' );
  $("#mainHeader ._extraFooterInfos ._body ._center ._exploreBtn").removeAttr('href');

  // update with new contents
  if( url ) {
    $("#mainHeader ._extraFooterInfos ._body ._center ._exploreBtn").attr('href', url);
    $("#mainHeader ._extraFooterInfos ._body ._center ._exploreBtn").attr('post-type', 'ocbsa-works');
  }
  if( client ) $("#mainHeader ._extraFooterInfos ._body ._left ._content ._itm:eq(3) span").text( client );
  if( type ) $("#mainHeader ._extraFooterInfos ._body ._left ._content ._itm:eq(1) span").text( type );
  if( workrole ) $("#mainHeader ._extraFooterInfos ._body ._left ._content ._itm:eq(2) span").text( workrole );
  if( completed ) $("#mainHeader ._extraFooterInfos ._body ._left ._content ._itm:eq(0) span").text( completed );

  if( workdesc ) $("#mainHeader ._extraFooterInfos ._body ._right ._itm:eq(0) span").text( workdesc );
}

const animInNewFooterMoreInfo = () => {
  const tl1 = gsap.timeline();

  ///// set footer more infos    
  ///// show footer more infos

  tl1 
  .fromTo("#mainHeader ._extraFooterInfos ._body ._center ._exploreBtn ._txt1 span", { y: 60 }, 
    { duration: 1.5, y: 0, ease: "power4.out" })
  .fromTo("#mainHeader ._extraFooterInfos ._body ._center ._exploreBtn ._line span", { y: -60 },
    { duration: 1.5, y: 0, ease: "power4.out" }, "-=0.5")
  .fromTo("#mainHeader ._extraFooterInfos ._body ._center ._exploreBtn ._arrow span", { y: -60 }, 
    { duration: 1.5, y: 0, ease: "power4.out" }, "-=1.5")
  .fromTo("#mainHeader ._extraFooterInfos ._body ._right ._itm span", { y: 100 }, 
  { duration: 1.5, y: 0, ease: "power4.out" }, "-=2")
  .fromTo("#mainHeader ._extraFooterInfos ._body ._itm span", { y: 30 }, { duration: 1, y: 0, ease: "power4.out", 
  stagger: { amount: 1 } }, "-=1.5")
  ;
  // console.log('Animating In new Footer More Info...');
}




let activSlideInd = 0;
let prevSlideInd = -1;
let activEl, prevEl, activEl2, prevEl2;

// var swiper = new Swiper(".mySwiper", {
//   spaceBetween: 30,
//   pagination: {
//     el: ".swiper-pagination", 
//     clickable: true,
//   },
// });



// function to show or hide playshowreel
function togglePlayShowReel(status = false) {
  const elm = $("#playShowreelTxt");
  if(!status) {
    elm.css({ 'display' : 'none' });
  } else {
    elm.css({ 'display' : 'block' });
  }
}



// function to init some home functions
const initHomeFuncs1 = () => {
  // main nave itm click
  // $(document).on("click", "#mainMediaNav ._itm", () => {
    
  // });



  //////////// follow curved text ///////////////

  const playShowreelBtn = document.querySelector('#playShowreelBtn ._circular');
  playShowreelBtn.innerHTML = playShowreelBtn.textContent.replace(/\S/g, '<span>$&</span>')
  // console.log('Done! ', playShowreelBtn.textContent);

  $("#playShowreelBtn ._circular").css({ 'transform-origin' : 'center center'});
  // $("#playShowreelBtn ._circular span").css({ 'transform-origin' : '0 100px'});

  const letterElms = document.querySelectorAll("#playShowreelBtn ._circular span");
  let angle1 = 18; 

  for(let i = 0; i < letterElms.length; i++) {
    letterElms[i].style.transform = `rotate(${ i * angle1 }deg)`;
  }

  const playShowreelMain = document.getElementById("playShowreelBtn");

  let mouseX = 0;
  let mouseY = 0;
  
  let ballX = 0;
  let ballY = 0;

  let offsetX = -45;
  let offsetY = -45;
  
  let speed = 0.05;

  let boundsOffsetLeft = 50;
  let boundsOffsetRight = 250;
  
  
  function animatePlayShowreel(){
    
    let distX = mouseX - ballX;
    let distY = mouseY - ballY;
    
    
    ballX = ballX + (distX * speed);
    ballY = ballY + (distY * speed);

    finalXPos = ballX + offsetX;
    finalYPos = ballY + offsetY;

    finalXPos = (finalXPos > dw - boundsOffsetRight) ? dw - boundsOffsetRight : (finalXPos < boundsOffsetLeft) ? boundsOffsetLeft : finalXPos;
    finalYPos = (finalYPos > dh - boundsOffsetRight) ? dh - boundsOffsetRight : (finalYPos < boundsOffsetLeft) ? boundsOffsetLeft : finalYPos;
    
    playShowreelMain.style.left = finalXPos + "px";
    playShowreelMain.style.top = finalYPos + "px";
    
    requestAnimationFrame(animatePlayShowreel);
  }

  if(dw >= 760) animatePlayShowreel();
  
  document.addEventListener("mousemove", function(event){
    mouseX = event.pageX;
    mouseY = event.pageY;
  });
}

const initHomeMainNavScripts = () => {
  
  let up = false, down = false, left = false, right = false, swiping = false;

  let moveCamUp = false, moveCamDown = false, moveCamLeft = false, moveCamRight = false;

  let gameLoopRunning = false;  

  const mainNavTopArrow = $("#mainMediaNav ._topArrow span");
  let mainNavTopArrowLeft = parseInt(mainNavTopArrow.css('left'));
  let arrowDist = 190;
  let mainNavState = 'init';// init, 
  let reqAnim;



  ///////////////////////// MOUSE WHEEL EVENTS ////////////////////// 
  if (window.addEventListener)
  {
      // IE9, Chrome, Safari, Opera
      window.addEventListener("mousewheel", MouseWheelHandler, false);
      // Firefox
      window.addEventListener("DOMMouseScroll", MouseWheelHandler, false);


      $("#mainMediaNav ._mainContents ._itmCard").mouseenter(function() {
        uid = parseInt($(this).attr("uid"));
        
        if(uid < activNavId) {
          mainNavTopArrow.css({ 'left': (mainNavTopArrowLeft + arrowDist) + 'px'});
        }

        // console.log('Mouse Enter: ', uid, activNavId, $(this).index());
      });
      $("#mainMediaNav ._mainContents ._itmCard").mouseout(function() {        
        mainNavTopArrow.css({ 'left': mainNavTopArrowLeft + 'px' });
        // console.log('Mouse OUt...: ', uid, activNavId, $(this).index());
      });


  }
  // IE 6/7/8
  else
  {
      window.attachEvent("onmousewheel", MouseWheelHandler);
  }

  function MouseWheelHandler(e)
  {
    // return if we're in maxiMainNavMode && also in a single post ocbsa work mode
    if (maxiMainNavMode && isSingleWorkPost) return;

      // cross-browser wheel delta
      var e = window.event || e; // old IE support
      var delta = Math.max(-1, Math.min(1, (e.wheelDelta || -e.detail)));

      // wheelDelta indicates how
      // Far the wheel is turned
      var w = e.wheelDelta;
           
      // Returning normalized value
      var normalize_w = w / 120;

      // console.log('Mouse Wheel moved: ', normalize_w, delta, e.wheelDelta, e.detail, e);

      let tempFinalNavXpos;

      if ( !finalNavXPos ) finalNavXPos = 0;      

      if(delta < 0) { // scrolling down .... move nav right
        tempFinalNavXpos = finalNavXPos - moveX;        
        checkNavXVals(tempFinalNavXpos);
      } else { // scroll left .... move nav left
        tempFinalNavXpos = finalNavXPos + moveX;
        checkNavXVals(tempFinalNavXpos);
      }




      return false;


  //     //
  //   // Manipulate Mouse Wheel
  //   // source: http://www.adomas.org/javascript-mouse-wheel/index.html
  //   //
  //   /**
  //    * Function: MouseWheelEvent
  //    * 
  //    * Manipulate mouse wheel actions.
  //    *
  //    * Parameters:
  //    *     (Integer) delta - A value that determines the directions of the scrolling.
  //    *
  //    * Returns:
  //    *     null
  //    *
  //    * See Also:
  //    *     <MouseWheel>
  //    */
  //   function MouseWheelEvent(delta) {
  //     if (delta < 0) { // scroll down
  //     } else { // scroll up
  //     }
  // }

  // /**
  //  * Function: MouseWheelEvent
  //  * 
  //  * Listen for the mouse wheel movements and triggers a function.
  //  *
  //  * Parameters:
  //  *     (Object) event - Event passed by mouse scroll.
  //  *
  //  * Returns:
  //  *     null
  //  *
  //  * See Also:
  //  *     <MouseWheelEvent>
  //  */
  // function MouseWheel(event) {
  //     var delta = 0;
  //     if (!event) {
  //         event = window.event;
  //     }
  //     if (event.wheelDelta) {
  //         delta = event.wheelDelta / 120;
  //     } else if (event.detail) {
  //         delta = -event.detail / 3;
  //     }
  //     if (delta) {
  //         new MouseWheelEvent(delta);
  //     }
  //     if (event.preventDefault) {
  //         event.preventDefault();
  //     }
  //     event.returnValue = false;
  // }

  // /* Mouse wheel listener. */
  // if (window.addEventListener) {
  //     window.addEventListener('DOMMouseScroll', MouseWheel, false);
  // }
  // window.onmousewheel = MouseWheel;



  }
  /////////////////////// MOUSE WHEEL EVENTS END ///////////////////


  //////////////////// INIT TOUCH SWIPE ///////////////////
  let dragX = 0;
  let dragY = 0;
  let curDragPosX = 0;
  let curDragPosY = 0;
  let isMouseDown = false;

  let dragDiff = 0;

  let startMouseDragX = 0;

  let distanceDragged = 0;

  let isDraggingLeft = false;
  let isDraggingRight = false;
  let dragDirection = 'none';

  // let mouseDragNavPosX = 0;

  let mainMediaNavEl = document.getElementById('mainMediaNav');

  mainMediaNavEl.addEventListener("mousedown", pointerDownHandler);
  mainMediaNavEl.addEventListener("mouseup", pointerUpHandler);
  mainMediaNavEl.addEventListener("mousemove", pointerMoveHandler);

  document.addEventListener("touchstart", pointerDownHandler);
  document.addEventListener("touchend", pointerUpHandler);
  document.addEventListener("touchmove", pointerMoveHandler);


  function pointerDownHandler(e) {
    // return if we're in maxiMainNavMode && also in a single post ocbsa work mode
    if (maxiMainNavMode && isSingleWorkPost) return;

    if(isMouseDown) return;
    startMouseDragX = curDragPosX = finalNavXPos;
    isMouseDown = true;

    // $('#mainMediaNav ._mainContents." + pgNavMainClass + " ._itmCard').removeClass('_canHover');
  }

  function pointerUpHandler(e) {
    // return if we're in maxiMainNavMode && also in a single post ocbsa work mode
    if (maxiMainNavMode && isSingleWorkPost) return;

    isMouseDown = false;
    dragX = 0;
    dragY = 0;
    curDragPosX = 0;
    curDragPosY = 0;
    startMouseDragX = 0;

    if($('#mainMediaNav ._mainContents.' + pgNavMainClass + ' ._itmCard').hasClass('._mini')) {
      $('#mainMediaNav ._mainContents.' + pgNavMainClass + ' ._itmCard').addClass('_canHover');
    }

  }

  function pointerMoveHandler(e){
    // return if we're in maxiMainNavMode && also in a single post ocbsa work mode
    if (maxiMainNavMode && isSingleWorkPost) return;

    if(isMouseDown) {

      dragX = e.pageX;
      dragY = e.pageY;

      dragDiff = dragX - curDragPosX;   

      // console.log('Mouse is moving...', dragX, dragY);

      if(dragDiff < 0) {
        isDraggingLeft = true;
        isDraggingRight = false;
  
        // console.log('Mouse is dragging Left...', dragDiff);
      } else if(dragDiff > 0) {
        isDraggingLeft = false;
        isDraggingRight = true;
  
        // console.log('Mouse is dragging Right...', dragDiff);
      } else {
        isDraggingLeft = false;
        isDraggingRight = false;

        // distanceDragged = curDragPosX - startMouseDragX;

        
        startMouseDragX = curDragPosX = dragX;

        // console.log('Mouse is still...', dragDiff);

        
      }

      // console.log('FinalNavXPos & dragDiff: ', navNewPosX, finalNavXPos, dragDiff);
      // let tempFinalNavXpos = finalNavXPos + (dragDiff * 0.5);
      // checkNavXVals(tempFinalNavXpos);



      if($('#mainMediaNav ._mainContents.' + pgNavMainClass + ' ._itmCard').hasClass('_canHover')) {
        $('#mainMediaNav ._mainContents.' + pgNavMainClass + ' ._itmCard').removeClass('_canHover');
      }
      
      

    }
  }




  $("#mainMediaNav").swipe( {
      //Generic swipe handler for all directions

      swipe: function(event, direction, distance, duration, phase) {

        // return if we're in maxiMainNavMode && also in a single post ocbsa work mode
        if (maxiMainNavMode && isSingleWorkPost) return;

        // alert( 'Swipe Data: ', direction, distance, duration, phase );
        
        let tempFinalNavXpos;
        let acceleration = (distance / duration) / 5;
        acceleration = parseFloat(acceleration.toFixed(4));

        // console.log( 'Swipe Data: ', direction, distance, duration, acceleration );   

        if(direction == 'left') {
          // console.log('sliding nav left...');
          tempFinalNavXpos = finalNavXPos - distance;
          checkNavXVals(tempFinalNavXpos);
        } else if(direction == 'right') {
          // console.log('sliding nav right...');
          tempFinalNavXpos = finalNavXPos + distance;
          checkNavXVals(tempFinalNavXpos);
        }

      },
      
      // swipeStatus: function(event, direction, distance, duration, phase) {
      //   console.log('Swipe Status: ', direction, phase, distance);

      //   // console.log( 'Swipe Data: ', event, direction, distance, duration );  
      //   // if(phase == 'move') {
      //   //   console.log( "You have moved " + distance +" pixels, past 200 and the handler will fire", event, direction, distance, duration ); 
      //   // }

      // },
      //Default is 75px, set to 0 for demo so any distance triggers swipe
      excludedElements:"",
      threshold: 0
  });


  //////////////////// INIT TOUCH SWIPE END ///////////////////








  ///////////////// NAV GAME LOOP ///////////////////////////////////


  // INITIALIZATIONS  
  let sinWavArr = [];
  let minNumWavItms = 3, maxNumWavItms = 15;
  let numOfWavItms = 0;
  

  let navWavObjArr = [];
  let navWavObjIndArr = [];
  let isNavWavRising = false;
  let isNavWavFalling = false;
  let isNavWavDone = false;
  let dNavWavBounds = 0.000004;

  let initWidth = 60;
  let initHeight = 250;
  let initTilt = 0;
  let initY = 0;

  let navAddWidth = 30;
  let navAddHeight = 300;
  let navAddTop = 120;
  let navAddGrey = 100;



  // translate

  
  let speed = 0.1;
  let waveSpeedUp = 0.1;
  let waveSpeedDown = 0.05;

  

  let finalScaleXVals = [];
  let finalScaleYVals = [];
  let finalTiltVals = [];

  let targetScaleXVals = [];
  let targetScaleYVals = [];
  let targetTiltVals = [];

  let curScaleXVals = Array(totalNumOfNavItms).fill(1);
  let curScaleYVals = Array(totalNumOfNavItms).fill(1);
  let curTiltVals = Array(totalNumOfNavItms).fill(0);

  let navRisingIndArr = [];
  let navRisingArr = []; // array of objects
  let navFallingIndArr = []; 
  let navFallingArr = []; // array of objects

  let deciNums = 15;

  // console.log(curScaleXVals, curScaleYVals, curTiltVals);
  
  let amtScaleX = 0.3;
  let amtScaleY = 1.2;
  let amtTilt = 45;

  // translate top arrow
  let newTopArrowPosX = 0;
  let topArrowPosX = 0;

  // tilt

  // width

  // height

  // top

  // grey






function arrayEquals(a, b) {
  return Array.isArray(a) &&
      Array.isArray(b) &&
      a.length === b.length &&
      a.every((val, index) => val === b[index]);
}



function navMainGameLoop() {

  // console.log('NAV GAME LOOP... ');

  if(!up && !down && !left && !right && !swiping) {
    acc = 0; // stop accellerating
  } else {
    if(!swiping) {
      acc += speed; // start accellerating
      acc = (acc >= 1) ? 1 : acc;
      // console.log('Accelerating...', acc);
    }
  }

  // translate
  navNewPosX = ( !navNewPosX ) ? dw * 0.5 : navNewPosX;
  let navDistX = navNewPosX - navPosX; 
  
  navPosX = navPosX + (navDistX * speed);
  
  mainNavEl.style.left = navPosX + "px";

  // set active nav id
  let moveFraction = (navPosX + Math.abs(boundsLeftX)) / boundsDistance;
  activNavId = (totalNumOfNavItms - 1) - Math.floor(moveFraction * totalNumOfNavItms);
  activNavId = (activNavId < 0) ? 0 : (activNavId > totalNumOfNavItms - 1) ? totalNumOfNavItms - 1 : activNavId;
  // listeners to activNavId
  if(prevActivNavId != activNavId) {
    // trigger all listeners
    activNavIdListenerTrigger();

    // console.log('ActivNavId: ', activNavId, totalNumOfNavItms, mainNavWidth, boundsLeftX, boundsDistance, moveX, navPosX );
  }


  // console.log('navWavObjIndArr: ', navWavObjIndArr);
  // console.log('NavWaObjArr length...', navWavObjArr.length);

  // if(navWavObjIndArr.length > 0) makeNavWave2();

 

  

  window.requestAnimationFrame(navMainGameLoop);
  // console.log('Gamelooping away...');


}
navMainGameLoop();
// window.requestAnimationFrame(navMainGameLoop);


// function navMainGameLoop2() {
//   console.log('Main Game Loop 2 is running...');

//   window.requestAnimationFrame(navMainGameLoop2);
// }


// function to select number of wave itms
const selNumWavItms = (acc) => {
  var v1 = Math.floor(acc * (maxNumWavItms - minNumWavItms + 1) + minNumWavItms); // get a number between maxNumWavItms & minNumWavItms inclusive both
  v1 = (v1 % 2 == 0) ? v1 - 1 : v1; // has to be an odd number
  return v1;
}


  ///////////////// NAV GAME LOOP END ///////////////////////////////////




    /////////////////// ARROW KEY EVENTS ///////////////////////////
    const mainNavKeyDownEv = (e) => {
  
      if(e.keyCode === 38 || e.keyCode === 87) { up = true; }
      if(e.keyCode === 40 || e.keyCode === 83) { down = true; }
      if(e.keyCode === 37 || e.keyCode === 65) { 
        left = true; 

      // if we're in maxiMainNavMode && also in a single post ocbsa work mode
      if (maxiMainNavMode && isSingleWorkPost) {
         // do this for ocbsa work single posts
         console.log('Single work post mode moving left...');
      } else if( pg_slug == 'home' ) {
        // set new translate
        let tempFinalNavXpos = finalNavXPos + moveX;
        checkNavXVals(tempFinalNavXpos);

      }
  

        // select & set nav wave
        // makeNavWave();
        // updNavWavVals();
      }
      if(e.keyCode === 39 || e.keyCode === 68) { 
        right = true;

        if (maxiMainNavMode && isSingleWorkPost) {
          // do this for ocbsa work single posts
          console.log('Single work post mode moving right...');
       } else if( pg_slug == 'home' ) {         
         // set new translate
         let tempFinalNavXpos = finalNavXPos - moveX;
         checkNavXVals(tempFinalNavXpos);
       }


        // select & set nav wave
        // makeNavWave();
        // updNavWavVals();
      }
  
      // if (startTime == 0 ) startTime = new Date().getTime(); // do just once
    };
    document.addEventListener('keydown', mainNavKeyDownEv);
  
    const mainNavKeyUpEv = (e) => {
  
        resetKeys();        
        // console.log('press event ended. Reset!');
    };
    document.addEventListener('keyup', mainNavKeyUpEv);


    const checkNavXVals = (tempVal) => {
      navNewPosX = (tempVal < boundsLeftX) ? boundsLeftX : (tempVal > boundsRightX) ? boundsRightX : tempVal;
      finalNavXPos = navNewPosX;
    }



    

    // function to update nav wave values
    const updNavWavVals = () => {
      numOfWavItms = selNumWavItms(acc);

      // let dir = (left) ? -1 : (right) ? 1 : 0;

      sinWavArr = genSineVals(numOfWavItms);

      let midInd = Math.floor(numOfWavItms / 2);
      let startInd = activNavId - midInd;
      let endInd = activNavId + midInd;
      let step = 1;
      let indArr = Array.from({ length: (endInd - startInd) / step + 1 }, (_, i) => startInd + (i * step) );
      // let indArr1 = Array(Math.ceil((endInd - startInd) / step) + 1).fill(startInd).map((x, y) => x + y * step);

      // console.log('SinWavArr: ', sinWavArr);
      
      // update nav item scale values
      finalScaleXVals = sinWavArr.map((v, i) => {
        let val = 1 + (v * amtScaleX);
        return parseFloat(val.toFixed(deciNums));
      });
      finalScaleYVals = sinWavArr.map((v, i) => {
        let val = 1 + (v * amtScaleY);
        return parseFloat(val.toFixed(deciNums));
      });

      // console.log('finalScaleXVals: ', finalScaleXVals, finalScaleYVals);
      
      // update nav item tilt values
      let tiltDir = 1;
      finalTiltVals = sinWavArr.map((v, i) => {
        tiltDir = (i >= midInd) ? 1 : -1;
        let val = v * amtTilt * tiltDir;
        return parseFloat(val.toFixed(deciNums));
      });

      /// rearrange array order
      navWavObjIndArr = (left) ? [...indArr.reverse()] : [...indArr];
      finalScaleXVals = (left) ? [...finalScaleXVals.reverse()] : [...finalScaleXVals];
      finalScaleYVals = (left) ? [...finalScaleYVals.reverse()] : [...finalScaleYVals];
      finalTiltVals = (left) ? [...finalTiltVals.reverse()] : [...finalTiltVals];

      // console.log(indArr, finalScaleXVals, finalScaleYVals, finalTiltVals);


      if(!arrayEquals(navRisingIndArr, navWavObjIndArr)) {

        // sort out indexes previously selected but are not in new selection to fall back to initial position
        let droppedInds = navRisingIndArr.filter((v) => !navWavObjIndArr.includes(v));

        navRisingIndArr = [...navWavObjIndArr]; // copy newly selected indexes

        // generate nav item values
        let tempNavArr1 = [];
        navRisingIndArr.forEach((v, i) => {
          let navItmObj = {};
          // insert
          navItmObj.ind = v;
          navItmObj.curScaleX = 1;
          navItmObj.curScaleY = 1;
          navItmObj.curTilt = 0;
          navItmObj.fScaleX = finalScaleXVals[i];
          navItmObj.fScaleY = finalScaleYVals[i];
          navItmObj.fTilt = finalTiltVals[i];
          navItmObj.isRising = true;
          navItmObj.isFalling = false;
          navItmObj.isDone = false;

          tempNavArr1.push(navItmObj);
        });
        navRisingArr = JSON.parse(JSON.stringify(tempNavArr1));

        navFallingIndArr = Array.from(new Set(navFallingIndArr.concat(droppedInds)));

        // console.log('NavRisingIndArr: ', navRisingIndArr);
        // console.log('NavFallingIndArr: ', navFallingIndArr);
    
        // 
    
      }

    }



    // function to get sine wave values for a set
  const genSineVals = (oddNum) => {
    if(oddNum <= 2) return []; // should be at least 3
    
    // test oddNum for oddness
    oddNum = oddNum % 2 == 0 ? oddNum - 1 : oddNum; // must be a odd number so we can have a center value of 0.5
    
    // get step
    midPt = Math.floor(oddNum / 2);
    step = 0.5 / midPt;
    
    /*  const sinArr = Array.from({ length: (1 - 0) / step + 1 }, (_, i) => 0 + (step * i)); */
    
    const sineArr = Array( Math.ceil((1 - 0) / step + 1)).fill(0).map((x, y) => x + y * step);

    const sineVals = sineArr.map((v, i) => Math.sin(Math.PI * v));
    
    
    return sineVals;
  }

  
  
    // reset
    function resetKeys() {
        up = down = left = right = false;
        // gameLoopRunning = false;
    }
    /////////////////// ARROW KEY EVENTS END ///////////////////////////



}




const  animateMainNavMoreTxt = (newInd) => {
  prevSlideInd = activSlideInd;
  activSlideInd = newInd;

  if(prevSlideInd === activSlideInd) return;

  const tl1 = gsap.timeline();
  // .set("#mainLoadingScreen", { opacity: 0, display:"none" })
  // .from("#mainHeader ._mainMenu", { duration: 1.2, y: 30,  ease: Expo.easeOut, opacity: 0 }, "-=1.8")

  activEl = "#mainMediaNavMoreInfo .bigTxt." + pgNavMainClass + " .txt1.pfolioTxt_" + activSlideInd;
  prevEl = "#mainMediaNavMoreInfo .bigTxt." + pgNavMainClass + " .txt1.pfolioTxt_" + prevSlideInd;
  activEl2 = "#mainMediaNavMoreInfo .bigTxt." + pgNavMainClass + " .txt2.pfolioTxt_" + activSlideInd;
  prevEl2 = "#mainMediaNavMoreInfo .bigTxt." + pgNavMainClass + " .txt2.pfolioTxt_" + prevSlideInd;

  tl1.set(activEl, { opacity: 0, display:"none", x: -100 })
  .set(activEl2, { opacity: 0, display:"none", x: -100 })
  .to(prevEl, { duration: 1.2, x: -100, opacity: 0, display: "none", ease: Expo.easeOut})
  .to(activEl, { duration: 1.2, x: 0, opacity: 1, display: "block", ease: Expo.easeOut}, "-=1.2")
  .to(prevEl2, { duration: 1.2, x: -100, opacity: 0, display: "none", ease: Expo.easeOut}, "-=1.9")
  .to(activEl2, { duration: 1.2, x: 0, opacity: 1, display: "block", ease: Expo.easeOut}, "-=1")
  ;

  console.log(prevSlideInd, activSlideInd);
  
}

const showOvlyNavInfo = () => {
  // $('#mainMediaNavMoreInfo').css({ "display" : "table" }); 
  $('#mainMediaNavMoreInfo').fadeIn("slow");
}



const initTeamSwiper = () => {
  $("#ocbTeamList .swiper").css({ "max-width" : dw + "px"});
  
  const swiper = new Swiper('#ocbTeamList .swiper', {
    // Optional parameters
    direction: 'horizontal',
    speed: 400,
    // loop: true,   
    slidesPerView: 8.5,
    spaceBetween: 2,
    // mousewheelControl: true,      
    centeredSlides: true,
    freeMode: true,
    // loopedSlides: 8, // according to the codepen
    mousewheel: {
      releaseOnEdges: true,
    },

    // parallax: true,

    // Responsive breakpoints
    breakpoints: {
      // when window width is >= 320px
      320: {
        slidesPerView: 2.5,
        spaceBetween: 1
      },
      // when window width is >= 480px
      480: {
        slidesPerView: 3.5,
        spaceBetween: 1
      },
      // when window width is >= 640px
      640: {
        slidesPerView: 4.5,
        spaceBetween: 1
      },
      800: {
        slidesPerView: 5.5,
        spaceBetween: 2
      }
    } 
  });
  
}







//////////////// INIT WORKS FUNCS /////////////////////////
const initWorkFuncs = () => {
  // console.log('Initing work funcs...');

  // set totalNumOfNavItms
  totalNumOfNavItms = getTotalNumOfNavItms();

  // set can hover
  $(`#mainMediaNav ._mainContents.${ pgNavMainClass } ._itmCard, #mainHeader ._mainNavs.${ pgNavMainClass } ._itm1`).addClass('_mini _canHover');

  // console.log('Work Page Status: ', maxiMainNavMode, isSingleWorkPost);
}
//////////////// INIT WORKS FUNCS END /////////////////////////

    
});
//////////////// DOCUMENT READY END ///////////////////////////















