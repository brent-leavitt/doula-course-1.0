<?php 

/*
	This is the file where we register our custom post types that we've created for the doula course. 
*/

function nb_register_CPT() {

	/*
		Course CPT
	*/  

	$nb_course_labels = array(
		'name' => _x('Course', 'post type general name', 'doula-course'),
		'singular_name' => _x('Course', 'post type singular name', 'doula-course'),
		'add_new' => _x('Add New', 'course', 'doula-course'),
		'add_new_item' => __('Add New Section', 'doula-course'),
		'edit_item' => __('Edit Section', 'doula-course'),
		'new_item' => __('New Section', 'doula-course'),
		'all_items' => __('All Sections', 'doula-course'),
		'view_item' => __('View Section', 'doula-course'),
		'search_items' => __('Search Sections', 'doula-course'),
		'not_found' =>  __('No sections found', 'doula-course'),
		'not_found_in_trash' => __('No sections found in Trash', 'doula-course'), 
		'parent_item_colon' => '',
		'menu_name' => __('Course', 'doula-course')
	);

	$nb_course_args = array(
		'labels' => $nb_course_labels,
		'description' => 'doula training manuals',
		'public' => true ,
		'publicly_queryable' => true,
		'query_var' => true,
		'show_ui' => true,
		'has_archive' => true, 
		'hierarchical' => true,
		'menu_position' => 51,
		'menu_icon' => 'dashicons-book-alt',
		'supports' => array( 'title', 'editor', 'page-attributes', 'revisions', 'comments' ),  
		'capabilities' => array(
			'publish_posts' => 'publish_courses',
			'edit_posts' => 'edit_courses',
			'edit_others_posts' => 'edit_others_courses',
			'delete_posts' => 'delete_courses',
			'delete_others_posts' => 'delete_others_courses',
			'read_private_posts' => 'read_private_courses',
			'edit_post' => 'edit_course',
			'delete_post' => 'delete_course',
			'read_post' => 'read_course',
			'read' => 'read_courses',
			'edit_private_posts' => 'edit_private_courses',
			'edit_published_posts' => 'edit_published_courses',
			'delete_published_posts' => 'delete_published_courses',
			'delete_private_posts' => 'delete_private_courses'
		), 
		'map_meta_cap'=> true, 
		'rewrite' => array( 'slug' => 'manuals' )
	); 

	register_post_type('course', $nb_course_args); 	 

	/*
		Assignment CPT
	*/
	  
	$nb_assignment_labels = array(
		'name' => _x('Assignments', 'post type general name', 'doula-course'),
		'singular_name' => _x('Assignment', 'post type singular name', 'doula-course'),
		'add_new' => _x('Add New', 'assignment', 'doula-course'),
		'add_new_item' => __('Add New Assignment', 'doula-course'),
		'edit_item' => __('Edit Assignment', 'doula-course'),
		'new_item' => __('New Assignment', 'doula-course'),
		'all_items' => __('All Assignments', 'doula-course'),
		'view_item' => __('View Assignment', 'doula-course'),
		'search_items' => __('Search Assignments', 'doula-course'),
		'not_found' =>  __('No assignments found', 'doula-course'),
		'not_found_in_trash' => __('No assignments found in Trash', 'doula-course'), 
		'parent_item_colon' => '',
		'menu_name' => __('Assignments', 'doula-course')
	);

	$nb_assignment_args = array(
		'labels' => $nb_assignment_labels,
		'public' => true,
		'publicly_queryable' => false,
		'query_var' => true,
		'exclude_from_search' => true,
		'rewrite' => array( 'slug' => _x( 'assignment', 'URL slug', 'doula-course' ) ),
		'has_archive' => true, 
		'hierarchical' => false,
		'menu_position' => 52,
		'menu_icon' => 'dashicons-portfolio',
		'supports' => array( 'title', 'editor', 'comments', 'author', 'revisions' ), 
		'capabilities' => array(
			'publish_posts' => 'publish_assignments',
			'edit_posts' => 'edit_assignments',
			'edit_others_posts' => 'edit_others_assignments',
			'delete_posts' => 'delete_assignments',
			'delete_others_posts' => 'delete_others_assignments',
			'read_private_posts' => 'read_private_assignments',
			'edit_post' => 'edit_assignment',
			'delete_post' => 'delete_assignment',
			'read_post' => 'read_assignment',
			'read' => 'read_assignments',
			'edit_private_posts' => 'edit_private_assignments',
			'edit_published_posts' => 'edit_published_assignments',
			'delete_published_posts' => 'delete_published_assignments',
			'delete_private_posts' => 'delete_private_assignments'
		),
		'map_meta_cap'=> true 
	); 
	  
	  register_post_type('assignment', $nb_assignment_args); 
}

