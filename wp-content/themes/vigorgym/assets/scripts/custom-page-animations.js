 /////////////////// IMPORT VARIABLES & FUNCTIONS ////////////////////////////////
 import { App } from "./main.js";
 import { updDynCssHtml } from "./custom-dynamic-css-html.js";
 /////////////////// IMPORT VARIABLES & FUNCTIONS END ////////////////////////////////


///////////////// DOCUMENT READY /////////////////////////////// 


// console.log('Page Animations Script loaded!');

let pgAnimFuncsLoaded = false;
let animEnter, animLeave, playIntroAnim, removeIntroScreen, animLibrary, playGeneralEnterAnim, playGeneralLeaveAnim, playPgEnterAnim, playPgLeaveAnim; 
let reload_scripts;

jQuery(document).ready(function($) {

  let pgTransBxs = gsap.utils.toArray('.pg_trans_bx');


// initPageAnimFuncs = () => {

  // function to reload all scripts
  reload_scripts = (param) => {
    $(param).find('script').each(function (i, script) {
      var $script = $(script);
      $.ajax({
        url: $script.attr('src'),
        cache: true,
        dataType: 'script',
        success: function () {
          $script.trigger('load');
          // console.log("scripts loaded!!!");
        }
      });
    });
  }

  // PLAY INTRO ANIMATION
  playIntroAnim = () => {
  
    var progVal = 0;
    var fakeProgressVals = [1, 1, 2, 0, 0, 0, 0, 0, 2, 2, 3, 4, 5, 0, 0, 0 , 0, 0, 6, 7, 0, 0, 0, 0, 8, 9, 10];
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
  
  
    
  removeIntroScreen = () => {
    const tl1 = gsap.timeline();
    tl1
    .to('#mainIntro .content .introLogo', { delay: 0.5, duration: 1.2, y: -200, opacity: 0, display: 'none', ease: Expo.easeInOut })
    .to('#mainIntro .content .progress', { duration: 1.2, y: -200, opacity: 0, display: 'none', ease: Expo.easeInOut }, "-=1.1")
    .to('#mainIntro .content .progressPercent', { duration: 1.2, y: -200, opacity: 0, display: 'none', ease: Expo.easeInOut }, "-=1.1")
    .to('#mainIntro', { duration: 1, opacity: 0, display: 'none', ease: Expo.easeInOut }, "-=0.8" )
    ;
  }
  
  
  
  
  
  /////// ANIMATION LIBRARY ////////
  animLibrary = (animName, delay = 0) => {
    const tl = gsap.timeline();    
    let logoEl = '', menuEls = '';
  
  
    switch( animName ) {
      case 'headerMenuEnter':
        removeIntroScreen();
      break;
      case 'headerMenuLeave':
  
      break;
      case 'footerMenuEnter':
  
        // tl
        // .fromTo("#mainFooter span", { display: 'none', y: 200, opacity: 0 }, 
        //   { delay, duration: 2.2, y: 0, display: 'block', opacity: 1, ease: Expo.easeInOut, stagger: { amount: 0.8 } })
        // ;
      break;
      case 'footerMenuLeave':
        // tl
        // .fromTo("#mainFooter span", { display: 'block', y: 0, opacity: 1 }, 
        //   { delay, duration: 2.2, y: 200, display: 'none', opacity: 0, ease: Expo.easeInOut, stagger: { amount: 0.8 } })
        // ;
  
      break;
      case 'footerMenuEnter':
        
      break;
      case 'footerMenuLeave':
      break;
      case 'homePageEnter':
      break;
      case 'homePageLeave':     
        
      break;
      default:
        if (App.isLeaving) {   
          // console.log(' App is leaving...');      
          tl
          .fromTo(App.curPgObj.container, { duration: 2, opacity: 1 }, 
          { opacity: 0, ease: "power4.out" })
          ;
        }
        if (App.isEntering) {
          // console.log(' App is entering...');
          tl
          .fromTo(App.curPgObj.container, { duration: 4, opacity: 0 }, 
          { opacity: 1, ease: "power4.out" })
          ;
        }
      break;
    }
  
  }
  /////// ANIMATION LIBRARY END ////////


////// page enter and page leave animations
playPgEnterAnim = () => {
  const tl1 = gsap.timeline();
  animLibrary('headerMenuEnter', 0.1);
}

playPgLeaveAnim = () => {
  const tl1 = gsap.timeline();
}
  
  
  ////////////////// GENERAL ANIMATIONS ////////////////////
  // enter
  playGeneralEnterAnim = () => { 
  
      switch(App.post_type) {
        default: 
          animLibrary( 'headerMenuEnter' , -2 );  
          animLibrary( 'footerMenuEnter' );  
        break;
      }
    
    }
    
    
    // leave
  playGeneralLeaveAnim = () => {
    
      switch(App.post_type) {
        default: 
          animLibrary( 'headerMenuLeave');  
          animLibrary( 'footerMenuLeave' );  
        break;
      }
      
    }
    ////////////////// GENERAL ANIMATIONS END ////////////////////
    
    
    
    //////////////// ANIM ENTER //////////////////////////// 
    
  animEnter = (container) => {
      App.isEntering = true;

      let tl = gsap.timeline();

      // container.fadeIn();

      // console.log( 'Container Enter: ', container );
      gsap.to( container, { duration: 2, opacity: 1, display: 'table', ease: 'power4.out' } );

      // 
      tl
      .set('.pgTransAnim', { display: 'block' })
      .fromTo(
        ".pg_trans_bx", {  display: 'inline-block', opacity: 1, scale: 1 }, { duration: 1, opacity: 0, display: 'none', scale: 0, stagger: {
          amount: 1, from: "center", grid: "auto" }, ease: 'power4.out', onComplete: () => {
            $('.pgTransAnim').css({ 'display': 'none' });            
          } })
        ;
    
      // // update page colors
      // updDynCssHtml();
    
      // const tl8 = gsap.timeline();
    
      // // console.log('AnimEnter 1...');
      //   // console.log("Anim Enter 1: ", prevPgObj.container, App.curPgObj.container, categories);
      // /**
      //  * if you have page specific animations that is quite different from general page animations,
      //  * use switch function to target the page namespace or pg_slug and put all default or general or common
      //  * animations in the default case of the switch function
      //  */
    
    
      // // play enter animations
      // let animNameSpace = pg_slug + 'PageEnter';
      // let delay = 4;
    
      // playGeneralEnterAnim();
    
      // // check if post type is course and let's play a single animEnter animation type for all course post types
      // console.log('App.PlayedIntro: ', App.playedIntro);
      // if (post_type == 'course') animNameSpace = "coursePageEnter"; delay = (App.playedIntro) ? 5.2 : 2;
    
      // animLibrary( animNameSpace, delay);  
    
      // // console.log('Animation Enter: ', animNameSpace);
    
    
      // // tl8.fromTo( container, { opacity: 0, display: 'none', y: 200 },
      // //   { duration: 1, opacity: 1, display: 'table', y: 0, ease: "power4.out" }
      // // );
    
    
      // if(pg_slug == '' || pg_slug == 'home') {
      //   console.log('PLaying home enter animation...');
      // }
    
    
      return new Promise((resolve, reject) => {
          setTimeout(() => {
              console.log("Anim Enter 2...");
              App.isEntering = false;
              App.playedIntro = false;
              resolve();
          }, 2500);	
      });
    
    };
    
    //////////////// ANIM ENTER END ////////////////////////////
    
    
    
  //////////////// ANIM LEAVE ////////////////////////////
  animLeave = (container, done) => {
      let tl = gsap.timeline();
    
      App.isLeaving = true;

      // console.log( 'Container Leave: ', container );
      gsap.to( container, { duration: 2, opacity: 0, display: 'table', ease: 'power4.out' } );

      //
      tl      
      .set('.pgTransAnim', { display: 'block' })
      .fromTo(
        ".pg_trans_bx", { opacity: 0, display: 'none', scale: 0 }, { duration: 1, display: 'inline-block', opacity: 1, scale: 1 , stagger: {
          amount: 1, from: "center", grid: "auto" }, ease: 'power4.out', onComplete: () => {
          } })
        ;
    
      // // check if mobile menu is open and close if true
      // if(isMobileMenuOpen) $('._mobileMenu ._toggleMMBtn').trigger('click');
      //   // console.log("AnimLeave 1: ", prevPgObj, App.curPgObj, categories);
      //   // console.log("AnimLeave 1: ", container);
    
      //   const tl7 = gsap.timeline();
    
    
      // /**
      //  * if you have page specific animations that is quite different from general page animations,
      //  * use switch function to target the page namespace or pg_slug and put all default or general or common
      //  * animations in the default case of the switch function
      //  */
    
    
      //   // play all leave animations    
      //   let animNameSpace = pg_slug + 'PageLeave';
    
      //   // check if post type is course and let's play a single animLeave animation type for all course post types
      //   if (post_type == 'course') animNameSpace = "coursePageLeave";
    
      //   animLibrary(animNameSpace);
      //   playGeneralLeaveAnim();     
    
    
      //   // tl7.fromTo( container, { opacity: 1, display: 'table', y: 0 },
      //   //   { duration: 1, opacity: 0, display: 'none', y: 200, ease: "power4.out" }
      //   // );  
      
        return new Promise((resolve, reject) => {
            setTimeout(() => {
                // console.log("Anim Leave 2...");
                App.isLeaving = false;
                App.playedIntro = false;
                done();
                resolve();
            }, 2500);		
        });
        
      };
  //////////////// ANIM LEAVE END //////////////////////////// aspirational desires from the skills they learn from being a beauty professional
 
  // console.log('Page Animation loaded! ');
  pgAnimFuncsLoaded = true;
  
// } // initPageAnimFuncs




  
 


});

///////////////// DOCUMENT READY ENDS /////////////////////////////// 


const getPgAnimFuncsLoaded = () => pgAnimFuncsLoaded;





 /////////////////// EXPORT VARIABLES & FUNCTIONS ////////////////////////////////
 export { getPgAnimFuncsLoaded, reload_scripts, animEnter, animLeave, playIntroAnim, removeIntroScreen, animLibrary, playGeneralEnterAnim, playGeneralLeaveAnim, playPgEnterAnim, playPgLeaveAnim };
 /////////////////// EXPORT VARIABLES & FUNCTIONS END ////////////////////////////////


