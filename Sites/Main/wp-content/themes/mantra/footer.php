<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package Cryout Creations
 * @subpackage mantra
 * @since mantra 0.5
 */
?>	<div style="clear:both;"></div>

	</div> <!-- #forbottom -->
	</div><!-- #main -->


	<footer id="footer" role="contentinfo">
		<div id="colophon">
		
			<?php get_sidebar( 'footer' );?>
			
		</div><!-- #colophon -->

		<div id="footer2">
		
			<?php cryout_footer_hook(); ?>
			
		</div><!-- #footer2 -->
		<div style="background-color: #FFFFFF;font-family: 'Calibri';text-align:center;clear:both;padding-top:4px;color: #129793;" >
			@2013, M<span style="color: #eb500b;font-family: 'Calibri';">C</span>KANSYS and/or its subsidiaries. All rights reserved.
		</div><!-- #site-info -->
	</footer><!-- #footer -->

</div><!-- #wrapper -->

<?php	wp_footer(); ?>

</body>
</html>
