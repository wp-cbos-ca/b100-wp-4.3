<?php

defined( 'ABSPATH' ) || die();

function get_mailer_data() {
    $items = array( 
        array( 'name' => 'name', 'type' => 'text', 'label' => 'Your Name (required)', 'required' => 1, 'maxlength' => 40, 'display' => 1 ),
        array( 'name' => 'email', 'type' => 'text', 'label' => 'Your Email (required)', 'required' => 1, 'maxlength' => 40, 'display' => 1 ),
        array( 'name' => 'subject',  'type' => 'text', 'label' => 'Subject', 'required' => 0, 'maxlength' => 40, 'display' => 1 ),
        array( 'name' => 'message',  'type' => 'textarea', 'label' => 'Your Message', 'required' => 0, 'maxlength' => 400, 'display' => 1 ),
    );
    return $items;
}

function get_mailer_data_meta() {
    $items = array( 
        'submit' => array( 'title' => 'Send', 'display' => 1 ),
        );
        return $items;
}

function get_mailer_data_email(){
    $items = array( 
        'success' => array( 'text' => 'Your message was sent succesfully.', 'display' => 1 ),
        'failure' => array( 'text' => 'There was an error sending your message.', 'display' => 1 ),
        'sent_from' => 'Sent from the contact form on ' . get_bloginfo( 'title' ),
        'from' => 'From: ',
        'email' => 'Email: ',
        'message' => 'Message: ',
        'message_sent_from' => 'This message was sent from the contact form on ',
        'na' => 'N/A',
        );
    return $items;    
}
