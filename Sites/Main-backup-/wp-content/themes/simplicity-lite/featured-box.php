<?php
/* 	Simplicity Theme's Featured Box to show the Featured Items of Front Page
	Copyright: 2013, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Simplicity 1.0
*/
?>

<div id="featured-boxs">
<?php foreach (range(1,8) as $fboxn) { ?>
<span class="featured-box"> 
<a href="<?php echo esc_url( "http://landing.mckansys.com/$fboxn" );  ?>"><img class="box-image" src="<?php echo of_get_option('featured-image' . $fboxn, get_template_directory_uri() . '/images/featured-image' . $fboxn . '.png') ?>"/>
</a>
<h3><?php echo of_get_option('featured-title'. $fboxn, 'Simplicity Theme for Small Business'); ?></h3>
<div class="content-ver-sep"></div><br />
<p><?php echo of_get_option('featured-description' . $fboxn , 'The Color changing options of Simplicity will give the WordPress Driven Site an attractive look. Simplicity is super elegant and Professional Responsive Theme which will create the business widely expressed.'); ?></p>
</span>

<?php }  ?> <div class="clear"><br /></div><div class="lsep"></div><br />

<?php foreach (range(1,8) as $fboxn2) { ?>
<span class="featured-box"> 

<h3 class="featured-box2"><?php echo of_get_option('featured-title2' . $fboxn2, 'Simplicity Theme for Business'); ?></h3>
<div class="clear"> </div>
<p><?php echo of_get_option('featured-description2' . $fboxn2 , 'Simplicity is super elegant and Professional Responsive Theme which will create the business widely expressed.'); ?></p>
</span>




<?php }  ;  ?>

</div> <!-- featured-boxs -->