<?php 

/**
 * Removes Query string from url
 * @return String Swith language link
 */
function site_remove_querystring_var($url) { 
   return preg_replace('/\?.*/', '', $url);
}
/**
 * Get page title by id
 */
function site_page_title($page_id){
	$title_post = get_post($page_id);
	$title = $title_post->post_title;
	$title = apply_filters('the_title', $title,'',true);
	//$title = str_replace(']]>', ']]&gt;', $title);
	echo $title;
}
/**
 * Get page content by id
 */
function site_page_full_content($page_id){
	$content_post = get_post($page_id);
	$content = $content_post->post_content;
	$content = apply_filters('the_content', $content,'',true);
	$content = str_replace(']]>', ']]&gt;', $content);
	echo $content;
}
/**
 * Get page content by id
 */
function site_page_content($page_id,$words=55){
	$content_post = get_post($page_id);
	$content = $content_post->post_content;
	$content = apply_filters('the_content', $content,'',true);
	$content = str_replace(']]>', ']]&gt;', $content);
	echo wp_trim_words($content,$words);
}
/**
 * site post content
 */
function site_post_content($limit=50){
	global $post;
	$content = $post->post_content;
	$content = apply_filters('the_content', $content,'',true);
	$content = str_replace(']]>', ']]&gt;', $content);
	echo wp_trim_words($content,$limit);
}

/**
 * Test Printing
 */
function tp($data) {
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}
/**
 * Post items as array
 * @param  Array $array post array keys
 * @param  boolean $null_if_not_set TO set or null or not
 * @return  Array 
 */
function site_post_data($array, $null_if_not_set = false){
	$rt =  array();
	foreach ($array as  $value) {
		if($null_if_not_set === false){
			$rt[$value]  = esc_html($_POST[$value]);
		}
		else{
			$rt[$value]  = isset($_POST[$value]) ? esc_html($_POST[$value]) : null;
		}
	}
	return $rt;
}
/**
 * To display Notice for the front end users
 * @return String 
 */
function site_show_notice($message){
	$str = '<div class="alert alert-'.$message['type'].'">';
	if(is_array($message['message'])){
		foreach ($message['message'] as $key => $msg) {
			$str .=$msg.'<br>';
		}
	}else{
		$str .=$message['message'];
	}
	echo $str .='</div>';
}
/**
 * Form post handler
 * @return String post value or dafault value
 */
function site_set_value($item,$default=''){
    if(isset($_POST[$item])){
        return $_POST[$item];
    }else{
        return $default;
    }
}
function site_get_user_meta($user_id,$meta_key,$umeta_id=FALSE){
	global $wpdb;
	if($umeta_id){
		$sql = $wpdb->prepare( "SELECT * FROM $wpdb->usermeta WHERE meta_key = %s AND user_id = %d AND umeta_id=%d", $meta_key,$user_id,$umeta_id) ;
	}else{
		$sql = $wpdb->prepare( "SELECT * FROM $wpdb->usermeta WHERE meta_key = %s AND user_id = %d", $meta_key,$user_id) ;
	}
	$usermeta = $wpdb->get_results($sql);
	if($usermeta){
		return $usermeta;
	}else{
		return false;
	}
	 
}
function site_update_user_meta($user_id,$umeta_id,$value){
	global $wpdb;
	if(is_array($value)){
		$data['meta_value'] = serialize($value);
	}else{
		$data['meta_value'] = $value;
	}	
	$where['umeta_id'] 	= 	$umeta_id;
	if($wpdb->update( $wpdb->usermeta, $data,$where)){
		return true;
	}else{
		return false;
	}
}
/**
 * language handle
 * @return String post value or dafault value
 */
function _ol($key,$print=true){
	if($print){
		_e($key,'mysite');
	}else{
		return __($key,'mysite');
	}
}
/**
 * language handle
 * @return String post value or dafault value
 */