add_action( 'init', 'nb_register_CPT' ); 


//Registering Custom Post Status for Assignment post types.
function nb_asmt_post_status(){
	register_post_status( 'submitted', array(
		'label'                     => _x( 'Submitted', 'assignment' ),
		'public'                   => true,
		'exclude_from_search'       => true,
		'show_in_admin_all_list'    => true,
		'show_in_admin_status_list' => true,
		'label_count'               => _n_noop( 'Submitted <span class="count">(%s)</span>', 'Submitted <span class="count">(%s)</span>' ),
	) );
	register_post_status( 'incomplete', array(
		'label'                     => _x( 'Incomplete', 'assignment' ),
		'public'                   => true,
		'exclude_from_search'       => true,
		'show_in_admin_all_list'    => true,
		'show_in_admin_status_list' => true,
		'label_count'               => _n_noop( 'Incomplete <span class="count">(%s)</span>', 'Incomplete <span class="count">(%s)</span>' ),
	) );
	register_post_status( 'resubmitted', array(
		'label'                     => _x( 'Resubmitted', 'assignment' ),
		'public'                   => true,
		'exclude_from_search'       => true,
		'show_in_admin_all_list'    => true,
		'show_in_admin_status_list' => true,
		'label_count'               => _n_noop( 'Resubmitted <span class="count">(%s)</span>', 'Resubmitted <span class="count">(%s)</span>' ),
	) );
	register_post_status( 'completed', array(
		'label'                     => _x( 'Completed', 'assignment' ),
		'public'                   => true,
		'exclude_from_search'       => true,
		'show_in_admin_all_list'    => true,
		'show_in_admin_status_list' => true,
		'label_count'               => _n_noop( 'Completed <span class="count">(%s)</span>', 'Completed <span class="count">(%s)</span>' ),
	) );
	
}
add_action( 'init', 'nb_asmt_post_status' );

//Limit the number of revisions for the assignment post type

add_filter( 'wp_revisions_to_keep', 'nb_assignment_revision_limit', 10, 2 );

function nb_assignment_revision_limit( $num, $post ) {
    
    if( 'asignment' == $post->post_type ) {
	$num = 5;
    }
    return $num;
}

//Enable commenting on assignments in status other than Published. 
//Is this working? I think so, but need to double check. 

function enable_custom_status_comments()
{
    if( isset( $_GET['post'] ) ) 
    {
        $post_id = absint( $_GET['post'] ); 
        $post = get_post( $post_id ); 
		$post_status = array('submitted','incomplete','resubmitted','completed');
		
        if ( in_array( $post->post_status, $post_status  ) )
            add_meta_box(
                'commentsdiv', 
                __('Comments'), 
                'post_comment_meta_box', 
                'assignment', 
                'normal', 
                'core'
            );
    }
}

add_action( 'admin_init', 'enable_custom_status_comments' );


function nb_assignment_overview_status( $states ) {
     global $post;
     $arg = get_query_var( 'post_status' );
	 
	 $status_arr = array('submitted','incomplete','resubmitted','completed');
	 
     if( !in_array( $arg, $status_arr ) ){
          if($post->post_status == 'submitted'){
			return array('Submitted');
          }elseif($post->post_status == 'incomplete'){
			return array('Incomplete');
          }elseif($post->post_status == 'resubmitted'){
			return array('Resubmitted');
          }elseif($post->post_status == 'completed'){
			return array('Completed');
		  }
     }
    return $states;
}
add_filter( 'display_post_states', 'nb_assignment_overview_status' );


add_filter( 'manage_edit-course_columns', 'my_edit_course_columns' ) ;

function my_edit_course_columns( $columns ) {

	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Section' ),
		'course_type' => __( 'Type' ),
		'course_access' => __( 'Access Level' ),
	);

	return $columns;
}

add_action( 'manage_course_posts_custom_column', 'my_manage_course_columns', 10, 2 );

