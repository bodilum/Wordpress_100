
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
  //
  //
  //
  //
  
  
  var playIntro = false;
  const lastIntroPlayTime = window.localStorage.getItem('lastIntroPlayTime');
  
  
  // init App
  
  console.log("Script vars: ", script_vars);
  ({ categories, pg_slug, tags } = script_vars);
  
  
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
  
  var toggleMainNavVisibility = () => {
    if(showMainNav) {
      $("#mainMediaNav").show();
      $("#mainHeader ._mainNavs").show();
  
      // initialize homeMainNavSwiper
      //  initHomeMainNavSwiper();
  
  
      initHomeFuncs1();
  
      initHomeMainNavScripts();
  
    } else {
      $("#mainMediaNav").hide();
      $("#mainHeader ._mainNavs").hide();
    }
  }
  
  var hideMainNavPages = ['why-us', 'creators', 'contact', 'ocb-films', 'ocb-works', 'works', 'films'];
  
  
  
  ////////////// Animate outs /////////////////
  const mainAnimOut = () => {
    const tl1 = gsap.timeline();
    console.log("Main animate out...");
    tl1.to("#mainHeader ._mainLogo1", { duration: 1.4, x: -200, ease: "power4.out" })
      // .from("#mainHeader ._mainNavs ._itm1", { duration: 1, y: 20, ease: "power4.out", opacity: 0,
      // stagger: { amount: 0.3 } }, "-=1.2")
      // .from("#mainHeader ._mainMenu", { duration: 1.2, y: 30,  ease: Expo.easeOut, opacity: 0 }, "-=1.8")
      // .from("#mainFooter ._left1 a", { duration: 1.2, y: 30,  ease: "power4.out", opacity: 0 }, "-=1.2")
      // .from("#mainFooter ._right1 a", { duration: 1.8, y: 30, opacity: 0,ease: "power4.out" }, "-=1")
      // .from("#mainMediaNav ._mainContents", { duration: 3, x: +dw, opacity: 0, ease: Expo.easeOut }, "-=4")
      // .from("#mainMediaNav ._mainContents ._itmCard", { duration: 0.2, x: +100,  ease: Expo.easeOut,  
      //   stagger: { each: 0.1,   } }, "-=4");
  
  };
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
  var colorPals = [
    ["#cc9933", "#fff"], ["#1a1a1a", "#c4c4c4"], ["#31343c", "#b08972"], ["#f7eed6", "#cb473b"], ["#0e0e0e", "#e0e0e0"], ["#ededed", "#151515"],
    ["#222222", "#d7d7d7"], ["#f7f7f7", "#0e0e0e"], ["#e3a3a9", "#505459"], ["#686459", "#e1cdae"], ["#e54932", "#101010"], ["#eceae5", "#838383"],
    ["#a5918c", "#eee7e5"], ["#d09ba1", "#1b1a22"], ["#232321", "#e6e1d4"], ["#1a1d29", "#dbedff"], ["#dddad3", "#536074"], ["#ec877a", "#1f1f22"],
    ["#187b8d", "#cad5d4"], ["#4b9471", "#c9c6bc"], ["#1a1b24", "#c2a499"], ["#8065cd", "#d5dae0"], ["#d64639", "#313131"], ["#f0e0d1", "#494c4a"],
    ["#211828", "#cfc1cc"], ["#de9e89", "#ced0d9"], ["#f0efdb", "#76878a"], ["#d1d5de", "#2f3549"], ["#a44b84", "#d6f0fa"], ["#eedab7", "#383935"],
    ["#43312a", "#d3d3d3"], 
  ];
  ///////
  
  
  ////////////// Page Settings
  var pgSettings = {
    "tana-la": { colorPal: 2, title1: "Tana La", title2: "Ta na La", imgs: ["https://picsum.photos/200/400?random=1"]},
    "how-about-now": { colorPal: 16, title1: "How About Now?", title2: "ho w abo ut no w", imgs: ["https://picsum.photos/200/400?random=1"]},
    "how-about-now": { colorPal: 7, title1: "How About Now?", title2: "ho w abo ut no w", imgs: ["https://picsum.photos/200/400?random=1"]},
    "how-about-now": { colorPal: 5, title1: "How About Now?", title2: "ho w abo ut no w", imgs: ["https://picsum.photos/200/400?random=1"]},
    "how-about-now": { colorPal: 30, title1: "How About Now?", title2: "ho w abo ut no w", imgs: ["https://picsum.photos/200/400?random=1"]},
    "how-about-now": { colorPal: 15, title1: "How About Now?", title2: "ho w abo ut no w", imgs: ["https://picsum.photos/200/400?random=1"]},
    "how-about-now": { colorPal: 11, title1: "How About Now?", title2: "ho w abo ut no w", imgs: ["https://picsum.photos/200/400?random=1"]},
    "how-about-now": { colorPal: 0, title1: "How About Now?", title2: "ho w abo ut no w", imgs: ["https://picsum.photos/200/400?random=1"]},
    "how-about-now": { colorPal: 3, title1: "How About Now?", title2: "ho w abo ut no w", imgs: ["https://picsum.photos/200/400?random=1"]},
    "how-about-now": { colorPal: 9, title1: "How About Now?", title2: "ho w abo ut no w", imgs: ["https://picsum.photos/200/400?random=1"]},
    "how-about-now": { colorPal: 17, title1: "How About Now?", title2: "ho w abo ut no w", imgs: ["https://picsum.photos/200/400?random=1"]},
    "how-about-now": { colorPal: 1, title1: "How About Now?", title2: "ho w abo ut no w", imgs: ["https://picsum.photos/200/400?random=1"]},
    "how-about-now": { colorPal: 13, title1: "How About Now?", title2: "ho w abo ut no w", imgs: ["https://picsum.photos/200/400?random=1"]},
    "how-about-now": { colorPal: 14, title1: "How About Now?", title2: "ho w abo ut no w", imgs: ["https://picsum.photos/200/400?random=1"]},
    "how-about-now": { colorPal: 4, title1: "How About Now?", title2: "ho w abo ut no w", imgs: ["https://picsum.photos/200/400?random=1"]},
    "how-about-now": { colorPal: 6, title1: "How About Now?", title2: "ho w abo ut no w", imgs: ["https://picsum.photos/200/400?random=1"]},
    "how-about-now": { colorPal: 10, title1: "How About Now?", title2: "ho w abo ut no w", imgs: ["https://picsum.photos/200/400?random=1"]},
    "how-about-now": { colorPal: 12, title1: "How About Now?", title2: "ho w abo ut no w", imgs: ["https://picsum.photos/200/400?random=1"]},
    "how-about-now": { colorPal: 18, title1: "How About Now?", title2: "ho w abo ut no w", imgs: ["https://picsum.photos/200/400?random=1"]},
    "how-about-now": { colorPal: 22, title1: "How About Now?", title2: "ho w abo ut no w", imgs: ["https://picsum.photos/200/400?random=1"]},
    "how-about-now": { colorPal: 29, title1: "How About Now?", title2: "ho w abo ut no w", imgs: ["https://picsum.photos/200/400?random=1"]},
    "how-about-now": { colorPal: 19, title1: "How About Now?", title2: "ho w abo ut no w", imgs: ["https://picsum.photos/200/400?random=1"]},
    "how-about-now": { colorPal: 28, title1: "How About Now?", title2: "ho w abo ut no w", imgs: ["https://picsum.photos/200/400?random=1"]},
    "how-about-now": { colorPal: 25, title1: "How About Now?", title2: "ho w abo ut no w", imgs: ["https://picsum.photos/200/400?random=1"]},
    "how-about-now": { colorPal: 21, title1: "How About Now?", title2: "ho w abo ut no w", imgs: ["https://picsum.photos/200/400?random=1"]},
    "how-about-now": { colorPal: 20, title1: "How About Now?", title2: "ho w abo ut no w", imgs: ["https://picsum.photos/200/400?random=1"]},
    "how-about-now": { colorPal: 8, title1: "How About Now?", title2: "ho w abo ut no w", imgs: ["https://picsum.photos/200/400?random=1"]},
    "how-about-now": { colorPal: 23, title1: "How About Now?", title2: "ho w abo ut no w", imgs: ["https://picsum.photos/200/400?random=1"]},
    "how-about-now": { colorPal: 24, title1: "How About Now?", title2: "ho w abo ut no w", imgs: ["https://picsum.photos/200/400?random=1"]},
    "how-about-now": { colorPal: 26, title1: "How About Now?", title2: "ho w abo ut no w", imgs: ["https://picsum.photos/200/400?random=1"]},
    "how-about-now": { colorPal: 27, title1: "How About Now?", title2: "ho w abo ut no w", imgs: ["https://picsum.photos/200/400?random=1"]},
  };
  
  activPreviewNav = -1; // -1 for no top nav is currently previewed and this is the default
  activPreviewPg = -1; // -1 for no page is currently previewed and this is the default
  pgsLen = 34;
  
  prevInd = -1;
  curInd = -1;
  intensity = 0; // normalized to 0 - 1;
  maxIntensity = 0.75; // value to clamp how max intensity effect will be applied
  maxNumOfBars = 16;
  
  
  const initHeader = () => {
    
  }
  const initFooter = () => {
  
  }
  
  
  const initMainNav = () => {
  
  }
  
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
  // var topNavs = document.querySelectorAll('#mainHeader ._null2 ._center1 ._mainNavs ._itm1');
  $(document).on('click', '#mainHeader ._null2 ._center1 ._mainNavs ._itm1', (e) => {
    var ind = e.target.getAttribute("uid");
    if(!ind) return;
  
    // console.log(activPreviewNav, ind);
  
    ind = parseInt(ind);
  
    // console.log(ind);
    // console.log($(this).index());/
  
    // console.log(activPreviewPg, ind, Math.abs(ind - activPreviewPg));
  
  
    // Nav preview mode or Page Preview mode?
    if(activPreviewPg <= -1) {
      // Nav preview mode
  
      // handle nav previews
      animNavbarWave(ind);
  
      // console.log(activPreviewNav, "...2");
      setPreviewTopNavActiv();
  
  
      // handle page previews
  
    } else {
      // Page preview mode
      activPreviewPg = ind;
    }
  
    if(activSlideInd >= 0) {
      animateMainNavMoreTxt(ind);
    }
  
  });
  
  
  
  
  // jQuery('#mainHeader ._null2 ._center1 ._mainNavs ._itm1').click(() => {
  //   console.log(jQuery(this).index(jQuery(this)));
  //   // console.log(jQuery('#mainHeader ._null2 ._center1 ._mainNavs ._itm1').length)
  // });
  
  
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
        removeIntroScreen();
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
  
  
  
  
  
  
  // remove introScreen
  const removeIntroScreen = () => {
    var timeOut1 = setTimeout(() => {
      const tl1 = gsap.timeline();
      tl1.to('#mainPgClip', { delay: 0.2, duration: 0.4, clipPath: "polygon(0 95%, 100% 95%, 100% 100%, 0 100%)" })
      .to('#mainPgClip', { duration: 1, clipPath: "polygon(0 0%, 100% 0%, 100% 100%, 0 100%)", ease: Expo.easeInOut })
      .set("#mainLoadingScreen", { opacity: 0, display:"none" })
  
      // jQuery("#mainLoadingScreen").css({"display": "none"});
  
      .to('#mainPgClip', { duration: 0.4, clipPath: "polygon(0 0%, 100% 0%, 100% 0%, 0 0%)", ease: Expo.easeOut })
      .from("#mainHeader ._mainLogo1", { duration: 1.4, x: -200, ease: "power4.out" })
      .from("#mainHeader ._mainNavs ._itm1", { duration: 1, y: 20, ease: "power4.out", opacity: 0,
      stagger: { amount: 0.3 } }, "-=1.2")
      .from("#mainHeader ._mainMenu", { duration: 1.2, y: 30,  ease: Expo.easeOut, opacity: 0 }, "-=1.8")
      .from("#mainFooter ._left1 a", { duration: 1.2, y: 30,  ease: "power4.out", opacity: 0 }, "-=1.2")
      .from("#mainFooter ._right1 a", { duration: 1.8, y: 30, opacity: 0,ease: "power4.out" }, "-=1")
      .from("#mainMediaNav ._mainContents", { duration: 3, x: +dw, opacity: 0, ease: Expo.easeOut }, "-=4")
      .from("#mainMediaNav ._mainContents ._itmCard", { duration: 0.2, x: +100,  ease: Expo.easeOut,  
        stagger: { each: 0.1,   } }, "-=4")
      .then(() => {
        $("#mainMediaNav ._mainContents ._itmCard:nth-of-type(1)").addClass('hoverMainMediaNav');
      });
      // .from("#mainMediaNav ._mainContents ._itmCard", { duration: 4, x: +40, delay: 0.5, ease: Expo.easeOut, opacity: 0,
      // stagger: { amount: 3 } }, "-=2");
  
  
      clearTimeout(timeOut1);
    }, delay1);
  }
  
  
      
  const animEnter = (container) => {
      console.log('AnimEnter 1...');
  // 	console.log("AnimEnter 1: ", curPgObj, nextPgObj, categories); ocbsa
  
      if(playIntro) { 
        playIntroAnim();
      } else {
        removeIntroScreen();
      }
  
      return new Promise((resolve, reject) => {
          setTimeout(() => {
              console.log("Anim Enter 2...");
              resolve();
          }, 2000);	
      });
    };
  
  const animLeave = (container, done) => {
  //   console.log("AnimLeave 1: ", curPgObj, nextPgObj, categories);
      
    mainAnimOut();
  
      return new Promise((resolve, reject) => {
          setTimeout(() => {
              console.log("Anim Leave 2...");
              done();
              resolve();
          }, 2000);		
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
  
      
      
  ////////////////// BARBA JS //////////////////////////////////
  let curPgObj, nextPgObj;
  
   // This function helps add and remove js and css files during a page transition
  
    barba.hooks.beforeEnter(({ current, next }) => {
      // console.log("Running...1 ... current: ", current.namespace, "  next: ", next.namespace);
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
        showMainNav = false;
      } else {
        showMainNav = true;
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
    });
  
  
  
  
  barba.init({
      debug: true,
      timeout: 15000,
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
            return animEnter(next.container);
          },
          async beforeLeave(data) {
            //   console.log('Before Leave...');
          },
          async leave({ current, next, trigger }) {
            // console.log("Leaving...0");
  
  //           current.container.style.position = 'absolute';
  //           current.container.style.top = 0;
  //           current.container.style.left = 0;
  //           current.container.style.width = '100%';
  
  
  //           const done = this.async();
  //           animLeave(current.container, done);
            // console.log("Leaving...1");
            // await animLeave(current.container);
  
            // done();
          },
          async after(data) {
            // console.log("After...1");
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
  
  //           return;
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
          namespace: "about",
          beforeEnter() {
          },
          afterEnter() {},
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
            initTeamSwiper();
            $("#mainHeaderBgTxt").css({ "height": "200vh" });
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
  
  
  
  const initHomeMainNavSwiper = () => {
    $("#mainMediaNav .swiper").css({ "width" : dw + "px"});
  
    let homeSwiperZoomState = false;
  
    // console.log('Home swiper inited...', Swiper);
    
    const homeSwiper = new Swiper('#mainMediaNav .swiper', {
      // Optional parameters
      width: 60,
      direction: 'horizontal',
      speed: 400,
      // loop: true,   
      slidesPerView: 15.5,
      slidesOffsetBefore: dw*0.5,
      slidesOffsetAfter: dw*0.5,
      spaceBetween: 30,
      mousewheelControl: true,
      // centeredSlidesBounds: true,
      updateOnWindowResize: true,
      // centeredSlides: true,
      // loop: true,
      // slideToClickedSlide: true,
      // centerInsufficientSlides: true,
      // centeredSlides: true,
      // freeMode: true,
      // loopedSlides: 8, 
      mousewheel: {
        releaseOnEdges: true,
      },
  
      on: {
        click(event) {
          if(!homeSwiperZoomState) {
            $("#mainMediaNav ._mainContents.swiper").addClass("zoomIn1");
            homeSwiperZoomState = true;
            // homeSwiper.slidesPerView = 15.5;
            // homeSwiper.centeredSlides = false;
            homeSwiper.update();
  
            showOvlyNavInfo();
          }
            // prevSlideInd = activSlideInd;
            // activSlideInd = this.clickedIndex;
            // console.log('event.target',this.clickedIndex);
  
            animateMainNavMoreTxt(this.clickedIndex);
  
            togglePlayShowReel();
  
  
            homeSwiper.slideTo(this.clickedIndex);	
        },
  
        reachEnd(e) {
          // console.log('Reached End...');
        },
        sliderMove(sw, e) {
          // console.log('Slide Move: ', sw, e)
          
        },
        slideChange(e) {
          // console.log('Swiper: ', e.activeIndex, e.previousIndex);
          // if ( e.activeIndex > e.previousIndex ) {
            
          // } else {
           
          // }
  
          if ( e.activeIndex > e.slides.length / 3) {
            e.setTranslate(dw * -0.6);
            // console.log( e.slides.length, dw * -0.5);
          } else {
            e.setTranslate(dw * 0.5);
          }
  
        },
        setTranslate(e) {
          // console.log(e.translate, e);
        }
  
    },
  
    
  
      // parallax: true,
  
      // Responsive breakpoints
      breakpoints: {
        // when window width is >= 320px
        320: {
          width: 100,
          slidesPerView: 5.5,
          spaceBetween: 5,
          slidesOffsetBefore: dw*0.5,
          slidesOffsetAfter: 50,
        },
        // when window width is >= 480px
        480: {
          width: 100,
          slidesPerView: 8.5,
          spaceBetween: 5,
          slidesOffsetBefore: dw*0.5,
          slidesOffsetAfter: 50,
        },
        // when window width is >= 640px
        640: {
          width: 100,
          slidesPerView: 10.5,
          spaceBetween: 5,
          slidesOffsetBefore: dw*0.5,
          slidesOffsetAfter: 100,
        },
        800: {
          width: 100,
          slidesPerView: 12.5,
          spaceBetween: 15,
          slidesOffsetBefore: dw*0.5,
          slidesOffsetAfter: 200,
        }
      } 
    });
  
  
    
  
  
    // function updateCurvedText($curvedText, radius) {
    //   $curvedText.css("min-width", "initial");
    //   $curvedText.css("min-height", "initial");
    //   var w = $curvedText.width(),
    //     h = $curvedText.height();
    //   $curvedText.css("min-width", w + "px");
    //   $curvedText.css("min-height", h + "px");
    //   var text = $curvedText.text();
    //   var html = "";
    
    //   Array.from(text).forEach(function (letter) {
    //     html += `<span>${letter}</span>`;
    //   });
    //   $curvedText.html(html);
    
    //   var $letters = $curvedText.find("span");
    //   $letters.css({
    //     position: "absolute",
    //     height:`${radius}px`,
    //     // backgroundColor:"orange",
    //     transformOrigin:"bottom center"
    //   });
      
    //   var circleLength = 2 * Math.PI * radius;
    //   var angleRad = w/(2*radius);
    //   var angle = 2 * angleRad * 180/Math.PI/text.length;
      
    //   $letters.each(function(idx,el){
    //     $(el).css({
    //         transform:`translate(${w/2}px,0px) rotate(${idx * angle - text.length*angle/2}deg)`
    //     })
    //   });
    // }
    
    // var $curvedText = $("#playShowreelBtn ._circular");
    // updateCurvedText($curvedText,50);
    
    // function settingsChanged(){
    //   $curvedText.text($(".text").val());
    //   updateCurvedText($curvedText,$(".radius").val());
    // }
    
    // $(".radius").on("input change",settingsChanged);
    // $(".text").on("input change",settingsChanged);
    
    
  }
  
  
  
  // function to init some home functions
  const initHomeFuncs1 = () => {
    // main nave itm click
    // $(document).on("click", "#mainMediaNav ._itm", () => {
      
    // });
    $(document).on("click", "#mainMediaNavMoreInfo .backToHome", () => {
      $("#mainMediaNav ._mainContents.swiper").removeClass("zoomIn1");
        homeSwiperZoomState = false;
        // homeSwiper.slidesPerView = 15.5;
        // homeSwiper.centeredSlides = false;
        homeSwiper.update();
        homeSwiper.slideTo(0);	
        $('#mainMediaNavMoreInfo').fadeOut("slow");
  
        togglePlayShowReel(true);
    });
  
  
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
    animatePlayShowreel();
    
    document.addEventListener("mousemove", function(event){
      mouseX = event.pageX;
      mouseY = event.pageY;
    });
  }
  
  const initHomeMainNavScripts = () => {
    let activNavId = 0;
    let up = false, down = false, left = false, right = false, swiping = false;
  
    let moveCamUp = false, moveCamDown = false, moveCamLeft = false, moveCamRight = false;
  
    let gameLoopRunning = false;
  
    // const mainNavEl = $("#mainMediaNav ._mainContents"); navXPos
    const mainNavEl = document.querySelector("#mainMediaNav ._mainContents");
    const mainNavWidth = $("#mainMediaNav ._mainContents").width();
    // console.log('MainContents Width: ',  mainNavWidth, dw);
    const mainNavRightWidthAllowed = -1 * (mainNavWidth - (dw * 0.5)); // we expect the nav to end in the center of the screen
  
    const mainNavTopArrow = $("#mainMediaNav ._topArrow span");
    let mainNavTopArrowLeft = parseInt(mainNavTopArrow.css('left'));
    let arrowDist = 190;
    let mainNavState = 'init';// init, 
    let reqAnim;
  
    let totalNumOfNavItms = $("#mainMediaNav ._mainContents ._itmCard").length;
    // console.log('Total Navs: ', totalNumOfNavItms);
  
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
  
          // console.log('Main Nav Top Arrow Left: ', uid, activNavId, $(this).index());
        });
        $("#mainMediaNav ._mainContents ._itmCard").mouseout(function() {        
          mainNavTopArrow.css({ 'left': mainNavTopArrowLeft + 'px' });
        });
  
  
    }
    // IE 6/7/8
    else
    {
        window.attachEvent("onmousewheel", MouseWheelHandler);
    }
  
    function MouseWheelHandler(e)
    {
        // cross-browser wheel delta
        var e = window.event || e; // old IE support
        var delta = Math.max(-1, Math.min(1, (e.wheelDelta || -e.detail)));
  
        // wheelDelta indicates how
        // Far the wheel is turned
        var w = e.wheelDelta;
             
        // Returning normalized value
        var normalize_w = w / 120;
  
        // console.log('Mouse Wheel moved: ', normalize_w, delta, e.wheelDelta, e.detail, e);
  
  
        return false;
    }
    /////////////////////// MOUSE WHEEL EVENTS END ///////////////////
  
  
    //////////////////// INIT TOUCH SWIPE ///////////////////
    $("#mainMediaNav").swipe( {
        //Generic swipe handler for all directions
        swipe:function(event, direction, distance, duration, fingerCount, fingerData) {
          console.log("You swiped " + direction );  
        },
        //Default is 75px, set to 0 for demo so any distance triggers swipe
         threshold:0
    });
    //////////////////// INIT TOUCH SWIPE END ///////////////////
  
  
  
  
  
  
  
  
    ///////////////// NAV GAME LOOP ///////////////////////////////////
  
  
    // INITIALIZATIONS  
    let sinWavArr = [];
    let minNumWavItms = 5, maxNumWavItms = 15;
    let numOfWavItms = 0;
    let acc = 0;
  
    let initWidth = 60;
    let initHeight = 250;
    let initTilt = 0;
    let initY = 0;
  
    let navAddWidth = 30;
    let navAddHeight = 300;
    let navAddTop = 120;
    let navAddGrey = 100;
  
  
    let calmNavsArr = [];
    let calmNavsArrRemoveInds = [];
  
    // translate
    let navNewPosX = dw * 0.5;
    
    let navPosX = 0;
    
    let speed = 0.1;
    let waveSpeedUp = 0.1;
    let waveSpeedDown = 0.02;
  
    let boundsLeftX = mainNavRightWidthAllowed;
    let boundsRightX = dw * 0.5;
    let boundsDistance = boundsRightX + Math.abs(boundsLeftX);
    let finalNavXPos = 0;
    let moveX = 500;
  
    let curUpdNavVals = [];
    let resetNavItmArr = [];
    let selNavVals = [];
  
    let finalScaleXVals = [];
    let finalScaleYVals = [];
    let finalTiltVals = [];
  
    let curScaleXVals = Array(totalNumOfNavItms).fill(1);
    let curScaleYVals = Array(totalNumOfNavItms).fill(1);
    let curTiltVals = Array(totalNumOfNavItms).fill(0);
  
    // console.log(curScaleXVals, curScaleYVals, curTiltVals);
    
    let amtScaleX = 0.2;
    let amtScaleY = 0.7;
    let amtTilt = 15;
  
    // translate top arrow
    let newTopArrowPosX = 0;
    let topArrowPosX = 0;
  
    // tilt
  
    // width
  
    // height
  
    // top
  
    // grey
  
  
  
  // function to calm nav wave
  const calmNavWave = () => {
    // console.log('Calming nav wave items...');
    // calm nav wave items
  
    // remove nav wave items that has been calmed
  
  
  }
  
  // function to make nav wave
  const makeNavWave2 = () => {
  
    if(sinWavArr.length <= 0) return;
  
    let midInd = Math.floor(numOfWavItms / 2);
    let startInd = activNavId - midInd;
    let endInd = activNavId + midInd;
    let step = 1;
    let indArr = Array.from({ length: (endInd - startInd) / step + 1 }, (_, i) => startInd + (i * step) );
    // let indArr1 = Array(Math.ceil((endInd - startInd) / step) + 1).fill(startInd).map((x, y) => x + y * step);
  
    // console.log(indArr, indArr1);
    // console.log('makeNavWave2...');
  
  
    // reset all nav item values
    // resetNavWavValsFunc();  
  
  
    selNavVals = [];
    removeNavItmInds = [];
  
    // console.log(startInd, endInd, midInd, indArr);
  
    // update selected nav item values
    indArr.forEach((v, i) => {
      if( v < 0 || v >= totalNumOfNavItms ) return;
  
      // add to selNavVals & curUpdNavVals
      selNavVals.push(v);
      if(!curUpdNavVals.includes(v)) curUpdNavVals.push(v);
  
      let activNavEl = $(`#mainMediaNav ._mainContents ._itmCard:nth-of-type(${v+1})`);
      let activNavAEl = $(`#mainMediaNav ._mainContents ._itmCard:nth-of-type(${v+1}) a`);
      let activNavItm = $(`#mainMediaNav ._mainContents ._itmCard:nth-of-type(${v+1}) ._itm`);
  
      // activNavEl.css({ 'border' : '5px solid blue' });
  
      ///////// update scale
      let curScaleXVal = curScaleXVals[v];
      let dScaleX = finalScaleXVals[i] - curScaleXVal;
  
      // console.log('dScaleX: ', v, i, curScaleXVals[v], finalScaleXVals[i], curScaleXVal);
  
      curScaleXVal = curScaleXVal + (dScaleX * waveSpeedUp);
  
      // check vals
      if(curScaleXVal > finalScaleXVals[i]) {
        curScaleXVal = finalScaleXVals[i];
        if(!removeNavItmInds.includes(v)) removeNavItmInds.push(v);
      }
      curScaleXVals[v] = curScaleXVal;
  
      // apply transform scaleX
      // activNavItm.css( { 'transform' : `scaleX(${ curScaleXVals[v] })`});
  
  
      let curScaleYVal = curScaleYVals[v];
      let dScaleY = finalScaleYVals[i] - curScaleYVal;
  
      curScaleYVal = curScaleYVal + (dScaleY * waveSpeedUp);
  
      // check vals
      if(curScaleYVal > finalScaleYVals[i]) curScaleYVal = finalScaleYVals[i];
      curScaleYVals[v] = curScaleYVal;
  
      // apply transform scaleY
      // activNavItm.css( { 'transform' : `scaleY(${ curScaleYVals[v] })`});
  
  
      ///////////// update tilt
      let curTiltVal = curTiltVals[v];
      let dTilt = finalTiltVals[i] - curTiltVal;
  
      curTiltVal = curTiltVal + (dTilt * waveSpeedUp);
  
      // check vals
      if(curTiltVal > finalTiltVals[i]) curTiltVal = finalTiltVals[i];
      curTiltVals[v] = curTiltVal;
  
      // apply transform, scaleX, scaleY, & Tilt / rotate
      activNavItm.css( { 'transform' : `scale(${ curScaleXVals[v] }, ${ curScaleYVals[v] }) rotateY(${ curTiltVals[v] }deg)`} );
  
  
    });
  
  
    //////////// remove all the inds that are done updating
    if(removeNavItmInds.length > 0) {
      removeNavItmInds.forEach((v) => {
        if(curUpdNavVals.includes(v)) {
          let removeInd = curUpdNavVals.indexOf(v);
          curUpdNavVals.splice(removeInd, 1);
  
          // add to resetNavItmArr
          resetNavItmArr.push(v);
          console.log('Removed from curUpdNavVals & added to resetNavItmArr...');
        }
      })
    }
    // removeNavItmInds = [];
  
  
  
  }
  
  
  // function to reset nav values
  const resetNavWavValsFunc = () => {
    $(`#mainMediaNav ._mainContents ._itmCard`).css({ 'border' : 'none' });
  
    // update resetNavItmArr 
    // let resetNavItms = curUpdNavVals.filter((v) => !selNavVals.includes(v));
    // resetNavItmArr = [...new Set([...resetNavItms, ...resetNavItmArr])];
  
    // console.log(curUpdNavVals, selNavVals, 'Reset Nav Itm Arr 1: ', resetNavItms, '   Reset Nav Itm Arr 2: ', resetNavItmArr);
  
    // ////// reset all nav items in the resetNavItmArr
    // removeNavItmInds2 = [];
    // resetNavItmArr.forEach((v, i) => {
    //   let activNavEl = $(`#mainMediaNav ._mainContents ._itmCard:nth-of-type(${v+1})`);
    //   let activNavAEl = $(`#mainMediaNav ._mainContents ._itmCard:nth-of-type(${v+1}) a`);
    //   let activNavItm = $(`#mainMediaNav ._mainContents ._itmCard:nth-of-type(${v+1}) ._itm`);
  
    //   ///////// update scale
    //   let curScaleXVal = curScaleXVals[v];
    //   let dScaleX = 1 - curScaleXVal; // finalScaleX = 1 here... and negative value will force scale down
  
    //   curScaleXVal = curScaleXVal + (dScaleX * waveSpeedDown); // 
  
    //   // check vals
    //   if(curScaleXVal < 1) {
    //     curScaleXVal = 1;
    //     if(!removeNavItmInds2.includes(v)) removeNavItmInds2.push(v);
    //   }
    //   curScaleXVals[v] = curScaleXVal;
  
    //   // apply transform scaleX
    //   // activNavItm.css( { 'transform' : `scaleX(${ curScaleXVals[v] })`});
  
  
    //   let curScaleYVal = curScaleYVals[v];
    //   let dScaleY = 1 - curScaleYVal; // finalScaleY = 1 here... and negative value will force scale down
  
    //   curScaleYVal = curScaleYVal + (dScaleY * waveSpeedDown);
  
    //   // check vals
    //   if(curScaleYVal > 1) curScaleYVal = 1;
    //   curScaleYVals[v] = curScaleYVal;
  
    //   // apply transform scaleY
    //   // activNavItm.css( { 'transform' : `scaleY(${ curScaleYVals[v] })`});
  
  
  
    //   ///////////// update tilt
    //   let curTiltVal = curTiltVals[v];
    //   let dTilt = 0 - curTiltVal; // finalTiltVals = 0 here... and negative value will force scale down
  
    //   curTiltVal = curTiltVal + (dTilt * waveSpeedDown);
  
    //   // check vals
    //   if(curTiltVal > 0) curTiltVal = 0;
    //   curTiltVals[v] = curTiltVal;
  
    //   // apply transform, scaleX, scaleY, & Tilt / rotate
    //   activNavItm.css( { 'transform' : `scale(${ curScaleXVals[v] }, ${ curScaleYVals[v] }) rotateY(${ curTiltVals[v] }deg)`} );
    // });
  
    //////////// remove all the inds that are done resetting
    // if(removeNavItmInds2.length > 0) {
    //   removeNavItmInds2.forEach((v) => {
    //     if(resetNavItmArr.includes(v)) {
    //       let removeInd = resetNavItmArr.indexOf(v);
    //       resetNavItmArr.splice(removeInd, 1);
    //     }
    //   })
    // }
    // removeNavItmInds2 = [];
  
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
    let navDistX = navNewPosX - navPosX; 
    
    navPosX = navPosX + (navDistX * speed);
    
    mainNavEl.style.left = navPosX + "px";
  
    // set active nav id
    let moveFraction = (navPosX + Math.abs(boundsLeftX)) / boundsDistance;
    activNavId = (totalNumOfNavItms - 1) - Math.floor(moveFraction * totalNumOfNavItms);
  
    if(resetNavItmArr.length > 0) {
      // calmNavWave();
      resetNavWavValsFunc();
    }
  
  
    makeNavWave2();
  
   
  
    
  
    window.requestAnimationFrame(navMainGameLoop);
    // console.log('Gamelooping away...');
  
  
  }
  navMainGameLoop();
  // window.requestAnimationFrame(navMainGameLoop);
  
  
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
    
          // set new translate
          finalNavXPos += moveX;
          checkNavXVals();
  
          // select & set nav wave
          // makeNavWave();
          updNavWavVals();
        }
        if(e.keyCode === 39 || e.keyCode === 68) { 
          right = true;
  
          // set new translate
          finalNavXPos -= moveX;
          checkNavXVals();
  
          // select & set nav wave
          // makeNavWave();
          updNavWavVals();
        }
    
        // if (startTime == 0 ) startTime = new Date().getTime(); // do just once
      };
      document.addEventListener('keydown', mainNavKeyDownEv);
    
      const mainNavKeyUpEv = (e) => {
    
          resetKeys();        
          console.log('press event ended. Reset!');
      };
      document.addEventListener('keyup', mainNavKeyUpEv);
  
  
      const checkNavXVals = () => {
        navNewPosX = (finalNavXPos < boundsLeftX) ? boundsLeftX : (finalNavXPos > boundsRightX) ? boundsRightX : finalNavXPos;
        finalNavXPos = navNewPosX;
      }
  
  
  
      // function to update nav wave values
      const updNavWavVals = () => {
        numOfWavItms = selNumWavItms(acc);
  
        // let dir = (left) ? -1 : (right) ? 1 : 0;
  
        sinWavArr = genSineVals(numOfWavItms);
  
        // console.log('SinWavArr: ', sinWavArr);
        
        // update nav item scale values
        finalScaleXVals = sinWavArr.map((v, i) => 1 + (v * amtScaleX));
        finalScaleYVals = sinWavArr.map((v, i) => 1 + (v * amtScaleY));
  
        // console.log('finalScaleXVals: ', finalScaleXVals, finalScaleYVals);
        
        // update nav item tilt values
        let midInd = Math.floor(numOfWavItms / 2);
        let tiltDir = 1;
        finalTiltVals = sinWavArr.map((v, i) => {
          tiltDir = (i >= midInd) ? 1 : -1;
          return v * amtTilt * tiltDir;
        });
  
        // console.log('Update Nav Wave Vals: ', sinWavArr, finalScaleXVals, finalScaleYVals, finalTiltVals);
  
      }
  
  
      // const makeNavWave = () => {
      //   let numOfWavItms = selNumWavItms(acc);
      //   // console.log('Number of Wave Items: ', numOfWavItms, acc);
      //   let dir = (left) ? -1 : (right) ? 1 : 0;
      //   lastWavItmId = (dir == -1) ? activNavId + numOfWavItms -1 : activNavId - numOfWavItms + 1;
      //   lastNavId = totalNumOfNavItms - 1;
    
      //   // lastWavItmId = (lastWavItmId >= lastNavId) ? lastNavId : (lastWavItmId < 0) ? 0 : lastWavItmId;
    
      //   if(lastWavItmId > activNavId) {  
      //       startInd = activNavId;
      //       endInd = lastWavItmId;
      //   } else {
      //       startInd = lastWavItmId;
      //       endInd = activNavId;
      //   }
    
    
      //   // get array of indexes for selected nav items to apply sine wave effect
      //   step = 1;
      //   indArr1 = Array.from({ length: (endInd - startInd) / step + 1 }, (_, i) => startInd + (step * i));
      //   indArr1 = (dir == 1) ? indArr1 : indArr1.reverse();
    
      //   // get sine wave multiplier array
      //   sinWavArr = sineMultiplier(numOfWavItms);  
  
      //   // console.log('IndArr1: ', indArr1);
      //   // console.log('Sine Wave Array: ', sinWavArr);
  
      //   // generate waves
      //   indArr1.forEach((v, i) => {
      //     if(v >= 0 && v <= lastNavId) {
            
      //       let activNavEl = $(`#mainMediaNav ._mainContents ._itmCard:nth-of-type(${v+1})`);
      //       let activNavAEl = $(`#mainMediaNav ._mainContents ._itmCard:nth-of-type(${v+1}) a`);
            
      //       // console.log(v, i);
            
      //       // v1 = navAddWidth * Math.sin(Math.PI * sinWavArr[i]);
      //       // applyWidth[i] = v1;
    
      //       ///// adjust height
      //       v1 = navAddHeight * Math.sin(Math.PI * sinWavArr[i]);
      //       navNewHeight = initHeight + v1;
      //       activNavAEl.css({ 'height' : navNewHeight + 'px' });
      //       activNavEl.css({ 'height' : navNewHeight + 'px' });
    
      //       // ///// adjust y
      //       v1 = navAddTop * Math.sin(Math.PI * sinWavArr[i]);
      //       navNewTop = initY - v1;
      //       activNavEl.css({ 'top' : navNewTop + 'px' });
    
      //       // ///// tilt 
      //       // v1 = dir * navAddTilt * Math.sin(Math.PI * sinWavArr[i]);        
      //       // applyTilt[i] = v1;
    
    
            
      //       if(!calmNavsArr.includes(v)) { calmNavsArr.push(v); }
    
      //       // activate calm waves effect
      //       // effectActive = true;
    
      //       // calmMainNavWaveGsap(acc, dir);
      //     }
  
  
      // });
  
  
      // }
  
  
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
  
    activEl = "#mainMediaNavMoreInfo .bigTxt .txt1.pfolioTxt_" + activSlideInd;
    prevEl = "#mainMediaNavMoreInfo .bigTxt .txt1.pfolioTxt_" + prevSlideInd;
    activEl2 = "#mainMediaNavMoreInfo .bigTxt .txt2.pfolioTxt_" + activSlideInd;
    prevEl2 = "#mainMediaNavMoreInfo .bigTxt .txt2.pfolioTxt_" + prevSlideInd;
  
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
  
      
  });
  //////////////// DOCUMENT READY END ///////////////////////////
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  