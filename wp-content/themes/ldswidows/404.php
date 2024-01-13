<?php 
/**
 * The template for displaying 404 pages (Not Found)
 */

get_header(); 
?>
<div class="page-banner">
  <?php pageBanner(); ?>
</div>
<div class="container container--narrow page-section">
		<div id="content" class="site-content" role="main">

			<header>
				<h1 class="heading1"><?php _e( 'Not Found', 'ldswidows' ); ?></h1>
			</header>

			<div class="page-wrapper">
				<div class="page-content">
					<h2><?php _e( 'This is somewhat embarrassing, isn’t it?', 'ldswidows' ); ?></h2>
					<p><?php _e( 'It looks like nothing was found at this location. How about going somewhere more familiar?', 'ldswidows' ); ?></p>

					<a class="btn btn--tiny btn--dark-orange" href="<?php echo get_site_url('/')?>"> Home Page </a> 
				</div><!-- .page-content -->
			</div><!-- .page-wrapper -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>