function my_manage_course_columns( $column, $post_id ) {
	global $post;

	switch( $column ) {

		/* If displaying the 'course_type' column. */
		case 'course_type' :

			/* Get the post meta. */
			$cType = get_post_meta( $post_id, 'course_type', true );

			switch(	$cType ){
			
			case 0:
				echo __( 'Content' );
				break;
			
			case 1:
				echo __( 'Assignment' );
				break;
				
			case 2: 
				echo __('Section Head');
				break;
				
			case 3:
				echo __( 'Other' );
				break;
					
			case 4:
				echo __( 'Manual' );
				break;
					
			case 5:
				echo __( 'Certification' );
				break;
				
			default:
				echo __( 'Unknown' );
				break;
			}
			
				
			break;

		case 'course_access':	
			$cAccess= get_post_meta( $post_id, 'course_access', true );

			switch(	$cAccess ){
				
			case 3:
				echo __( 'All Courses' );
				break;
	
			case 2: 
				echo __('Main and Childbirth');
				break;
			
			case 1:
				echo __( 'Main Course' );
				break;
				
			default:
				echo __( '-not set-' );
				break;
				
			
			}
		/* Just break out of the switch statement for everything else. */
		
		default :
			break;
	}
}


function set_course_post_type_admin_order($wp_query) {
  if (is_admin()) {

    $post_type = $wp_query->query['post_type'];

    if ( $post_type == 'course' && empty($_GET['orderby'])) {
      	$wp_query->set('orderby', 'menu_order');
      	$wp_query->set('order', 'ASC');
    }

  }
}
add_filter ( 'pre_get_posts', 'set_course_post_type_admin_order' );

// Add quick edit functionality for Course Access
add_action('quick_edit_custom_box',  'nb_course_access_quick_edit', 10, 2);
 
function nb_course_access_quick_edit($column_name, $post_type) {
    if ($column_name != 'course_access') return;
    ?>
    <fieldset class="inline-edit-col-left">
        <div class="inline-edit-col">
            <span class="title">Course Access</span>
            <input id="cAccess_noncename" type="hidden" name="cAccess_noncename" value="" />
            <select id="cAccess" name="cAccess">
				<option value="1">Main Course</option>
				<option value="2">Main and Childbirth</option>
				<option value="3">All Courses</option>
			</select> 
        </div>
    </fieldset>
     <?php
}
 
 // Add to our admin_init function 
add_action('save_post', 'nb_save_quick_edit_data');   
 
function nb_save_quick_edit_data($post_id) {     
  // verify if this is an auto save routine.         
  if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )          
      return $post_id;         
  // Check permissions     
  if ( 'course' == $_POST['post_type'] ) {         
    if ( !current_user_can( 'edit_page', $post_id ) )             
      return $post_id;     
  } else {         
    if ( !current_user_can( 'edit_post', $post_id ) )         
    return $post_id;     
  }        
  // Authentication passed now we save the data       
  if (isset($_POST['cAccess']) && ($post->post_type != 'revision')) {
        $my_fieldvalue = esc_attr($_POST['cAccess']);
        if ($my_fieldvalue)
            update_post_meta( $post_id, 'course_access', $my_fieldvalue);
        else
            delete_post_meta( $post_id, 'course_access');
    }
    return $my_fieldvalue;
}
 
add_action('admin_footer', 'nb_quick_edit_javascript');

function nb_quick_edit_javascript() {
    global $current_screen;
    if (($current_screen->post_type != 'course')) return;
 
    ?>
<script type="text/javascript">
function set_cAccess_value( fieldValue, nonce ) {
        // refresh the quick menu properly
        inlineEditPost.revert();
        console.log( fieldValue );
        jQuery( '#cAccess' ).val( fieldValue ).change();
}
</script>
 <?php 
} 

// Add to our admin_init function 
add_filter('post_row_actions', 'nb_expand_quick_edit_link', 10, 2);   
function nb_expand_quick_edit_link($actions, $post) {     
    global $current_screen;     
    if (($current_screen->post_type != 'course')) 
        return $actions;
    $nonce = wp_create_nonce( 'cAccess_'.$post->ID);
    $myfielvalue = get_post_meta( $post->ID, 'course_access', TRUE);
    $actions['inline hide-if-no-js'] = '<a href="#" class="editinline" title="';     
    $actions['inline hide-if-no-js'] .= esc_attr( __( 'Edit this item inline' ) ) . '"';
    $actions['inline hide-if-no-js'] .= " onclick=\"set_cAccess_value('{$myfielvalue}')\" >";
    $actions['inline hide-if-no-js'] .= __( 'Quick Edit' );
    $actions['inline hide-if-no-js'] .= '</a>';
    return $actions;
}
 
