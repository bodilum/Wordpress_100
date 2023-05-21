 /////////////////// IMPORT VARIABLES & FUNCTIONS ////////////////////////////////
 import { App } from "./main.js";
 import { updDynCssHtml } from "./custom-dynamic-css-html.js";
 import { mainScroller, updMainScroller  } from "./custom-smooth-scroll.js";
 import { reload_scripts, animEnter, animLeave, playIntroAnim, removeIntroScreen, animLibrary, playGeneralEnterAnim, playGeneralLeaveAnim } from "./custom-page-animations.js";
 /////////////////// IMPORT VARIABLES & FUNCTIONS END ////////////////////////////////





// function to runBeforeEnterSetup()
function runBeforeEnterSetup() {
  switch(App.post_type) {
    case 'course': 
      // let src = $(".pg-content").attr('data-img-src');
      // console.log('SRC: ', src);
      // $("#mainApp .pgBg_top").css({ backgroundImage: `url(${ src })`  });
    break;
    default: 
    break;
}
}



// updated function to set body Class
function setPgBodyClass() {
  // if( body_class == '' ) return;
  // console.log('Body Class: ', body_class);

  // Set <body> classes for the 'next' page
  if (App.prevPgObj.container) {
    // // only run during a page transition - not initial load
    let curPgHtml = App.curPgObj.html;

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


jQuery(document).ready(function($) {


  ///////////////// DOCUMENT READY /////////////////////////////// 

// console.log('Page Transitions Script loaded!');


////////////////// BARBA JS //////////////////////////////////


// tell Barba to use the prefetch module 
// barba.use(barbaPrefetch);


// This function helps add and remove js and css files during a page transition

barba.hooks.beforeEnter(({ current, next }) => { 

  // console.log("Running...1 ... current: ", current.namespace, "  next: ", next.namespace);
  App.prevPgObj = current;
  App.curPgObj = next;

  // set current page name
  App.curPgName = App.curPgObj.namespace;
  App.prevPgName = App.prevPgObj.namespace;

  // set pg_slug
  App.prev_pg_slug = App.pg_slug;
  App.pg_slug = next.namespace;

  // set pg main class / Body class
  // setPgMainClass();
  setPgBodyClass();


  runBeforeEnterSetup();

  // scrolltrigger
  // create instance each time you enter the page
  // ScrollTriggerInstance = ScrollTrigger.create({
  //   animation: timeline,
  //   trigger: element,
  //   start: 'center 75%',
  //   markers: true
  // });

  // let postTitle = App.curPgObj.container.querySelector(".pg-content").getAttribute("post-title");
  // console.log('Post title: ', postTitle);


});

// update the scroll after entering a page
barba.hooks.after(() => {
//  if (browserName != 'Safari') {
   if(mainScroller != null) console.log('updating scroller......'); updMainScroller();
//  }
 App.playIntro = false;
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



// function to update cart item count
function updCartItemCount() {
  App.cart_item_count = parseInt($('body').attr('cart-item-count'));
  // update cart notification
  if(App.cart_item_count > 0) {
    // show it
    $(".cart-notification").text(App.cart_item_count);
    $(".cart-notification").css({ 'display' : "block" });

  } else {
    // hide it
    $(".cart-notification").text('');
    $(".cart-notification").css({ 'display' : "none" });
  }
}


// functio to update active menu
function updActivMenu() {
  $('.mainMenu a').removeClass("_activ");

  // console.log('Pg Slug: ', App.pg_slug);

  $(".mainMenu a").each(function(i, v) {

    let href = $(this).attr('href');
    href = href.replace(/http\:\/\/localhost\/vigor\//g, '').replace(/\/$/g, '');
    let hrefArr = href.split('/');
    href = hrefArr[0];

    if(href === App.pg_slug) {
      $(this).addClass('_activ');
    } else if(href === '' && App.pg_slug == 'home') {
      $(this).addClass('_activ');
    }

}); 

}



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
        // console.log("Once...");
        updCartItemCount()

        updActivMenu();

        if( !App.curPgObj ) App.curPgObj = next;
  
        return animEnter(next.container);
      },
      async beforeEnter({ next }) {
        // always update main menu active menu
        updActivMenu();
        await reload_scripts(next.container);
      },
      async enter({ next }) {

        if( !App.curPgObj ) App.curPgObj = next;

        mainScroller.init();
        return animEnter(next.container);
      },
      async beforeLeave(data) {
          // console.log('Before Leave...');
      },
      async afterLeave(data) {
          // console.log('After Leave...');
            mainScroller.destroy();
      },
      async leave({ current, next, trigger }) {

         current.container.style.position = 'absolute';
         current.container.style.top = 0;
         current.container.style.left = 0;
         current.container.style.width = '100%';

        // console.log("Leaving...1");
        const done = this.async();
        await animLeave(current.container, done);

      },
      async after(data) {
        // console.log("After...1");   
        
        // always update cart items after enter
        updCartItemCount();        
        

         return;
      },
    },
  ],
  views: [
    {
      namespace: "home",
      beforeEnter() {},
      afterEnter() { 
        // init slidshow
        let swiperOptions = {
          // height: 100,
          slideToClickedSlide: true,
          updateOnWindowResize: true,
          grabCursor: true,
          centeredSlides: true,
          // centeredSlidesBounds: true,
          initialSlide: 0,
          speed: 400,
          // loop: true,   
          slidesPerView: 1,
          spaceBetween: 10,
          mousewheelControl: true,     
          // freeMode: true,
          mousewheel: {
            forceToAxis: true,
            sensitivity: 1,
            releaseOnEdges: true,
          },          
          // Navigation arrows
          navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
          },
      
          // Pagination;
          pagination: {
              el: '.swiper-pagination',
              clickable: true
            },
        
      
        };
        $('.homePgSection .homeSlideshow').css({ width: App.dw });
        let homeSwiper = new Swiper('.homePgSection .homeSlideshow .swiper', swiperOptions);
      
      },
    },
    {
      namespace: "about",
      beforeEnter() {
      },
      afterEnter() {},
    },
    {
      namespace: "programs",
      beforeEnter() {
       },
       afterEnter() {
      },
    },
    {
      namespace: "blog",
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
      namespace: "store",
      beforeEnter() {
      },
      afterEnter() {},
    },
    {
      namespace: "promotions",
      beforeEnter() {
      },
      afterEnter() {},
    },
    {
      namespace: "careers",
      beforeEnter() {
      },
      afterEnter() {},
    },
    {
      namespace: "our-coaches",
      beforeEnter() {
      },
      afterEnter() {},
    },
    {
      namespace: "plans",
      beforeEnter() {
      },
      afterEnter() {},
    },
  ],
});




///////////////// BARBA JS END ///////////////////////////////



});

///////////////// DOCUMENT READY ENDS /////////////////////////////// 



 /////////////////// EXPORT VARIABLES & FUNCTIONS ////////////////////////////////
 export { runBeforeEnterSetup, setPgBodyClass };
 /////////////////// EXPORT VARIABLES & FUNCTIONS END ////////////////////////////////