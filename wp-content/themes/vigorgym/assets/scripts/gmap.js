console.log("Google Map Location Vars: ", locations);

let vigorGmap;
// let locations = [
//     {
//         title: "Vigor XF in Financial District",
//         desc: "Join The Movement Strength, vigor and discipline. All in one spot. Become a part of movement.",
//         addressCode: { lat: 37.7940667, lng: -122.4023762 },
//         times: ["05:30 - 20:00", "05:30 - 18:00", "07:00 - 14:30", "10:00-13:00"]
//     },
//     {
//         title: "Vigor XF in Lower Haight",
//         desc: "Join The Movement Strength, vigor and discipline. All in one spot. Become a part of movement.",
//         addressCode: { lat: 37.7713167, lng: -122.4308762 },
//         times: ["05:30 - 20:00", "05:30 - 18:00", "07:00 - 14:30", "10:00-13:00"]
//     },
//     {
//         title: "Vigor XF in Outer Richmond",
//         desc: "Join The Movement Strength, vigor and discipline. All in one spot. Become a part of movement.",
//         addressCode: { lat: 37.7758589, lng: -122.4966352 },
//         times: ["05:30 - 20:00", "05:30 - 18:00", "07:00 - 14:30", "10:00-13:00"]
//     }
// ];

function initGmap() {

    let pos1 = { lat: parseFloat( locations[0].addressCode.lat ), lng: parseFloat( locations[0].addressCode.lng ) };
    let pos2 = { lat: parseFloat( locations[1].addressCode.lat ), lng: parseFloat( locations[1].addressCode.lng ) };
    let pos3 = { lat: parseFloat( locations[2].addressCode.lat ), lng: parseFloat( locations[2].addressCode.lng ) };

    vigorGmap = new google.maps.Map( document.querySelector('.vigorGmap'), {
        center: { ...pos2 },
        zoom: 14
    });

    let locDateTitles = ['Mon - Thu', 'fri', 'sat', 'sun'];

    let marker1 = new google.maps.Marker({
        position: { ...pos1 },
        map: vigorGmap,
        title: locations[0].title,
        icon: 'http://localhost/vigor/wp-content/uploads/2023/03/Pin.png',
        animation: google.maps.Animation.DROP
    });
    let marker2 = new google.maps.Marker({
        position: { ...pos2 },
        map: vigorGmap,
        title: locations[1].title,
        icon: 'http://localhost/vigor/wp-content/uploads/2023/03/Pin.png',
        animation: google.maps.Animation.DROP
    });
    let marker3 = new google.maps.Marker({
        position: { ...pos3 },
        map: vigorGmap,
        title: locations[2].title,
        icon: 'http://localhost/vigor/wp-content/uploads/2023/03/Pin.png',
        animation: google.maps.Animation.DROP
    });


    const contentString1DateNTimes = locations[0].times.map( (v, i) => `<div class="_date">${ locDateTitles[i] }</div><div class="_time">${ v }</div>`);
  const contentString1 = `
  <div class="infoWindowBx">
    <div class="header"><h2>${ locations[0].title }</h2></div>
    <div class="desc">${ locations[0].desc }</div>
    <div class="dateNtimes">
        ${ contentString1DateNTimes.join( '' ) }
    </div>
   ${ generateGalThumbs( 0 ) }    
  </div>
  `;

  const contentString2DateNTimes = locations[1].times.map( (v, i) => `<div class="_date">${ locDateTitles[i] }</div><div class="_time">${ v }</div>`);
  const contentString2 = `
  <div class="infoWindowBx">
    <div class="header"><h2>${ locations[1].title }</h2></div>
    <div class="desc">${ locations[1].desc }</div>
    <div class="dateNtimes">
        ${ contentString2DateNTimes.join( '' ) }
    </div>
   ${ generateGalThumbs( 1 ) }   
  </div>
  `;

  const contentString3DateNTimes = locations[2].times.map( (v, i) => `<div class="_date">${ locDateTitles[i] }</div><div class="_time">${ v }</div>`);
  const contentString3 = `
  <div class="infoWindowBx">
    <div class="header"><h2>${ locations[2].title }</h2></div>
    <div class="desc">${ locations[2].desc }</div>
    <div class="dateNtimes">
        ${ contentString3DateNTimes.join( '' ) }
    </div>
   ${ generateGalThumbs( 2 ) }
  </div>
  `;




  const infowindow1 = new google.maps.InfoWindow({
    content: contentString1,
    ariaLabel: locations[0].title,
  });
  const infowindow2 = new google.maps.InfoWindow({
    content: contentString2,
    ariaLabel: locations[1].title,
  });
  const infowindow3 = new google.maps.InfoWindow({
    content: contentString3,
    ariaLabel: locations[2].title,
  });

  marker1.addListener("click", () => {
    marker1.setIcon('http://localhost/vigor/wp-content/uploads/2023/03/Selected.png');
    infowindow1.open({
        anchor: marker1,
        map: vigorGmap,
    });
  });
  marker2.addListener("click", () => {
    marker2.setIcon('http://localhost/vigor/wp-content/uploads/2023/03/Selected.png');
    infowindow2.open({
        anchor: marker2,
        map: vigorGmap,
    });
  });
  marker3.addListener("click", () => {
    marker3.setIcon('http://localhost/vigor/wp-content/uploads/2023/03/Selected.png');
    infowindow3.open({
        anchor: marker3,
        map: vigorGmap,
    });
  });


  google.maps.event.addListener(infowindow1,'closeclick',function(){
    // currentMark.setMap(null); //removes the marker
    // then, remove the infowindows name from the array
    marker1.setIcon('http://localhost/vigor/wp-content/uploads/2023/03/Pin.png');
 });
  google.maps.event.addListener(infowindow2,'closeclick',function(){
    marker2.setIcon('http://localhost/vigor/wp-content/uploads/2023/03/Pin.png');
 });
  google.maps.event.addListener(infowindow3,'closeclick',function(){
    marker3.setIcon('http://localhost/vigor/wp-content/uploads/2023/03/Pin.png');
 });



 // function to dynamically generate gallery thumbnails
 function generateGalThumbs( galID ) {

    let numOfPhotos = locations[galID].thumbs.length;
    let numOfHiddenPhotos = Math.abs( numOfPhotos - 4 );
    let hiddenPhotoOverlayHtml = (numOfHiddenPhotos > 0) ? `<div class="overlayTxt"><span>${ numOfHiddenPhotos } more</span></div>` : '';

    let thumbGal = `
    <div class="gMapThumbNailGal">

        <div class="galImg" galID="${ galID }" imgID="0"><img loading="lazy" src="${ locations[galID].thumbs[0] }" /></div>
        <div class="galImg" galID="${ galID }" imgID="1"><img loading="lazy" src="${ locations[galID].thumbs[1] }" /></div>
        <div class="galImg" galID="${ galID }" imgID="2"><img loading="lazy" src="${ locations[galID].thumbs[2] }" /></div>
        <div class="galImg" galID="${ galID }" imgID="3">
            ${ hiddenPhotoOverlayHtml }
            <img loading="lazy" src="${ locations[galID].thumbs[3] }" />
        </div>

    </div>
    `;

    return thumbGal;

 }





}