add_action( 'loop_start', 'nb_course_loop' );
add_action( 'loop_end', 'nb_course_loop' );
 
 //This function is called twice in each loop. 
 
function nb_course_loop( &$obj ) {
    if( get_query_var('post_type') == 'course' ) {
		global $post, $current_user;
		
		// Start output buffering at the beginning of the loop and abort
		if ( 'loop_start' === current_filter() )			
			return ob_start(); //Stops here on first time (loop start) and returns the ob_start
		
		// At the end of the loop, we end the buffering and save into a var
		$loop_content = ob_get_clean();
		
		$s_active = current_user_can('student_current');
			
		if(!$s_active){
			 wp_redirect( home_url()."/inactive-student-notice" ); 
			 exit;
			
		} else {
		
			if ( is_archive() || is_search() ) {
				if ( is_main_query() ){
					if( is_archive() )
						$obj->max_num_pages = 0; //Kill pagination on archives. 
				
					include( plugin_dir_path( __FILE__ ) . "../templates/course-overview.php" );
				}
			 } else { //if not archive or search result, probably single. 
				
				$course_type_num = intval( get_post_meta($post->ID, 'course_type', true) );
				$course_type = 'content';
				
				switch($course_type_num){
					case 5: 
					case 4: 	
					case 2: 
						$course_type = 'section';
						break;
					case 1: 
						$course_type = 'assignment';
						break;
					case 0:
					default: 
						$course_type = 'content';
						break;
				}
				
				$course_access = intval( get_post_meta($post->ID, 'course_access', true) );
				$student_access = intval( get_user_meta( $current_user->ID, 'course_access', true ) );
				 
				// echo "PAGE IS SINGLE! Course type is: $course_type ." ;
				if( is_main_query() ){
					include( plugin_dir_path( __FILE__ ) . "../templates/course-functions.php" );
					
					if( $student_access >= $course_access ){
						include( plugin_dir_path( __FILE__ ) . "../templates/course-$course_type.php" );
					} else {
						include( plugin_dir_path( __FILE__ ) . "../templates/course-access-notice.php" );
					}
				}
				
			}// endif;
		}
    }	
}

//Make CPT's so that they can have shortlinks:
if( !function_exists( 'nb_cpt_shortlinks' ) ) {
  /**
  * Allow shortlinks to be retrieved for pages and custom post types
  */
	function nb_cpt_shortlinks( $shortlink, $id, $context, $allow_slugs=true ) {
		/**
		 * If query is the context, we probably shouldn't do anything
		 */
		if( 'query' == $context )
			return $shortlink;

		$post = get_post( $id );
		$post_id = $post->ID;

		/**
		 * If this is a standard post, return the shortlink that was already built
		 */
		if( 'post' == $post->post_type )
			return $shortlink;

		/**
		 * Retrieve the array of publicly_queryable, non-built-in post types
		 */
		$post_types = get_post_types( array( '_builtin' => false, 'publicly_queryable' => true ) );
		if( in_array( $post->post_type, $post_types ) || 'page' == $post->post_type )
			$shortlink = home_url('?p=' . $post->ID);

		return $shortlink;
	}
}
add_filter( 'get_shortlink', 'nb_cpt_shortlinks', 10, 4 );


//Messaging actions on comments submitted for assignments

function nb_asmt_comments( $comment_id, $comment_obj ){	
	
	if( strcmp( get_post_type( $comment_obj->comment_post_ID ), 'assignment' ) == 0 ){
	
		$msg = new NB_Message();
		
		$msg->comment_notify( $comment_obj );
		
	}
}

add_action( 'wp_insert_comment', 'nb_asmt_comments' ,10 ,2 );


//Theme specific modifications for Pinnacle Theme by Kadence

add_filter( 'kadence_page_title', 'nb_course_page_titles' );

function nb_course_page_titles( $title ){
	global $post, $nb_page_title;
	
	if( get_query_var('post_type') == 'course' ) {
	
		if ( is_archive() || is_search() ) {
			$title = "Course Manuals";
			
         } else { //if not archive or search result, probably single. 
			
			$title = get_the_title( $post->post_parent );
			
			
        }// endif;
    }	
	$nb_page_title = $title;
	
	return $title;
}



?>