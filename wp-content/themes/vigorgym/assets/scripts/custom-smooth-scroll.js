///////////////// DOCUMENT READY /////////////////////////////// 

// console.log('Page Smooth Scroll Script loaded!');

let mainScroller = null;


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

jQuery(document).ready(function($) {

////////////////// SMOOTH SCROLL ///////////////////////////////////

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

// update mainscroller
updMainScroller();


////////////////// SMOOTH SCROLL END ///////////////////////////////

});

///////////////// DOCUMENT READY ENDS ///////////////////////////////  



 /////////////////// EXPORT VARIABLES & FUNCTIONS ////////////////////////////////
 export { mainScroller, updMainScroller  };
 /////////////////// EXPORT VARIABLES & FUNCTIONS END ////////////////////////////////