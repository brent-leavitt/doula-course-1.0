Doula Course Plugin Setup: 

There are two files that require custom values to be set: 
func/ipn/ipn_relay.php
func/nb_query_vars.php

Specific instruction on what to do are found in each file. 
Additional for the IPN relay functionality to work properly, the system .htaccess file must be modified to receive IPNs from PayPal successfully. 