



///////////////// DOCUMENT READY /////////////////////////////// 

jQuery(document).ready(function($) {   

    const { nonce } = add_to_cart_vars;
    const notifDelayClose = 2000;

    // let appNotifEl = document.getElementById('appNotif');

    // console.log('Woocommerce ajax url: ', wc_add_to_cart_params.ajax_url);

    // console.log("Add to cart vars: ", add_to_cart_vars);

// add to cart
$(document).on('click', '.productBtn1', function(e) {    

    let product_id = $(this).attr('product-id');
    let product_title = $(this).attr('product-title');
    let product_price = $(this).attr('product-price');
    let product_el = e.target;

    // console.log('Product to add to cart: ', product_id, product_price, product_title);

    // JSONfy product info
    let product_info = { 
        action: 'add_product_to_cart',
        product_id, 
        product_price, 
        product_title, 
        nonce
        } 

    
    $(this).text( 'Adding Product...' );
    add_product_to_cart( product_info ).then( async( add_to_cart_result ) => {
        // { product_added: true, message: "Product added!" }
        let json_res = JSON.parse(add_to_cart_result.data);

        // product added
        if ( json_res.product_added ) {

            // a class="vigorBtn productBtn1" product-id="106" product-title="Cross Shorts WMNS" product-price="25.95"
            // console.log('This product: ', e.target);

            // product added
            $('.cart-notification').text(json_res.cart_count);
            $('.cart-notification').css({ 'display': 'block' });

            // remove productBtn1 class
            $(this).removeClass('productBtn1');

            // remove attributes
            $(this).removeAttr('product-id').removeAttr('product-title').removeAttr('product-price');

            // change text
            $(this).text( 'go to cart' );

            openNotif( 'Product was added to cart successfully!' );

        } else {
            // product was previously added
            openNotif( 'Product has already been added to cart!' );
        }
        
    });


});


// empty cart
$(document).on('click', '#empty_cart_btn', function() {
    empty_cart().then((res) => {
        if(res.success) {
            closeNotif();
            openNotif( 'The shopping cart has been successfully emptied!' );
            setTimeout(() => {
                // window.location.href = 
                window.location.reload();
            }, 1000);
        }
    });
});


// ajax call to add product to cart  
const add_product_to_cart = ( product_data ) => {
    return new Promise (async (resolve, reject) => {

      let result = {};
      
      await $.ajax({
          url: wc_add_to_cart_params.ajax_url, // domain/wp-admin/admin-ajax.php
          async: true,
          dataType : "json",      
          type: "POST",              
          data: product_data,
          success:function( response ) {
            // success
            if (response.success) {

                // console.log('Response result: ', response);
  
              // console.log('Form successfully submitted! ' );            
              if( response.data && typeof(response.data) === 'object' && response.data !== null && !Array.isArray(response.data)) {
                result = JSON.parse(response.data);
              } else if( response.data && typeof(response.data) === 'string') {
                result = response;
              }
  
            //   console.log( 'Product: ', result ); 
  
            } else {
              // fail
              // console.log('Form submission failed! ', response );
  
              result = { success: false};
              reject(result);
            }
          },
          error: function( error ){
            console.log('SERVER ERROR: ', error );
            result = { success: false, message: 'Server Error'};
            reject(result);
          }
      });
  
  
      resolve(result);

    });
    
    // .done( function( response ) { // response from the PHP action
    //     console.log('Form successfully submitted...! ', response );
    // })
    
    // // something went wrong  
    // .fail( function( error ) {
    //   console.log('SERVER ERROR... : ', error );                 
    // })

    // // after all this time?
    // .always( function() {
    //     event.target.reset();
    // });
  }



  const empty_cart = () => {
    return new Promise (async (resolve, reject) => {
      let result = {};
      await $.ajax({
          url: wc_add_to_cart_params.ajax_url, 
          async: true,
          dataType : "json",      
          type: "POST",              
          data: {
            action: 'empty_cart',
            nonce
          },
          success:function( response ) {
            // success
            if (response.success) {
                result = { success: true };
            } else {
  
              result = { success: false};
              reject(result);
            }
          },
          error: function( error ){
            console.log('SERVER ERROR: ', error );
            result = { success: false, message: 'Server Error'};
            reject(result);
          }
      });
  
  
      resolve(result);

    });
  }



  // close app notif
  $(document).on('click', '.app_notif_close_btn', closeNotif);

  // function to close notif
  function closeNotif(){
    gsap.to('#appNotif', { duration: 1, ease: 'power4.out', opacity: 0, y: 50, display: 'none' });
  }
  
  // function to open notif
  function openNotif( msg = '', delay = 4000 ) {
    if( msg == '' ) return;

    // update content
    $('.app_notif_content').text( msg );

    // show notif
    gsap.to('#appNotif', { duration: 1, ease: 'power4.out', opacity: 1, y: 0, display: 'block', onComplete: function () {
        // delay and close
        setTimeout(() => {
            closeNotif();
        }, delay);
    } });

  }

  



});

///////////////// DOCUMENT READY ENDS /////////////////////////////// 