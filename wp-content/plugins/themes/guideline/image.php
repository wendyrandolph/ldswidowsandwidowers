<?php
/**
 * The template for displaying image attachments.
 *
 * @package Guideline
 */

get_header(); ?>
<div class="container">
     <div class="sitecontent-area">
        <section class="site-main">
			<?php while ( have_posts() ) : the_post(); ?>    
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>    
                         
                        <nav role="navigation" id="image-navigation" class="image-navigation">
                            <div class="nav-previous"><?php previous_image_link( false, __( '<span class="meta-nav">&larr;</span> Previous', 'guideline' ) ); ?></div>
                            <div class="nav-next"><?php next_image_link( false, __( 'Next <span class="meta-nav">&rarr;</span>', 'guideline' ) ); ?></div>
                        </nav><!-- #image-navigation -->
                    </header><!-- .entry-header -->    
                    <div class="entry-content">
                        <div class="entry-attachment">
                            <div class="attachment">
                                <?php guideline_the_attached_image(); ?>
                            </div><!-- .attachment -->    
                            <?php if ( has_excerpt() ) : ?>
                            <div class="entry-caption">
                                <?php the_excerpt(); ?>
                            </div><!-- .entry-caption -->
                            <?php endif; ?>
                        </div><!-- .entry-attachment -->    
                        <?php
                            the_content();
                            wp_link_pages( array(
                                'before' => '<div class="page-links">' . __( 'Pages:', 'guideline' ),
                                'after'  => '</div>',
                            ) );
                        ?>
                    </div><!-- .entry-content -->    
                    <?php edit_post_link( __( 'Edit', 'guideline' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
                </article><!-- #post-## -->    
                <?php
                    // If comments are open or we have at least one comment, load up the comment template
                    if ( comments_open() || '0' != get_comments_number() )
                        comments_template();
                ?>
    
            <?php endwhile; // end of the loop. ?>
        </section>
        <?php get_sidebar();?>
        <div class="clear"></div>
    </div>
</div>
<?php get_footer(); ?>