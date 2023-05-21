// console.log('Vigor Crossfit Gym main js is loaded!');

import { getPgAnimFuncsLoaded } from "./custom-page-animations.js";
import { playIntroAnim, animLibrary } from "./custom-page-animations.js";

const App = {
  dw: window.innerWidth, dh: window.innerHeight,
  curPgName: '', prevPgName: '', prevPgObj: null, curPgObj: null, categories: [], pg_slug: '', tags: [],
  post_type: '', body_class: '', isLeaving: false, isEntering: false,
  cart_item_count: -1,
  isMobileMenuOpen: false, 
  mobileMode: false,
  browserName: "Unknown",
  playIntro: false,
  playedIntro: false,
  prev_pg_slug: ''
};

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
      App.browserName = "MSIE";
  }
  else if(navigator.userAgent.indexOf("Firefox")!=-1){
      App.browserName = "Firefox";
  }
  else if(navigator.userAgent.indexOf("Opera")!=-1){
      App.browserName = "Opera";
  }
  else if(navigator.userAgent.indexOf("Chrome") != -1){
      App.browserName = "Chrome";
  }
  else if(navigator.userAgent.indexOf("Safari")!=-1){
      App.browserName = "Safari";
  }
  return App.browserName;   
}


if( getBrowserName() == "Safari" ){
  console.log("You are using Safari");
}else{
  console.log("You are surfing on " + getBrowserName( App.browserName ));
}

  





document.addEventListener('DOMContentLoaded', () => {
  // Window dom elements loaded

  App.dw = window.innerWidth;
  App.dh = window.innerHeight;

  App.appBody = document.querySelector('#bodyContent');

  // check if we're in mobile mode
  App.mobileMode = (App.dw < 920) ? true : false;


  // AJAX ADD TO CART 

});

document.addEventListener('load',() => {
  // page contents and assets loaded
});







///////////////// DOCUMENT READY /////////////////////////////// 
jQuery(document).ready(async function($) {


    ////// page enter and page leave animations
    const playPgEnterAnim = () => {
      const tl1 = gsap.timeline();
      animLibrary('headerMenuEnter', 0.1);
    }
  
    const playPgLeaveAnim = () => {
      const tl1 = gsap.timeline();
    }


  const startApp = () => {

    App.playIntro = false;
    App.lastIntroPlayTime = window.localStorage.getItem('lastIntroPlayTime');
    App.introPlayFreq = 2; // in hours
    
    App.timenow = Date.now();
    
    
    if( !App.lastIntroPlayTime ) {
      App.playIntro = true;
    } else {  
      var lastIntroPlay = new Date(parseInt( App.lastIntroPlayTime ));
      var divider = 3600000; // milliseconds to hours
      var diff = ((App.timenow - lastIntroPlay) / divider).toFixed(2);
    
      if (diff > App.introPlayFreq) App.playIntro = true;
    }
    
    
    // init App
    
    // console.log("Script vars: ", script_vars);
    // ({ categories, pg_slug, tags, post_type } = script_vars);

    App.categories = script_vars.categories;
    App.pg_slug = script_vars.pg_slug;
    App.tags = script_vars.tags;
    App.post_type = script_vars.post_type;
    
    
    // 
    //// CAPTURE BROWSER REFRESH OR NAVIGATE EVENTS ///////////////////////////////////// 
    // browser refreshed
    //check for Navigation Timing API support
    if (window.performance) {
      // console.info("window.performance works fine on this browser");
      if (performance.navigation.type == performance.navigation.TYPE_RELOAD) {
        // console.info( "This page is reloaded" );
        App.playIntro = true;
      } else {
        // console.info( "This page is not reloaded");
      }
    } else {
      let navType = performance
        ? performance.getEntriesByType("navigation")[0].type
        : "";
      if (navType === "reload") {
        // console.info( "This page is reloaded" );
        App.playIntro = true;
      } else {
        // console.info( "This page is not reloaded");
      }
    }
    
    
    ///  App.playIntro or playPgEnterAnim
    if(App.playIntro) {
      App.playedIntro = true;
      playIntroAnim();
    } else {
      playPgEnterAnim();
      App.playedIntro = false;
    }
    
    
    
    //////// CAPTURE BROWSER REFRESH OR NAVIGATE EVENTS END /////////////////////////////////////
    
      } // end of startApp



  // load page animation functions
  const pgAnimLoaded = await getPgAnimFuncsLoaded();

  if ( !pgAnimLoaded ) return;

  startApp();

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
  




  









});
//////////////// DOCUMENT READY END ///////////////////////////   




export { App };