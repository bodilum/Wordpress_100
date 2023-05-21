<?php 
// Register and load the widget
function rsframework_contact_off_widget() {
    register_widget( 'contact_off_widget' );
}
add_action( 'widgets_init', 'rsframework_contact_off_widget' );

//Contact info Widget 
class contact_off_widget extends WP_Widget {
 
   /** constructor */
   function __construct() {
    parent::__construct(
      'contact_off_widget', 
      __('RS Contact Info (Offcanvas)', 'rsframework'),
      array( 'description' => __( 'Display your contact info!', 'rsframework' ), )
    );
  }
 
    /** @see WP_Widget::widget */
    function widget($args, $instance) { 
        extract( $args );
        $image_src = '';
        $title    = apply_filters('widget_title', $instance['title']);  
        $intros  =  $instance['intros'];     
        $address22  = isset($instance['address22']) ? $instance['address22'] : '' ;       
        $email  =  $instance['email'];
        $email2  =  $instance['email2'];
        $phone   = $instance['phone'];
        $phone2   = $instance['phone2'];     
        echo wp_kses_post($before_widget); 
        if ( $title )
        echo wp_kses_post($before_title . $title . $after_title); 
    ?>
  <ul class="fa-ul">
    <?php           

        if (!empty($email)){
            echo '<li class="email_li"><i class="fi fi-rr-envelope-plus" ></i>
                <span>
                    <em>'. nl2br($email) .'</em>
                <a href="mailto:'.esc_attr($email2).'">'.esc_html($email2).'</a>
                </span>
            </li>';
        }

        
        if (!empty($phone)){
            echo '<li class="phone_li">
            <i class="fi fi-rr-phone-call"></i>
                <span>
                    <em>'. nl2br($phone) .'</em>
                    <a href="tel:'. esc_attr(str_replace(" ","", ($phone2))) .'">'. esc_html($phone2) .'</a>
                </span>
            </li>';
        }

        
        

        if (!empty($address22)){
            echo '<li class="address1"><i class="fi fi-rr-map-marker-home"></i>
            <span>
                <em>'. nl2br($intros) .'</em>
                '. nl2br($address22) .'
            </span>
            </li>';
        }

        
    ?>

  </ul>

    <?php echo wp_kses_post($after_widget); ?>
     <?php
    }
 
  /** @see WP_Widget::update  */
  function update($new_instance, $old_instance) {   
      $instance            = $old_instance;
      $instance['title']   = strip_tags($new_instance['title']);
      $instance['intros']   = strip_tags($new_instance['intros']);
      $instance['address22'] = wp_kses_post($new_instance['address22']);  
      $instance['email']   = strip_tags($new_instance['email']);
      $instance['email2']   = strip_tags($new_instance['email2']);
      $instance['phone']   = strip_tags($new_instance['phone']);
      $instance['phone2']   = strip_tags($new_instance['phone2']);
     
      $instance['url']     = strip_tags($new_instance['url']);      
      return $instance;
    }
 
    /** @see WP_Widget::form */
    function form($instance) {  

       $title   = (isset($instance['title']))? $instance['title'] : '';    
       $intros   = (isset($instance['intros']))? $instance['intros'] : '';    
       $address22 = (isset($instance['address22']))? $instance['address22'] :''; 
       $email   = (isset($instance['email']))? $instance['email'] : '';
       $email2   = (isset($instance['email2']))? $instance['email2'] : '';
       $phone   = (isset($instance['phone']))? $instance['phone'] : '';
       $phone2   = (isset($instance['phone2']))? $instance['phone2'] : '';      

     ?>      
        <p>
          <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'rsframework'); ?></label> 
          <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_js( $title); ?>" />
        </p> 


        <p>
          <label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php esc_html_e('Email Pre Text', 'rsframework'); ?></label> 
          <input class="widefat" id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" type="text" value="<?php echo esc_js($email); ?>" />
        </p> 
        <p>
          <label for="<?php echo esc_attr($this->get_field_id('email2')); ?>"><?php esc_html_e('Email:', 'rsframework'); ?></label> 
          <input class="widefat" id="<?php echo esc_attr($this->get_field_id('email2')); ?>" name="<?php echo esc_attr($this->get_field_name('email2')); ?>" type="text" value="<?php echo esc_js($email2); ?>" />
        </p> 

        <p>
          <label for="<?php echo esc_attr($this->get_field_id('phone')); ?>"><?php esc_html_e('Phone Pre Text', 'rsframework'); ?></label> 
          <input class="widefat" id="<?php echo esc_attr($this->get_field_id('phone')); ?>" name="<?php echo esc_attr($this->get_field_name('phone')); ?>" type="text" value="<?php echo esc_js($phone); ?>" />
        </p>
        <p>
        <label for="<?php echo esc_attr($this->get_field_id('phone2')); ?>">
            <?php esc_html_e('Phone:', 'rsframework'); ?>
        </label> 
          <input class="widefat" id="<?php echo esc_attr($this->get_field_id('phone2')); ?>" name="<?php echo esc_attr($this->get_field_name('phone2')); ?>" type="text" value="<?php echo esc_js($phone2); ?>" />
        </p>

        <p>
          <label for="<?php echo esc_attr($this->get_field_id('intros')); ?>"><?php esc_html_e('Address Pre Text', 'rsframework'); ?></label> 
          <input class="widefat" id="<?php echo esc_attr($this->get_field_id('intros')); ?>" name="<?php echo esc_attr($this->get_field_name('intros')); ?>" type="text" value="<?php echo esc_js( $intros); ?>" />
        </p> 
        
        <p>
          <label for="<?php echo esc_attr($this->get_field_id('address22')); ?>"><?php esc_html_e('Address:', 'rsframework'); ?></label>
          <input class="widefat" id="<?php echo esc_attr($this->get_field_id('address22')); ?>" name="<?php echo esc_attr($this->get_field_name('address22')); ?>" type="text" value="<?php echo wp_kses_post($address22); ?>" />
        </p>
       
        <?php 
    }
} // end class