function _el($key){
	return __($key,'mysite');
}
/**
 * Check Post Exists
 * @param  String $post_name  post_name
 * @param  string $post_type Post type
 * @return Boolean            [description]
 */
function site_post_exists( $post_name, $post_type='post' ) {
	global $wpdb;

	$query = "SELECT ID FROM $wpdb->posts WHERE 1=1";
	$args = array();

	if ( !empty ( $post_name ) ) {
	     $query .= " AND post_name = '%s' ";
	     $args[] = $post_name;
	}
	if ( !empty ( $post_type ) ) {
	     $query .= " AND post_type = '%s' ";
	     $args[] = $post_type;
	}

	if ( !empty ( $args ) )
	     return $wpdb->get_var( $wpdb->prepare($query, $args) );

	return 0;
}
function site_has_site($post_type='post',$user=0){
	if(!$user){
		$user = get_current_user_id();
	}
	$args = array(
	    'author'        =>  $user ,
	    'orderby'       =>  'post_date',
	    'order'         =>  'ASC',
	    'posts_per_page' => 1,
	    'post_type'=>$post_type,
	    'post_status'=>array('publish','pending'),
	    );
	$current_user_posts = get_posts( $args );
	if($current_user_posts){
		return true;
	}else{
		return false;
	}
}
/**
 * Print active menu
 * @param  String $slug Page Slug
 * @return [type] [description]
 */
function site_getactivemenu($id,$checkparent=true) {
    global $post;
    if($checkparent){
    	if (is_page( $id ) OR $post->post_parent == $id) {
    	    echo 'active';
    	}
    }else{
    	if (is_page( $id )) {
    	    echo 'active';
    	}
    }
}


/**
 * Site page verification
 * @return Boolean
 */
function site_page_check($page){
	$page = get_post($page);
	if($page AND $page->post_author == get_current_user_id() AND  $page->post_type =="sites"){
		return $page;
	}else{
		return false;
	}
}
function site_crypt($data){
    return base64_encode(serialize($data));
}
function site_dcrypt($data){
    $data =unserialize(base64_decode($data));
    if(is_array( $data )){
        return  $data ;
    }else{
        return false;
    }
}

function site_url_nonce(){
	if (!isset($_GET['my_nonce']) || !wp_verify_nonce($_GET['my_nonce'], 'site_url_check')){
		return true;
	}else{
		wp_die(_el('Cheating?'));
	}
}
function site_reorder_posts( $order = array() ) {
    global $wpdb;
    $list = join(', ', $order);
    $wpdb->query( 'SELECT @i:=-1' );
    $result = $wpdb->query(
        "UPDATE  $wpdb->posts SET menu_order = ( @i:= @i+1 )
        WHERE ID IN ( $list ) ORDER BY FIELD( ID, $list );"
    );
    return $result;
}
//ACF theme settings
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
			'page_title' 	=> _el('General Settings'),
			'menu_title'	=> _el('General Settings'),
			'menu_slug' 	=> 'site-general-settings',
			'capability'	=> 'manage_options',
			'redirect'		=> false
	));
}

function site_archive_years($posttype){
	global $wpdb;
	$query = "SELECT YEAR(post_date) AS `year`,  count(ID) as posts FROM $wpdb->posts WHERE post_type='$posttype' AND post_status='publish' GROUP BY YEAR(post_date)  ORDER BY post_date DESC";
	$results = $wpdb->get_results( $query );
	$last_changed = wp_cache_get( 'last_changed', 'posts' );
	if ( ! $last_changed ) {
		$last_changed = microtime();
		wp_cache_set( 'last_changed', $last_changed, 'posts' );
	}
	$key ="site_archive_list$last_changed$posttype";
	if ( ! $results = wp_cache_get( $key, 'posts' ) ) {
	    $results = $wpdb->get_results( $query );
 		wp_cache_set( $key, $results, 'posts' );
	}
	$years = array();
	if ( $results ) {
		foreach ( (array) $results as $result ) {
			$years[] =$result->year;
		}
	}else{
		$years[]  = date('y');
	}
	return $years; 
}
/**
 * Exclude post without post content
 */
