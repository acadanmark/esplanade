<?php
/*
Template Name: Front Page

Dette startede som en kopi af page.php
*/
?>
<?php get_header(); ?>
	<div id="container">
		<?php if( 'sidebar-content-sidebar' == esplanade_get_option( 'layout' ) ) : ?>
			<div class="content-sidebar-wrap">
		<?php endif; ?>
		<section id="content">
			<?php if( have_posts() ) : the_post(); ?>
				<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
					<div class="entry">
						<?php if( esplanade_get_option( 'breadcrumbs' ) ) : ?>
							<div id="location">
								<?php esplanade_breadcrumbs(); ?>
							</div><!-- #location -->
						<?php endif; ?>
						<header class="entry-header">
							<<?php esplanade_title_tag( 'post' ); ?> class="entry-title"><?php the_title(); ?></<?php esplanade_title_tag( 'post' ); ?>>
						</header><!-- .entry-header -->
						<div class="entry-content">
							<?php the_content(); ?>
							<div class="clear"></div>
						</div><!-- .entry-content -->
						<?php wp_link_pages( array( 'before' => '<footer class="entry-utility"><p class="post-pagination">' . __( 'Pages:', 'esplanade' ), 'after' => '</p></footer><!-- .entry-utility -->' ) ); ?>
					</div><!-- .entry -->
					<?php comments_template(); ?>
				</article><!-- .post -->
<!--
    Og her er så hvad der skal til for at få vist posts nede under en side
-->
<?php
 $postslist = get_posts('numberposts=10');
 foreach ($postslist as $post) :
    setup_postdata($post);
    include "content.php";
 endforeach
 ?>
<script type="text/javascript">
    jQuery(function () {
        // Hide the "Forside" title
        jQuery('header.entry-header').first().hide();

        // Make all but the first article an entry class (so they get decorated
        // properly)
        jQuery('article:gt(1)').addClass('entry');

        // We could comment-out the <div id="location"> above, but this is less
        // intrusive and easier to maintain
        jQuery('#location').hide();

        // Why is this required? Dunno...
        jQuery('head title').text("ACA");
    });
</script>
<!--
    / Færdig med hvad der skal til for at få vist posts nede under en side
-->
			<?php else : ?>
				<?php esplanade_404(); ?>
			<?php endif; ?>
		</section><!-- #content -->
		<?php if( 'sidebar-content-sidebar' == esplanade_get_option( 'layout' ) ) : ?>
				<?php get_sidebar( 'left' ); ?>
			</div><!-- #content-sidebar-wrap -->
			<?php get_sidebar( 'right' ); ?>
		<?php elseif( ( 'no-sidebars' != esplanade_get_option( 'layout' ) ) && ( 'full-width' != esplanade_get_option( 'layout' ) ) ) : ?>
			<?php get_sidebar(); ?>
		<?php endif; ?>
	</div><!-- #container -->
<?php get_footer(); ?>
