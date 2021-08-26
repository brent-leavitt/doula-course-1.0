<?php
/**
* Plugin Name: Doula Course
* Plugin URI: http://www.trainingdoulas.com/
* Description: The framework for managing our doula training program online. 
* Version: 1.1
* Author: Brent Leavitt
* Author URI: https://tech.trainingdoulas.com/ 
* License: Open Source
*/

//NBDT Course Functions

//Add helper functions.
require_once('func/helper.php');

//Add admin functions. 
require_once('func/nb_admin.php');

//Add NB Doula Training classes.
require_once('func/classes/nb_classes.php');

//Admin Extras To Help with the creation of content
include_once('func/admin_metaboxes.php');

//Add Custom Post Types. 
include_once('func/reg_cpt.php'); 

//Add Additional Automated Triggers (IPN and Crons)
include_once('func/nb_query_vars.php');  

//Login Screen Customization
include_once('func/login.php');

//Add Widgets
include_once('func/nb_widgets.php');

//Add Custom Page Functionality 
include_once('func/nb_pages.php');

//Add Menus based on user permissions
include_once('func/nb_menus.php');



//Customize the emails being sent from the system. 
add_filter( 'wp_mail_from', function( $name ) {
	return '/*office emial goes here*/';
});

add_filter( 'wp_mail_from_name', function( $name ) {
	return '/*Company Name goes here*/';
});



?>