add_action( 'posts_search', 'site_without_post_content', 10000, 1 );
function site_without_post_content( $search_sql ) {
	global $wpdb;
	if(! is_admin() &&  is_search()){
		if( strpos( $search_sql, 'post_content LIKE' ) ) {
			 $search_sql .= "AND {$wpdb->posts}.post_content !='' ";
		}
	}
	return $search_sql;
}


/**
 * Custom Post types administratot
 */
 
add_action('init', 'site_user_roles');
function site_user_roles(){


	$per = array('edit','read','delete','upload_files','edit_files');
	$perms = array('edit','edit_others','publish','read','create','read_private','edit_published','delete_others','delete_private','delete_published');
	$roles   = array(	
	);
	foreach ($roles as $key => $value) {
		$roles =  array('read'=>true,'upload_files'=>true);
		foreach ($per as $pe) {
			$perm = $pe.'_'.$key;
			$roles[$perm] = true;
		}
		foreach ($perms as $pes) {
			$perm = $pes.'_'.$key.'s';
			$roles[$perm] = true;
		}
 
		remove_role( $value['id']);

		$jp= add_role( $value['id'],$value['name'],$roles);
		$convertroles = array('editor','administrator');
		foreach($convertroles as $the_role) { 
			 $role = get_role($the_role);
			 foreach ($roles as $key => $value) {
			 	$role->add_cap($key);
			 }
		}
	}
}


//Print pagination
function site_pagination($totalpage){
	echo '<div class="wrap-pagination-num">';
	$big = 999999999; // need an unlikely integer

	echo paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'total' => $totalpage,
		'prev_text'          => __('Previous','mysite'),
		'next_text'          => __('Next','mysite'),
	) );
	echo '</div>';
}
/**
 * Remove Unwanted filetype
 * @param    $existing_mimes 
 */
add_filter('upload_mimes', 'site_custom_upload_mimes');
function site_custom_upload_mimes( $existing_mimes=array() ) {
	$mimes = array('js','exe','class','js');
	foreach ($mimes as $mime) {
		unset($existing_mimes[$mime]);
	}
	return  $existing_mimes;
}

/**
 * Generates go back link
 * @return string
 */
function site_back_button($text,$page=0){
	//echo $page;
	$link = get_page_link( $page );
	if(isset($_SERVER['HTTP_REFERER']) && $link!=""){
		//$url = esc_url($_SERVER['HTTP_REFERER']);
		$url = $link;
	}else{
		$url = get_permalink(2);
	}
	echo '<a href="'.$url.'" class="pull-left">&lt; '.$text.'</a>';
}
//Remove Admin bar
add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
}
}

class Roots_Nav_Walker_Custom extends Walker_Nav_Menu {
	function start_lvl(&$output, $depth = 0, $args = array()) {
		$output .= "\n<ul class=\"dropdown\">\n";
	}
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		//echo depth;
		//print_r($item);
		$item_html = '';
		
		parent::start_el($item_html, $item, $depth, $args);
		
		if ($item->is_dropdown && ($depth === 0)) {
			$item_html = str_replace('<a class="dropdown-toggle" data-toggle="dropdown" data-target="#"', '<a', $item_html);
			$item_html = str_replace(' <b class="caret"></b></a>', '</a>', $item_html);
			//$item_html .= '<h4>hfgh</h4>';
		} elseif (stristr($item_html, 'li class="divider')) {
			$item_html = preg_replace('/<a[^>]*>.*?<\/a>/iU', '', $item_html);
		} elseif (stristr( $item_html, 'li class="dropdown-header')) {
			$item_html = preg_replace('/<a[^>]*>(.*)<\/a>/iU', '$1', $item_html);
		}
		