///////////////// DOCUMENT READY /////////////////////////////// 

  jQuery(document).ready(function($) {

    let galElm = $('#gMapPhotoGallery');
    
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
          
        
          }
    let gallerySwiper = null;

    // capture click events for photogallery thumbnails
    $(document).on('click', '.vigorGmap .infoWindowBx .gMapThumbNailGal .galImg', function(e) {        

        // get gal id and img id
        let gal_id = parseInt($(this).attr('galID'));
        let img_id = parseInt($(this).attr('imgID'));

        // set gallery title & description
        let gal_title = locations[gal_id].title;
        let gal_desc = locations[gal_id].desc;

        // compose photo slides
        let photoSlides = locations[gal_id].photos.map((v) => `<div class="swiper-slide"><img loading="lazy" src="${v}" /></div>`);
        let photoSlidesHtml = `
            <div class="swiper">

                <div class="swiper-wrapper">
                    ${ photoSlides.join('') }
                </div>
                
                <div class="swiper-pagination"></div>                
                
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>

            </div>        
        `;

        // photo gallery html
        let galHtml = `
        <div class="galTitle">${ gal_title }</div>
        <div class="galDesc">${ gal_desc }</div>
        <div class="galPhotoSlide">${ photoSlidesHtml }</div>
        `;

        // insert photo gallery html
        $("#gMapPhotoGallery .galContent").html(galHtml);
        
        // show photo gallery
        gsap.to( galElm, {
            duration: 1, display: 'table', opacity: 1, onComplete: function () {
                if ( !gallerySwiper ) {
                   //create gallery
                   gallerySwiper = new Swiper('#gMapPhotoGallery .galContent .galPhotoSlide .swiper', swiperOptions);
                } 
            }
        });

    });


    // click on close btn or overlaby body to close gallery
    $(document).on('click', '#gMapPhotoGallery .closeBtn, #gMapPhotoGallery .galOverlay', function() {
        // hide photo gallery
        gsap.to( galElm, {
            duration: 1, display: 'none', opacity: 0, onComplete: function () {
                if ( gallerySwiper ) {
                   // destroy gallery
                   gallerySwiper.destroy(true, true);
                   gallerySwiper = null;
                } 
            }
        });
        
    });

  });

///////////////// DOCUMENT READY ENDS /////////////////////////////// 



window.initGmap = initGmap;