// console.log("Main Custom JS Loaded!");

gsap.registerPlugin(ScrollTrigger);

// console.log("PLUGINS: ", barba, gsap, jQuery);




jQuery(document).ready(($) => {
  // console.log('Jquery is ready: ', $);

const scriptRegex = /<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/gi;

////////////////// BARBA JS //////////////////////////////////

 // This function helps add and remove js and css files during a page transition

 barba.hooks.beforeEnter(({ current, next }) => {


  let nextHtml = next.html;
  let parser = new DOMParser();
  let htmlDoc = parser.parseFromString(nextHtml.replace(/(<\/?)body( .+?)?>/gi, '$1notbody$2>', nextHtml), 'text/html');

  let new_imports = [];
  let allScripts = [];
  let inlineScripts = '';
  
  let script_tags = $(htmlDoc).find('script');
  let style_tags = $(htmlDoc).find('style');
  let link_tags = $(htmlDoc).find('link');

  // nextHtml.replace(scriptRegex, '');

  // console.log('Script Tags: ', current.namespace, next.namespace, style_tags, link_tags);

  // $(script_tags).each((i, s) => {
  //   let src = $(s).attr('src');
    
  //   if(src) {
  //     allScripts.push(src);
  //   } else {
  //     inlineScripts += script_tags[i].innerHTML;
  //   }
  // });

  // $.getMultiScripts(allScripts).done(function() {
  //   Function(inlineScripts)();
  //   console.log("Sripts reloaded!");
  // }).fail(function(error) {
  //     // one or more scripts failed to load
  //     console.log('Error loading js scripts...');
  // }).always(function() {
  //     // always called, both on success and error
  //     console.log('Loading js scripts within transition...');
  // });

  let bodyClasses = htmlDoc.querySelector('notbody').getAttribute('class');
  body.setAttribute('class', bodyClasses);
  scripts.init();

});

// const body = document.getElementsByTagName('body')[0];
const body = document.querySelector('body');

/// manage dependency scripts
const scripts = {
  init: function () {
    if ($('body').hasClass('home')) {
    this.homepage();
} else if ($('body').hasClass('single-post')) {
    this.single_post();
}
  },
  homepage: function () {
      // homepage scripts
      console.log('firing home page scripts...');
      // const homepageCSS = "custom-homepage.css";
      // loadjscssfile(homepageCSS, "css");
  },
  single_post: function () {
      // single post script
      console.log('firing single page scripts...');
      // const blogCSS = "blog.css";
      // loadjscssfile(blogCSS, "css");
  }
};


///////////////// LET'S TAKE CARE OF SCRIPTS /////////
let initialized_scripts = [];
let initialized_css = [];
let all_script_tags = document.getElementsByTagName("script");
$(all_script_tags).each(function(i, l) {
    let src = $(l).attr('src');
    if (src) {
        initialized_scripts.push(src);
    }
});

let all_link_tags = document.getElementsByTagName("link");
$(all_link_tags).each(function(i, s) {
    let href = $(s).attr('href');
    if (href) {
        initialized_css.push(href);
    }
});

// console.log("Initialized Scripts: ", initialized_scripts, initialized_scripts.length);
// console.log("Initialized Css Styles: ", initialized_css);


// get all scripts
$.getMultiScripts = function(arr) {
  var _arr = $.map(arr, function(src) {
      return $.getScript(src);
  });
  _arr.push($.Deferred(function( deferred ){
      $( deferred.resolve );
  }));
  return $.when.apply($, _arr);
}


// This function helps add and remove js and css files during a page transition
async function loadjscssfile(src, id, sect = '') {
  const filetype = src.split('.').pop();

  let fileref = sect == 'head' ? document.getElementsByTagName("head")[0] : document.getElementsByTagName("body")[0];

 

  if (filetype == "js") {
    //if src is a external JavaScript file
    const existingScript = document.querySelector(`script[src="${src}"]`);
    if (existingScript) {
      console.log('Existing script...');
      existingScript.remove();
    }

    fileref = document.createElement("script");
    fileref.setAttribute("type", "text/javascript");
    fileref.setAttribute("src", src);   

  } else if (filetype == "css") {
    //if src is an external CSS file
    const existingCSS = document.querySelector(`link[href='${src}']`);
    if (existingCSS) {
      existingCSS.remove();
    }
    fileref = document.createElement("link");
    fileref.setAttribute("rel", "stylesheet");
    fileref.setAttribute("type", "text/css");
    fileref.setAttribute("href", src);
  }

  if(id) fileref.setAttribute("id", id);
  if (typeof fileref != "undefined")
    document.getElementsByTagName("head")[0].appendChild(fileref);
}

// barba init
barba.init({
  debug: true,
  timeout: 15000,
  transitions: [{
    sync: false,
    name: 'transition-1',
    async beforeEnter(data) {
      console.log("Before Enter: ");
    },
    async once({ next }) {
      console.log("Once: ");
      // return animEnter(next.container);
    },
    async enter({ next }) {
      console.log("Enter: ");
      // return animEnter(next.container);

      return gsap.from(next.container, {
        opacity: 0
      });
    },
    async beforeLeave(data) {
      console.log("Before Leave: ");
    },
    async leave({ current, next, trigger }) {
      console.log("Leaving... ");

      // current.container.style.position = absolute;
      // current.container.style.top = 0;
      // current.container.style.left = 0;
      // current.container.style.width = '100%';

      // const done = this.async();
      // setTimeout(() => {
      //   done();
      // }, 600);

      return gsap.to(current.container, {
        opacity: 0
      });

    },
    async after(data) {
      console.log("After... ");

      // console.log("Initialized Scripts in transitions: ", initialized_scripts);

      // let nextHtml = data.next.html;
      // let parser = new DOMParser();
      // let htmlDoc = parser.parseFromString(nextHtml.replace(/(<\/?)body( .+?)?>/gi, '$1notbody$2>', nextHtml), 'text/html');

      // console.log('HtmlDoc: ', htmlDoc);

      // console.log('Data: ', data);




      let new_imports = [];
      let allScripts = [];
      let inlineScripts = '';
      // let script_tags = $(htmlDoc).find('script');




      // let head_tag = $(htmlDoc).find('head');

      // let head_scripts = head_tag.find('script');
      // // let head_scripts_ = { ...head_scripts };

      // let head_links = head_tag.find('link');
      // // let head_links_ = { ...head_links };

      // let body_tag = $(htmlDoc).find('body');
      // let body_scripts = body_tag.find('script');
      // let body_links = body_tag.find('link');

      // console.log('Script Tags: ', script_tags);
      // console.log('Head Scripts: ', head_scripts, ' Head Links: ', head_links);
      // console.log('Body Scripts: ', body_scripts, ' Body Links: ', body_links);

      // console.log('Body Tags: ', body_tag);

      // $(head_scripts).each(async function(i, s) {
      //     let src = $(s).attr('src');
      //     let id = $(s).attr('id');

          
      //     if (src) {
      //       // let script = document.createElement('script');
      //       let script = document.createElement('script');
      //       // console.log('src: ', src);
      //       script.src = src;
      //       if(id) script.id = id;

      //       delete head_scripts.find(`script[src="${src}"]`);

      //       data.next.container.appendChild(script);
      //       // console.log('Typeof: ', typeof(head_scripts));

      //         // if not already initialized add it
      //         // if (initialized_scripts.indexOf(src) == -1) {
      //         //     new_imports.push(src);
      //         // } else {
      //         // }
      //         // // reload script
      //         // await loadjscssfile(src, 'js');                

      //     } else {
      //         // it is an inline script, will evaluate it
      //         inlineScripts += head_scripts[i].innerHTML;
      //     }
      // });

      // console.log('New scripts: ', new_imports, ' Inline scripts: ', inlineScripts);


      // $(script_tags).each((i, s) => {
      //   let src = $(s).attr('src');
      //   if(src) {
      //     allScripts.push(src);
      //   } else {
      //     // inlineScripts += script_tags[i].innerHTML;
      //   }
      // });

      // $.getMultiScripts(src).done(function() {
      //   Function(inlineScripts)();
      //   console.log("Sripts reloaded!");
      // }).fail(function(error) {
      //     // one or more scripts failed to load
      //     console.log('Error loading js scripts...');
      // }).always(function() {
      //     // always called, both on success and error
      //     console.log('Loading js scripts within transition...');
      // });



      // let bodyClasses = htmlDoc.querySelector('notbody').getAttribute('class');
      // body.setAttribute('class', bodyClasses);
      // scripts.init();

        // only run during a page transition - not initial load
        // document.getElementsByTagName("body")[0].setAttribute('class', bodyClasses);


      // let response = nextHtml.replace(
      //   /(<\/?)body( .+?)?>/gi,
      //   "$1notbody$2>",
      //   nextHtml
      // );
      // let bodyClasses = $(response).filter("notbody").attr("class");
      // $("body").attr("class", bodyClasses);

    }
  }]
});


const animEnter = (container) => {
  return new Promise((resolve, reject) => {
  console.log("Anim Enter...");
  });
};

const animLeave = (container, done) => {
  return new Promise((resolve, reject) => {
  console.log("Anim Leave...");
    done();
    resolve();
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






////////////////// BARBA JS ENDS //////////////////////////////////

});