// console.log('OK...custom MMTS script is running...');

const App = new (function () {
    // const live = false;
    const live = true;
  })();
  
  gsap.registerPlugin(ScrollTrigger);
  
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
  
  let playIntro = false;
  let playTransition = false;
  var introPlayFreq = 0.01; // in hours 0.01;
  var lastIntroPlay;
  
  // console.log("ABCDEFG...");
  
  // console.log(
  //   "Performance1: ",
  //   window.performance.navigation.PerformanceNavigation.type,
  //   "Performance2: ",
  //   performance.getEntriesByType("navigation")
  // );
  
  introPlayedTime = window.localStorage.getItem("introPlayedTime");
  
  // browser refreshed
  //check for Navigation Timing API support
  if (window.performance) {
    // console.info("window.performance works fine on this browser");
    if (performance.navigation.type == performance.navigation.TYPE_RELOAD) {
      // console.info( "This page is reloaded" );
      playIntro = true;
    } else {
      // console.info( "This page is not reloaded");
      playIntro = false;
    }
  } else {
    // let navType = performance
    //   ? performance.getEntriesByType("navigation")[0].type
    //   : "";
    // if (navType === "reload") {
    //   // console.info( "This page is reloaded" );
    //   playIntro = true;
    // } else {
    //   // console.info( "This page is not reloaded");
    //   playIntro = false;
    // }
    playIntro = true;
  }
  
  // console.info(performance.navigation.type);
  // console.log('Console Info', performance.getEntriesByType("navigation")[0].type);
  // enum NavigationType {
  //     "navigate",
  //     "reload",
  //     "back_forward",
  //     "prerender"
  // };
  // if (performance.navigation.type == performance.navigation.TYPE_RELOAD) {
  //     // console.info( "This page is reloaded" );
  //     playIntro = true;
  // } else {
  //     // console.info( "This page is not reloaded");
  //     playIntro = false;
  // }
  
  var now = Date.now();
  
  // function to initPlayIntro
  function initPlayIntro() {
    now = Date.now();
  
    console.log("Running...2", playIntro);
  
    // check if we can play intro
    if (!introPlayedTime) {
      playIntro = true;
      playTransition = false;
      console.log("Fresh Browsing, play intro...");
    } else {
      lastIntroPlay = new Date(lastIntroPlayStr);
  
      console.log("LastIntroPlay: ", lastIntroPlay);
  
      divider = 3600000; // to convert milliseconds to hours
      diff = ((now - lastIntroPlay) / divider).toFixed(2);
  
      // check if it's time to show intro again
      if (diff > introPlayFreq) {
        playIntro = true;
        playTransition = false;
        console.log("Yeah it's time to play intro again!");
      }
    }
  }
  
  ////////////////
  jQuery(document).on("click", "a[href]", function (e) {
    var link = jQuery(this).attr("href").trim();
  
    // check if link goes to a file
    var isFileLink = link.match(/\.(pdf|mp3|jpg|jpeg|htm|html)$/i);
  
    console.log("Here's Link: ", link, isFileLink);
  
    if (
      jQuery(this).attr("target") !== "_blank" &&
      !isFileLink &&
      link !== "#" &&
      link !== ""
    ) {
      // console.log('NEW URL: ', jQuery(this).attr('href'), cur_pg, prev_pg);
      e.preventDefault();
      e.stopPropagation();
      //   link = link.replace('https://www.auntierona.co.za', '');
      link = App.live
        ? "http://dezignsagency.com/mmts"
        : link.replace("http://localhost", "");
      // link = App.live
      //   ? "https://mmtrustspecialist.co.za"
      //   : link.replace("http://localhost", "");
  
      if (!App.live) {
        if (link === "/mmts/") link = "/mmts";
      }
  
      // link.replace("http://dezignsagency.com", "http://www.designsagency.com");
  
      // check if link begins with http://dezignsagency.com or http://www.designsagency.com
  
      // if(link.indexOf())
  
      console.log("Cleaned Link: ", link);
      // console.log(
      //   "Cleaned Link: ",
      //   link,
      //   "Linked index of: ",
      //   link.indexOf("http://designsagency.com")
      // );
      barba.go(link);
    } else {
      console.log("External URL: ", jQuery(this).attr("target"));
    }
  });
  
  /////////////////////////////////////// ANIMATIONS ///////////////////////////////////////////////
  const intro1 = () => {
    console.log("Playing Intro1 ...");
  
    const tl = gsap.timeline();
    tl.to("#mainIntro", { duration: 0, opacity: 1, display: "flex" })
      .from("#mainIntro ._loadingAnim", {
        duration: 1,
        opacity: 0,
        display: "block",
      })
      .from(
        "#mainIntro ._loadingAnim ._progress ._null1 div",
        { y: 30, duration: 1, opacity: 0, stagger: 0.14, ease: Power4.inOut },
        "-=0.5"
      );
  
    // set introPlayedTime
    // localStorage.setItem('introPlayedTime', now.toString());
  
    console.log("Setting introPlayedTime ...", now);
    localStorage.setItem("introPlayedTime", now);
    playIntro = false;
  
    console.log("Playing Intro1 ... Done!");
  };
  const intro2 = () => {
    // const tl = gsap.timeline();
    // tl.fromTo(
    //   "#homeIntro",
    //   { duration: 0, display: "table", opacity: 1 },
    //   { duration: 0, display: "table", opacity: 1 }
    // );
  };
  const pgTransLeave = () => {
    console.log("Playing page transition leave ...");
    // gsap.to('#mainTransition', {
    //                 duration: 0.6,
    //                 display: 'table',
    //                 clipPath:"polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%)",
    //                 // clearProps: 'all',
    //                 onComplete: () => {
    //                     console.log('Transition Started!');
    //                 }
    //             });
  
    const tl = gsap.timeline();
    tl.to("#pageTransition1 li", {
      duration: 0.5,
      scaleX: 1,
      transformOrigin: "bottom right",
      stagger: 0.1,
    }).to(
      // #mainSideBar
      "#mainSideBar",
      {
        duration: 1.4,
        x: 200,
        ease: Expo.easeInOut,
      },
      "-=2.0"
    );
  };
  const pgTransEnter = () => {
    console.log("Playing page transition enter ...");
  
    const tl = gsap.timeline();
    tl.fromTo(
      "#pageTransition1 li",
      {
        scaleX: 1,
      },
      {
        duration: 0.3,
        scaleX: 0,
        transformOrigin: "bottom right",
        stagger: 0.1,
        delay: 0.5,
      }
    )
      .fromTo(
        "#mainContent1",
        { opacity: 0, display: "none", y: 100 },
        {
          duration: 2,
          opacity: 1,
          display: "table",
          y: 0,
          ease: Expo.easeOut,
        },
        "-=2.2"
      )
      .to(
        // #mainSideBar
        "#mainSideBar",
        {
          duration: 2.2,
          x: 0,
          ease: Expo.easeOut,
        },
        "-=0.8"
      );
  
    // gsap.to('#mainTransition', {
    //                 duration: 0.8,
    //                 delay: 0.5,
    //                 clipPath:"polygon(0% 0%, 0% 0%, 0% 100%, 0% 100%)",
    //                 onComplete: () => {
    //                     console.log('Transition Ended!');
    //                 }
    //             });
  };
  
  // Content Animations
  const homeContentAnim = () => {
    // const tl = gsap.timeline();
    // tl.from('#bgMain ._scrn1 div', { duration: 1.5, y: 200, opacity: 0, display:"none", stagger: 0.1 });
    // console.log('Playing home content animation enter ...');
  };
  /////////////////////////////////////// ANIMATIONS END ///////////////////////////////////////////////
  
  jQuery(document).ready(() => {
    // Function to scroll up or down incrementally
    const scrollDur = 1.2;
    const scrollAmt = 600;
    let scrollPos = 0;
    // up
    jQuery("#mainSideBar ._up").click(function (event) {
      scrollPos -= scrollAmt;
      scrollPos = scrollPos <= 0 ? 0 : scrollPos;
  
      // jQuery('html, body').animate({scrollTop: `-=${scrollAmt}px`}, scrollDur, 'easeInOutExpo');
      gsap.to(window, {
        duration: scrollDur,
        scrollTo: scrollPos,
        ease: Expo.easeInOut,
      });
    });
    // down
    jQuery("#mainSideBar ._down").click(function (event) {
      scrollPos += scrollAmt;
      scrollPos =
        scrollPos >= window.innerHeight ? window.innerHeight : scrollPos;
      // jQuery('html, body').animate({scrollTop: `+=${scrollAmt}px`}, scrollDur, 'easeInOutExpo');
      gsap.to(window, {
        duration: scrollDur,
        scrollTo: scrollPos,
        ease: Expo.easeInOut,
      });
    });
  
    // console.log('Yep jquery runs too...');
    //   setBodySize();
  
    // if playIntro is true then show playIntro screen
    if (playIntro) {
      jQuery("#mainIntro").show();
  
      ////////////////////// PROGRESS BAR ////////////////////
      const progValEl = jQuery(
        "#mainIntro ._loadingAnim ._progress ._null1 ._percentVal1"
      );
      const progBarEl = jQuery(
        "#mainIntro ._loadingAnim ._progress ._null1 ._progressBar1 span"
      );
      // const progIncrArr = [0, 1, 5, 4, 9, 10, 0, 0, 5, 0, 3, 6, 2];
      const progIncrArr = [0, 13, 15, 4, 9, 10, 0, 0, 15, 0, 13, 6, 12];
      const progIncrArrLen = progIncrArr.length;
      // console.log('Random ind1: ', Math.random() * progIncrArrLen);
      // console.log('Random Ind2: ', Math.floor(Math.random() * progIncrArrLen));
      let progInterval1;
      let progRndInd = 0;
      let progVal = 0;
      let progStr = "";
  
      runProgress1();
  
      function updateProgress() {
        progStr = progVal + "%";
        progValEl.text(progStr);
        progBarEl.css({ width: progStr });
        // console.log('progress: ', progStr);
      }
  
      function runProgress1() {
        updateProgress();
        progInterval1 = setInterval(() => {
          progRndInd = Math.floor(Math.random() * progIncrArrLen);
          // console.log('progRndInd: ', progRndInd);
          progVal = progVal < 100 ? progVal + progIncrArr[progRndInd] : 100;
          // console.log('progRndInd: ', progRndInd);
  
          // check if progress is done
          if (progVal === 100) playIntroLogoAnim();
  
          if (progVal <= 100) updateProgress();
        }, 100);
      }
  
      // function to play intrologoAnim
      function playIntroLogoAnim() {
        clearInterval(progInterval1);
  
        const tl = gsap.timeline();
  
        tl.to(
          "#mainIntro ._loadingAnim ._progress ._null1 div",
          {
            duration: 0.2,
            opacity: 0,
            stagger: 0.16,
            display: "none",
            ease: Power4.inOut,
          },
          0.1
        )
          .to(
            "#mainIntro ._loadingAnim ._lawFirm1",
            {
              duration: 0.3,
              opacity: 0,
              stagger: 0.16,
              display: "none",
              ease: Power4.inOut,
            },
            "-=0.1"
          )
          .to(
            "#mainIntro ._loadingAnim",
            { duration: 0.3, opacity: 0, display: "none", ease: Power4.inOut },
            "-=0.1"
          )
          .to(
            "#mainIntro ._introAnim",
            { duration: 0.5, opacity: 1, display: "flex", ease: Power4.inOut },
            "+=0.1"
          )
          .to(
            "#mainIntro ._introAnim ._scrn1 svg",
            { duration: 4, strokeDashoffset: -3165, ease: Expo.easeInOut },
            -0.2
          )
          .to(
            "#mainIntro ._introAnim ._scrn1 svg",
            { duration: 1, fill: "#fff", strokeOpacity: 0, ease: Expo.easeInOut },
            "-=2.5"
          )
          .to(
            "#mainIntro ._introAnim ._scrn1",
            {
              duration: 1,
              scale: 0.17,
              x: -50,
              opacity: 0,
              ease: Expo.easeInOut,
            },
            "-=1.5"
          )
          .to(
            "#mainIntro ._introAnim ._scrn2",
            {
              duration: 1,
              scale: 1,
              opacity: 1,
              display: "flex",
              ease: Expo.easeOut,
            },
            "-=0.8"
          )
          .to(
            "#mainIntro",
            {
              duration: 2,
              clipPath: "polygon(0% 0%, 100% 0%, 100% 0%, 0% 0%)",
              ease: Expo.easeInOut,
            },
            "+=1"
          )
          .fromTo(
            "#mainContent1",
            { opacity: 0, display: "none", y: 100 },
            {
              duration: 2,
              opacity: 1,
              display: "table",
              y: 0,
              ease: Expo.easeOut,
            },
            "-=1.2"
          )
          .to(
            // #mainSideBar
            "#mainSideBar",
            {
              duration: 2.2,
              x: 0,
              ease: Expo.easeOut,
            },
            "-=1.8"
          );
        // .to('#mainIntro ._introAnim ._scrn2', { duration: 1, scale: 1, opacity: 1, display: "flex", ease: Expo.easeOut },"-=1.35");
        // .to('#mainIntro ._introAnim1', { duration: 0.5, opacity: 1, display: "block", ease: Power4.inOut },"-=0.2");
      }
  
      ////////////////////// PROGRESS BAR END ////////////////////
    }
  
    // This function helps add and remove js and css files during a page transition
  
    barba.hooks.beforeEnter(({ current, next }) => {
      initPlayIntro();
      console.log("Running...1");
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
  
    // console.log('Yep jquery runs too...');
  
    barba.init({
      transitions: [
        {
          sync: false,
          name: "opacity-transition",
          async beforeEnter(data) {
            // console.log("Before Enter: ", data.current);
            jquery("#pageTransition1").show();
          },
          async once({ next }) {
            animEnter(next.container);
          },
          async enter({ next }) {
            // jquery("#mainContent1").css({ display: "none" });
            animEnter(next.container);
          },
          async beforeLeave(data) {},
          async leave({ current, next, trigger }) {
            const done = this.async();
            animLeave(current.container, done);
            console.log("Leaving...1");
          },
          async after(data) {
            jquery("#pageTransition1").show();
            console.log("After...1");
            let parser = new DOMParser();
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
          namespace: "aboutabout-mervin-messias",
          beforeEnter() {},
          afterEnter() {},
        },
        {
          namespace: "services",
          beforeEnter() {},
          afterEnter() {},
        },
        {
          namespace: "news-feed",
          beforeEnter() {},
          afterEnter() {},
        },
        {
          namespace: "contact-us",
          beforeEnter() {},
          afterEnter() {},
        },
        {
          namespace: "level-5",
          beforeEnter() {},
          afterEnter() {},
        },
        {
          namespace: "level-4",
          beforeEnter() {},
          afterEnter() {},
        },
        {
          namespace: "level-3",
          beforeEnter() {},
          afterEnter() {},
        },
        {
          namespace: "level-2",
          beforeEnter() {},
          afterEnter() {},
        },
        {
          namespace: "level-1",
          beforeEnter() {},
          afterEnter() {},
        },
      ],
    });
  
    const animEnter = (container) => {
      if (playIntro) {
        intro1();
      } else {
        // intro2();
        pgTransEnter();
      }
  
      return new Promise((resolve, reject) => {
        gsap.fromTo(
          ".maincontent",
          {
            opacity: 0,
            // y: 100,
          },
          {
            duration: 1,
            opacity: 1,
            // y: 100,
            // delay: 2,
            transformOrigin: "top center",
            clearProps: "all",
            onComplete: () => {
              console.log("Enter completed!");
              resolve();
            },
          }
          // "+=1.2"
        );
      });
    };
  
    const animLeave = (container, done) => {
      pgTransLeave();
      return new Promise((resolve, reject) => {
        gsap.to(".maincontent", {
          duration: 0.6,
          opacity: 0,
          // y: -100,
          delay: 2.0,
          overwrite: true,
          transformOrigin: "top center",
          onComplete: () => {
            console.log("Leave completed!");
            done();
            resolve();
          },
        });
      });
    };
  
    // init mcscrollers
    //   jQuery(".mcscroll1").mCustomScrollbar();
    //   const mainScroller = jQuery("#bodyContent").mCustomScrollbar({
    //     axis: "y",
    //     // theme: "inset",
    //     // theme: "inset-3-dark",
    //     // autoHideScrollbar: true,
    //     theme: "inset-2-dark",
    //     // theme: "minimal",
    //     scrollInertia: 800,
    //     callbacks: {
    //       onInit: () => {},
    //       whileScrolling: () => {
    //         ScrollTrigger.update;
    //       },
    //       onScroll: () => { },
    //       onUpdate: () => {}
    //     }
    //   });
  
    //   console.log('Body Element: ', jQuery('#bodyContent'));
  
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
  
    //////////////////////////////////////////////////////////////////////////////////////
    // console.log("Locomotive Scroll: ", LocomotiveScroll);
    // use locomotivescroll instead for smooth scroll
  
    //   const locoScroll = new LocomotiveScroll({
    //     el: document.querySelector("#bodyContent"),
    //     smooth: true
    //   });
  
    //   locoScroll.on("scroll", ScrollTrigger.update);
    //   locoScroll.on("scroll", (e) => {
    //       console.log('Loco Scroll: ', e);
    //   });
  
    //   console.log('LogoScroll: ', locoScroll);
  
    /// scroll to element on click hero1 margin-left: 0%;
    //   var offset1 = -50;
    //   jQuery(document).on('click mouseover', "#maincontent .hero1", () => {
    //   //   jQuery("body").animate({
    //   //     scrollTop: jQuery("#scene1").offset().top + offset1
    //     // }, 2000);
    //     locoScroll.scrollTo(140, 0, 0)
    //   })
  
    // each time Locomotive Scroll updates, tell ScrollTrigger to update too (sync positioning)
    // locoScroll.on("scroll", ScrollTrigger.update);
  
    setTimeout(() => {
      // // tell ScrollTrigger to use these proxy methods for the ".smooth-scroll" element since Locomotive Scroll is hijacking things
      // ScrollTrigger.scrollerProxy("#bodyContent", {
      //   scrollTop(value) {
      //     return arguments.length ? locoScroll.scrollTo(value, 0, 0) : locoScroll.scroll.instance.scroll.y;
      //   }, // we don't have to define a scrollLeft because we're only scrolling vertically.
      //   getBoundingClientRect() {
      //     return {top: 0, left: 0, width: window.innerWidth, height: window.innerHeight};
      //   },
      //   // LocomotiveScroll handles things completely differently on mobile devices - it doesn't even transform the container at all! So to get the correct behavior and avoid jitters, we should pin things with position: fixed on mobile. We sense it by checking to see if there's a transform applied to the container (the LocomotiveScroll-controlled element).
      //   pinType: document.querySelector("#bodyContent").style.transform ? "transform" : "fixed"
      // });
      // // each time the window updates, we should refresh ScrollTrigger and then update LocomotiveScroll.
      // ScrollTrigger.addEventListener("refresh", () => {
      //     jQuery("#bodyContent").mCustomScrollbar("update");
      //     // locoScroll.update();
      // });
      // // after everything is set up, refresh() ScrollTrigger and update LocomotiveScroll because padding may have been added for pinning, etc.
      // ScrollTrigger.refresh();
    });
  });
  