<?php
/**
 * Template part for displaying posts
 * Modern Style
 * Switch styles at Theme Options (WP Customizer)
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Regn
 * @subpackage Templates
 * @since 1.0.0
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( codeless_extra_classes( 'entry' ) ); ?> <?php echo codeless_extra_attr( 'entry' ) ?>>
		
    <?php 
	
    $post_format = get_post_format();
    
    ?>

	<div class="cl-entry__wrapper">
	
	
		<div class="cl-entry__wrapper-content">

			<?php

				/**
				 * Entry Header
				 * Output Entry Meta and title
				 */ 
			?>
			
			<header class="cl-entry__header">
                
                <div class="cl-entry__date-wrapper">
                    <span class="cl-entry__date-day"><?php echo get_the_date('j') ?></span>
                    <div class="cl-entry__date-smallpart">                    	
                        <span class="cl-entry__date-month">/<?php echo get_the_date('M') ?></span>
                        <span class="cl-entry__date-year"><?php echo get_the_date('Y') ?></span>
                    </div>
                </div>

				<?php the_title( '<h2 class="cl-entry__title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

                <?php get_template_part( 'template-parts/blog/parts/entry', 'meta' ); ?>

            </header><!-- .cl-entry__header -->
            
            

			<?php get_template_part( 'template-parts/blog/parts/entry', 'tools' ); ?>

	
		<?php
		/**
		 * Close Entry Wrapper
		 */ 
		?>
			<div class="cl-entry__arrow"></div>
        </div><!-- .cl-entry__wrapper-content -->
        
        <div class="cl-entry__wrapper-media">
        <a href="<?php echo esc_url( get_permalink() ); ?>">
        <?php 
	
				$post_format = get_post_format();
				/**
				 * Generate Post Thumbnail for Single Post and Blog Page
				 */ 
				
				if ( ( has_post_thumbnail() || $post_format == 'image' ) && $post_format != 'gallery' ) :
					
					get_template_part( 'template-parts/blog/parts/entry', 'thumbnail' );
				
				endif; ?>
				
				
				<?php

				/**
				 * Generate Slider if needed
				 */ 
				if ( get_post_format() == 'gallery' && !empty( codeless_post_galleries_data(get_post(get_the_ID()) ) ) ):
					
					get_template_part( 'template-parts/blog/parts/entry', 'slider' );
				
                endif; 
                
                ?>

				
				<?php
				
				/**
				 * Generate Audio Output
				 */ 
				if ( get_post_format() == 'audio' ):
				
					get_template_part( 'template-parts/blog/parts/entry', 'audio' );
				
				endif; 

				if( $post_format == 'quote' ): ?>
				<?php get_template_part( 'template-parts/blog/formats/content', get_post_format() ) ?>
				<?php endif;
			
			?>
			</a>
        </div>

		
	</div><!-- .cl-entry__wrapper -->

</article><!-- #post-## -->