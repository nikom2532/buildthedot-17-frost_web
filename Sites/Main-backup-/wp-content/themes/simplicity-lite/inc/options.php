<?php
/**
 * Simplicity Options Page
 * @ Copyright: D5 Creation, All Rights, www.d5creation.com
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = 'simplicity';
	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}
function optionsframework_options() {
	
	$options[] = array(
		'name' => 'Simplicity Settings', 
		'type' => 'heading');
		
	$options[] = array(
		'desc' => '<div class="infohead"><span class="donation">If you like this FREEE Theme You can consider for a small Donation to us. Your Donation will be spent for the Disadvantaged Children and Students. You can visit our <a href="http://d5creation.com/donate/" target="_blank"><strong>DONATION PAGE</strong></a> and Take your decision.</span><br /><br /><span class="donation"> Need More Features and Options including Exciting 3D Slide and 100+ Advanced Features? Try <a href="http://d5creation.com/theme/simplicity/" target="_blank"><strong>Simplicity Extend</strong></a>.</span><br /> <br /><span class="donation"> You can Visit the Simplicity Extend Demo <a href="http://demo.d5creation.com/wp/themes/simplicity/" target="_blank"><strong>Here</strong></a>.</span></div>',
		'type' => 'info');
	
	$options[] = array(
		'name' => 'Front Page Heading', 
		'desc' => 'Input your heading text here.  Please limit it within 30 Letters.', 
		'id' => 'heading_text',
		'std' => 'Welcome to the World of Creativity!',
		'type' => 'text');
		
	$options[] = array(
		'name' => 'Front Page Heading Description', 
		'desc' => 'Input your heading description here. Please limit it within 100 Letters.', 
		'id' => 'heading_des',
		'std' => 'You can use Simplicity Extend Theme for more options, more functions and more visual elements. Extend Version has come with simple color customization option.',
		'type' => 'textarea');
		
	$options[] = array(
		'name' => 'Use Responsive Layout', 
		'desc' => 'Check the Box if you want the Responsive Layout of your Website', 
		'id' => 'responsive',
		'std' => '0',
		'type' => 'checkbox');
	
	$options[] = array(
		'desc' => '<span class="featured-area-title">Other Settings</span>', 
		'type' => 'info');
	
	$options[] = array(
		'name' => 'Front Page Post/Page Visibility', 
		'desc' => 'Check this if you do not want to show Posts/Pages in the Front Page', 
		'id' => 'fpostex',
		'std' => '1',
		'type' => 'checkbox');


// Front Page Fearured Boxs
		
	$options[] = array(
		'desc' => '<span class="featured-area-title">First Row Featured Boxs</span>', 
		'type' => 'info');
		
	foreach (range(1,8) as $fbsinumber) {
	
	$options[] = array(
		'desc' => '<b>FEATURED BOX: ' . $fbsinumber . '</b>',
		'type' => 'info');
	
	$options[] = array(
		'name' => 'Image', 
		'desc' => 'Upload an image for the Featured Box. 200px X 100px image is recommended.  If you do not want to show anything here leave the box blank.', 
		'id' => 'featured-image' . $fbsinumber,
		'std' => get_template_directory_uri() . '/images/featured-image' . $fbsinumber . '.png',
		'type' => 'upload');	
	
	$options[] = array(
		'name' => 'Title', 
		'desc' => 'Input your Featured Title here. Please limit it within 30 Letters. If you do not want to show anything here leave the box blank.', 
		'id' => 'featured-title' . $fbsinumber,
		'std' => 'Simplicity Theme for Small Business',
		'type' => 'text');
	
	$options[] = array(
		'name' => 'Description', 
		'desc' => 'Input the description of Featured Areas. Please limit the words within 30 so that the layout should be clean and attractive. You can also input any HTML, Videos or iframe here. But Please keep in mind about the limitation of Width of the box.', 
		'id' => 'featured-description' . $fbsinumber,
		'std' => 'The Color changing options of Simplicity will give the WordPress Driven Site an attractive look. Simplicity is super elegant and Professional Responsive Theme which will create the business widely expressed.',
		'type' => 'text', );
	}
	
	$options[] = array(
		'desc' => '<span class="featured-area-title">Second Row Featured Boxs</span>', 
		'type' => 'info');
		
	foreach (range(1,8) as $fbsinumber) {
	
	$options[] = array(
		'desc' => '<b>FEATURED BOX: ' . $fbsinumber . '</b>',
		'type' => 'info');
	
	$options[] = array(
		'name' => 'Image', 
		'desc' => 'Upload an image for the Featured Box. 50px X 50px image is recommended. If you do not want to show anything here leave the box blank.', 
		'id' => 'featured-image2' . $fbsinumber,
		'std' => get_template_directory_uri() . '/images/featured-image.png',
		'type' => 'upload');	
	
	$options[] = array(
		'name' => 'Title', 
		'desc' => 'Input your Featured Title here. Please limit it within 30 Letters. If you do not want to show anything here leave the box blank.', 
		'id' => 'featured-title2' . $fbsinumber,
		'std' => 'Simplicity Theme for Business',
		'type' => 'text'); 
	
	$options[] = array(
		'name' => 'Description', 
		'desc' => 'Input the description of Featured Areas. Please limit the words within 30 so that the layout should be clean and attractive. You can also input any HTML, Videos or iframe here. But Please keep in mind about the limitation of Width of the box.', 
		'id' => 'featured-description2' . $fbsinumber,
		'std' => 'Simplicity is super elegant and Professional Responsive Theme which will create the business widely expressed.',
		'type' => 'text', );

	}
	
		
// Slider Settings

	foreach (range(1,2) as $opsinumber) {
	
	$options[] = array(
		'desc' => '<span class="featured-area-title">Sliding Image - ' . $opsinumber . '</span>', 
		'type' => 'info');
		
	$options[] = array(
		'name' => 'Sliding Image', 
		'desc' => 'Upload an Sliding Image. 930px X 350px image is recommended. Please upload an optimized image for smooth running of the slides.', 
		'id' => 'slide-image' . $opsinumber,
		'std' => get_template_directory_uri() . '/images/slides/' . $opsinumber . '.jpg',
		'type' => 'upload');
	
	$options[] = array(
		'name' => 'Image Title', 
		'desc' => 'Input the Caption of the Image. Please limit the words within 50 so that the layout should be clean and attractive.', 
		'id' => 'slide-image' . $opsinumber . '-title',
		'std' => 'This is a Test Image Title',
		'type' => 'text');
		
	$options[] = array(
		'name' => 'Image Caption', 
		'desc' => 'Input the Caption of the Image. Please limit the words within 50 so that the layout should be clean and attractive.', 
		'id' => 'slide-image' . $opsinumber . '-caption',
		'std' => 'This is a Test Image for Simplicity Theme. If you feel any problem please contact with D5 Creation.',
		'type' => 'textarea');
	}

	foreach (range(1,1) as $ctesnumber) {

	$options[] = array(
		'name' => 'Quote Text',
		'desc' => 'Input your Front Page Bottom Quotation here. Plese limit it within 150 Letters.',
		'id' => 'bottom-quotation' . $ctesnumber,
		'std' => 'Quote '. $ctesnumber . ': All the developers of D5 Creation have come from the disadvantaged part or group of the society. All have established themselves after a long and hard struggle in their life ----- D5 Creation Team',
		'type' => 'textarea');
		
	}
	
	// Social Contacts
	
	$options[] = array(
		'desc' => '<span class="featured-area-title">Social Links</span>', 
		'type' => 'info');
		
	$options[] = array(
		'name' => 'Picassa Web Album Link', 
		'desc' => 'Input your Picassa URL here.', 
		'id' => 'picassa-link',
		'std' => '#',
		'type' => 'text');
	
	$options[] = array(
		'name' => 'Linked In Link', 
		'desc' => 'Input your Linked In URL here.', 
		'id' => 'li-link',
		'std' => '#',
		'type' => 'text');

	$options[] = array(
		'name' => 'Feed or Blog Link', 
		'desc' => 'Input your Feed or Blog URL here.', 
		'id' => 'feed-link',
		'std' => '#',
		'type' => 'text');
		


	return $options;
}

/*
 * This is an example of how to add custom scripts to the options panel.
 * This example shows/hides an option when a checkbox is clicked.
 */

add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

function optionsframework_custom_scripts() { ?>


<?php
}
