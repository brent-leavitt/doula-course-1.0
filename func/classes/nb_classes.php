<?php 
// Loads a list of all available and applicable classes for
// New Beginnings Doula Training interface. 

//Transactions
require_once('nb_transaction.class.php');

//Students 
require_once('nb_student.class.php');

//Admin Tables
require_once('nb_tables.class.php');

//Admin Editors
require_once('nb_editor.class.php');

//Assignment Map
include_once('nb_assignment_map.class.php');

//Assignment 
include_once('nb_assignment.class.php');

//Messages
include_once('nb_message.class.php');

//Walker for Manuals
include_once('nb_section_list.class.php');

$nbEditor = new NB_Editor();


?>