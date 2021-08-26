<?php
/***
*
*  HELPER FUNCTIONS and CLASSES 
*
*  Created on 24 July 2013
*  Updated on 6 Jan 2016
*
****/

function print_pre($arr = array()){
	print('<pre>');
	print_r($arr);
	print('</pre>');
} 


/*
Built for NB_Pages, NB_STUDENT_UPDATES_STRING, but is not able to dig deep into USER class. 
*/
function nb_compare_groups( $old, $new ){
	$diff = array(); 
	
	if( is_object( $old ) && is_object( $new ) ){
		foreach( $old as $k => $v ) {
			if( property_exists( $new , $k ) ){ 
				if( is_array( $v ) ){
					$rad = nb_compare_groups( $v, $new->$k ); 
					if( count( $rad ) ){ $diff[ $k ] = $rad; } 
				}elseif( is_object( $v ) ) { 
					$rad = nb_compare_groups( $v, $new->$k ); 
					if( count( $rad ) ){ $diff[ $k ] = $rad; } 
				} else { 
					if( $v != $new->$k ){ 
						$diff[ $k ] = $v; 
					}
				}
			} else { 
				$diff[ $k ] = $v; 
			} 
		} 
		return $diff; 
	} elseif( is_array( $old ) && is_array( $new ) ){
		foreach( $old as $k => $v ) {
			if( array_key_exists( $k, $new ) ){ 
				if( is_array( $v ) ){
					$rad = nb_compare_groups($v, $new[$k]); 
					if( count( $rad ) ){ $diff[ $k ] = $rad; } 
				}elseif( is_object( $v ) ) { 
					$rad = nb_compare_groups($v, $new->$k); 
					if( count( $rad ) ){ $diff[ $k ] = $rad; } 
				} else { 
					if( $v != $new[ $k ] ){ 
						$diff[ $k ] = $v; 
					}
				}
			} else { 
				$diff[ $k ] = $v; 
			} 
		} 
		return $diff; 
	} else{
		return false; //Cannot compare the two groups as they do not match type. 
	}

}


/* Unneeded SEO functionality causing second page load. 
Diasable so that bookmarking tool works correctly. */

add_filter( 'index_rel_link', 'disable_stuff' );
add_filter( 'parent_post_rel_link', 'disable_stuff' );
add_filter( 'start_post_rel_link', 'disable_stuff' );
add_filter( 'previous_post_rel_link', 'disable_stuff' );
add_filter( 'next_post_rel_link', 'disable_stuff' );

function disable_stuff( $data ) {
	return false;
}

//temp location for nbHtmlWrap

function nbHtmlWrap( $subject, $content ){
	
	/* $nb_html = nbEmailHtmlHeader(); //header
	$nb_html .= $content;
	$nb_html .= nbEmailHtmlFooter();//Footer
	 */
	 
	$nb_html = '<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Title Goes Here</title>
	</head>
	<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
		<div id="wrapper" dir="ltr" style="background-color: #fcfbff; margin: 0; padding: 70px 0 70px 0; -webkit-text-size-adjust: none !important; width: 100%;">
			<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%"><tr>
<td align="center" valign="top">
						<div id="template_header_image">
							<p style="margin-top: 0;"><img src="https://www.trainingdoulas.com/wp-content/uploads/sites/4/2017/09/nb-doula-training-logo-small.png" alt="New Beginnings Doula Training" style="border: none; display: inline; font-size: 14px; font-weight: bold; height: auto; line-height: 100%; outline: none; text-decoration: none; text-transform: capitalize;"></p>						</div>
						<table border="0" cellpadding="0" cellspacing="0" width="600" id="template_container" style="box-shadow: 0 1px 4px rgba(0,0,0,0.1) !important; background: #ffffff url(https://www.trainingdoulas.com/wp-content/uploads/2017/08/single_cluster_flowers.png) no-repeat 90% 90%; border: 1px solid #e3e2e5; border-radius: 3px !important;">
<tr>
<td align="center" valign="top">
									<!-- Header -->
									<table border="0" cellpadding="0" cellspacing="0" width="600" id="template_header" style="background-color: #ac1b5c; border-radius: 3px 3px 0 0 !important; color: #ffffff; border-bottom: 0; font-weight: bold; line-height: 100%; vertical-align: middle; font-family: Helvetica, Roboto, Arial, sans-serif;"><tr>
<td id="header_wrapper" style="padding: 36px 48px; display: block;">
												<h1 style="color: #ffffff; font-family: Raleway,  Arial, sans-serif; font-size: 30px; font-weight: 400; line-height: 150%; margin: 0; text-align: left; text-shadow: 0 1px 0 #bd497d; -webkit-font-smoothing: antialiased;">
												'; 											
	//Insert Subject Line
	$nb_html .= $subject;
	$nb_html .= '								</h1>
											</td>
										</tr></table>
<!-- End Header -->
</td>
							</tr>
<tr>
<td align="center" valign="top">
									<!-- Body -->
									<table border="0" cellpadding="0" cellspacing="0" width="600" id="template_body">
										<tr>
											<td valign="top" id="body_content" style="background-color: transparent;">
												<!-- Content -->
												<table border="0" cellpadding="20" cellspacing="0" width="100%">
													<tr>
														<td valign="top" style="padding: 48px;">
                                                            <div id="body_content_inner">
																<table class="td" cellspacing="0" cellpadding="6" style="width: 100%; font-family: Raleway,  Arial, sans-serif; color: #747475; border: 1px solid #e5e5e5; background: #ffffff;" border="1">
																	<tbody>
																		<tr><td class="td" cellspacing="0" cellpadding="6"  style="width: 100%; font-family: Raleway,  Arial, sans-serif; color: #747475; border: 1px solid #e5e5e5;">
						'; //header
	$nb_html .= $content;
	$nb_html .= '														</td></tr>
																	</tbody>
																</table>
															</div>
														</td>
                                                    </tr>
                                                </table>
                                                <!-- End Content -->
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- End Body -->
                                </td>
                            </tr>
                        	<tr>
                            	<td align="center" valign="top">
                                    <!-- Footer -->
                                	<table border="0" cellpadding="10" cellspacing="0" width="600" id="template_footer"><tr>
<td valign="top" style="padding: 0; -webkit-border-radius: 6px;">
												<table border="0" cellpadding="10" cellspacing="0" width="100%"><tr>
<td colspan="2" valign="middle" id="credit" style="padding: 0 48px 48px 48px; -webkit-border-radius: 6px; border: 0; color: #cd769d; font-family: Raleway,  Arial, sans-serif; font-size: 12px; line-height: 125%; text-align: center;">
                                                        	New Beginnings Childbirth Services, LLC<br />
                                                        	315 E. Porter Street<br />
                                                        	Marshall, MO 65340<br />
                                                        	U.S.A.<br />
                                                        	<br />
                                                        	Need help? <a  style="color:#AC1B5C;" href="https://www.trainingdoulas.com/doula-training/contact-information/">Contact us!</a><br />
															
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- End Footer -->
                                </td>
                            </tr>
                        </table>
					</td>
                </tr>
            </table>
        </div>
    </body>
</html>';//Footer
	
	return $nb_html;
}




?>