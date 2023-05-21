<?php
/**
 * @author  rs-theme
 * @since   1.0
 * @version 1.0 
 */
/**
 * Set up the WordPress core custom custom shortcode feature. 
 *
 */

 function addAccountOfficerFormFunc( $atts, $content=null ) {

    $defaultArray = array(
        'name' => 'account_officer'
    );

    $attributes = shortcode_atts( $defaultArray, $atts );

    return "
    <div class='pageForms'>
        <form class='account_officer_form'>
            <div class='form_errors'> Some errors...</div>

            <label for='aof_first_name'>Enter Account Officer's first name</label>
            <input id='aof_first_name' type='text' />
            <br/>

            <label for='aof_last_name'>Enter Account Officer's last name</label>
            <input id='aof_last_name' type='text' />
            <br/>

            <label for='aof_email'>Enter Account Officer's email</label>
            <input id='aof_email' type='email' />
            <br/>

            <label for='aof_phone'>Enter Account Officer's Phone number</label>
            <input id='aof_phone' type='text' />
            <br/>

            <div class='footer_note'>
                Account officer's unique pin and login details will be sent to the email entered in this form.
            </div>
            
            <button type='submit'>Add New Account Officer</button>

        </form>
    </div>    
    ";

 }
 add_shortcode( 'addAccountOfficer', 'addAccountOfficerFormFunc' );



 
 function addCustomerFormFunc( $atts, $content=null ) {

    $defaultArray = array(
        'name' => 'customer'
    );

    $attributes = shortcode_atts( $defaultArray, $atts );

    return "
    <div class='pageForms'>
        <form class='customer_form'>
            <div class='form_errors'> Some errors...</div>

            <label for='customer_first_name'>Enter Customer's first name</label>
            <input id='customer_first_name' type='text' />
            <br/>

            <label for='customer_last_name'>Enter Customer's last name</label>
            <input id='customer_last_name' type='text' />
            <br/>

            <label for='customer_email'>Enter Customer's email Address</label>
            <input id='customer_email' type='email' />
            <br/>

            <label for='customer_contact'>Enter Customer's Contact number</label>
            <input id='customer_contact' type='text' />
            <br/>

            <label for='customer_residential_addr'>Enter Customer's Residential address</label>
            <textarea id='customer_residential_addr' rows='4' cols='50'></textarea>
            <br/>

            <label for='customer_occupation'>Enter Customer's Occupation</label>
            <input id='customer_occupation' type='text' />
            <br/>
            
            <label for='customer_monthly_income'>Enter Customer's Monthly Income</label>
            <input id='customer_monthly_income' type='text' />
            <br/>

            <label for='customer_contribution_amount'>Enter Customer's Contribution Amount</label>
            <input id='customer_contribution_amount' type='text' />
            <br/>

            <fieldset>
            <legend>Select a Customer's Preferred Payment Method</legend>

            <input id='payment_method_radio1' type='radio' name='payment_methods' />
            <label for='payment_method_radio1'>Cash</label><br />
            <input id='payment_method_radio2' type='radio' name='payment_methods' />
            <label for='payment_method_radio2'>Bank Transfer</label><br />
            <input id='payment_method_radio3' type='radio' name='payment_methods' />
            <label for='payment_method_radio3'>Mobile Payment</label><br />

            </fieldset><br /><br />


            <label for='customer_emergency_contact_name'>Enter Customer's Emergency Contact Name</label>
            <input id='customer_emergency_contact_name' type='text' />
            <br/>

            <label for='customer_emergency_contact_number'>Enter Customer's Emergency Contact number</label>
            <input id='customer_emergency_contact_number' type='text' />
            <br/><br/>


            <label for='customer_declaration_agreement'>Declaration</label>
            <div id='customer_declaration_agreement'>By checking this box, I confirm that all the information provided is accurate and true to the best of my knowledge. I understand that providing false information may lead to termination of my membership in the stokvel.</div><br/>

            <input id='customer_declaration_agreement_checkbox' type='checkbox' name='declaration_agreement' />
            <label for='customer_declaration_agreement_checkbox'>I agree</label><br />
            <br/>



            <div class='footer_note'>
                Customer's login details (username & password), including their unique auto-generated qrcode image, chosen payment method & contribution details will be sent to the email entered in this form.
            </div>
            
            <button type='submit'>Add New Customer</button>

        </form>
    </div>    
    ";

 }
 add_shortcode( 'addCustomer', 'addCustomerFormFunc' );




 function accountOfficerProfileFunc( $atts, $content=null ) {

    $defaultArray = array(
        'name' => 'account_officer_profile'
    );

    $attributes = shortcode_atts( $defaultArray, $atts );

    return "
    <div class='pageProfile'>
        <h4>Account Officer Profile here...</h4>
    </div>    
    ";

 }
 add_shortcode( 'accountOfficerProfile', 'accountOfficerProfileFunc' );



 function customerProfileFunc( $atts, $content=null ) {

    $defaultArray = array(
        'name' => 'customer_profile'
    );

    $attributes = shortcode_atts( $defaultArray, $atts );

    return "
    <div class='pageProfile'>
        <h4>Customer Profile here...</h4>
    </div>    
    ";

 }
 add_shortcode( 'customerProfile', 'customerProfileFunc' );


 
 function manageDailyContributionsFunc( $atts, $content=null ) {

    $defaultArray = array(
        'name' => 'manage_daily_contributions'
    );

    $attributes = shortcode_atts( $defaultArray, $atts );

    return "
    <div class='pageProfile'>
        <h4>Page to manage customer daily contributions ...</h4>
    </div>    
    ";

 }
 add_shortcode( 'manageDailyContributions', 'manageDailyContributionsFunc' );