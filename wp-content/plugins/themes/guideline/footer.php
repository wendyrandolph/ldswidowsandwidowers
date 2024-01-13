<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Guideline
 */
?>
	<div id="footer">
	  <div class="container">
      <?php if ( ! dynamic_sidebar( 'footer-1' ) ) : ?>
      <?php endif; // end footer widget area ?>
              
      <?php if ( ! dynamic_sidebar( 'footer-2' ) ) : ?>
      <?php endif; // end footer widget area ?>   
  
      <?php if ( ! dynamic_sidebar( 'footer-3' ) ) : ?>
      <?php endif; // end footer widget area ?>  
    
      <?php if ( ! dynamic_sidebar( 'footer-4' ) ) : ?>
      <?php endif; // end footer widget area ?>
      <div class="clear"></div>
    </div><!--end .container-->
  </div><!--end #footer--> 
        
    <div class="sitefooter">
    	<div class="container">
      	<div class="footerleft">
            <?php bloginfo('name'); ?> <?php esc_html_e('All Rights Reserved', 'guideline');?>
        </div>
        <div class="footerright">
				  <a href="<?php echo esc_url( __( 'https://www.theclassictemplates.com/themes/free-guideline-wordpress-template/', 'guideline' ) ); ?>">
		        <?php /* translators: %s: post title */ printf( esc_html( 'Design and Develop by %s', 'guideline' ), 'ClassicTemplate' ); ?>
          </a>
        </div>
        <div class="clear"></div>
      </div>
    </div><!--#end .sitefooter-->
  </div><!--#end pageholder-->
<?php wp_footer(); ?>
</body>
</html>