		$item_html = apply_filters('roots_wp_nav_menu_item', $item_html);
		$output .= $item_html;
	}
	function end_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= "</ul>\n";
    }
	function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {
		$element->is_dropdown = ((!empty($children_elements[$element->ID]) && (($depth + 1) < $max_depth || ($max_depth === 0))));
		if ($element->is_dropdown) {
			$element->classes[] = 'has-submenu';
		}
		parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
	}
}

function siteMainmenu() {
$pageid=get_the_ID();
$menu_name = 'primary'; // specify custom menu slug
$menu_list ='';
if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
    $menu = wp_get_nav_menu_object($locations[$menu_name]);
    $menu_items = wp_get_nav_menu_items($menu->term_id);
	//print_r($menu_items);
	$menu_list='<ul id="menu-header-menu" class="mainmenu">';
    foreach( $menu_items as $menu_item ) {
        if( $menu_item->menu_item_parent == 0 ) {

            $parent = $menu_item->ID;

            $menu_array = array();
            foreach( $menu_items as $submenu ) {
                if( $submenu->menu_item_parent == $parent ) {
                    $bool = true;
					if($pageid==$submenu->object_id){
						$cls="current-menu-item";
					}else{
						$cls="";
					}
                    $menu_array[] = '<li class="'.$cls.'  menu-' . $submenu->object_id. '">1<a href="' . $submenu->url . '">' . $submenu->title . '</a></li> ' ."\n";
                }
            }
            if( $bool == true && count( $menu_array ) > 0 ) {
				//print_r($menu_item);
				//echo $parent;
				$crntprnt=wp_get_post_parent_id($pageid);
				if($crntprnt== $menu_item->object_id){
							$mcls="current-menu-ancestor";
					}else{
						$mcls="";
					}
                $menu_list .= '<li role="presentation" class="menu-item-has-children '.$mcls.'  menu-' . $menu_item->object_id . '">' ."\n";
                $menu_list .= '<a>' . $menu_item->title . '</a>' ."\n";

                $menu_list .= '<ul class="sub-menu">' ."\n";
                $menu_list .= implode( "\n", $menu_array );
				//$menu_itemss = wp_get_nav_menu_items($menu_item->term_id);
				//print_r($menu_itemss);
				//$menu_list .= site_subpage($menu_array,$parent);
                $menu_list .= '</ul>' ."\n";
				
				//$menu_list .= show_left_children($parent_id, $post_id, $current_level);
				

            } else {
				if($pageid==$menu_item->object_id){
						$cls="current-menu-item";
					}else{
						$cls="";
					}
                $menu_list .= '<li class="'.$cls.'  menu-' . $menu_item->object_id . '">f' ."\n";
                $menu_list .= '<a href="' . $menu_item->url . '">' . $menu_item->title . '</a>' ."\n";
                $menu_list .= '<li>' ."\n";
            }

        }

        // end <li>

    }
$menu_list .= '</ul>';
} 
// else {
//     $menu_list = '<!-- no menu defined in location "'.$theme_location.'" -->';
// }

echo $menu_list;}


function parenttitle(){
	global $post;
	//print_r($post);
$parent_title = get_the_title($post->post_parent);
return $parent_title;	
}

function custom_login_logo() {
    echo '<style type="text/css">'.
             'h1 a { background-image:url('.get_bloginfo( 'template_directory' ).'/images/logo.jpg) !important; }'.
         '</style>';
}
add_action( 'login_head', 'custom_login_logo' );

function custom_login_title() {
    return get_option( 'blogname' );
}
add_filter( 'login_headertitle', 'custom_login_title' );

function custom_login_url() {
    return site_url();
}
add_filter('login_headerurl', 'custom_login_url');


function my_enqueue($hook) {
    wp_enqueue_script('datepicker', site_url().'/wp-includes/js/jquery/ui/datepicker.min.js?ver=1.11.4');
	wp_enqueue_style( 'datepicker', 'https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css?ver=52cfc7b7ff6bdb0b5ddff06303c8970c' );
}

add_action('admin_enqueue_scripts', 'my_enqueue');






